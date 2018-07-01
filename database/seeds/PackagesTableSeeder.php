<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('packages')->delete();
        
        \DB::table('packages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => '/uploads/5a68d91fe81c2.png',
                'title' => 'free user',
                'description' => 'This is a free package.',
                'badge' => 'new',
                'duration' => '365',
                'startdate' => '1 January, 2018',
                'starttime' => '12:00AM',
                'enddate' => '31 December, 2018',
                'endtime' => '12:00AM',
                'pricing' => '0',
                'created_at' => '2018-01-25 00:36:07',
                'updated_at' => '2018-01-25 00:36:07',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'image' => '/uploads/5a6d74639e70d.png',
                'title' => 'package1',
                'description' => 'test package for deletion',
                'badge' => 'new',
                'duration' => '28',
                'startdate' => '1 January, 2018',
                'starttime' => '12:00AM',
                'enddate' => '28 February, 2018',
                'endtime' => '12:00AM',
                'pricing' => '399',
                'created_at' => '2018-01-28 12:27:39',
                'updated_at' => '2018-02-26 20:38:22',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}