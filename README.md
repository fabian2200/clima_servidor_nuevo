# Sistema de Evaluación de Clima Laboral

Sistema web para la evaluación y análisis del clima laboral en organizaciones, desarrollado con Laravel 8 y Vue.js 3.

## 📋 Descripción del Proyecto

Este sistema permite a las empresas evaluar el clima laboral de sus empleados mediante encuestas especializadas. El sistema incluye:

- **Gestión de empresas y clientes**: Administración de múltiples empresas y sus datos
- **Encuestas de clima laboral**: Sistema de evaluación con preguntas especializadas
- **Análisis de datos**: Generación de informes detallados y comparativos
- **Dashboard administrativo**: Panel de control para gestión y visualización de resultados
- **Generación de reportes**: Exportación de informes en PDF y Excel

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 8.75** - Framework PHP
- **MySQL** - Base de datos
- **PHP 7.3+** - Lenguaje de programación

### Frontend
- **Vue.js 3.3.4** - Framework JavaScript
- **Laravel Mix 6** - Compilación de assets
- **Vue Router 4** - Enrutamiento
- **Axios** - Cliente HTTP

### Librerías y Componentes
- **Chart.js & Vue-Chartjs** - Gráficos y visualizaciones
- **ApexCharts** - Gráficos avanzados
- **SweetAlert2** - Alertas y notificaciones
- **Vue-Quill** - Editor de texto rico
- **HTML2Canvas** - Captura de pantalla
- **Vue3-HTML2PDF** - Generación de PDFs

## 📦 Requisitos del Sistema

- PHP >= 7.3
- Composer
- Node.js >= 14
- npm
- MySQL >= 5.7
- Apache/Nginx

## 🚀 Instalación y Configuración

### 1. Clonar el repositorio
```bash
git clone <url-del-repositorio>
cd clima_servidor
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Instalar dependencias de Node.js
```bash
npm install
```

### 4. Configurar variables de entorno
```bash
cp .env.example .env
```

Editar el archivo `.env` con la configuración de tu base de datos:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clima_laboral
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

### 5. Generar clave de aplicación
```bash
php artisan key:generate
```

### 6. Configurar la base de datos

**Opción A: Usar migraciones**
```bash
php artisan migrate
php artisan db:seed
```

**Opción B: Importar SQL directamente**
```bash
mysql -u tu_usuario -p clima_laboral < database/clima.sql
```

### 7. Configurar permisos de almacenamiento
```bash
php artisan storage:link
chmod -R 775 storage bootstrap/cache
```

### 8. Compilar assets
```bash
# Para desarrollo
npm run dev

# Para producción
npm run prod
```

### 9. Iniciar el servidor
```bash
php artisan serve
```

El sistema estará disponible en `http://localhost:8000`

## 📁 Estructura del Proyecto

```
clima_servidor/
├── app/
│   ├── Http/Controllers/     # Controladores de la aplicación
│   ├── Models/              # Modelos Eloquent
│   └── Providers/           # Proveedores de servicios
├── database/
│   ├── migrations/          # Migraciones de base de datos
│   ├── seeders/            # Seeders para datos iniciales
│   └── clima.sql           # Script SQL completo
├── resources/
│   ├── js/
│   │   ├── components/     # Componentes Vue.js
│   │   ├── services/       # Servicios JavaScript
│   │   ├── app.js         # Punto de entrada JS
│   │   └── router.js      # Configuración de rutas Vue
│   └── css/               # Estilos CSS
├── public/                # Archivos públicos
├── routes/                # Rutas de Laravel
└── storage/               # Almacenamiento de archivos
```

## 🔧 Configuración Adicional

### Configuración del servidor web (Apache)
Asegúrate de que el directorio `public/` sea el directorio raíz del servidor web.

### Configuración de correo electrónico
En el archivo `.env`, configura las credenciales de correo:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu_email@gmail.com
MAIL_PASSWORD=tu_password
MAIL_ENCRYPTION=tls
```

## 📊 Características Principales

### Gestión de Empresas
- Registro y administración de empresas
- Gestión de áreas y departamentos
- Control de empleados y encuestas

### Sistema de Encuestas
- Encuestas personalizables por empresa
- Múltiples dimensiones de evaluación
- Respuestas anónimas y confidenciales

### Análisis y Reportes
- Dashboard con métricas en tiempo real
- Gráficos interactivos y comparativos
- Exportación de informes en múltiples formatos
- Análisis por dimensiones y áreas

### Seguridad
- Autenticación de usuarios
- Control de acceso por roles
- Encriptación de datos sensibles

## 🧪 Comandos Útiles

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Optimizar para producción
php artisan optimize

# Ejecutar tests
php artisan test

# Ver rutas disponibles
php artisan route:list

# Crear un nuevo controlador
php artisan make:controller NombreController

# Crear una nueva migración
php artisan make:migration create_nombre_tabla
```

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 📞 Soporte

Para soporte técnico o consultas sobre el proyecto, contacta al equipo de desarrollo.

---

**Desarrollado con ❤️ usando Laravel y Vue.js**
