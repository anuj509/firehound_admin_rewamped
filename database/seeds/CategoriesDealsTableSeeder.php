<?php

use Illuminate\Database\Seeder;

class CategoriesDealsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories_deals')->delete();
        
        \DB::table('categories_deals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'MarketPlace',
                'isGroupHeader' => 'yes',
                'created_at' => '2018-02-01 20:43:50',
                'updated_at' => '2018-02-01 20:43:50',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Electronic',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Books and education',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Automobiles and industrials',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Clothing and shoes',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Home and decor',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Beauty, health, personal care',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Sports',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Toys, kids and baby',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Musical instruments',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Office supplies',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Handmade and art and craft',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Travel',
                'isGroupHeader' => 'yes',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Cars',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Buses',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'F&B Industry',
                'isGroupHeader' => 'yes',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Restaurant',
                'isGroupHeader' => 'no',
                'created_at' => NULL,
                'updated_at' => '2018-02-01 20:58:05',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}