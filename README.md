# Real Estate PHP Application

Este es un proyecto de gestión de propiedades en línea, desarrollado en PHP, que emplea una estructura MVC y está conectado a una base de datos MySQL. La aplicación cuenta con varias características, incluyendo un sistema de autenticación para el administrador, un formulario de contacto con envío de emails, y una interfaz dinámica para gestionar las propiedades.

## Características

- **Desarrollado en PHP**: Utiliza PHP como lenguaje de backend para procesar las solicitudes del usuario.
- **Conexión a base de datos MySQL**: Los datos de las propiedades y agentes se almacenan en una base de datos MySQL externa.
- **Arquitectura MVC**: El proyecto sigue el patrón de diseño Modelo-Vista-Controlador para separar la lógica de la aplicación.
- **Uso de Gulp**: Para la automatización de tareas como la compilación de Sass y la minificación de archivos CSS y JS.
- **Diseño con Sass**: El diseño de la aplicación está basado en Sass, una extensión de CSS, para una mayor organización y mantenimiento del código.
- **Sistema de emails**: El formulario de contacto está integrado con Mailtrap.
- **Autenticación de Admin**: Cuenta con un sistema de login para administradores, con verificación de errores y almacenamiento en base de datos.
- **Gestión de propiedades**: Los administradores pueden crear, modificar y eliminar propiedades, así como gestionar agentes (vendedores) a través de un panel de administración, solamente accesible para admins registrados.

###Tecnologías utilizadas
-PHP: Lenguaje de programación para el backend.
-MySQL: Sistema de gestión de bases de datos relacional.
-Sass: Preprocesador CSS para una mejor organización del estilo.
-Gulp: Herramienta de automatización de tareas.
-Dark mode con JS: para poder cambiar entre modo oscuro y claro, según preferencia
-Mailtrap: Para pruebas de envío de emails.


Algunas capturas desde el panel de Admin:

![Panel de administración de propiedades](assets/AgIn-Administrador-de-propiedades.png)

![Panel de administración de vendedores(agentes)](assets/AgIn-Administrar-vendedores.png)

![Formulario para crear Propiedad](assets/AgIn-Crear-propiedad.png)

![Formulario para actualizar propiedad](assets/AgIn-Actualizar-propiedad.png)

![Formulario para crear ficha del vendedor(agente)](assets/AgIn-Registrar-nuevo-a-vendedor.png)

![Formulario para actualizar ficha del vendedor(agente)](assets/AgIn-Actualizar-ficha-de-vendedor.png)