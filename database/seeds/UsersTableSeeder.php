<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Yamandu Alvarez',
                'email' => 'yamandu.alvarez@gmail.com',
                'password' => '$2y$10$RD2nxl88J2txvRdN4JLbMenuMM.0Q8vo07B6EX5OKiWYZrU0CSdXi',
                'direccion' => '8 de Octubre y Dr Joaquín Secco Illa',
                'latitud' => '-123',
                'longitud' => '-76',
                'remember_token' => '0YHKLSPi7KtiQiENFVxeITMTPxgxXdEX6mEn4V2I0NgTzw0UdKiJJ4NMLCMW',
                'created_at' => '2017-10-11 23:25:32',
                'updated_at' => '2017-10-24 16:33:57',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Leonardo Manzuetti',
                'email' => 'leonardo.admin@gmail.com',
                'password' => '$2y$10$MB7UQUfTvMVhdJXjhavMa.s/v1uGaYWYAjOZHG5gOzLbxbo6CUSKy',
                'direccion' => 'Arenal Grande 3884',
                'latitud' => '-344',
                'longitud' => '-123',
                'remember_token' => 'dVbEfKAADww85WWzf4nAHFtsDcOFBTSYR9JfNEvC5BIHABWr2hO0uAsqk0kY',
                'created_at' => '2017-10-20 00:46:52',
                'updated_at' => '2017-10-24 20:41:08',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Juan Gerente',
                'email' => 'juan.gerente@gmail.com',
                'password' => '$2y$10$AW.WsFkwakiqZ5g9wDo9KeEDamN66.Cvs2CjYbGiCRHQ1uAyWCkGS',
                'direccion' => 'Avda de las Leyes 2345',
                'latitud' => '-33',
                'longitud' => '-56',
                'remember_token' => 'ed6PJsakKb6nakZABakw8tqwEGtCbE09oHApXSeIdCP6ZDlfLAgl03Q1WL1J',
                'created_at' => '2017-10-22 20:16:20',
                'updated_at' => '2017-10-24 15:25:25',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Andres Despachador',
                'email' => 'andres.despachador@gmail.com',
                'password' => '$2y$10$vVXqn4.y32ot1PaV90Do.uqaVwZXMFCy9Sr9YUqIoCOmbroOWE/U2',
                'direccion' => 'Joaquin Requena 1345',
                'latitud' => '-77',
                'longitud' => '-99',
                'remember_token' => 'Jsm19M7UKZPqwEaDVTusxts8EYySziHb1poDCGbrUFhVQDOkGVoIJGwEoOb1',
                'created_at' => '2017-10-24 17:32:30',
                'updated_at' => '2017-10-24 20:41:40',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Andrea Gerente',
                'email' => 'andrea.gerente@gmail.com',
                'password' => '$2y$10$fFS/v0/ps4JgIyeJkRPFX.rfLpxgisY8.6mLCQVj2anwG7Sl0pGJC',
                'direccion' => '19 de Abril 2345',
                'latitud' => '-35',
                'longitud' => '-67',
                'remember_token' => 'wHOYl3mhqtEO3A6vmfplhbnHTmyJHbycTR1dhry65284jVysdX2c7y1A4qep',
                'created_at' => '2017-10-24 17:50:32',
                'updated_at' => '2017-10-24 20:56:20',
                'deleted_at' => NULL,
            ),
        )); 
        
    }
}
