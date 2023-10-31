<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        /*
        for sorting the list by the settings value
        */
        $data['adminSettings'] = Settings::all()->sortBy('settings_must');

        //dd($data['adminSettings']);

        return view('backend.settings.index', compact('data'));
    }


    public function sortable()
    {
        /*
        for testing the output
        */
        /*
        print_r($_POST['item']);
        */

        foreach ($_POST['item'] as $key => $value) {
            $settings = Settings::find(intval($value));
            $settings->settings_must = intval($key);
            $settings->save();
        }

        echo true;
    }


    public function destroy($id)
    {
        $settings = Settings::find($id);
        if ($settings->delete()) {
            return back()->with('success', 'Delete Operation Successful !!!');
        }
        return back()->with('error', 'Delete Operation Failed !!!');
    }

    public function edit($id)
    {
        $settings = Settings::find($id); //Settings::where('id', $id)->first();
        return view('backend.settings.edit', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('settings_value')) {
            $request->validate([
                'settings_value' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '_' . $id . '.' . $request->settings_value->getClientOriginalExtension();
            $request->settings_value->move(public_path('images/settings'), $file_name); //For saving the images in the images folder 
            request()->settings_value = $file_name;
        }

        $settings = Settings::find($id);
        $settings->update([
            'settings_value' => $request->settings_value
        ]);

        if ($settings) {
            $path = "images/settings/" . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }

            return redirect(route('settings.index'))->with('success', ' Update Operation Successful !!!');
        }
        return back()->with('error', 'Update Operation Failed !!!');
    }
}
