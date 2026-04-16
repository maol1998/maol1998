# PHP Framework - eysphp5amicrosft

Un framework MVC desarrollado en PHP orientado a la gestión de datos básicos y entidades principales.

## Estructura del Proyecto

El proyecto sigue una arquitectura Modelo-Vista-Controlador (MVC) y está organizado en los siguientes directorios:

- `app/`: Contiene la lógica, dividida en Modelos, Vistas y Controladores.
  - `views/`: Las interfaces o vistas de cada módulo.
- `config/`: Archivos de configuración general (por ejemplo, base de datos).
- `public/`: Directorio principal accesible por el servidor web (archivos estáticos, index.php principal, estilos).
- `routes/`: Archivos encargados del enrutamiento de la aplicación (ej. `web.php`).

## Módulos Desarrollados

Actualmente, el sistema cuenta con los siguientes módulos o entidades gestionadas:

- **Persona**: Gestión general de datos personales.
- **Sexo**: Catálogo de géneros/sexos.
- **Dirección**: Gestión de las direcciones/domicilios de las personas.
- **Teléfono**: Gestión de números de teléfono.
- **Estado Civil**: Catálogo de estados civiles (soltero, casado, etc.).

## Instalación y Configuración

1.  Asegúrate de clonar o trasladar todo el directorio `eysphp5amicrosft` dentro de la ruta pública de tu servidor web (por ejemplo, `htdocs` en XAMPP o `www` en WAMP).
2.  Verifica los datos de conexión correspondientes en los archivos presentes en el directorio `config/`.
3.  Ingresa a la aplicación desde tu navegador accediendo a la URL correspondiente, como `http://localhost/framework/eysphp5amicrosft/public/`.

## Requisitos
- Servidor Web (Apache/Nginx)
- PHP >= 7.x u 8.x
- Base de datos (MySQL/MariaDB)

## Contacto / Autor
Documentación generada automáticamente como parte del proyecto de desarrollo.
