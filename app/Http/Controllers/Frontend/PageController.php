<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function detail($slug)
    {

        $page = Page::where('page_must', $slug)->firstOrFail();
        $page_list = Page::whereNot('page_must', $slug)->orderBy('page_must', 'desc')->get();
        return view('frontend.pages.detail', compact('page', 'page_list'));


        /*
        if ($slug == "...") {
            $slug = Page::where('page_slug', 'Page Slug 01')->get('page_slug');
        }
        */
        /*
        if ($must == 0) {
            $must = 0;
        } else {
            $must = intval($must);
        }
        */
    }
}
