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
                'direccion' => '2047, Avenida 8 de Octubre , montevideo, uruguay',
                'latitud' => '-34.86551140',
                'longitud' => '-56.13405900',
                'remember_token' => 'jV3er8dYDPJ9DD8sNKKL0uFErW2FtDDwrIuVLsi5kJA81yaOSjXm8C6YAwF9',
                'created_at' => '2017-10-11 23:25:32',
                'updated_at' => '2017-11-27 22:43:37',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Leonardo Manzuetti',
                'email' => 'leonardo.admin@gmail.com',
                'password' => '$2y$10$MB7UQUfTvMVhdJXjhavMa.s/v1uGaYWYAjOZHG5gOzLbxbo6CUSKy',
                'direccion' => '3884, Arenal Grande, montevideo, uruguay',
                'latitud' => '-34.88248480',
                'longitud' => '-56.17788530',
                'remember_token' => 'dVbEfKAADww85WWzf4nAHFtsDcOFBTSYR9JfNEvC5BIHABWr2hO0uAsqk0kY',
                'created_at' => '2017-10-20 00:46:52',
                'updated_at' => '2017-11-27 22:47:31',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Juan Gerente',
                'email' => 'juan.gerente@gmail.com',
                'password' => '$2y$10$AW.WsFkwakiqZ5g9wDo9KeEDamN66.Cvs2CjYbGiCRHQ1uAyWCkGS',
                'direccion' => '2345, Avenida de las Leyes, montevideo, uruguay',
                'latitud' => '-34.89251030',
                'longitud' => '-56.18670200',
                'remember_token' => 'ed6PJsakKb6nakZABakw8tqwEGtCbE09oHApXSeIdCP6ZDlfLAgl03Q1WL1J',
                'created_at' => '2017-10-22 20:16:20',
                'updated_at' => '2017-11-27 22:56:35',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Andres Despachador',
                'email' => 'andres.despachador@gmail.com',
                'password' => '$2y$10$vVXqn4.y32ot1PaV90Do.uqaVwZXMFCy9Sr9YUqIoCOmbroOWE/U2',
                'direccion' => '1345,  Dr Joaquin Requena, montevideo, uruguay',
                'latitud' => '-34.89732640',
                'longitud' => '-56.17106130',
                'remember_token' => 'Jsm19M7UKZPqwEaDVTusxts8EYySziHb1poDCGbrUFhVQDOkGVoIJGwEoOb1',
                'created_at' => '2017-10-24 17:32:30',
                'updated_at' => '2017-11-27 23:18:46',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Andrea Gerente',
                'email' => 'andrea.gerente@gmail.com',
                'password' => '$2y$10$fFS/v0/ps4JgIyeJkRPFX.rfLpxgisY8.6mLCQVj2anwG7Sl0pGJC',
                'direccion' => '2345, 19 de Abril, montevideo, uruguay',
                'latitud' => '-34.84436630',
                'longitud' => '-56.24997400',
                'remember_token' => 'wHOYl3mhqtEO3A6vmfplhbnHTmyJHbycTR1dhry65284jVysdX2c7y1A4qep',
                'created_at' => '2017-10-24 17:50:32',
                'updated_at' => '2017-11-27 22:57:07',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'usuario despachador',
                'email' => 'usuario.despachador@gmail.com',
                'password' => '$2y$10$.VCb3iBgylrgq1oxGdhILeeGMke8MxVjJrCiBMGliEDQvNaV2lUGG',
                'direccion' => '3883, avenida 8 de octubre, montevideo, uruguay',
                'latitud' => '-34.87361800',
                'longitud' => '-56.13836610',
                'remember_token' => 'XNBekRdxWbkVeRWOj4L8C6XanS7gKdlcKOLKRyRsHluoZK9ulgVdqL3EXEyL',
                'created_at' => '2017-11-27 04:27:34',
                'updated_at' => '2017-11-27 22:06:00',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'marcos admin',
                'email' => 'marcos.viera@gmail.com',
                'password' => '$2y$10$MMZDS.yDYFBlhB4ewaYaFuM.bZPpnOO/UlR6IGWO1JPH9vGeIzoiC',
                'direccion' => '1210, avenida uruguay, montevideo, uruguay',
                'latitud' => '-34.90306450',
                'longitud' => '-56.19025190',
                'remember_token' => 'UYpa53r6CsL6iVzjare7gSNTezCZ01LttOwUuN1u6sIbl1MkUKA3Hx3a0bK8',
                'created_at' => '2017-11-27 04:30:58',
                'updated_at' => '2017-11-27 21:53:54',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'usuario gerente',
                'email' => 'usuario.gerente@gmail.com',
                'password' => '$2y$10$kYy5GSB0k7ILqn3zyWHPH.Y9ccSUA0HCzkUQRkH01Sx8VWd9xDKIm',
                'direccion' => '2012, secco illa, montevideo, uruguay',
                'latitud' => '-34.88775610',
                'longitud' => '-56.15563240',
                'remember_token' => 'UuWWOJ91lOVdOP7aPaFMzM2dfh50nM4wsIpwNeUuLD8AKkbBPGJwQWgw6yaN',
                'created_at' => '2017-11-27 04:35:53',
                'updated_at' => '2017-11-27 22:05:38',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'usuario cliente3',
                'email' => 'usuario.cliente3@gmail.com',
                'password' => '$2y$10$xJ8y7dKF2urykznjnLYZVef9Idoxg38rL3Qf.2DbENVpNMvsbVPVe',
                'direccion' => '1230, cerro largo, montevideo, uruguay',
                'latitud' => '-34.90116120',
                'longitud' => '-56.19015290',
                'remember_token' => NULL,
                'created_at' => '2017-11-27 04:47:17',
                'updated_at' => '2017-11-27 22:06:39',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'usuario admin',
                'email' => 'usuario.administrador@gmail.com',
                'password' => '$2y$10$Rw4.2SUuCZTvi1MW3.WDEeGh3l7WGP1323fF0zCzFaT32xzaJK87S',
                'direccion' => '2005,  inca, montevideo, uruguay',
                'latitud' => '-34.89160540',
                'longitud' => '-56.17776650',
                'remember_token' => NULL,
                'created_at' => '2017-11-27 22:12:59',
                'updated_at' => '2017-11-27 22:15:21',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'usuario cliente2',
                'email' => 'usuario.cliente2@gmail.com',
                'password' => '$2y$10$FC5/HScOioylAQKLGyT3/uSn9RQbzVusha4DruO2GZGX.yzSqSF76',
                'direccion' => '1618, lima, montevideo, uruguay',
                'latitud' => '-34.89371760',
                'longitud' => '-56.18277020',
                'remember_token' => NULL,
                'created_at' => '2017-11-27 22:19:07',
                'updated_at' => '2017-11-27 22:19:07',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'usuario cliente1',
                'email' => 'usuario.cliente1@gmail.com',
                'password' => '$2y$10$zmaluXyACA8jsQ0Oai15oOjZ129htTsHlwDL2NUBKtUxBLHam/KQm',
                'direccion' => '1260, enriqueta compte y rique, montevideo, uruguay',
                'latitud' => '-34.88401340',
                'longitud' => '-56.19061730',
                'remember_token' => NULL,
                'created_at' => '2017-11-27 22:21:36',
                'updated_at' => '2017-11-27 22:21:37',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
