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
                'remember_token' => 'BmArstVaxXv9TJtjmgKqPaPiDlPT2Na57j7Qv8Vf8qhsE5VLR48EYm87ma4M',
                'created_at' => '2018-01-05 01:50:09',
                'updated_at' => '2018-01-05 01:57:46',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ram lal',
                'email' => 'ram@laravel.com',
                'password' => '$2y$10$dEYeqcQiCK4osw1liyRD4ul4zmKRVwh93DIAwmn8B7S322DA9mcbO',
                'remember_token' => 'P0X4DZ3UHrKT3OicUHc22egrniDT1B8CSzZWXIcQMkloWvQYjh8t5iGpvtGP',
                'created_at' => '2018-01-05 01:58:06',
                'updated_at' => '2018-01-11 23:01:29',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}