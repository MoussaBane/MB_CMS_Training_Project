<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Message;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DefaultController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->get();
        return view('backend.default.index', compact('messages'));
    }

    public function login()
    {
        return view('backend.default.login');
    }

    public function register()
    {
        return view('backend.default.register');
    }

    public function saveRegistration(Request $request)
    {
        //dd($request->all());
        $request->flash();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user_must = User::count();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_must' => $user_must
        ]);

        $sliders = Slider::all()->sortBy('slider_must');
        $blogs = Blogs::all()->sortBy('blog_must');

        if ($user) {
            return redirect(route('admin.home_page', compact('sliders', 'blogs')));
        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again !!!');
        }
    }

    public function authentication(Request $request)
    {

        /*
        dd($request->all());
        */
        $request->flash();
        $remember_me = $request->has('remember_me') ? true : false;
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember_me)) {
            /*
            return redirect(route('admin'));
            */
            if (Auth::user()->role == 'admin') {

                return redirect()->intended(route('admin'));
            } else { //for a normal user
                $sliders = Slider::all()->sortBy('slider_must');
                $blogs = Blogs::all()->sortBy('blog_must');
                return redirect()->intended(route('user.home_page', compact('sliders', 'blogs')));
            }
        } else {
            return back()->with('error', 'Invalid UserName Or Password !!!');
        }
    }

    public function home_page()
    {
        $sliders = Slider::all()->sortBy('slider_must');
        $blogs = Blogs::all()->sortBy('blog_must');
        return view('frontend.default.home_page', compact('sliders', 'blogs'));
    }
    public function logout()
    {
        Auth::logout();

        return redirect(route('admin.login'))->with('success', 'Logout Successfully !!!');
    }

    public function messageReaded($id)
    {
        $message = Message::find($id);

        if ($message->status == 1) { //Make as readed
            $message->status = 0;
        } else { //Make as unreaded
            $message->status = 1;
        }
        $message->save();

        return back();
    }

    public function messageListOption($option)
    {
        if ($option == 'readed') {
            $messages = Message::where('status', 0)->orderBy('id', 'desc')->get();
        } elseif ($option == 'unreaded') {
            $messages = Message::where('status', 1)->orderBy('id', 'desc')->get();
        } else { // for option "all"
            $messages = Message::orderBy('id', 'desc')->get();
        }

        return view('backend.default.index', compact('messages'));
    }

    /*
    public function showMessages()
    {
        return view('backend.default.message');
    }
    */
}
