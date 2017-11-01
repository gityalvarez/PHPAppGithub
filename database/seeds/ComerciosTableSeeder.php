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
                'logo' => '',
                'user_id' => 2,
                'created_at' => '2017-10-20 02:01:16',
                'updated_at' => '2017-10-20 02:01:16',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
