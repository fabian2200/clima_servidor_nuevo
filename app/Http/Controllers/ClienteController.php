<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\EmailController;


class ClienteController extends Controller
{
    public function verEmpresas(){
        $idUsuario = Session::get('id');

        $empresas = DB::connection("mysql")->table("empresa")
        ->where("id_cliente", $idUsuario)
        ->orderBy("fecha_creada", "DESC")
        ->get();

        return response()->json($empresas, 200);
    }

    public function datosDashboardCliente(){
        $idUsuario = Session::get('id');

        $empresas = DB::connection("mysql")->table("empresa")
        ->select("empresa.*")
        ->where("empresa.id_cliente", $idUsuario)
        ->count();

        $usuario = DB::connection("mysql")->table("usuario")
        ->where("usuario.id", $idUsuario)
        ->first();

        $datos = [
            "empresas" => $empresas,
            "pines_comprados" => $usuario->pines_comprados,
            "pines_usados" => $usuario->pines_utilizados
        ];
        
        return response()->json($datos, 200);
    }

    public function registrarEmpresa(Request $request){
        $nombre = $request->input('nombre');
        $numero_empleados = $request->input('numero_empleados');
        $areas = $request->input('areas');
        $imagen_propia = $request->input('imagen_propia');
        $idUsuario = Session::get('id');

        $usuario = DB::connection("mysql")->table("usuario")
        ->where("usuario.id", $idUsuario)
        ->first();

        $pines_disponibles = $usuario->pines_comprados - $usuario->pines_utilizados - $usuario->pines_borrados;

        if($pines_disponibles >= $numero_empleados){
            if($imagen_propia == "Si"){
                $logo = $request->file('logo');
                $nombre_logo = time() . '_' . $logo->getClientOriginalName();
            }else{
                $nombre_logo = "default.png";
            }
    
            $datos = [
                'id_cliente' => $idUsuario,
                'nombre' => $nombre,
                'logo' => $nombre_logo,
                'numero_empleados' => $numero_empleados,
                'empleados_responden' => 0,
                'fecha_creada' => date('d-m-Y H:i:s')
            ];
    
            $insertadoID = DB::connection('mysql')->table('empresa')->insertGetId(
                $datos 
            );
    
            if ($insertadoID) {
                if($imagen_propia == "Si"){
                    $logo = $request->file('logo');
                    $nombre_logo = time() . '_' . $logo->getClientOriginalName();
                    $logo->move(public_path('imagenes_empresas'), $nombre_logo);
                }
    
                foreach ($areas as $key) {
                    DB::connection('mysql')->table('empresa_area')->insert(
                        [
                            'id_empresa' => $insertadoID,
                            'nombre_area' => $key
                        ]
                    );
                }

                DB::connection('mysql')->table('usuario')
                ->where("id", $idUsuario)
                ->update([
                    "pines_utilizados" => DB::raw('pines_utilizados + ' . $numero_empleados)
                ]);
                
                return response()->json(["¡Empresa registrada correctamente!", 0], 200);

            }else{
                return response()->json(["¡Ocurrió un error al guardar la empresa, intente nuevamente!", 1], 200);
            }
        }else{
            return response()->json(["¡No cuenta con esa cantidad de pines, actualmente tiene disponibles ".$pines_disponibles." pines!", 1], 200);
        }
    }

    public function disminuirEmpleadosEmpresa(Request $request){
        $idUsuario = Session::get('id');

        $id_empresa = $request->input('id_empresa');
        $numero_disminuir = $request->input('numero_disminuir');

        $insertado = DB::connection('mysql')->table('empresa')
        ->where("id", $id_empresa)
        ->update([
            "numero_empleados" => DB::raw('numero_empleados - ' . $numero_disminuir)
        ]);


        if ($insertado) {
            $insertado2 = DB::connection('mysql')->table('usuario')
            ->where("id", $idUsuario)
            ->update([
                "pines_utilizados" => DB::raw('pines_utilizados - ' . $numero_disminuir)
            ]);

            if ($insertado2) {
                return response()->json(["¡Solicitud procesada con éxito!", 0], 200);
            }else{
                return response()->json(["¡Ocurrió un error al procesar la solicitud, intente nuevamente!", 1], 200);
            }
        }else{
            return response()->json(["¡Ocurrió un error al procesar la solicitud, intente nuevamente!", 1], 200);
        }
    }

    public function aumentarEmpleadosEmpresa(Request $request){
        $idUsuario = Session::get('id');

        $id_empresa = $request->input('id_empresa');
        $numero_aumentar = $request->input('numero_aumentar');

        $insertado = DB::connection('mysql')->table('empresa')
        ->where("id", $id_empresa)
        ->update([
            "numero_empleados" => DB::raw('numero_empleados + ' . $numero_aumentar)
        ]);


        if ($insertado) {
            $insertado2 = DB::connection('mysql')->table('usuario')
            ->where("id", $idUsuario)
            ->update([
                "pines_utilizados" => DB::raw('pines_utilizados + ' . $numero_aumentar)
            ]);

            if ($insertado2) {
                return response()->json(["¡Solicitud procesada con éxito!", 0], 200);
            }else{
                return response()->json(["¡Ocurrió un error al procesar la solicitud, intente nuevamente!", 1], 200);
            }
        }else{
            return response()->json(["¡Ocurrió un error al procesar la solicitud, intente nuevamente!", 1], 200);
        }
    }

    public function editarEmpresa(Request $request){
        $idUsuario = Session::get('id');

        $id_empresa = $request->input('id_empresa');
        $nombre = $request->input('nombre');
        
        
        $insertado = DB::connection('mysql')->table('empresa')
        ->where("id", $id_empresa)
        ->update([
            "nombre" => $nombre,
        ]);

        $imagen_editada_empresa = $request->input('imagen_editada_empresa');

        if($imagen_editada_empresa == "Si"){
            $imagen_editada = $request->file('imagen_editada');
            $nombre_logo = time() . '_' . $imagen_editada->getClientOriginalName();
            $imagen_editada->move(public_path('imagenes_empresas'), $nombre_logo);
        
            $insertado = DB::connection('mysql')->table('empresa')
            ->where("id", $id_empresa)
            ->update([
                "logo" => $nombre_logo,
            ]);
        }
        
        return response()->json(["¡Solicitud procesada con éxito!", 0], 200); 
    }

    public function verAreas(Request $request){
        $id_empresa = $request->input('id_empresa');

        $areas = DB::connection("mysql")->table("empresa_area")
        ->select("empresa_area.*", "empresa_area.nombre_area as nombre_area_actual")
        ->where("id_empresa", $id_empresa)
        ->orderBy("nombre_area", "ASC")
        ->get();

        return response()->json($areas, 200);
    }

    public function editarAreas(Request $request){
        $areas = $request->input('areas');

        foreach ($areas as $key) {
            DB::connection('mysql')->table('empresa_area')
            ->where("id", $key["id"])
            ->update(
                [
                    'nombre_area' => $key["nombre_area"]
                ]
            );
        }

        return response()->json(["¡Solicitud procesada con éxito!", 0], 200); 
    }

    public function infoEmpresa(Request $request){
        $id_empresa = $request->input('id');

        $empresa = DB::connection("mysql")->table("empresa")
        ->where("id", $id_empresa)
        ->first();

        return response()->json($empresa, 200);
    }

    public function guardarTest(Request $request){
        $id_empresa = $request->input('empresa');
        $datos_socio = $request->input('datos_socio');
        $respuestas = $request->input('respuestas');

        $empresa = DB::connection("mysql")->table("empresa")
        ->where("id", $id_empresa)
        ->first();

        if($empresa->numero_empleados - $empresa->empleados_responden > 0){
            $datos_socio['id_empresa'] = $id_empresa;
            $datos_socio['fecha_respondio'] = date('d-m-Y H:i:s');
    
            $insertado1 = DB::connection('mysql')->table('datos_socio')
            ->insertGetId(
                $datos_socio
            );
    
            $respuestas['id_contesto'] = $insertado1;
            $respuestas['id_empresa'] = $id_empresa;
    
            $insertado2 = DB::connection('mysql')->table('respuestas')
            ->insertGetId(
                $respuestas
            );
    
            DB::connection('mysql')->table('empresa')
            ->where("id", $id_empresa)
            ->update([
                "empleados_responden" => DB::raw('empleados_responden + 1')
            ]);
    
            return response()->json(["¡Sus respuestas fueron registradas correctamente!", 1], 200); 
        }else{
            return response()->json(["¡Se alcanzo el limite de respuestas para esta empresa!", 0], 200); 
        }
    }

    public function datosEmpresa(Request $request){
        $id_empresa = $request->input('id_empresa');

        $empresa = DB::connection("mysql")->table("empresa")
        ->where("id", $id_empresa)
        ->first();

        $empresa->responden = DB::connection("mysql")->table("datos_socio")
        ->join('empresa_area', "datos_socio.area", "empresa_area.id")
        ->select("datos_socio.*", "empresa_area.nombre_area")
        ->where("datos_socio.id_empresa", $id_empresa)
        ->orderBy("datos_socio.fecha_respondio", "DESC")
        ->get();

        return response()->json($empresa, 200);
    }

    public function dataRespuesta(Request $request){
        $id_respondio = $request->input('id_respondio');

        $datos_socio = DB::connection("mysql")->table("datos_socio")
        ->join('empresa_area', "datos_socio.area", "empresa_area.id")
        ->select("datos_socio.*", "empresa_area.nombre_area")
        ->where("datos_socio.id", $id_respondio)
        ->first();

        $datos_socio->respuestas = DB::connection("mysql")->table("respuestas")
        ->where("respuestas.id_contesto", $id_respondio)
        ->first();

        return response()->json($datos_socio, 200);
    }

    public function consultarDatosInformeSocio(Request $request){
        $id_empresa = $request->input('id_empresa');

        $porSexo = DB::connection("mysql")->table("datos_socio")
        ->select("sexo")
        ->where("id_empresa", $id_empresa)
        ->groupBy("sexo")
        ->selectRaw("sexo, COUNT(*) as total")
        ->get();

        $porEdad = DB::connection("mysql")->table("datos_socio")
        ->select("edad")
        ->where("id_empresa", $id_empresa)
        ->groupBy("edad")
        ->selectRaw("edad, COUNT(*) as total")
        ->get();

        $porEdad = DB::connection("mysql")->table("datos_socio")
        ->select("edad")
        ->where("id_empresa", $id_empresa)
        ->groupBy("edad")
        ->selectRaw("edad, COUNT(*) as total")
        ->get();

        $porNivelEducacion = DB::connection("mysql")->table("datos_socio")
        ->select("nivel_educacion")
        ->where("id_empresa", $id_empresa)
        ->groupBy("nivel_educacion")
        ->selectRaw("nivel_educacion, COUNT(*) as total")
        ->get();

        $porEstadoCivil = DB::connection("mysql")->table("datos_socio")
        ->select("estado_civil")
        ->where("id_empresa", $id_empresa)
        ->groupBy("estado_civil")
        ->selectRaw("estado_civil, COUNT(*) as total")
        ->get();

        $porTiempoCargo = DB::connection("mysql")->table("datos_socio")
        ->select("tiempo_cargo")
        ->where("id_empresa", $id_empresa)
        ->groupBy("tiempo_cargo")
        ->selectRaw("tiempo_cargo, COUNT(*) as total")
        ->get();

        $porTiempoAntiguedad = DB::connection("mysql")->table("datos_socio")
        ->select("tiempo_entidad")
        ->where("id_empresa", $id_empresa)
        ->groupBy("tiempo_entidad")
        ->selectRaw("tiempo_entidad, COUNT(*) as total")
        ->get();

        $porSalario = DB::connection("mysql")->table("datos_socio")
        ->select("salario_actual")
        ->where("id_empresa", $id_empresa)
        ->groupBy("salario_actual")
        ->selectRaw("salario_actual, COUNT(*) as total")
        ->get();

        $porEstrato = DB::connection("mysql")->table("datos_socio")
        ->select("estrato")
        ->where("id_empresa", $id_empresa)
        ->groupBy("estrato")
        ->selectRaw("estrato, COUNT(*) as total")
        ->get();

        $porCiudad = DB::connection("mysql")->table("datos_socio")
        ->select("ciudad")
        ->where("id_empresa", $id_empresa)
        ->groupBy("ciudad")
        ->selectRaw("ciudad, COUNT(*) as total")
        ->get();

        $porArea = DB::connection("mysql")->table("datos_socio")
        ->where("datos_socio.id_empresa", $id_empresa)
        ->join('empresa_area', "datos_socio.area", "empresa_area.id")
        ->select("empresa_area.nombre_area")
        ->groupBy("empresa_area.nombre_area")
        ->selectRaw("empresa_area.nombre_area, COUNT(*) as total")
        ->get();

        $empresa = DB::connection("mysql")->table("empresa")
        ->where("id", $id_empresa)
        ->first();

        $datos = [
            "empresa" => $empresa,
            "por_sexo" => $porSexo,
            "por_edad" => $porEdad,
            "por_nivel_educacion" => $porNivelEducacion,
            "por_estado_civil" => $porEstadoCivil,
            "por_tiempo_cargo" => $porTiempoCargo,
            "por_tiempo_antiguedad" => $porTiempoAntiguedad,
            "por_salario" => $porSalario,
            "por_estrato" => $porEstrato,
            "por_ciudad" => $porCiudad,
            "por_area" => $porArea
        ];

        return response()->json($datos, 200);
    }

    public function eliminarArea(Request $request){
        $id_area =  $request->input('id_area');

        $cantidad = DB::connection("mysql")->table("datos_socio")
        ->where("area", $id_area)
        ->count();

        if($cantidad > 0){
            return response()->json(["¡No se puede eliminar, porque ya hay empleados asociados a este departamento!", 0], 200); 
        }else{
            $delete = DB::connection("mysql")->table("empresa_area")
            ->where("id", $id_area)
            ->delete();
            
            if ($delete > 0) {
                return response()->json(["¡Se elimino el departamento correctamente!", 1], 200); 
            } else {
                return response()->json(["¡Ocurrió un error, intente mas tarde!", 0], 200); 
            }
        }
    }

    public function guardarArea(Request $request){
        $area =  $request->input('area');
        $id_empresa =  $request->input('id_empresa');

        $insert = DB::connection("mysql")->table("empresa_area")
        ->insert([
            "nombre_area" => $area,
            "id_empresa" => $id_empresa
        ]);

        if ($insert) {
            return response()->json(["¡Se registro el departamento correctamente!", 1], 200); 
        } else {
            return response()->json(["¡Ocurrió un error, intente mas tarde!", 0], 200); 
        }
    }
    
}