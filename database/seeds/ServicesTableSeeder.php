<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 2,
                'image' => '/uploads/5a565de0723e1.png',
                'title' => 'printing service',
                'description' => 'this is printing service.',
                'created_at' => '2018-01-11 00:09:28',
                'updated_at' => '2018-01-11 00:09:28',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}