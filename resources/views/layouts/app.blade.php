<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config("app.name") }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/dashboard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/style.css') }}">
</head>
<body class="d-flex flex-column h-100">

@section('header')
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">{{ config("app.name") }}</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">

                @guest
                    Guest
                    <a class="nav-link px-3" href="#">Guest</a>
                @endguest

                @auth
                    <a class="nav-link px-3" href="{{ route('logout') }}">@lang('login.Logout')</a>
                @endauth

            </div>
        </div>
    </header>
@show

<div class="container-fluid mb-5">
    <div class="row">

        @section('sidebar')
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Задачи</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item active">
                            <a class="nav-link {{ (request()->routeIs('tasks.index')) ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                                <span data-feather="file-text"></span>
                                Список Задач
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->routeIs('tasks.create')) ? 'active' : '' }}" href="{{ route('tasks.create') }}">
                                <span data-feather="file-text"></span>
                                Добавить Задачу
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>
        @show

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
        </main>

    </div>
</div>


    @section('footer')
        <footer class="footer mt-auto py-3 bg-light">
            <div class="text-end px-4">
                <span class="text-muted">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</span>
            </div>
        </footer>
    @show

    <script type="text/javascript" src="{{ URL::to('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('assets/js/script.js') }}"></script>
</body>
</html>
