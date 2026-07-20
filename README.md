# UpTask - Plataforma Web para la Gestión y Administración de Proyectos

UpTask es una aplicación web Full Stack diseñada para optimizar la organización y el seguimiento de proyectos y tareas pendientes. El sistema permite a los usuarios crear espacios de trabajo personalizados, delegar actividades y monitorear el estado de avance de sus pendientes en tiempo real a través de una interfaz interactiva y dinámica.

## Características Principales

* Arquitectura MVC (Modelo-Vista-Controlador): Estructuración del proyecto basada en la separación de responsabilidades para garantizar un código modular, escalable y fácil de mantener en el backend.
* API Virtual y Consumo Asíncrono: Implementación de una API interna en el backend administrada mediante PHP, consumida desde el frontend de forma asíncrona utilizando JavaScript Moderno (Fetch API / AJAX) para actualizar tareas sin recargar la página.
* Gestión de Tareas (CRUD Dinámico): Capacidad para añadir, editar, eliminar y cambiar el estado de completado de las tareas dentro de cada proyecto de manera instantánea a través de la interfaz de usuario.
* Autenticación y Control de Seguridad: Sistema robusto de registro de usuarios, confirmación de cuentas por correo electrónico, inicio de sesión seguro y reestablecimiento de accesos. Las rutas y proyectos están completamente protegidos, asegurando que los usuarios solo accedan a su propia información.
* Seguridad en la Base de Datos: Uso de consultas preparadas para evitar vulnerabilidades de inyección SQL y almacenamiento de contraseñas mediante hashing seguro.

## Tecnologías Utilizadas

* Backend: PHP (Programación Orientada a Objetos y enrutamiento MVC).
* Base de Datos: MySQL (Modelado relacional para usuarios, proyectos y tareas).
* Frontend: JavaScript Moderno (ES6+), HTML5 Semántico y hojas de estilo estructuradas con CSS3 (Sass / SCSS).
* Seguridad: Validación de tokens únicos, control de sesiones y sanitización de datos de entrada.

## Instrucciones para Instalación y Uso Local

Para clonar y desplegar este proyecto en un entorno de desarrollo local (como XAMPP, Laragon o equivalentes), siga estos pasos:

1. Clonar el repositorio:
   ```bash
   git clone [https://github.com/Krlozcrown/UpTask.git](https://github.com/Krlozcrown/UpTask.git)
