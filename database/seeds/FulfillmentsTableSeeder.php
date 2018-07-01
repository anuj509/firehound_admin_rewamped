<?php

use Illuminate\Database\Seeder;

class FulfillmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fulfillments')->delete();
        
        \DB::table('fulfillments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'amazon prime',
                'created_at' => '2018-02-01 20:21:31',
                'updated_at' => '2018-02-01 20:21:31',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'flipkart first',
                'created_at' => '2018-02-01 20:21:47',
                'updated_at' => '2018-02-01 20:21:47',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}