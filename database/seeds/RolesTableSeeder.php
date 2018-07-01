<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'superadmin',
                'display_name' => 'super admin',
                'description' => 'Almighty',
                'created_at' => '2018-01-05 01:54:19',
                'updated_at' => '2018-01-05 01:54:19',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'support',
                'display_name' => 'support member',
                'description' => 'change sliders',
                'created_at' => '2018-01-05 01:55:00',
                'updated_at' => '2018-01-05 01:55:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}