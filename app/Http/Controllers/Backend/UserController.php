<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = User::all()->sortBy('user_must');
        //dd($data);
        return view('backend.users.index', compact('data'));
    }


    public function create()
    {
        return view('backend.users.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => ['string', 'min:6', 'confirmed'],
            'user_file' => 'image|mimes:jpg,jpeg,png|max:2048',
            'role' => 'not_in:-1'
        ]);

        /*
        dd($request->all());
        */

        if (isset($request->role)) {
            $user_role = $request->role;
        } else {
            $user_role = 'user';
        }
        $file_name = uniqid() . '_' . '.' . $request->user_file->getClientOriginalExtension();
        $request->user_file->move(public_path('images/users'), $file_name);

        $user_must = User::count();

        $user = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $user_role,
            'user_file' => $file_name,
            'user_must' => $user_must,
            'created_at' => Carbon::now(),
            'email_verified_at' => Carbon::now()
        ]);

        if ($user) {
            return redirect()->route('user.index')->with('success', 'New User Added Successfully !!!');
        }
        return back()->with('error', 'Something Went Wrong, Add Operation Failed !!!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'password' => ['string', 'min:6', 'confirmed'],
            'user_file' => 'image|mimes:jpg,jpeg,png|max:2048',
            'role' => 'not_in:-1'
        ]);

        /*
        dd($request->all());
        */

        if (isset($request->role)) {
            $user_role = $request->role;
        } else {
            $user_role = 'user';
        }



        if ($request->hasFile("user_file")) {
            $file_name = uniqid() . '_' . '.' . $request->user_file->getClientOriginalExtension();
            $request->user_file->move(public_path('images/users'), $file_name);

            $user = User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $user_role,
                'user_file' => $file_name,
            ]);

            //To delete the old image in the public directory 
            $path = "images/users/" . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
        } else {
            $user = User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $user_role,
            ]);
        }

        if ($user) {
            return redirect()->route('user.index')->with('success', 'User Updated Successfully !!!');
        }
        return back()->with('error', 'Something Went Wrong, Update Operation Failed !!!');
    }


    public function destroy($id)
    {
        $user = User::find(intval($id));
        if ($user->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            $user = User::find(intval($value));
            $user->user_must = intval($key);
            $user->save();
        }

        echo true;
    }
}