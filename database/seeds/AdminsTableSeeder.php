<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Anuj Shah',
                'email' => 'anujshah.2016@gmail.com',
                'password' => '$2y$10$ups7I0t9FlmDcTWhpAh5iekDRKmH5JPG4PPbBQNlp97bD1v0DvG4C',
                'remember_token' => 'vPJ4QmpS3SDyqzYlT9SVWYaPQlCaOngXnqIZJwSys47DA5EL5XkICtQopuOA',
                'created_at' => '2018-01-05 01:50:09',
                'updated_at' => '2018-01-05 01:57:46',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ram lal',
                'email' => 'ram@laravel.com',
                'password' => '$2y$10$1CTu8KfsKChRRWbvz7uB/us4hXUWMOcR/f2CB5OolOnuYwGMJ/hna',
                'remember_token' => 'NzviHMUSv4p3PWilOyynT9eioyB0HlHX297BVzKGz9WhzgFe716i0t9NNLNR',
                'created_at' => '2018-01-05 01:58:06',
                'updated_at' => '2018-07-01 07:26:30',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Anuj Shah',
                'email' => 'anuj.shah70@yahoo.com',
                'password' => '$2y$10$DAfBjlqKFUX3W.7rtZc/w.odRTJGOEv/WSapLU3EVWfnvpOwGpkxm',
                'remember_token' => 'eqdMaZll6tw1MFuYZli4d9Vz7iJk4xAASBeRC9yKY3RP4QFUlOYS4UOwqFQu',
                'created_at' => '2018-07-01 07:25:42',
                'updated_at' => '2018-07-01 07:25:42',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'lol',
                'email' => 'lol@lol.lol',
                'password' => '$2y$10$7.YAim4e8f4IKVokfiedd.z3N7RoVTP/19SxicgfB.l4eA7WNRtn2',
                'remember_token' => NULL,
                'created_at' => '2018-07-01 09:03:54',
                'updated_at' => '2018-07-01 09:48:59',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}