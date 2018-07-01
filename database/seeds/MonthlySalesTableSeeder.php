<?php

use Illuminate\Database\Seeder;

class MonthlySalesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('monthly_sales')->delete();
        
        \DB::table('monthly_sales')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '₹0 - ₹50000',
                'created_at' => '2018-01-30 17:19:14',
                'updated_at' => '2018-01-30 17:20:04',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '₹50000 - ₹100000',
                'created_at' => '2018-01-30 17:19:42',
                'updated_at' => '2018-01-30 17:19:42',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '₹100000 - ₹200000',
                'created_at' => '2018-01-30 17:20:21',
                'updated_at' => '2018-01-30 17:20:21',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '₹200000 - ₹500000',
                'created_at' => '2018-01-30 17:20:35',
                'updated_at' => '2018-01-30 17:20:35',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '₹500000 - more',
                'created_at' => '2018-01-30 17:20:55',
                'updated_at' => '2018-01-30 17:20:55',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}