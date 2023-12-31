<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- for using ajax for the jquery sortable action --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MB_CMS_T | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="/backend/dist/css/skins/skin-blue.min.css">

    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 3 -->
    <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/backend/bower_components/jquery-ui/jquery-ui.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/backend/dist/js/adminlte.min.js"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    {{-- CKEDITOR --}}
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="stylesheet" href="/backend/custom/css/custom.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css">
        .content-wrapper {
            background: url('/images/backgrounds/background_003.avif') no-repeat center fixed;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            background-size: cover;
        }
    </style>
</head>


<body class="hold-transition skin-blue sidebar-mini ">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{ route('admin') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>M</b>B C</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>MB</b>CMS_T</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="/images/users/{{ Auth::user()->user_file }}" class="user-image"
                                    alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><b>{{ Auth::user()->name }}</b></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="/images/users/{{ Auth::user()->user_file }}" class="img-circle"
                                        alt="User Image">

                                    <p>
                                        <b>{{ Auth::user()->name }}</b> -
                                        {{ Auth::user()->role == 'admin' ? 'Admin' : 'User' }}
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('user.edit', Auth::user()->id) }}"
                                            class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('admin.logout') }}"
                                            class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/images/users/{{ Auth::user()->user_file }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            <b>{{ Auth::user()->name }}</b>
                        </p>
                        <p>"{{ Auth::user()->role == 'admin' ? 'Admin' : 'User' }}"</p>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><b>MENU</b></li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="{{ request()->is('admin') ? 'active' : '' }}"><a href="{{ route('admin') }}"><i
                                class="fa fa-link"></i>
                            <span>Dashboard</span></a></li>

                    <li class="{{ request()->is('admin/blog') ? 'active' : '' }}"><a
                            href="{{ route('blog.index') }}"><i class="fa fa-paper-plane"></i>
                            <span>Blogs</span></a></li>
                    <li class="{{ request()->is('admin/page') ? 'active' : '' }}"><a
                            href="{{ route('page.index') }}"><i class="fa fa-paper-plane"></i>
                            <span>Pages</span></a></li>
                    <li class="{{ request()->is('admin/slider') ? 'active' : '' }}"><a
                            href="{{ route('slider.index') }}"><i class="fa fa-paper-plane"></i>
                            <span>Sliders</span></a></li>


                    <li
                        class="{{ request()->is('admin/user') || request()->is('admin/settings') ? 'active' : '' }} treeview">
                        <a href="#"><i class="fa fa-link"></i> <span>Compte</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ request()->is('admin/user') ? 'active' : '' }}"><a
                                    href="{{ route('user.index') }}"><i class="fa fa-user"></i>
                                    <span>Users</span></a></li>
                            <li class="{{ request()->is('/') ? 'active' : '' }}"><a
                                    href="{{ route('home.index') }}"><i class="fa fa-cog"></i>
                                    <span>Accueil Page</span></a></li>
                            <li class="{{ request()->is('admin/settings') ? 'active' : '' }}"><a
                                    href="{{ route('settings.index') }}"><i class="fa fa-cog"></i>
                                    <span>Settings</span></a></li>
                        </ul>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            @yield('content')

            <!-- Main content -->
            <section class="content container-fluid">

                <!--------------------------
        | Your Page Content Here |
        -------------------------->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                By <b>Moussa BANE --MB--</b>
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2023 <a href="{{ route('admin') }}">MB_CMS_T</a>.</strong> The Best Way To Manage
            Your Application's Content.
        </footer>


        <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    @if (session()->has('success'))
        <script>
            alertify.success('{{ session('success') }}');
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            alertify.error('{{ session('error') }}');
        </script>
    @endif
    @foreach ($errors->all() as $error)
        <script>
            alertify.error('{{ $error }}');
        </script>
    @endforeach

</body>

</html>
