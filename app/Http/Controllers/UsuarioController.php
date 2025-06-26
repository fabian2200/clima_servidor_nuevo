<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\EmailController;


class UsuarioController extends Controller
{

    public function loginUsuario(Request $request){
        $username = $request->input('usuario');
        $password = $request->input('password');

        $usuario = DB::connection("mysql")->table("usuario")
        ->where("usuario", $username)
        ->orWhere("correo", $username)
        ->first();

        if (!$usuario) {
            return response()->json(["No encontramos ningún usuario registrado con el usuario/correo ingresado", 0], 200);
        } else {
            if($usuario->clave == md5($password)){
                Session::flush();
                Session::start();
                Session::put('id', $usuario->id);
                Session::put('nombres', $usuario->nombres);
                Session::put('apellidos', $usuario->apellidos);
                Session::put('usuario', $usuario->usuario);
                Session::put('correo', $usuario->correo);
                Session::put('imagen', $usuario->imagen);
                Session::put('rol', $usuario->rol);
                Session::put('logueado', true);
                
                return response()->json(["Bienvenido ".$usuario->nombres, 1, $usuario->rol], 200);
            }else{
                return response()->json(["Contraseña incorrecta", 0], 200);
            }
        }
    }

    public function misDatos(){
        $idUsuario = Session::get('id');
        $usuario = DB::connection("mysql")->table("usuario")
        ->where("id", $idUsuario)
        ->first();
        return response()->json($usuario, 200);
    }


    public function verificarLogin(){
        if(Session::has('logueado')){
            return response()->json(1, 200);
        }else{
            return response()->json(0, 200);
        }
    }

    public function editarUsuario(Request $request){
        $datos = [
            'id' => $request->input('id'),
            'cedula' => $request->input('cedula'),
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'usuario' => $request->input('usuario'),
            'correo' => $request->input('correo')
        ];

        $imagen_cambiada = $request->input('imagen_cambiada');
       
        if($imagen_cambiada == 1){
            $imagen_nueva = $request->file('imagen_nueva');
            $nombreArchivo = time() . '_' . $imagen_nueva->getClientOriginalName();
            $imagen_nueva->move(public_path('imagenes_usuarios'), $nombreArchivo);
            $datos["imagen"] = $nombreArchivo;
        }

        DB::connection('mysql')->table('usuario')->updateOrInsert(
            ['id' => $datos['id']],
            $datos 
        );

        return response()->json(["Datos actualizados correctamente", 1], 200);
    }


    public function cambiarPassword(Request $request){
        $idUsuario = Session::get('id');
        $password_old = $request->input('password_old');
        $password_new = $request->input('password_new');

        $usuario = DB::connection("mysql")->table("usuario")
        ->where("id", $idUsuario)
        ->where("clave", md5($password_old))
        ->first();

        if ($usuario) {
            $datos = [
                'id' => $idUsuario,
                'clave' =>  md5($password_new)
            ];

            DB::connection('mysql')->table('usuario')->updateOrInsert(
                ['id' => $datos['id']],
                $datos 
            );
    
            return response()->json(["¡Contraseña actualizada correctamente!", 1], 200);
        }else{
            return response()->json(["¡La contraseña anterior no es correcta!", 0], 200);
        }
    }

    public function cerrarSesion(){
        Session::flush();
        return 1;
    }

    public function recuperarClave(Request $request){
        $correousuario = $request->input('correousuario');

        $usuario = DB::connection("mysql")->table("usuario")
        ->where("usuario", $correousuario)
        ->orWhere("correo", $correousuario)
        ->first();

        if (!$usuario) {
            return response()->json(["No encontramos ningún usuario registrado con el usuario/correo ingresado", 0], 200);
        } else {

            $clave = self::generarPassword();
            $datos = [
                'clave' =>  md5($clave)
            ];

            $actualizado = DB::connection('mysql')->table('usuario')
            ->where('id', $usuario->id)
            ->update(
                $datos 
            );

            if ($actualizado) {
                $emailController = new EmailController();
                $resultado = $emailController->enviarCorreoClave($usuario->nombres.' '.$usuario->apellidos ,$clave, $usuario->correo);
                return response()->json(["¡Clave recuperada!", 1], 200);
            }else{
                return response()->json(["¡Ocurrió un error al procesar la solicitud, intente nuevamente!", 0], 200);
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

    public function listarPaquetes(){        
        $paquetes = DB::connection("mysql")->table("paquetes")
        ->get();

        return response()->json($paquetes, 200);
    }

    public function buscarPaquete(Request $request){    

        $idPaquete = $request->query('id_paquete');

        if (!$idPaquete) {
            return response()->json(['error' => 'El parámetro id_paquete es obligatorio.'], 400);
        }
    
        $paquete = DB::connection("mysql")->table("paquetes")
            ->where('id', $idPaquete)
            ->first();
    
        if (!$paquete) {
            return response()->json(['error' => 'Paquete no encontrado.'], 404);
        }
    
        return response()->json($paquete, 200);
    }

    public function guardarPaquete(Request $request){
        $nombre_paquete = $request->input('nombre');
        $numero_pines = (int) $request->input('numero_pines');
        $precio_pin = (int) $request->input('precio_pin');
        $subtotal = $numero_pines * $precio_pin;
        $descuento = (double) $request->input('descuento');
        $total = $subtotal - ($subtotal * ($descuento / 100));
    
        
        $datos = [
            'nombre' => $nombre_paquete,
            'numero_pines' => $numero_pines,
            'precio_pin' => $precio_pin,
            'subtotal' => $subtotal,
            'descuento' => $descuento,
            'total' => $total,
        ];

        $guardado = DB::connection('mysql')->table('paquetes')->insert(
            $datos 
        );

        if ($guardado) {
            return response()->json(["¡Paquete registrado correctamente!", 1], 200);
        }else{
            return response()->json(["¡Ocurrió un error, intente nuevamente!", 0], 200);
        }
    }

    public function editarPaquete(Request $request){
        $id = (int) $request->input('id');
        $nombre_paquete = $request->input('nombre');
        $numero_pines = (int) $request->input('numero_pines');
        $precio_pin = (int) $request->input('precio_pin');
        $subtotal = $numero_pines * $precio_pin;
        $descuento = (double) $request->input('descuento');
        $total = $subtotal - ($subtotal * ($descuento / 100));
    
        
        $datos = [
            'nombre' => $nombre_paquete,
            'numero_pines' => $numero_pines,
            'precio_pin' => $precio_pin,
            'subtotal' => $subtotal,
            'descuento' => $descuento,
            'total' => $total,
        ];

        $guardado = DB::connection('mysql')->table('paquetes')
        ->where("id", $id)
        ->update(
            $datos 
        );

        if ($guardado) {
            return response()->json(["¡Paquete modificado correctamente!", 1], 200);
        }else{
            return response()->json(["¡Ocurrió un error, intente nuevamente!", 0], 200);
        }
    }

    public function eliminarPaquete(Request $request){
        $id = (int) $request->input('id');
    
        $eliminado = DB::connection('mysql')->table('paquetes')
        ->where("id", $id)
        ->delete();

        if ($eliminado) {
            return response()->json(["¡Paquete eliminado correctamente!", 1], 200);
        }else{
            return response()->json(["¡Ocurrió un error, intente nuevamente!", 0], 200);
        }
    }
}
