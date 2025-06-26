<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\EmailController;

class VentaElectronicaController extends Controller
{
    public function enviarCredenciales(Request $request){
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $cedula = $request->input('cedula');
        $correo = $request->input('correo');
        $pines_comprados = $request->input('pines_comprados');
        $precio_pin = $request->input('precio_pin');
        $fecha = $request->input('fecha');
        $total = $request->input('total');


        $usuarioExistente = DB::table('usuario')
        ->where('cedula', $cedula)
        ->first();

        if ($usuarioExistente) {
            $actualizado = DB::connection('mysql')->table('usuario')
            ->where("id", $usuarioExistente->id)
            ->update([
                "pines_comprados" => DB::raw('pines_comprados + ' . $pines_comprados)
            ]);
    
            if ($actualizado) {
                $datos_venta = [
                    'id_cliente' => $usuarioExistente->id,
                    'pines_comprados' => $pines_comprados,
                    'precio_pin' => $precio_pin,
                    'fecha' => $fecha,
                    'total' => $total
                ];
    
                $insertado2 = DB::connection('mysql')->table('venta')->insert(
                    $datos_venta 
                );
    
                if ($insertado2) {
                    $emailController = new EmailController();
                    $resultado = $emailController->enviarCorreo('Compra de pines 2', $usuarioExistente->correo, $usuarioExistente->nombres.' '.$usuarioExistente->apellidos, $usuarioExistente->usuario, $usuarioExistente->clave, $pines_comprados, $precio_pin, $total, "");
                    return response()->json(["¡Venta realizada correctamente!", 0], 200);
                }else{
                    return response()->json(["¡Ocurrió un error al guardar la venta, intente nuevamente!", 1], 200);
                }
            }else{
                return response()->json(["¡Ocurrió un error al guardar el cliente, intente nuevamente!", 1], 200);
            }
        }else{
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

            $insertado = DB::connection('mysql')
            ->table('usuario')
            ->insertGetId(
                $datos
            );

            if ($insertado) {
                $datos_venta = [
                    'id_cliente' => $insertado,
                    'pines_comprados' => $pines_comprados,
                    'precio_pin' => $precio_pin,
                    'fecha' => $fecha,
                    'total' => $total
                ];
    
                $insertado2 = DB::connection('mysql')->table('venta')->insert(
                    $datos_venta 
                );
    
                if ($insertado2) {
                    $emailController = new EmailController();
                    $resultado = $emailController->enviarCorreo('Activación de cuenta', $correo, $nombres.' '.$apellidos, "user_".$cedula, $clave, $pines_comprados, $precio_pin, $total, "");
                    return response()->json(["¡Venta realizada correctamente!", 0], 200);
                }else{
                    return response()->json(["¡Ocurrió un error al guardar la venta, intente nuevamente!", 1], 200);
                }
            }else{
                return response()->json(["¡Ocurrió un error al guardar el cliente, intente nuevamente!", 1], 200);
            }
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

    public function enviarPagoRechazado(Request $request){
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $cedula = $request->input('cedula');
        $correo = $request->input('correo');
        $pines_comprados = $request->input('pines_comprados');
        $precio_pin = $request->input('precio_pin');
        $fecha = $request->input('fecha');
        $total = $request->input('total');
        $orden = $request->input('orden');

        $usuario = "";
        $password = "";

        $emailController = new EmailController();
        $resultado = $emailController->enviarCorreo(
            'Pago rechazado', 
            $correo, 
            $nombres.' '.$apellidos, 
            $usuario, 
            $password, 
            $pines_comprados, 
            $precio_pin, 
            $total,
            $orden
        );

        return response()->json(["¡Correo enviado correctamente!", 0], 200);
    }
}
