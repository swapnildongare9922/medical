<!doctype html>
<html class="no-js h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description"
        content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0"
        href="{{ url('/assets/styles/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/styles/extras.1.1.0.min.css') }}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body class="h-100">

    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                                    src="/assets/images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                                <span class="d-none d-md-inline ml-1">Medical</span>
                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                            <i class="material-icons">&#xE5C4;</i>
                        </a>
                    </nav>
                </div>
                <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                    <div class="input-group input-group-seamless ml-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                            aria-label="Search">
                    </div>
                </form>
                <div class="nav-wrapper">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link @yield('sidebar-country')" href="/admin/countries">
                                <i class="material-icons">flag</i>
                                <span>Countries</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @yield('sidebar-state')" href="/admin/home/states">
                                <i class="material-icons">language</i>
                                <span>States</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('sidebar-district')" href="/admin/home/districts">
                                <i class="material-icons">airplay</i>
                                <span>Districts</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('sidebar-area')" href="/admin/home/areas">
                                <i class="material-icons">vertical_split</i>
                                <span>Area</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @yield('sidebar-user')" href="/admin/home/users">
                                <i class="material-icons">account_box</i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('sidebar-add-product-type')" href="/admin/home/products-type">
                                <i class="material-icons">note_add</i>
                                <span>Add Product Type</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('sidebar-add-product')" href="/admin/home/products">
                                <i class="material-icons">note_add</i>
                                <span>Add Product</span>
                            </a>
                        </li>
                        {{--

                        <li class="nav-item">
                            <a class="nav-link" href="/home">
                                <i class="material-icons">home</i>
                                <span>Blog Dashboard</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link @yield('sidebar-category')" href="/home/category">
                                <i class="material-icons">view_module</i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('sidebar-banner')" href="/home/banner">
                                <i class="material-icons">image</i>
                                <span>Banner</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('sidebar-plans')" href="/home/plans">
                                <i class="material-icons">add_to_photos</i>
                                <span>Plans</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('sidebar-feedback')" href="/home/feedback">
                                <i class="material-icons">feedback</i>
                                <span>Feedbacks</span>
                            </a>
                        </li>

                        --}}
                    </ul>
                </div>
            </aside>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                        <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                            <div class="input-group input-group-seamless ml-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">

                                    </div>
                                </div>

                            </div>
                        </form>
                        <ul class="navbar-nav border-left flex-row ">
                            <li class="nav-item dropdown container-fluid">
                                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle mr-2" src="/assets/images/avatars/0.jpg"
                                        alt="User Avatar">
                                    <span class="d-none d-md-inline-block">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small">
                                    <a class="dropdown-item" href="/admin/home/profile">
                                        <i class="material-icons">&#xE7FD;</i> Profile</a>
                                    <a class="dropdown-item" href="/home/blog">
                                        <i class="material-icons">vertical_split</i> Blog Posts</a>
                                    <a class="dropdown-item" href="/home/blog/insertblog">
                                        <i class="material-icons">note_add</i> Add New Post</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="material-icons text-danger">&#xE879;</i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


                                </div>
                            </li>
                        </ul>
                        <nav class="nav">
                            <a href="#"
                                class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
                                data-toggle="collapse" data-target=".header-navbar" aria-expanded="false"
                                aria-controls="header-navbar">
                                <i class="material-icons">&#xE5D2;</i>
                            </a>
                        </nav>
                    </nav>
                </div>
                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4">
                    @yield('content')
                </div>

                <footer class="main-footer d-flex p-2 px-3 bg-white border-top">

                    <span class="copyright ml-auto my-auto mr-2">Copyright © <script>
                            var date = new Date();
                            var year = date.getFullYear(date);
                            document.write(year);

                        </script>
                        <a href="https://softtrine.com" rel="nofollow">SoftTrine</a>
                    </span>
                </footer>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    @yield('footer-script')
    <script src="{{ url('/assets/scripts/Chart.min.js') }}"></script>
    <script src="{{ url('/assets/scripts/shards.min.js') }}"></script>
    <script src="{{ url('/assets/scripts/jquery.sharrre.min.js') }}"></script>
    <script src="{{ url('/assets/scripts/extras.1.1.0.min.js') }}"></script>
    <script src="{{ url('/assets/scripts/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{ url('/assets/scripts/app/app-blog-overview.1.1.0.js') }}"></script>
</body>

</html>
