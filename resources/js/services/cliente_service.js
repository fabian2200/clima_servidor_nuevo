import {http} from "./http_services";

export function verEmpresas() {
    return http().get('/api/ver-empresas');
}


export function datosDashboardCliente() {
    return http().get('/api/datos-dashboard-cliente');
}

export function registrarEmpresa($data) {
    return http().post(
        '/api/guardar-empresa', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function disminuirEmpleadosEmpresa($data) {
    return http().post(
        '/api/disminuir-empleados-empresa', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function aumentarEmpleadosEmpresa($data) {
    return http().post(
        '/api/aumentar-empleados-empresa', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function editarEmpresa($data) {
    return http().post(
        '/api/editar-empresa', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function verAreas(id) {
    return http().get('/api/ver-areas?id_empresa='+id);
}

export function editarAreas($data) {
    return http().post(
        '/api/editar-areas', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function datosEmpresa(id) {
    return http().get('/api/datos-empresa?id_empresa='+id);
}

export function dataRespuesta(id) {
    return http().get('/api/datos-respuesta?id_respondio='+id);
}

export function consultarDatosInformeSocio(id) {
    return http().get('/api/datos-socio?id_empresa='+id);
}

export function informeGeneralDimensiones(id) {
    return http().get('/api/inforrme-general-dimensiones?id_empresa='+id);
}

export function eliminarArea(id) {
    return http().get('/api/eliminar-area?id_area='+id);
}

export function guardarArea($data) {
    return http().post(
        '/api/guardar-area', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function comparacionDimensiones(id) {
    return http().get('/api/comparacion-dimensiones?id_empresa='+id);
}

export function fortalezasDebilidadesFortalecer(id) {
    return http().get('/api/fortalezas?id_empresa='+id);
}

export function generarPDFSocio($data) {
    return http().post(
        '/api/generar-pdf-socio', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function generarPDFGeneral($data) {
    return http().post(
        '/api/generar-pdf-general', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function generarPDFTablas($data) {
    return http().post(
        '/api/generar-pdf-tablas', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function generarPDFComparacion($data) {
    return http().post(
        '/api/generar-pdf-comparacion', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}