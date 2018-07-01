<?php

use Illuminate\Database\Seeder;

class DevicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('devices')->delete();
        
        \DB::table('devices')->insert(array (
            0 => 
            array (
                'id' => 1,
                'admin_id' => 0,
                'name' => 'redmi mi 4',
                'model' => '4mi',
                'created_at' => '2018-07-01 10:15:22',
                'updated_at' => '2018-07-01 10:15:22',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}