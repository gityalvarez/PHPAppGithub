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
        

        //\DB::table('productos')->delete();
        
        \DB::table('productos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Arvejas Cololo',
                'codigo' => 2147483647,
                'imagen' => 'imagen-producto-arvejas-cololo.png',
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
                'imagen' => 'imagen-producto-aceite-optimo.png',
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
                'imagen' => 'imagen-producto-lavandina-ayudin.jpg',
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
                'imagen' => 'imagen-producto-tv-panavox.jpg',
                'categoria_id' => 4,
                'user_id' => 1,
                'created_at' => '2017-10-26 21:23:20',
                'updated_at' => '2017-10-26 21:23:20',
                'deleted_at' => NULL,
            ),
        ));
        
         $from = database_path() . DIRECTORY_SEPARATOR . 'seeds' .
           DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR;
       $to = storage_path('app/public') . DIRECTORY_SEPARATOR;
       File::copy($from.'arvejas-cololo.png', $to.'imagen-producto-arvejas-cololo.png');
       File::copy($from.'lavandina-ayudin.jpg', $to.'imagen-producto-lavandina-ayudin.jpg');
       File::copy($from.'aceite-optimo.png', $to.'imagen-producto-aceite-optimo.png');
       File::copy($from.'tv-panavox.jpg', $to.'imagen-producto-tv-panavox.jpg');
        
    }
}
