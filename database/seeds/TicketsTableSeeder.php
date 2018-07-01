<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tickets')->delete();
        
        \DB::table('tickets')->insert(array (
            0 => 
            array (
                'id' => 2,
                'refnumber' => '49357076',
                'title' => '["ticket1","ticket1"]',
                'status' => '["inprocess","raised"]',
                'description' => '["this is new ticket","this is new ticket"]',
                'type' => '["type2","type2"]',
                'assigned_to' => '["ram lal","ram lal"]',
                'created_by' => 'anujshah.2016@gmail.com',
                'usertype' => 'admins',
                'created_at' => '2018-01-12 01:22:22',
                'updated_at' => '2018-01-12 01:23:21',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'refnumber' => '88582187',
                'title' => '["i want to know package info","i want to know package info"]',
                'status' => '["raised","raised"]',
                'description' => '["what is package 1 content?","what is package 1 content.>?"]',
                'type' => '["type1","type1"]',
                'assigned_to' => '["ram lal","unassigned"]',
                'created_by' => 'anujshah.2016@gmail.com',
                'usertype' => 'customers',
                'created_at' => '2018-01-23 23:31:38',
                'updated_at' => '2018-01-23 23:36:40',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'refnumber' => '76893077',
                'title' => '["i am not able to see package content","i am not able to see package content","i am not able to see package content"]',
                'status' => '["completed","raised","raised"]',
                'description' => '["how do i see package content?","how do i see package content?","how do i see package content?"]',
                'type' => '["type1","type1","type1"]',
                'assigned_to' => '["ram lal","ram lal","unassigned"]',
                'created_by' => 'anujshah.2016@gmail.com',
                'usertype' => 'customers',
                'created_at' => '2018-01-23 23:39:07',
                'updated_at' => '2018-01-24 20:45:05',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'refnumber' => '74419587',
                'title' => '["ticket with ref number 76893077 is duplicate to this"]',
                'status' => '["raised"]',
                'description' => '["this is re created ticket with ref number 76893077.so kindly ignore previous ticket and consider latest"]',
                'type' => '["type2"]',
                'assigned_to' => '["ram lal"]',
                'created_by' => 'anujshah.2016@gmail.com',
                'usertype' => 'admins',
                'created_at' => '2018-01-24 20:44:10',
                'updated_at' => '2018-01-24 20:44:10',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'refnumber' => '59105820',
                'title' => '["new sample"]',
                'status' => '["raised"]',
                'description' => '["user log test"]',
                'type' => '["type2"]',
                'assigned_to' => '["ram lal"]',
                'created_by' => 'anujshah.2016@gmail.com',
                'usertype' => 'admins',
                'created_at' => '2018-01-24 21:22:57',
                'updated_at' => '2018-01-24 21:22:57',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'refnumber' => '85112705',
                'title' => '["ticket from customer"]',
                'status' => '["raised"]',
                'description' => '["ticket created by user log test"]',
                'type' => '["type1"]',
                'assigned_to' => '["unassigned"]',
                'created_by' => 'anujshah.2016@gmail.com',
                'usertype' => 'customers',
                'created_at' => '2018-01-24 21:31:00',
                'updated_at' => '2018-01-24 21:31:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}