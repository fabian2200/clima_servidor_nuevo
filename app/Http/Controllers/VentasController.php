<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\EmailController;

class VentasController extends Controller
{
    public function guardarVenta(Request $request){
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $cedula = $request->input('cedula');
        $correo = $request->input('correo');
        $pines_comprados = $request->input('pines_comprados');
        $precio_pin = $request->input('precio_pin');
        $clave = self::generarPassword();

        $datos = [
            'usuario' => "user_".$cedula,
            'clave' => md5($clave),
            'rol' => 2,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'cedula' => $cedula,
            'correo' => $correo,
            'pines_comprados' => $pines_comprados,
            'pines_utilizados' => '0',
            'pines_borrados' => '0',
            'imagen' => 'default.png',
        ];

        $insertado = DB::connection('mysql')->table('usuario')->insertGetId(
            $datos 
        );

        if ($insertado) {
            $datos_venta = [
                'id_cliente' => $insertado,
                'pines_comprados' => $pines_comprados,
                'precio_pin' => $precio_pin,
                'fecha' => date('d-m-Y H:i:s'),
                'total' => ($pines_comprados * $precio_pin)
            ];

            $insertado2 = DB::connection('mysql')->table('venta')->insert(
                $datos_venta 
            );

            if ($insertado2) {
                $emailController = new EmailController();
                $resultado = $emailController->enviarCorreo('Activación de cuenta', $correo, $nombres.' '.$apellidos, "user_".$cedula, $clave, $pines_comprados, $precio_pin, ($pines_comprados * $precio_pin), 1111);
                return response()->json(["¡Venta realizada correctamente!", 0], 200);
            }else{
                return response()->json(["¡Ocurrió un error al guardar la venta, intente nuevamente!", 1], 200);
            }
        }else{
            return response()->json(["¡Ocurrió un error al guardar el cliente, intente nuevamente!", 1], 200);
        }
    }

    public function generarPassword(){
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Caracteres permitidos

        $randomPassword = '';
        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, strlen($characters) - 1)];
        }

        $password = str_shuffle($randomPassword);

        return $password;
    }

    public function consultarClientes(){
        $usuarios = DB::connection("mysql")->table("usuario")
        ->select("usuario.*")
        ->where("usuario.rol", 2)
        ->orderBy("usuario.nombres", "ASC")
        ->get();
        
        return response()->json($usuarios, 200);
    }

    public function consultarVentas(){
        $ventas = DB::connection("mysql")->table("venta")
        ->join("usuario", "usuario.id", "venta.id_cliente")
        ->select("venta.*", "usuario.nombres", "usuario.apellidos")
        ->orderBy("venta.id", "DESC")
        ->where("usuario.rol", 2)
        ->get();
        
        return response()->json($ventas, 200);
    }

    public function datosDashboardAdmin(){
        $clientes = DB::connection("mysql")->table("usuario")
        ->select("usuario.*")
        ->where("usuario.rol", 2)
        ->count();

        $pines = DB::connection("mysql")->table("venta")
        ->sum("pines_comprados");

        $total_dinero = DB::connection("mysql")->table("venta")
        ->sum("total");

        $datos = [
            "clientes" => $clientes,
            "pines" => $pines,
            "total_dinero" => $total_dinero
        ];
        
        return response()->json($datos, 200);
    }

    public function guardarVentaExistente(Request $request){
        $id_cliente = $request->input('id_cliente');
        $pines_comprados = $request->input('pines_comprados');
        $precio_pin = $request->input('precio_pin');

        $usuario = DB::connection('mysql')->table('usuario')
        ->where("id", $id_cliente)
        ->first();

        $actualizado = DB::connection('mysql')->table('usuario')
        ->where("id", $id_cliente)
        ->update([
            "pines_comprados" => DB::raw('pines_comprados + ' . $pines_comprados)
        ]);

        if ($actualizado) {
            $datos_venta = [
                'id_cliente' => $id_cliente,
                'pines_comprados' => $pines_comprados,
                'precio_pin' => $precio_pin,
                'fecha' => date('d-m-Y H:i:s'),
                'total' => ($pines_comprados * $precio_pin)
            ];

            $insertado2 = DB::connection('mysql')->table('venta')->insert(
                $datos_venta 
            );

            if ($insertado2) {
                $emailController = new EmailController();
                $resultado = $emailController->enviarCorreo('Compra de pines', $usuario->correo, $usuario->nombres.' '.$usuario->apellidos, "user_".$usuario->cedula, $usuario->clave, $pines_comprados, $precio_pin, ($pines_comprados * $precio_pin), 1111);
                return response()->json(["¡Venta realizada correctamente!", 0], 200);
            }else{
                return response()->json(["¡Ocurrió un error al guardar la venta, intente nuevamente!", 1], 200);
            }
        }else{
            return response()->json(["¡Ocurrió un error al guardar el cliente, intente nuevamente!", 1], 200);
        }
    }

    public function disminuirPines(Request $request){
        $id_cliente = $request->input('id_cliente');
        $pines_disminuir = $request->input('pines_disminuir');
        $pines_actuales = $request->input('pines_actuales');


        $actualizado = DB::connection('mysql')->table('usuario')
        ->where("id", $id_cliente)
        ->update([
            "pines_comprados" => ($pines_actuales - $pines_disminuir)
        ]);

        if ($actualizado) {
            return response()->json(["¡Disminución de pines realizada correctamente!", 0], 200);
        }else{
            return response()->json(["¡Ocurrió un error al procesar la solicitud, intente nuevamente!", 1], 200);
        }

    }
}
