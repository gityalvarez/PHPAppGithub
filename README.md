# PHPAppGit


Para empezar a ejecutar seguir los siguientes pasos: en cmd navegar al path donde clonamos luego ejecutar

1.composer update 2.en el phpmyadmin crear una base "homestead" 3.crear un archivo .env en la raiz (DB_DATABASE=homestead, CACHE_DRIVER=array) 3.1. php artisan key:generate 4.php artisan migrate 5.php artisan db:seed 6.php artisan vendor:publish (no subo los archivos que generan las publicaciones por si no les gusta como queda) 7.php artisan infyom:publish 8.php artisan infyom.publish:layout 9.php artisan serve