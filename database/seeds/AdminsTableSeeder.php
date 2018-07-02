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
                'remember_token' => 'Cu0eWA4vCLWjntN2HTvB9VCKKlRoYynyeFfKc6qlJTJKtEJcByZJ19P9VyJS',
                'created_at' => '2018-01-05 01:50:09',
                'updated_at' => '2018-01-05 01:57:46',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'FireHound',
                'email' => 'siteadmin@firehound.org',
                'password' => '$2y$10$N6lhRh2TKewv8nC30w7NGuQC8fsqp5jMVy0nQ3N.Me8PD9o6gwjWq',
                'remember_token' => 'qcQY9P0rGnozq0BvJfkilCXraRmDCV2PYe4XngFRwHXhxdS5mvrbovbVZbcl',
                'created_at' => '2018-07-01 07:25:42',
                'updated_at' => '2018-07-01 07:25:42',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'rampizen yolo',
                'email' => 'rampi@yolo.com',
                'password' => '$2y$10$1UQ/102Ba89JT58.Y54VielXKREDxTAOJX35tRdtr6NlTS4FRWuoa',
                'remember_token' => NULL,
                'created_at' => '2018-07-02 19:05:41',
                'updated_at' => '2018-07-02 19:06:23',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'zack stewart',
                'email' => 'zack@gmail.com',
                'password' => '$2y$10$4bN/Pu8GSRwzWvUup0nz4.vs/YrtMhBvmat0LrQf2qreCGUaYn44e',
                'remember_token' => 'HNL1Ix88UQ93vMH2Azy52ScaFofDOlIazKuzcfICLOI5TrvPKj1Irw7qktZz',
                'created_at' => '2018-07-02 19:09:42',
                'updated_at' => '2018-07-02 19:15:23',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}