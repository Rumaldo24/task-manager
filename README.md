# Proyecto de Autenticación con Laravel

Este proyecto implementa una aplicación web con sistema de autenticación en Laravel. Los usuarios pueden registrarse, iniciar sesión y acceder a una vista de proyectos protegida por autenticación.

## Requisitos

- **PHP** = 8.1
- **Composer**
- **Laravel** = 10
- **MySQL** o cualquier otra base de datos compatible con Laravel

## Capturas de Pantalla

### Página de Inicio de Sesión
![Login Page](public/screenshots/login.png)

### Página de Registro
![Register Page](public/screenshots/register.png)

### Vista de Proyectos (Protegida)
![Projects Page](public/screenshots/projects.png)
![Projects Page](public/screenshots/project_create.png)
![Projects Page](public/screenshots/edit_project.png)
![Projects Page](public/screenshots/project_detail.png)
![Projects Page](public/screenshots/tasks_project.png)
![Projects Page](public/screenshots/create_task.png)
![Projects Page](public/screenshots/edit_task.png)
![Projects Page](public/screenshots/task_detail.png)

## Instrucciones de Instalación

Sigue estos pasos para configurar el proyecto en tu entorno local.

1. **Clonar el repositorio**

   ```bash
   git clone https://github.com/usuario/proyecto-autenticacion-laravel.git
   cd proyecto-autenticacion-laravel

2. **Instalar dependencias de PHP**

   - ejecute `composer install`.

3. **Configurar las variables de entorno**
   
   - copia el archivo `.env.example` a `.env` y ajusta las variables de entorno.
   - Abre el archivo `.env` y configura las variables de base de datos:
       - DB_CONNECTION=mysql
       - DB_HOST=127.0.0.1
       - DB_PORT=3306
       - DB_DATABASE=nombre_base_datos
       - DB_USERNAME=root
       - DB_PASSWORD=
  
4. **Generar clave de la aplicación**
   
   - Ejecute el siguiente comando php `artisan key:generate`
  
5. **Ejecutar migraciones de base de datos**
   
   - Las migraciones crean las tablas necesarias en la base de datos. Ejecuta el siguiente comando para aplicar las migraciones: `php artisan migrate`.
  
6. **Iniciar el servidor de desarrollo**
   
   - Ejecuta el siguiente comando para iniciar el servidor de desarrollo: `php artisan serve`.
   - Luego, abre tu navegador y visita http://127.0.0.1:8000.


## **Uso**

**Registro**

   - En la página de registro, ingresa un nombre, correo electrónico y una contraseña para crear una cuenta.

**Inicio de Sesión**

  - Ingresa las credenciales que usaste al registrarte (correo y contraseña) para acceder a la vista de proyectos.

**Acceso a la Vista de Proyectos**

  - Una vez autenticado, podrás acceder a la vista de proyectos. donde puedes crear, actualizar, eliminar preyectos, asi como agregar, editar, eliminar tareas para cada proyecto.
