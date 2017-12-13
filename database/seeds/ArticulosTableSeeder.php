<?php

use Illuminate\Database\Seeder;

class ArticulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('articulos')->insert(array (
            0 => 
            array (
                'id' => 1,
                
                'stock' => 100,
                'precio' => 78,
                'producto_id' => 1,
                'comercio_id' => 1,
                'created_at' => '2017-10-26 21:23:20',
                'updated_at' => '2017-10-26 21:23:20',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                
                'stock' => 80,
                'precio' => 70,
                'producto_id' => 2,
                'comercio_id' => 1,
                'created_at' => '2017-10-26 21:23:20',
                'updated_at' => '2017-10-26 21:23:20',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                
                'stock' => 50,
                'precio' => 120,
                'producto_id' => 3,
                'comercio_id' => 2,
                'created_at' => '2017-10-26 21:23:20',
                'updated_at' => '2017-10-26 21:23:20',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                
                'stock' => 8,
                'precio' => 5600,
                'producto_id' => 4,
                'comercio_id' => 2,
                'created_at' => '2017-10-26 21:23:20',
                'updated_at' => '2017-10-26 21:23:20',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                
                'stock' => 90,
                'precio' => 72,
                'producto_id' => 1,
                'comercio_id' => 2,
                'created_at' => '2017-10-26 21:23:20',
                'updated_at' => '2017-10-26 21:23:20',
                'deleted_at' => NULL,
            ),
        ));       
    }
}
