<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('productos')->delete();
        
        \DB::table('productos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Arvejas Cololo',
                'codigo' => 2147483647,
                'imagen' => '',
                'categoria_id' => 1,
                'user_id' => 1,
                'created_at' => '2017-10-26 21:23:20',
                'updated_at' => '2017-10-26 21:23:20',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Aceite Optimo',
                'codigo' => 2134567893,
                'imagen' => '',
                'categoria_id' => 2,
                'user_id' => 1,
                'created_at' => '2017-10-26 21:23:20',
                'updated_at' => '2017-10-26 21:23:20',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Lavandina Ayudin',
                'codigo' => 2134567444,
                'imagen' => '',
                'categoria_id' => 3,
                'user_id' => 1,
                'created_at' => '2017-10-26 21:23:20',
                'updated_at' => '2017-10-26 21:23:20',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Televisor Panavox 32 pulg',
                'codigo' => 2134567333,
                'imagen' => '',
                'categoria_id' => 4,
                'user_id' => 1,
                'created_at' => '2017-10-26 21:23:20',
                'updated_at' => '2017-10-26 21:23:20',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
