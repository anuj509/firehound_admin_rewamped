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
                'admin_id' => 6,
                'name' => 'redmi mi 4',
                'model' => '4mi',
                'created_at' => '2018-07-01 10:15:22',
                'updated_at' => '2018-07-02 19:06:23',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'admin_id' => 7,
                'name' => 'yureka',
                'model' => 'y1241',
                'created_at' => '2018-07-02 19:08:34',
                'updated_at' => '2018-07-02 19:09:42',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}