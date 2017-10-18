<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'admin',
                'description' => '',
                'created_at' => NULL,
                'updated_at' => '2017-10-12 21:32:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'gerente',
                'display_name' => 'gerente',
                'description' => '',
                'created_at' => '2017-10-12 21:35:02',
                'updated_at' => '2017-10-12 21:35:02',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'despachador',
                'display_name' => 'despachador',
                'description' => '',
                'created_at' => '2017-10-12 21:36:15',
                'updated_at' => '2017-10-12 21:36:15',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'cliente',
                'display_name' => 'cliente',
                'description' => '',
                'created_at' => '2017-10-12 21:37:42',
                'updated_at' => '2017-10-12 21:37:42',
            ),
        ));
        
        
    }
}
