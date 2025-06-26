import {http} from "./http_services";

export function registrarCompra($data) {
    return http().post(
        '/api/guardar-venta', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function verVentas() {
    return http().get('/api/ver-ventas');
}

export function datosDashboardAdmin() {
    return http().get('/api/datos-dashboard-admin');
}


export function listarClientes() {
    return http().get('/api/ver-clientes');
}

export function registrarCompraExistente($data) {
    return http().post(
        '/api/guardar-venta-existente', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function disminuirPines($data) {
    return http().post(
        '/api/disminuir-pines', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function listarPaquetes() {
    return http().get('/api/listar-paquetes');
}

export function guardarPaquete($data) {
    return http().post(
        '/api/guardar-paquete', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}


export function editarPaquete($data) {
    return http().post(
        '/api/editar-paquete', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function eliminarPaquete(id) {
    return http().get('/api/eliminar-paquete?id='+id);
}