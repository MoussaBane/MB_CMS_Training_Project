@extends('frontend.layout')
@section('title', 'Accueil')

@section('content')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">


            <div class="carousel-inner" role="listbox">
                @php
                    $count = 0;
                @endphp
                <!-- Slide One - Set the background image for this slide in the line below -->
                @foreach ($sliders as $slider)
                    <div class="carousel-item @if ($count++ == 0) active @endif"
                        style="background-image: url('/images/sliders/{{ $slider->slider_file }}')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>{{ $slider->slider_title }}</h3>
                        </div>
                    </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container ">
        <!-- Blog Section -->
        <h2 class="mt-4 mb-4 text-color"><b>Blog</b></h2>

        <div class="row">

            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="{{ route('f_blog.detail', $blog->blog_slug) }}"><img width=200 height=200
                                class="card-img-top" src="/images/blogs/{{ $blog->blog_file }}" alt="image"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ route('f_blog.detail', $blog->blog_slug) }}">{{ $blog->blog_title }}</a>
                            </h4>
                            <p class="card-text">{!! Str::substr($blog->blog_content, 0, 182) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class=" card">
                    <div class=" card-body">
                        <h2 align='center'>{{ $home_title }}</h2>
                        <hr>
                        {!! $home_detail !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded h-100" src="/images/settings/{{ $home_image }}" alt="home_image">
                {{-- @include('frontend.default.calendar') --}}
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4 ">
            <div class="col-md-8">
                <div class=" card">
                    <div class=" card-body">
                        <p>{{ $home_slogan }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-outline-light btn-block" href="{{ route('contact_us.form') }}"><b
                        style="color: black">Contact
                        Us</b></a>
            </div>
        </div>
    </div>
    <!-- /.container -->

@endsection

@section('css')
@endsection

@section('js')
@endsection
