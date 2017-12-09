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

Agregar en el archivo .env las credenciales de las aplicaciones:

FACEBOOK_ID=165641307516600
FACEBOOK_SECRET=22ea87cb8b4147e737205b2f422978c8
FACEBOOK_REDIRECT=http://localhost:8000/mobile/login/facebook/callback

GOOGLE_ID=573164205583-a2hdo7l2efsf5m87lj7177jrb2batkq5.apps.googleusercontent.com
GOOGLE_SECRET=7Jw3aJssndV1aV2Yti-AhTPg
GOOGLE_REDIRECT=http://localhost:8000/mobile/login/google/callback