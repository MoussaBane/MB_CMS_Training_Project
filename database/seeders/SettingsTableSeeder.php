<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'settings_description' => 'Title',
                'settings_key' => 'title',
                'settings_value' => 'Laravel CMS Learning',
                'settings_type' => 'text',
                'settings_must' => 0,
                'settings_delete' => '1',
                'settings_status' => '1'
            ],
            [
                'settings_description' => 'Description',
                'settings_key' => 'description',
                'settings_value' => 'Laravel Learning Description',
                'settings_type' => 'text',
                'settings_must' => 1,
                'settings_delete' => '1',
                'settings_status' => '1'
            ],
            [
                'settings_description' => 'Logo',
                'settings_key' => 'logo',
                'settings_value' => 'logo.png',
                'settings_type' => 'file',
                'settings_must' => 2,
                'settings_delete' => '1',
                'settings_status' => '1'
            ],
            [
                'settings_description' => 'Icon',
                'settings_key' => 'icon',
                'settings_value' => 'icon.ico',
                'settings_type' => 'file',
                'settings_must' => 3,
                'settings_delete' => '1',
                'settings_status' => '1'
            ],
            [
                'settings_description' => 'Keywords',
                'settings_key' => 'keywords',
                'settings_value' => 'laravel,cms,crm,mb',
                'settings_type' => 'text',
                'settings_must' => 4,
                'settings_delete' => '1',
                'settings_status' => '1'
            ],
            [
                'settings_description' => 'Fix Phone',
                'settings_key' => 'fix_phone',
                'settings_value' => '0566 xxx xxx xxxx',
                'settings_type' => 'text',
                'settings_must' => 5,
                'settings_delete' => '1',
                'settings_status' => '1'
            ],
            [
                'settings_description' => 'Phone GSM',
                'settings_key' => 'phone_gsm',
                'settings_value' => '0544 xxx xxx xxxx',
                'settings_type' => 'text',
                'settings_must' => 6,
                'settings_delete' => '1',
                'settings_status' => '1'
            ],
            [
                'settings_description' => 'Mail',
                'settings_key' => 'mail',
                'settings_value' => 'bane.moussa@gmail.com',
                'settings_type' => 'text',
                'settings_must' => 7,
                'settings_delete' => '1',
                'settings_status' => '1'
            ],
            [
                'settings_description' => 'Neighborhood',
                'settings_key' => 'neighborhood',
                'settings_value' => 'Istanbul/Kadikoy',
                'settings_type' => 'text',
                'settings_must' => 8,
                'settings_delete' => '1',
                'settings_status' => '1'
            ],
            [
                'settings_description' => 'City',
                'settings_key' => 'city',
                'settings_value' => 'Istanbul',
                'settings_type' => 'text',
                'settings_must' => 9,
                'settings_delete' => '1',
                'settings_status' => '1'
            ],
            [
                'settings_description' => 'Adress',
                'settings_key' => 'adress',
                'settings_value' => 'Kadikoy Istanbul Cad:2 Mah:3 Turkey',
                'settings_type' => 'text',
                'settings_must' => 10,
                'settings_delete' => '1',
                'settings_status' => '1'
            ],
        ]);
    }
}
