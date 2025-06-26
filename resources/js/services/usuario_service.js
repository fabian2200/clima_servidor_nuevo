import {http} from "./http_services";

export function misDatos() {
    return http().get('/api/mis-datos');
}

export function verificarLogin() {
    return http().get('/api/verificarLogin');
}

export function editar_usuario($data) {
    return http().post(
        '/api/editar-usuario', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }
    );
}

export function cambiar_password($data) {
    return http().post(
        '/api/cambiar-password', 
        $data, 
        {
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
}

export function cerrarSesion() {
    return http().get('/api/cerrar-sesion');
}