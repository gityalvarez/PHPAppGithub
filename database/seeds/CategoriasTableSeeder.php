<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categorias')->delete();
        
        \DB::table('categorias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Alimento perecedero',
                'created_at' => '2017-10-20 01:50:12',
                'updated_at' => '2017-10-20 01:50:12',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Alimento no perecedero',
                'created_at' => '2017-10-20 01:50:52',
                'updated_at' => '2017-10-20 01:50:52',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Limpieza',
                'created_at' => '2017-10-20 01:51:29',
                'updated_at' => '2017-10-20 01:51:48',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Electrodomestico',
                'created_at' => '2017-10-20 01:52:09',
                'updated_at' => '2017-10-20 01:52:09',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
