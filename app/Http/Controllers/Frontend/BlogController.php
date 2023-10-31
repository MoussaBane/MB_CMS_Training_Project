<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blogs::all()->sortBy('blog_must');
        return view("frontend.blogs.index", compact('blogs'));
    }

    public function detail($slug)
    {

        $blog = Blogs::where('blog_slug', $slug)->first();
        $blog_list = Blogs::where('blog_slug', '!=', $slug)->orderBy('blog_must', 'desc')->get();
        return view("frontend.blogs.detail", compact('blog', 'blog_list'));
    }
}
