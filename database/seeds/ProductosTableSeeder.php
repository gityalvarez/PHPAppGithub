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
        ));
        
        
    }
}
