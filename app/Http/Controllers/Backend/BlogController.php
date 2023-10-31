<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $data['blog'] = Blogs::all()->sortBy('blog_must');
        //dd($data);
        return view('backend.blogs.index', compact('data'));
    }


    public function create()
    {
        return view('backend.blogs.create');
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

        if (strlen($request->blog_slug) > 6) {
            $slug = Str::slug($request->blog_slug);
        } else {
            $slug = Str::slug($request->blog_title);
        }

        if ($request->hasFile('blog_file')) {
            $request->validate([
                'blog_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'blog_status' => 'required|not_in:-1'
            ]);

            $file_name = uniqid() . '_' . '.' . $request->blog_file->getClientOriginalExtension();
            $request->blog_file->move(public_path('images/blogs'), $file_name);
        } else {
            $file_name = null;
        }

        $blog_must = Blogs::count();
        $blog = Blogs::insert([
            'blog_title' => $request->blog_title,
            'blog_slug' => $slug,
            'blog_file' => $file_name,
            'blog_must' => $blog_must,
            'blog_content' => $request->blog_content,
            'blog_status' => $request->blog_status
        ]);

        if ($blog) {
            return redirect()->route('blog.index')->with('success', 'New Blog Added Successfully !!!');
        }
        return back()->with('error', 'Something Went Wrong, Add Operation Failed !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blogs::find($id);
        return view('backend.blogs.edit', ['blog' => $blog]);
    }

    public function update(Request $request, $id)
    {
        if (strlen($request->blog_slug) > 6) {
            $slug = Str::slug($request->blog_slug);
        } else {
            $slug = Str::slug($request->blog_title);
        }

        if ($request->hasFile('blog_file')) {
            $request->validate([
                'blog_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'blog_status' => 'required|not_in:-1'
            ]);

            $file_name = uniqid() . '_' . '.' . $request->blog_file->getClientOriginalExtension();
            $request->blog_file->move(public_path('images/blogs'), $file_name);

            $blog = Blogs::where('id', $id)->update([
                'blog_title' => $request->blog_title,
                'blog_slug' => $slug,
                'blog_file' => $file_name,
                'blog_content' => $request->blog_content,
                'blog_status' => $request->blog_status
            ]);

            //To delete the old image in the public path
            $path = "images/blogs/" . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
        } else {
            $blog = Blogs::where('id', $id)->update([
                'blog_title' => $request->blog_title,
                'blog_slug' => $slug,
                'blog_content' => $request->blog_content,
                'blog_status' => $request->blog_status
            ]);
        }

        if ($blog) {
            return redirect()->route('blog.index')->with('success', 'Blog Updated Successfully !!!');
        }
        return back()->with('error', 'Something Went Wrong, Update Operation Failed !!!');
    }


    public function destroy($id)
    {
        $blog = Blogs::find(intval($id));
        if ($blog->delete()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            $blogs = Blogs::find(intval($value));
            $blogs->blog_must = intval($key);
            $blogs->save();
        }

        echo true;
    }
}