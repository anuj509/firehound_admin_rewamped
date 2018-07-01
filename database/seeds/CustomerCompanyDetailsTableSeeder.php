<?php

use Illuminate\Database\Seeder;

class CustomerCompanyDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customer_company_details')->delete();
        
        \DB::table('customer_company_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'customer_id' => 1,
                'companyname' => 'none',
                'contact' => '9920173707',
                'address' => 'riddhi chs
opp kinara soc',
                'state' => 'Maharashtra',
                'pincode' => '410206',
                'marketplace' => 'yes',
                'marketplacename' => 'Amazon',
                'sales' => '₹50000 - ₹100000',
                'fulfillment' => 'amazon prime',
                'categories_deals' => '["Electronic","Automobiles and industrials","Clothing and shoes"]',
                'created_at' => '2018-01-14 20:41:07',
                'updated_at' => '2018-02-03 19:26:08',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'customer_id' => 2,
                'companyname' => '',
                'contact' => '',
                'address' => '',
                'state' => '',
                'pincode' => '',
                'marketplace' => '',
                'marketplacename' => '',
                'sales' => '',
                'fulfillment' => '',
                'categories_deals' => '[]',
                'created_at' => '2018-01-30 14:19:23',
                'updated_at' => '2018-01-30 14:19:23',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 9,
                'customer_id' => 9,
                'companyname' => '',
                'contact' => '',
                'address' => '',
                'state' => '',
                'pincode' => '',
                'marketplace' => '',
                'marketplacename' => '',
                'sales' => '',
                'fulfillment' => '',
                'categories_deals' => '[]',
                'created_at' => '2018-02-03 07:22:13',
                'updated_at' => '2018-02-03 07:22:13',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}