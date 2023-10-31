<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Message;
use App\Models\Slider;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        $sliders = Slider::all()->sortBy('slider_must');
        $blogs = Blogs::all()->sortBy('blog_must');
        return view("frontend.default.index", compact('sliders', 'blogs'));
    }

    public function contact_us()
    {
        return view('frontend.default.contact_us');
    }

    public function saveMessage(Request $request)
    {
        //dd($request->all());
        $sended = Message::insert([
            'full_name' => $request->full_name,
            'from' => $request->from,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        if ($sended) {
            return back()->with('success', 'Your message has been successfully sended !!!');
        } else {
            return back()->with('error', 'Something went wrong when sending your message, please retry again !!!');
        }
    }

    /*
    public function sign_in()
    {
        return view('frontend.default.sign_in');
    }
    */
}
