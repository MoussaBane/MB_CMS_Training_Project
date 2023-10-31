<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $data['slider'] = Slider::all()->sortBy('slider_must');
        //dd($data);
        return view('backend.sliders.index', compact('data'));
    }


    public function create()
    {
        return view('backend.sliders.create');
    }


    public function store(Request $request)
    {
        //dd($request->all());

        if (strlen($request->slider_slug) > 6) {
            $slug = Str::slug($request->slider_slug);
        } else {
            $slug = Str::slug($request->slider_title);
        }

        if ($request->hasFile('slider_file')) {
            $request->validate([
                'slider_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'slider_status' => 'required|not_in:-1'
            ]);

            $file_name = uniqid() . '_' . '.' . $request->slider_file->getClientOriginalExtension();
            $request->slider_file->move(public_path('images/sliders'), $file_name);
        } else {
            $file_name = null;
        }

        $slider_must = Slider::count();

        $slider = Slider::insert([
            'slider_title' => $request->slider_title,
            'slider_slug' => $slug,
            'slider_file' => $file_name,
            'slider_must' => $slider_must,
            'slider_url' => $request->slider_url,
            'slider_content' => $request->slider_content,
            'slider_status' => $request->slider_status
        ]);

        if ($slider) {
            return redirect()->route('slider.index')->with('success', 'New Slider Added Successfully !!!');
        }
        return back()->with('error', 'Something Went Wrong, Add Operation Failed !!!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.sliders.edit', ['slider' => $slider]);
    }

    public function update(Request $request, $id)
    {
        if (strlen($request->slider_slug) > 6) {
            $slug = Str::slug($request->slider_slug);
        } else {
            $slug = Str::slug($request->slider_title);
        }

        if ($request->hasFile('slider_file')) {
            $request->validate([
                'slider_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'slider_status' => 'required|not_in:-1'
            ]);

            $file_name = uniqid() . '_' . '.' . $request->slider_file->getClientOriginalExtension();
            $request->slider_file->move(public_path('images/sliders'), $file_name);

            $slider = Slider::where('id', $id)->update([
                'slider_title' => $request->slider_title,
                'slider_slug' => $slug,
                'slider_url' => $request->slider_url,
                'slider_file' => $file_name,
                'slider_content' => $request->slider_content,
                'slider_status' => $request->slider_status
            ]);

            //To delete the old image in the public path
            $path = "images/sliders/" . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
        } else {
            $slider = Slider::where('id', $id)->update([
                'slider_title' => $request->slider_title,
                'slider_slug' => $slug,
                'slider_url' => $request->slider_url,
                'slider_content' => $request->slider_content,
                'slider_status' => $request->slider_status
            ]);
        }

        if ($slider) {
            return redirect()->route('slider.index')->with('success', 'Slider Updated Successfully !!!');
        }
        return back()->with('error', 'Something Went Wrong, Update Operation Failed !!!');
    }


    public function destroy($id)
    {
        $slider = Slider::find(intval($id));
        if ($slider->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            $slider = Slider::find(intval($value));
            $slider->slider_must = intval($key);
            $slider->save();
        }

        echo true;
    }
}