<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/favicon.ico')}}">

    <title>@yield('title','Admin Area')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome-all.min.css')}}" rel="stylesheet">

</head>

<body>

<div class="container container-fluid">
    <header class="page-header" style="margin-bottom: 10px; margin-top: 10px; height: 100px; padding-top: 30px;">
        <h2 style="font-family: Myriad Pro;">
            <img src="{{asset('img/aelogo.jpg')}}" class="rounded" alt="logo" width="36" height="36"> Policy Manager
        </h2>
        <p class="text-muted">@yield('sectionname')</p>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
        <!-- Brand -->
        <a class="navbar-brand" href="{{'/admin/dashboard'}}"><span class="far fa-home"> </span> </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{'/admin/users'}}"><span class="far fa-address-card"> </span> Users </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{'/admin/options'}}"><span class="far fa-address-card"> </span> Options </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{'/admin/import'}}"><span class="far fa-upload"> </span> Import</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span class="far fa-tasks"> </span> Logs </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span class="far fa-question-circle"> Help</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{'logout'}}">{{ Auth::user()->name }} <span class="far fa-sign-out-alt"> Logout</span> </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container container-fluid" style="padding-top: 20px;">
        @yield('content')
    </div>

    <footer class="footer text-center text-muted" style="margin-top: 30px;">
        aeGuardian - Corporate Policy Manager
    </footer>

</div>

@section('footer')
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/tether-1.4.4.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
@show

</body>
</html>
