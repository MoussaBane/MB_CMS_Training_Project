@extends('frontend.layout')
@section('title', 'Blog Page')

@section('content')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Blogs
            <small>List Of The Blogs</small>
        </h1>

        <!-- Blog Post -->
        @foreach ($blogs as $blog)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="#">
                                <img class="img-fluid rounded" src="/images/blogs/{{ $blog->blog_file }}" alt="image"
                                    width=200>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="card-title">{{ $blog->blog_title }}</h2>
                            <p class="card-text">{!! Str::substr($blog->blog_content, 0, 182) !!}</p>
                            <a href="{{ route('f_blog.detail', $blog->blog_slug) }}" class="btn btn-primary">Read More
                                &rarr;</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Posted {{ $blog->created_at->format('d/m/y h:i') }}
                </div>
            </div>
        @endforeach



    </div>
@endsection


@section('css')
@endsection

@section('js')
@endsection

{{-- http://placehold.it/750x300 --}}
