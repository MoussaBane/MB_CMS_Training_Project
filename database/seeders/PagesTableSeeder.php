<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("pages")->insert([
            [
                'page_title' => 'Page Title 01',
                'page_slug' => 'Page Slug 01',
                'page_file' => '6537d6d30127d_.png',
                'page_must' => 1,
                'page_content' => 'Page Content 01',
                'page_status' => '1',
            ],
            [
                'page_title' => 'Page Title 02',
                'page_slug' => 'Page Slug 02',
                'page_file' => '6537d6d30127d_.png',
                'page_must' => 2,
                'page_content' => 'Page Content 02',
                'page_status' => '0',
            ],
            [
                'page_title' => 'Page Title 03',
                'page_slug' => 'Page Slug 03',
                'page_file' => '6537d6d30127d_.png',
                'page_must' => 3,
                'page_content' => 'Page Content 03',
                'page_status' => '0',
            ],
            [
                'page_title' => 'Page Title 04',
                'page_slug' => 'Page Slug 04',
                'page_file' => '6537d6d30127d_.png',
                'page_must' => 4,
                'page_content' => 'Page Content 04',
                'page_status' => '1',
            ],
            [
                'page_title' => 'Page Title 05',
                'page_slug' => 'Page Slug 05',
                'page_file' => '6537d6d30127d_.png',
                'page_must' => 5,
                'page_content' => 'Page Content 05',
                'page_status' => '0',
            ],
            [
                'page_title' => 'Page Title 06',
                'page_slug' => 'Page Slug 06',
                'page_file' => '6537d6d30127d_.png',
                'page_must' => 6,
                'page_content' => 'Page Content 06',
                'page_status' => '1',
            ],
            [
                'page_title' => 'Page Title 07',
                'page_slug' => 'Page Slug 07',
                'page_file' => '6537d6d30127d_.png',
                'page_must' => 7,
                'page_content' => 'Page Content 07',
                'page_status' => '1',
            ]
        ]);
    }
}