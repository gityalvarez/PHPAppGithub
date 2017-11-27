# PHPAppGit

1.composer update
2.en el phpmyadmin crear una base "homestead"
3.crear un archivo .env en la raiz (DB_DATABASE=homestead, CACHE_DRIVER=array)
4.php artisan key:generate 
5.importar la base desde el phpmyadmin con el archivo homestead.sql en database\homestead
6.php artisan vendor:publish 
7.php artisan infyom:publish
8.php artisan infyom.publish:layout 
9.php artisan serve
10.mklink /D public\storage ..\storage\app\public.

01/11
1.composer dump-autoload

04/11
1.Se cambiaron vistas del backend entre otras cosas para visualizar las imagenes.

2.Se empezó con el frontend con base en los archivos del infyom pero a mano, sin generarlos.
3.Para probar el frontend la direccion es http://localhost:8000/frontend
4.Funcionan Ver Lista Articulos y Ver Lista Comercios por ahora...

