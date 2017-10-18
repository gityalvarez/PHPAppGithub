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
                'name' => 'Yamandu',
                'email' => 'yamandu.alvarez@gmail.com',
                'password' => '$2y$10$RD2nxl88J2txvRdN4JLbMenuMM.0Q8vo07B6EX5OKiWYZrU0CSdXi',
                'remember_token' => 'kq5fu9kCt6O1Rhl5kzbvroMORY9pYtUuqxyTseatPZoifE7njijZg8hTc8Wf',
                'created_at' => '2017-10-11 23:25:32',
                'updated_at' => '2017-10-12 04:13:15',
            ),
        ));
        
        
    }
}
