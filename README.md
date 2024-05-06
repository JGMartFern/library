Utilizo XAMPP con Apache y MySQL, que es la base de datos por defecto y que está configurada para funcionar con el proyecto.
La base de datos puede verse con phpMyAdmin.

Para crear y poblar automáticamente la base de datos, es necesario ejecutar en la terminal el siguiente comando:

php artisan migrate --seed

A partir de ahí tendremos algo con lo que trabajar en localhost

Como paso previo si hemos realizado cambios, introducimos en la terminal:

npm run build

Si todo está correcto o si no hicimos cambios desde la última vez, podremos lanzar el proyecto utilizando el comando:

php artisan serve

En este punto podemos ir directamente a localhost:8000 y entraremos en la landing page.
