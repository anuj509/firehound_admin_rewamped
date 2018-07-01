<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customers')->delete();
        
        \DB::table('customers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fullname' => 'Anuj Shah',
                'email' => 'anujshah.2016@gmail.com',
                'contact' => '9920173707',
                'password' => '$2y$10$5fHMHiH72QTxGoAj1R.A6OS1mvA.bZpbzhytuhU6PAYyLAubID/ae',
                'address' => 'riddhi chs
opp kinara soc',
                'state' => 'Maharashtra',
                'pincode' => '410206',
                'isEmailVerified' => 0,
                'isContactVerified' => 0,
                'otp' => '6478',
                'remember_token' => 'SmM0ZprTvQuzSc2GXy5avpNxH3U4m7BjStmRHpNWbBTCcfNGYhNwgdjevecM',
                'created_at' => '2018-01-14 20:41:07',
                'updated_at' => '2018-02-04 11:52:36',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'fullname' => 'jay mehta',
                'email' => 'jay@gmail.com',
                'contact' => '9876543210',
                'password' => '$2y$10$wpJVDPTOpci/7xZPwd1VK.Qma0tBqyvAvsrVmMvjHOp/gN/XbK1eW',
                'address' => 'address',
                'state' => 'Madhya Pradesh',
                'pincode' => '984849',
                'isEmailVerified' => 1,
                'isContactVerified' => 1,
                'otp' => '',
                'remember_token' => NULL,
                'created_at' => '2018-01-30 14:19:23',
                'updated_at' => '2018-01-30 14:19:23',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 9,
                'fullname' => 'johndoe',
                'email' => 'johndoe@gmail.com',
                'contact' => '9876543210',
                'password' => '$2y$10$pUXQyuLyI45FCF8kofGu1.1YblE7IOdJs1bIsLW0w/dd1VJWjcj8m',
                'address' => 'address',
                'state' => 'Maharashtra',
                'pincode' => '410206',
                'isEmailVerified' => 0,
                'isContactVerified' => 0,
                'otp' => '',
                'remember_token' => NULL,
                'created_at' => '2018-02-03 07:22:13',
                'updated_at' => '2018-02-03 07:22:13',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}