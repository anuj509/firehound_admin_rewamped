<?php

use Illuminate\Database\Seeder;

class CustomerPackagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customer_packages')->delete();
        
        \DB::table('customer_packages')->insert(array (
            0 => 
            array (
                'id' => 3,
                'payment_id' => 'M1a2n3u4a5l6P7u8r9c0h1a2s3e4',
                'payment_request_id' => 'p1a2y3m4e5n6t7r8e9q0u1e2s3t4',
                'customer_id' => 1,
                'package_id' => 1,
                'image' => '/uploads/5a68d91fe81c2.png',
                'title' => 'free user',
                'description' => 'This is a free package.',
                'duration' => '365',
                'pricing' => '0',
                'created_at' => '2018-01-18 18:56:13',
                'updated_at' => '2019-01-18 18:56:13',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}