<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\InformeGeneralDimensionesController;
use App\Http\Controllers\VentaElectronicaController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes/web.php
// Rutas de la API
Route::prefix('api')->group(function () {
    Route::get('/iniciar-sesion', [UsuarioController::class, 'loginUsuario'])->name('loginUsuario');
    Route::get('/mis-datos', [UsuarioController::class, 'misDatos'])->name('misDatos');
    Route::get('/verificarLogin', [UsuarioController::class, 'verificarLogin'])->name('verificarLogin');
    Route::post('/editar-usuario', [UsuarioController::class, 'editarUsuario'])->name('editarUsuario');
    Route::post('/cambiar-password', [UsuarioController::class, 'cambiarPassword'])->name('cambiarPassword');
    Route::get('/cerrar-sesion', [UsuarioController::class, 'cerrarSesion'])->name('cerrarSesion');
    Route::get('/recuperar-clave', [UsuarioController::class, 'recuperarClave'])->name('recuperarClave');
    
    Route::get('/listar-paquetes', [UsuarioController::class, 'listarPaquetes'])->name('listarPaquetes');
    Route::post('/guardar-paquete', [UsuarioController::class, 'guardarPaquete'])->name('guardarPaquete');
    Route::post('/editar-paquete', [UsuarioController::class, 'editarPaquete'])->name('editarPaquete');
    Route::get('/eliminar-paquete', [UsuarioController::class, 'eliminarPaquete'])->name('eliminarPaquete');
    Route::get('/buscar-paquete', [UsuarioController::class, 'buscarPaquete'])->name('buscarPaquete');

    Route::post('/guardar-venta', [VentasController::class, 'guardarVenta'])->name('guardarVenta');
    Route::get('/ver-clientes', [VentasController::class, 'consultarClientes'])->name('consultarClientes');
    Route::get('/ver-ventas', [VentasController::class, 'consultarVentas'])->name('consultarVentas');
    Route::get('/datos-dashboard-admin', [VentasController::class, 'datosDashboardAdmin'])->name('datosDashboardAdmin');
    Route::post('/guardar-venta-existente', [VentasController::class, 'guardarVentaExistente'])->name('guardarVentaExistente');
    Route::post('/disminuir-pines', [VentasController::class, 'disminuirPines'])->name('disminuirPines');

    Route::post('/guardar-empresa', [ClienteController::class, 'registrarEmpresa'])->name('registrarEmpresa');
    Route::get('/ver-empresas', [ClienteController::class, 'verEmpresas'])->name('verEmpresas');
    Route::get('/datos-dashboard-cliente', [ClienteController::class, 'datosDashboardCliente'])->name('datosDashboardCliente');
    Route::post('/disminuir-empleados-empresa', [ClienteController::class, 'disminuirEmpleadosEmpresa'])->name('disminuirEmpleadosEmpresa');
    Route::post('/aumentar-empleados-empresa', [ClienteController::class, 'aumentarEmpleadosEmpresa'])->name('aumentarEmpleadosEmpresa');
    Route::post('/editar-empresa', [ClienteController::class, 'editarEmpresa'])->name('editarEmpresa');
    Route::get('/ver-areas', [ClienteController::class, 'verAreas'])->name('verAreas');
    Route::post('/editar-areas', [ClienteController::class, 'editarAreas'])->name('editarAreas');

    Route::get('/info-empresa', [ClienteController::class, 'infoEmpresa'])->name('infoEmpresa');
    Route::post('/guardar-test', [ClienteController::class, 'guardarTest'])->name('guardarTest');
    Route::get('/datos-empresa', [ClienteController::class, 'datosEmpresa'])->name('datosEmpresa');
    Route::get('/datos-respuesta', [ClienteController::class, 'dataRespuesta'])->name('dataRespuesta');
    Route::get('/datos-socio', [ClienteController::class, 'consultarDatosInformeSocio'])->name('consultarDatosInformeSocio');
    Route::get('/eliminar-area', [ClienteController::class, 'eliminarArea'])->name('eliminarArea');
    Route::post('/guardar-area', [ClienteController::class, 'guardarArea'])->name('guardarArea');

    Route::get('/inforrme-general-dimensiones', [InformeGeneralDimensionesController::class, 'informeGeneralDimensiones'])->name('informeGeneralDimensiones');
    Route::get('/comparacion-dimensiones', [InformeGeneralDimensionesController::class, 'comparacionDimensiones'])->name('comparacionDimensiones');
    Route::get('/fortalezas', [InformeGeneralDimensionesController::class, 'fortalezas'])->name('fortalezas');
    Route::post('/generar-pdf-socio', [InformeGeneralDimensionesController::class, 'generatePDFSocio'])->name('generatePDFSocio');
    Route::post('/generar-pdf-general', [InformeGeneralDimensionesController::class, 'generatePDFGeneral'])->name('generatePDFGeneral');
    Route::post('/generar-pdf-tablas', [InformeGeneralDimensionesController::class, 'generarPDFTablas'])->name('generarPDFTablas');
    Route::post('/generar-pdf-comparacion', [InformeGeneralDimensionesController::class, 'generarPDFComparacion'])->name('generarPDFComparacion');

    Route::post('/enviar-credenciales', [VentaElectronicaController::class, 'enviarCredenciales'])->name('enviarCredenciales');
    Route::post('/enviar-pago-rechazado', [VentaElectronicaController::class, 'enviarPagoRechazado'])->name('enviarPagoRechazado');

});

Route::get('/', function () {
    return view('vue');
});


Route::get('/recuperar-clave', function () {
    return view('recuperarClave');
});

Route::get('/test/{empresa}', function ($empresa) {

    $areas = DB::connection("mysql")->table("empresa_area")
    ->select("empresa_area.*", "empresa_area.nombre_area as nombre_area_actual")
    ->where("id_empresa", $empresa)
    ->orderBy("nombre_area", "ASC")
    ->get();

    return view('test', ['areas' => $areas]);
});

Route::get('/{any}', function () {
    return view('principal');
})->where('any', '.*');