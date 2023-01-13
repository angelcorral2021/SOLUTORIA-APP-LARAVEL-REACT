# Solutoria-app-con-Laravel-React

La aplicación fue desarrollada utilizando el servidor XAMPP Control Panel v3.3.0 con PHP. Es importante mencionar que antes de comenzar el desarrollo, se creó una base de datos

 en el servidor para almacenar la información obtenida de la API de Solutoria. Luego, esa misma base de datos fue utilizada en el backend de Laravel, modificando las variables

de entorno para adaptarse al nombre de la base de datos.



°1 PRIMERO:

EJECUTAR EL ARCHIVO consulta-api.php DE LA CARPETA acceso-api

Para obtener un token de una API y su data con las credenciales especificadas, sigue estos pasos:

Asegúrate de tener las credenciales necesarias para acceder a la API. En este caso, necesitarás un "userName" (nombre de usuario) y un "flagJson" (bandera para indicar que la respuesta es en formato JSON).

Crea una variable para almacenar las credenciales. En este caso, se llama $credenciales y contiene un array con los valores especificados en la pregunta.

Utiliza cURL o una biblioteca de terceros para hacer una petición POST a la ruta de autenticación de la API. Incluye las credenciales en el cuerpo de la petición.

Si la petición es exitosa, la API responderá con un token de acceso. Almacena este token en una variable para utilizarlo en futuras peticiones a la API.

Utiliza cURL o una biblioteca de terceros para hacer una petición GET a la ruta de la data que deseas obtener, incluyendo el token en el encabezado de la petición.

Si la petición es exitosa, la API responderá con la data solicitada en formato JSON, ya que se estableció el flagJson.

Utiliza los datos obtenidos para tus procesos.


°2 SEGUNDO: 

Iniciar la aplicacion en la carpeta api que esta contruida con Laravel 9, sigue estos pasos:

Asegúrate de tener instalado Composer en tu sistema. Puedes descargarlo desde https://getcomposer.org/.


accede al directorio del proyecto por linia de comando y ejecuta php artisan serve para iniciar el servidor

Abre tu navegador y accede a la dirección http://localhost:8000/api para verificar que tu aplicación está funcionando.


°3 TERCERO:

Para correr la aplicacion front, sigue estos pasos:

Asegúrate de tener Node.js y npm (viene con Node.js) instalados en tu sistema. Puedes descargarlos desde https://nodejs.org/en/download/.

Abre una terminal en el directorio reactfront y ejecuta el siguiente comando para instalar las dependencias necesarias:

npm install

Una vez instaladas las dependencias, ejecuta el siguiente comando para iniciar el servidor de desarrollo:

npm start

Abre tu navegador y accede a la dirección http://localhost:3000 para verificar que tu aplicación está funcionando.









