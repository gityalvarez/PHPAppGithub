<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'create-comercio',
                'display_name' => 'create-comercio',
                'description' => '',
                'created_at' => '2017-10-12 21:24:59',
                'updated_at' => '2017-10-12 21:24:59',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'update-comercio',
                'display_name' => 'update-comercio',
                'description' => '',
                'created_at' => '2017-10-12 21:25:11',
                'updated_at' => '2017-10-12 21:25:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'delete-comercio',
                'display_name' => 'delete-comercio',
                'description' => '',
                'created_at' => '2017-10-12 21:25:26',
                'updated_at' => '2017-10-12 21:25:26',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'create-categoria',
                'display_name' => 'create-categoria',
                'description' => '',
                'created_at' => '2017-10-12 21:25:43',
                'updated_at' => '2017-10-12 21:25:43',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'update-categoria',
                'display_name' => 'update-categoria',
                'description' => '',
                'created_at' => '2017-10-12 21:25:54',
                'updated_at' => '2017-10-12 21:25:54',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'delete-categoria',
                'display_name' => 'delete-categoria',
                'description' => '',
                'created_at' => '2017-10-12 21:26:04',
                'updated_at' => '2017-10-12 21:26:04',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'create-producto',
                'display_name' => 'create-producto',
                'description' => '',
                'created_at' => '2017-10-12 21:27:43',
                'updated_at' => '2017-10-12 21:27:43',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'update-producto',
                'display_name' => 'update-producto',
                'description' => '',
                'created_at' => '2017-10-12 21:27:57',
                'updated_at' => '2017-10-12 21:27:57',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'delete-producto',
                'display_name' => 'delete-producto',
                'description' => '',
                'created_at' => '2017-10-12 21:28:09',
                'updated_at' => '2017-10-12 21:28:09',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'create-pedido',
                'display_name' => 'create-pedido',
                'description' => '',
                'created_at' => '2017-10-12 21:28:27',
                'updated_at' => '2017-10-12 21:28:27',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'update-pedido',
                'display_name' => 'update-pedido',
                'description' => '',
                'created_at' => '2017-10-12 21:28:38',
                'updated_at' => '2017-10-12 21:28:38',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'delete-pedido',
                'display_name' => 'delete-pedido',
                'description' => '',
                'created_at' => '2017-10-12 21:28:48',
                'updated_at' => '2017-10-12 21:28:48',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'read-listapedido',
                'display_name' => 'read-listapedido',
                'description' => '',
                'created_at' => '2017-10-12 21:29:16',
                'updated_at' => '2017-10-12 21:29:16',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'update-listapedido',
                'display_name' => 'update-listapedido',
                'description' => '',
                'created_at' => '2017-10-12 21:29:29',
                'updated_at' => '2017-10-12 21:29:29',
            ),
        ));
        
        
    }
}
