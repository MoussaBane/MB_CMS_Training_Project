<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $data['page'] = Page::all()->sortBy('page_must');
        //dd($data);
        return view('backend.page.index', compact('data'));
    }


    public function create()
    {
        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        if (strlen($request->page_slug) > 6) {
            $slug = Str::slug($request->page_slug);
        } else {
            $slug = Str::slug($request->page_title);
        }

        if ($request->hasFile('page_file')) {
            $request->validate([
                'page_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'page_status' => 'required|not_in:-1'
            ]);

            $file_name = uniqid() . '_' . '.' . $request->page_file->getClientOriginalExtension();
            $request->page_file->move(public_path('images/page'), $file_name);
        } else {
            $file_name = null;
        }

        $page_must = Page::count();

        $page = Page::insert([
            'page_title' => $request->page_title,
            'page_slug' => $slug,
            'page_file' => $file_name,
            'page_must' => $page_must,
            'page_content' => $request->page_content,
            'page_status' => $request->page_status
        ]);

        if ($page) {
            return redirect()->route('page.index')->with('success', 'New page Added Successfully !!!');
        }
        return back()->with('error', 'Something Went Wrong, Add Operation Failed !!!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $page = Page::find($id);
        return view('backend.page.edit', ['page' => $page]);
    }

    public function update(Request $request, $id)
    {
        if (strlen($request->page_slug) > 6) {
            $slug = Str::slug($request->page_slug);
        } else {
            $slug = Str::slug($request->page_title);
        }

        if ($request->hasFile('page_file')) {
            $request->validate([
                'page_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'page_status' => 'required|not_in:-1'
            ]);

            $file_name = uniqid() . '_' . '.' . $request->page_file->getClientOriginalExtension();
            $request->page_file->move(public_path('images/Page'), $file_name);

            $page = Page::where('id', $id)->update([
                'page_title' => $request->page_title,
                'page_slug' => $slug,
                'page_file' => $file_name,
                'page_content' => $request->page_content,
                'page_status' => $request->page_status
            ]);

            //To delete the old image in the public path
            $path = "images/page/" . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
        } else {
            $page = Page::where('id', $id)->update([
                'page_title' => $request->page_title,
                'page_slug' => $slug,
                'page_content' => $request->page_content,
                'page_status' => $request->page_status
            ]);
        }

        if ($page) {
            return redirect()->route('page.index')->with('success', 'Page Updated Successfully !!!');
        }
        return back()->with('error', 'Something Went Wrong, Update Operation Failed !!!');
    }


    public function destroy($id)
    {
        $page = Page::find(intval($id));
        if ($page->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            $page = Page::find(intval($value));
            $page->page_must = intval($key);
            $page->save();
        }

        echo true;
    }
}