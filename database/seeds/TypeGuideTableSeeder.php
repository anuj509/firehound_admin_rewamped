<?php

use Illuminate\Database\Seeder;

class TypeGuideTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('type_guide')->delete();
        
        \DB::table('type_guide')->insert(array (
            0 => 
            array (
                'type_id' => 1,
                'guide_id' => 2,
            ),
            1 => 
            array (
                'type_id' => 1,
                'guide_id' => 3,
            ),
            2 => 
            array (
                'type_id' => 2,
                'guide_id' => 3,
            ),
            3 => 
            array (
                'type_id' => 3,
                'guide_id' => 2,
            ),
            4 => 
            array (
                'type_id' => 3,
                'guide_id' => 4,
            ),
        ));
        
        
    }
}