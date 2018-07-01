<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'createsliders',
                'display_name' => 'create sliders',
                'description' => 'create sliders',
                'created_at' => '2018-01-05 01:51:45',
                'updated_at' => '2018-01-05 01:51:45',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'editsliders',
                'display_name' => 'edit sliders',
                'description' => 'edit sliders',
                'created_at' => '2018-01-05 01:52:17',
                'updated_at' => '2018-01-05 01:52:17',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'deletesliders',
                'display_name' => 'delete sliders',
                'description' => 'delete sliders',
                'created_at' => '2018-01-05 01:52:47',
                'updated_at' => '2018-01-05 01:52:47',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'viewsliders',
                'display_name' => 'view sliders',
                'description' => 'view sliders',
                'created_at' => '2018-01-05 01:53:09',
                'updated_at' => '2018-01-05 01:53:09',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'createguides',
                'display_name' => 'Create Guides',
                'description' => 'create guides',
                'created_at' => '2018-01-11 00:11:32',
                'updated_at' => '2018-01-11 00:11:32',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'editguides',
                'display_name' => 'Edit guides',
                'description' => 'edit guides',
                'created_at' => '2018-01-11 00:11:53',
                'updated_at' => '2018-01-11 00:11:53',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'deleteguides',
                'display_name' => 'delete guides',
                'description' => 'delete guides',
                'created_at' => '2018-01-11 00:12:15',
                'updated_at' => '2018-01-11 00:12:15',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'viewguides',
                'display_name' => 'view guides',
                'description' => 'view guides',
                'created_at' => '2018-01-11 00:12:37',
                'updated_at' => '2018-01-11 00:12:37',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'createtypes',
                'display_name' => 'create types',
                'description' => 'create types',
                'created_at' => '2018-01-11 00:12:56',
                'updated_at' => '2018-01-11 00:14:03',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'edittypes',
                'display_name' => 'edit types',
                'description' => 'edit types',
                'created_at' => '2018-01-11 00:13:17',
                'updated_at' => '2018-01-11 00:14:15',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'deletetypes',
                'display_name' => 'delete types',
                'description' => 'delete types',
                'created_at' => '2018-01-11 00:13:49',
                'updated_at' => '2018-01-11 00:13:49',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'viewtypes',
                'display_name' => 'view types',
                'description' => 'view types',
                'created_at' => '2018-01-11 00:14:32',
                'updated_at' => '2018-01-11 00:14:32',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'createpackages',
                'display_name' => 'create packages',
                'description' => 'create packages',
                'created_at' => '2018-01-11 00:14:54',
                'updated_at' => '2018-01-11 00:14:54',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'editpackages',
                'display_name' => 'edit packages',
                'description' => 'edit packages',
                'created_at' => '2018-01-11 00:15:11',
                'updated_at' => '2018-01-11 00:15:11',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'deletepackages',
                'display_name' => 'delete packages',
                'description' => 'delete packages',
                'created_at' => '2018-01-11 00:15:33',
                'updated_at' => '2018-01-11 00:15:33',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'viewpackages',
                'display_name' => 'view packages',
                'description' => 'view packages',
                'created_at' => '2018-01-11 00:15:50',
                'updated_at' => '2018-01-11 00:15:50',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'createblogs',
                'display_name' => 'create blogs',
                'description' => 'create blogs',
                'created_at' => '2018-01-11 00:16:08',
                'updated_at' => '2018-01-11 00:16:08',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'editblogs',
                'display_name' => 'edit blogs',
                'description' => 'edit blogs',
                'created_at' => '2018-01-11 00:17:54',
                'updated_at' => '2018-01-11 00:17:54',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'deleteblogs',
                'display_name' => 'delete blogs',
                'description' => 'delete blogs',
                'created_at' => '2018-01-11 00:18:19',
                'updated_at' => '2018-01-11 00:18:19',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'viewblogs',
                'display_name' => 'view blogs',
                'description' => 'view blogs',
                'created_at' => '2018-01-11 00:18:36',
                'updated_at' => '2018-01-11 00:18:36',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'createtickets',
                'display_name' => 'create tickets',
                'description' => 'create tickets',
                'created_at' => '2018-01-11 00:19:06',
                'updated_at' => '2018-01-11 00:19:06',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'edittickets',
                'display_name' => 'edit tickets',
                'description' => 'edit tickets',
                'created_at' => '2018-01-11 00:22:06',
                'updated_at' => '2018-01-11 00:22:06',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'deletetickets',
                'display_name' => 'delete tickets',
                'description' => 'delete tickets',
                'created_at' => '2018-01-11 00:22:22',
                'updated_at' => '2018-01-11 00:22:22',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'viewtickets',
                'display_name' => 'view tickets',
                'description' => 'view tickets',
                'created_at' => '2018-01-11 00:22:41',
                'updated_at' => '2018-01-11 00:22:41',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'createservices',
                'display_name' => 'create services',
                'description' => 'create services',
                'created_at' => '2018-01-11 00:23:04',
                'updated_at' => '2018-01-11 00:23:04',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'editservices',
                'display_name' => 'edit services',
                'description' => 'edit services',
                'created_at' => '2018-01-11 00:23:24',
                'updated_at' => '2018-01-11 00:23:24',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'deleteservices',
                'display_name' => 'delete services',
                'description' => 'delete services',
                'created_at' => '2018-01-11 00:24:33',
                'updated_at' => '2018-01-11 00:24:33',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'viewservices',
                'display_name' => 'view services',
                'description' => 'view services',
                'created_at' => '2018-01-11 00:25:45',
                'updated_at' => '2018-01-11 00:25:45',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'createadmins',
                'display_name' => 'create admins',
                'description' => 'create admins',
                'created_at' => '2018-01-11 00:26:40',
                'updated_at' => '2018-01-11 00:26:40',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'editadmins',
                'display_name' => 'edit admins',
                'description' => 'edit admins',
                'created_at' => '2018-01-11 00:26:55',
                'updated_at' => '2018-01-11 23:00:44',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'deleteadmins',
                'display_name' => 'delete admins',
                'description' => 'delete admins',
                'created_at' => '2018-01-11 00:27:45',
                'updated_at' => '2018-01-11 00:27:45',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'viewadmins',
                'display_name' => 'view admins',
                'description' => 'view admins',
                'created_at' => '2018-01-11 00:28:07',
                'updated_at' => '2018-01-11 00:28:07',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'createroles',
                'display_name' => 'create roles',
                'description' => 'create roles',
                'created_at' => '2018-01-11 00:28:27',
                'updated_at' => '2018-01-11 00:28:27',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'editroles',
                'display_name' => 'edit roles',
                'description' => 'edit roles',
                'created_at' => '2018-01-11 00:28:39',
                'updated_at' => '2018-01-11 00:28:39',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'deleteroles',
                'display_name' => 'delete roles',
                'description' => 'delete roles',
                'created_at' => '2018-01-11 00:29:02',
                'updated_at' => '2018-01-11 00:29:02',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'viewroles',
                'display_name' => 'view roles',
                'description' => 'view roles',
                'created_at' => '2018-01-11 00:29:18',
                'updated_at' => '2018-01-11 00:29:18',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'createpermissions',
                'display_name' => 'create permissions',
                'description' => 'create permissions',
                'created_at' => '2018-01-11 00:29:45',
                'updated_at' => '2018-01-11 00:29:45',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'editpermissions',
                'display_name' => 'edit permissions',
                'description' => 'edit permissions',
                'created_at' => '2018-01-11 00:30:51',
                'updated_at' => '2018-01-11 00:30:51',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'deletepermissions',
                'display_name' => 'delete permissions',
                'description' => 'delete permissions',
                'created_at' => '2018-01-11 00:34:25',
                'updated_at' => '2018-01-11 00:34:25',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'viewpermissions',
                'display_name' => 'view permissions',
                'description' => 'view permissions',
                'created_at' => '2018-01-11 00:34:43',
                'updated_at' => '2018-01-11 00:34:43',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'viewcustomers',
                'display_name' => 'View Customers',
                'description' => 'view all customers on site',
                'created_at' => '2018-01-30 11:47:24',
                'updated_at' => '2018-01-30 11:47:24',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'createstates',
                'display_name' => 'create states',
                'description' => 'add new states in state list',
                'created_at' => '2018-01-30 14:33:34',
                'updated_at' => '2018-01-30 14:33:34',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'editstates',
                'display_name' => 'edit states',
                'description' => 'edit states',
                'created_at' => '2018-01-30 14:33:57',
                'updated_at' => '2018-01-30 14:33:57',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'deletestates',
                'display_name' => 'delete states',
                'description' => 'delete states',
                'created_at' => '2018-01-30 14:34:24',
                'updated_at' => '2018-01-30 14:34:24',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'viewstates',
                'display_name' => 'view states',
                'description' => 'view states',
                'created_at' => '2018-01-30 14:34:46',
                'updated_at' => '2018-01-30 14:34:46',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'createmarketplaces',
                'display_name' => 'create marketplaces',
                'description' => 'add new marketplaces to list',
                'created_at' => '2018-01-30 14:38:26',
                'updated_at' => '2018-01-30 14:38:26',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'editmarketplaces',
                'display_name' => 'edit marketplaces',
                'description' => 'edit marketplaces',
                'created_at' => '2018-01-30 14:38:53',
                'updated_at' => '2018-01-30 14:38:53',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'deletemarketplaces',
                'display_name' => 'delete marketplaces',
                'description' => 'delete marketplaces',
                'created_at' => '2018-01-30 14:39:33',
                'updated_at' => '2018-01-30 14:39:33',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'viewmarketplaces',
                'display_name' => 'view marketplaces',
                'description' => 'view marketplaces',
                'created_at' => '2018-01-30 14:39:59',
                'updated_at' => '2018-01-30 14:39:59',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'createmonthlysales',
                'display_name' => 'create monthlysales',
                'description' => 'create monthlysales',
                'created_at' => '2018-01-30 14:40:46',
                'updated_at' => '2018-01-30 14:40:46',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'editmonthlysales',
                'display_name' => 'edit monthlysales',
                'description' => 'edit monthlysales',
                'created_at' => '2018-01-30 14:41:15',
                'updated_at' => '2018-01-30 14:41:15',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'deletemonthlysales',
                'display_name' => 'delete monthly sales',
                'description' => 'delete monthly sales',
                'created_at' => '2018-01-30 14:41:44',
                'updated_at' => '2018-01-30 14:41:44',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'viewmonthlysales',
                'display_name' => 'view monthly sales',
                'description' => 'view monthly sales',
                'created_at' => '2018-01-30 14:43:08',
                'updated_at' => '2018-01-30 14:43:08',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'createfulfillments',
                'display_name' => 'create fulfillments',
                'description' => 'create fulfillments',
                'created_at' => '2018-01-30 14:43:47',
                'updated_at' => '2018-01-30 14:43:47',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'editfulfillments',
                'display_name' => 'edit fulfillments',
                'description' => 'edit fulfillments',
                'created_at' => '2018-01-30 14:44:23',
                'updated_at' => '2018-01-30 14:44:23',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'deletefulfillments',
                'display_name' => 'delete fulfillments',
                'description' => 'delete fulfillments',
                'created_at' => '2018-01-30 14:44:49',
                'updated_at' => '2018-01-30 14:44:49',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'viewfulfillments',
                'display_name' => 'view fulfillments',
                'description' => 'view fulfillments',
                'created_at' => '2018-01-30 14:45:26',
                'updated_at' => '2018-01-30 18:22:13',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => 59,
                'name' => 'createcategoriesdeals',
                'display_name' => 'create categoriesdeals',
                'description' => 'create categoriesdeals',
                'created_at' => '2018-01-30 14:52:42',
                'updated_at' => '2018-01-30 14:52:42',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'id' => 60,
                'name' => 'editcategoriesdeals',
                'display_name' => 'edit categoriesdeals',
                'description' => 'edit categoriesdeals',
                'created_at' => '2018-01-30 14:53:44',
                'updated_at' => '2018-01-30 14:57:53',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'id' => 61,
                'name' => 'deletecategoriesdeals',
                'display_name' => 'delete categoriesdeals',
                'description' => 'delete categoriesdeals',
                'created_at' => '2018-01-30 14:54:17',
                'updated_at' => '2018-01-30 14:54:17',
                'deleted_at' => NULL,
            ),
            60 => 
            array (
                'id' => 64,
                'name' => 'viewcategoriesdeals',
                'display_name' => 'view categoriesdeals',
                'description' => 'view categoriesdeals',
                'created_at' => '2018-01-30 14:58:16',
                'updated_at' => '2018-01-30 14:58:16',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}