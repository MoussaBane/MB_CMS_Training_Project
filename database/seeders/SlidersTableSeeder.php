<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sliders")->insert([
            [
                'slider_title' => 'slider Title 01',
                'slider_slug' => 'slider Slug 01',
                'slider_file' => '1900x1080.png',
                'slider_must' => 1,
                'slider_url' => 'https://www/mb_cms_training_project.com',
                'slider_content' => 'slider Content 01',
                'slider_status' => '1',
            ],
            [
                'slider_title' => 'slider Title 02',
                'slider_slug' => 'slider Slug 02',
                'slider_file' => '1900x1081.png',
                'slider_must' => 2,
                'slider_url' => 'https://www/mb_cms_training_project.com',
                'slider_content' => 'slider Content 02',
                'slider_status' => '0',
            ],
            [
                'slider_title' => 'slider Title 03',
                'slider_slug' => 'slider Slug 03',
                'slider_file' => '1900x1082.png',
                'slider_must' => 3,
                'slider_url' => 'https://www/mb_cms_training_project.com',
                'slider_content' => 'slider Content 03',
                'slider_status' => '0',
            ],
            [
                'slider_title' => 'slider Title 04',
                'slider_slug' => 'slider Slug 04',
                'slider_file' => '1900x1083.png',
                'slider_must' => 4,
                'slider_url' => 'https://www/mb_cms_training_project.com',
                'slider_content' => 'slider Content 04',
                'slider_status' => '1',
            ],
            [
                'slider_title' => 'slider Title 05',
                'slider_slug' => 'slider Slug 05',
                'slider_file' => '1900x1084.png',
                'slider_must' => 5,
                'slider_url' => 'https://www/mb_cms_training_project.com',
                'slider_content' => 'slider Content 05',
                'slider_status' => '0',
            ]
        ]);
    }
}