<?php

use Illuminate\Database\Seeder;

class ComerciosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comercios')->delete();
        
        \DB::table('comercios')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Devoto Suc Cordon',
                'direccion' => 'Arenal Grande 2341',
                'latitud' => '-55',
                'longitud' => '-77',
                'logo' => 'https://www.devoto.com.uy/mvdcms/imgnoticias/201408/W655/2014.jpg',
                'user_id' => 2,
                'created_at' => '2017-10-20 02:01:16',
                'updated_at' => '2017-10-20 02:01:16',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Tata Suc Tres Cruces',
                'direccion' => 'Goes 4563',
                'latitud' => '-38',
                'longitud' => '-64',
                'logo' => 'http://institucional.tata.com.uy/wp-content/uploads/2014/03/Montevideo-115-Tres-Cruces.png',
                'user_id' => 5,
                'created_at' => '2017-10-20 02:01:16',
                'updated_at' => '2017-10-20 02:01:16',
                'deleted_at' => NULL,
            ),
            
        ));
        
        
    }
}
