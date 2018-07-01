<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sliders')->delete();
        
        \DB::table('sliders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => '/uploads/5a50839738763.png',
                'captionheader' => 'title of slider 1',
                'caption' => 'caption of slider 1',
                'isActive' => 'yes',
                'created_at' => '2018-01-06 13:36:47',
                'updated_at' => '2018-01-13 11:49:45',
                'deleted_at' => '2018-01-11 21:44:04',
            ),
            1 => 
            array (
                'id' => 2,
                'image' => '/uploads/5a59a4e922234.png',
                'captionheader' => 'title of slider 2',
                'caption' => 'caption of slider 2',
                'isActive' => 'yes',
                'created_at' => '2018-01-13 11:49:21',
                'updated_at' => '2018-01-13 11:49:21',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'image' => '/uploads/5a59a554cc76e.png',
                'captionheader' => 'title of slider 3',
                'caption' => 'caption of slider 3',
                'isActive' => 'yes',
                'created_at' => '2018-01-13 11:51:08',
                'updated_at' => '2018-01-13 11:51:08',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'image' => '/uploads/5a62cec62093b.png',
                'captionheader' => 'title',
                'caption' => 'caption',
                'isActive' => 'yes',
                'created_at' => '2018-01-20 10:38:22',
                'updated_at' => '2018-01-20 10:38:22',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}