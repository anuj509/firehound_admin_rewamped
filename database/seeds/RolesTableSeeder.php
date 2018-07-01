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
            2 => 
            array (
                'id' => 3,
                'name' => 'firehound_admin',
                'display_name' => 'Firehound Super Admin',
                'description' => 'Firehound Super Admin',
                'created_at' => '2018-07-01 07:21:53',
                'updated_at' => '2018-07-01 07:21:53',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'maintainer',
                'display_name' => 'Maintainer',
                'description' => 'Maintainer',
                'created_at' => '2018-07-01 07:22:24',
                'updated_at' => '2018-07-01 07:22:24',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}