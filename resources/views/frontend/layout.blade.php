<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $description }}">
    <meta name="author" content="">

    <title>MB_CMS_T | @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/frontend/css/modern-business.css" rel="stylesheet">

    <style type="text/css">
        body {
            background: url('/images/backgrounds/background_003.avif') no-repeat center fixed;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            background-size: cover;

            /* Définit la couleur du texte en blanc */
        }

        .text-color {
            color: white;
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}"><b style="font-size: 30px;">MB CMS_T</b></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ route('home.index') }}"><b>Accueil</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('blog') ? 'active' : '' }}"
                            href="{{ route('f_blog.index') }}"><b>Blogs</b></a>
                    </li>
                    <li class="nav-item {{ request()->is('page/detail/*') ? 'active' : '' }}">
                        <a class="nav-link" href="/page/detail/{{ $slug }}"><b>Pages</b></a>
                    </li>
                    <li class="nav-item {{ request()->is('contact_us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact_us.form') }}"><b>Contact Us</b></a>
                    </li>
                    @if (Auth::user() && Auth::user()->role == 'admin')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('admin') }}"><b>Admin_Panel</b></a>
                        </li>
                    @endif
                    {{-- @if (Auth::user() && Auth::user()->role == 'user')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <b>{{ Auth::user()->name }}</b>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <div class="user-header text-center">
                                    <img src="/images/users/{{ Auth::user()->user_file }}"
                                        class="img-circle w-full h-auto" alt="User Image">
                                    <p>
                                        <b>{{ Auth::user()->name }}</b> -
                                        {{ Auth::user()->role == 'admin' ? 'Admin' : 'User' }}
                                    </p>
                                </div>
                                <div class="user-footer text-center">
                                    <div class="row">
                                        <div class=" col-auto"></div>
                                        <div class=" col-4">
                                            <a href="{{ route('user.edit', Auth::user()->id) }}"
                                                class="btn btn-outline-info">Profile</a>
                                        </div>
                                        <div class="col-4">
                                            <a href="{{ route('admin.logout') }}"
                                                class="btn btn-outline-info">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}"><b>Sign In</b></a>
                        </li>
                    @endif --}}

                </ul>
            </div>

        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white"><a href="{{ route('home.index') }}"><b>MB CMS_T</b></a>
                {{ $footer }}.
                By <b>Moussa BANE --MB--</b></p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/frontend/vendor/jquery/jquery.min.js"></script>
    <script src="/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
