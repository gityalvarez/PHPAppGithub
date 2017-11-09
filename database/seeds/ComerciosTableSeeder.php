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
                'latitud' => '-34.8924003',
                'longitud' => '-56.2504233',
                'logo' => 'logo-comercio-devoto.jpg',
                'user_id' => 2,
                'created_at' => '2017-10-20 02:01:16',
                'updated_at' => '2017-10-20 02:01:16',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Tata Suc union',
                'direccion' => 'avenida 8 de Octubre 3723',
                'latitud' => '-34.87525805',
                'longitud' => '-56.1414468957355',
                'logo' => 'logo-comercio-tata.jpg',
                'user_id' => 5,
                'created_at' => '2017-10-20 02:01:16',
                'updated_at' => '2017-10-20 02:01:16',
                'deleted_at' => NULL, 
                
            ),
            
        ));
        
        $from = database_path() . DIRECTORY_SEPARATOR . 'seeds' .
           DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR;
       $to = storage_path('app/public') . DIRECTORY_SEPARATOR;
       File::copy($from.'tata.jpg', $to.'logo-comercio-tata.jpg');
       File::copy($from.'devoto.jpg', $to.'logo-comercio-devoto.jpg');
       File::copy($from.'disco.png', $to.'logo-comercio-disco.png');
    }
}
