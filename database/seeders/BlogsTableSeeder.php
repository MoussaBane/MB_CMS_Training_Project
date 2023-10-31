<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("blogs")->insert([
            [
                'blog_title' => 'Blog Title 01',
                'blog_slug' => 'Blog Slug 01',
                'blog_file' => 'blog_file01.txt',
                'blog_must' => 1,
                'blog_content' => 'Blog Content 01',
                'blog_status' => '1',
            ],
            [
                'blog_title' => 'Blog Title 02',
                'blog_slug' => 'Blog Slug 02',
                'blog_file' => 'blog_file02.txt',
                'blog_must' => 2,
                'blog_content' => 'Blog Content 02',
                'blog_status' => '0',
            ],
            [
                'blog_title' => 'Blog Title 03',
                'blog_slug' => 'Blog Slug 03',
                'blog_file' => 'blog_file03.txt',
                'blog_must' => 3,
                'blog_content' => 'Blog Content 03',
                'blog_status' => '0',
            ],
            [
                'blog_title' => 'Blog Title 04',
                'blog_slug' => 'Blog Slug 04',
                'blog_file' => 'blog_file04.txt',
                'blog_must' => 4,
                'blog_content' => 'Blog Content 04',
                'blog_status' => '1',
            ],
            [
                'blog_title' => 'Blog Title 05',
                'blog_slug' => 'Blog Slug 05',
                'blog_file' => 'blog_file05.txt',
                'blog_must' => 5,
                'blog_content' => 'Blog Content 05',
                'blog_status' => '0',
            ],
            [
                'blog_title' => 'Blog Title 06',
                'blog_slug' => 'Blog Slug 06',
                'blog_file' => 'blog_file06.txt',
                'blog_must' => 6,
                'blog_content' => 'Blog Content 06',
                'blog_status' => '1',
            ],
            [
                'blog_title' => 'Blog Title 07',
                'blog_slug' => 'Blog Slug 07',
                'blog_file' => 'blog_file07.txt',
                'blog_must' => 7,
                'blog_content' => 'Blog Content 07',
                'blog_status' => '1',
            ]
        ]);
    }
}
