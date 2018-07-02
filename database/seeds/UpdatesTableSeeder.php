<?php

use Illuminate\Database\Seeder;

class UpdatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('updates')->delete();
        
        \DB::table('updates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'device_id' => 1,
                'buildversion' => '20180505',
                'ziplink' => 'https://dl.firehound.org/tomato/FireHound-4.5-OFFICIAL-20180505-tomato.zip',
            'changelog' => 'FireHound v4.5 :-  - April security patches - Rebased frameworks - Notification lags are totally gone(yes it is properly tested this time) - Changed brightness slider position below QS tiles - Toggle for Brightness buttons - Revamped auto brightness implementation - Fixed minor glitches with Notification LED Color Picker  - Added long press actions for heads up and other tiles - Fixed ADB over network tile - Added night display back (now you can use both LiveDisplay as well as Night Light according to your preference)  - Fixed minor glitches in battery bar  - Toggle to hide VPN icon in statusbar  - Fixed half transparent Power Menu  - Fixed power menu icons getting themed inappropriately - Fixed MTP toggle bug  - Fixed battery meter drawable under Settings battery - Added charging sound and a toggle for vibration - Smoother animations  - Added QS footer warnings toggle - Full rootless Substratum Support - Merged in translations in all repos - Huge updates to Launcher3  Essentials: - Fixed flashing of OTA updates/extras without root - New launcher icon - New file picker for choosing additional zips - Removed webview for OTA downloads - Notification when OTA has been downloaded - Updated OpenGApps links  Tomato fixes: Fixed "Vendor mismatch error" message Updates to GPS',
                'xdathread' => '#',
                'created_at' => '2018-07-01 10:15:22',
                'updated_at' => '2018-07-01 10:33:31',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'device_id' => 2,
                'buildversion' => '',
                'ziplink' => '',
                'changelog' => '',
                'xdathread' => '',
                'created_at' => '2018-07-02 19:08:34',
                'updated_at' => '2018-07-02 19:08:34',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}