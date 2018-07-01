<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('types')->delete();
        
        \DB::table('types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'type1',
                'created_at' => '2018-01-07 23:22:43',
                'updated_at' => '2018-01-07 23:22:43',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'type2',
                'created_at' => '2018-01-09 01:00:32',
                'updated_at' => '2018-01-09 01:00:32',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'type 3',
                'created_at' => '2018-01-13 13:29:15',
                'updated_at' => '2018-01-13 13:29:15',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}