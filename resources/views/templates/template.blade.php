<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ae Guardian Policy Manager</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome-all.min.css')}}" rel="stylesheet">
</head>

<body class="text-center" style="background-color: lightgray">

    <div class="container-fluid">

        @yield('content')

        <footer>
            <a href="{{'/admin/dashboard'}}" class="text-muted" style="text-decoration: none;">
                <p class="mt-5 mb-3 text-muted">&copy; 2018 aeGuardian</p>
            </a>
        </footer>
    </div>

    <script src="{{asset('js/jquery-3.3.1.min.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>

</body>
</html>

