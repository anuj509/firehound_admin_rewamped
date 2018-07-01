<?php

use Illuminate\Database\Seeder;

class PackageTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('package_types')->delete();
        
        \DB::table('package_types')->insert(array (
            0 => 
            array (
                'package_id' => 1,
                'type_id' => 1,
            ),
            1 => 
            array (
                'package_id' => 1,
                'type_id' => 2,
            ),
            2 => 
            array (
                'package_id' => 2,
                'type_id' => 1,
            ),
        ));
        
        
    }
}