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
        <form class="form-signin" style="margin-top: 10%">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <img class="mb-4 rounded" src="{{asset('img/aelogo.jpg')}}" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Policy Manager</h1>
                    <input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required style="margin-top: 10px">
                </div>
                <div class="col-4"></div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-4"></div>
                <div class="col-4">
                    <button class="btn btn-lg btn-primary btn-block" type="submit"><span class="far fa-user"></span> Log in</button>
                </div>
                <div class="col-4"></div>
            </div>
        </form>

        <p style="margin-top: 20px"><a href="#" class="text-sm-center text-muted" style="text-decoration: none">Forgot Password?</a></p>

        <footer>
            <a href="{{'/admin/dashboard'}}" class="text-muted" style="text-decoration: none;">
                <p class="mt-5 mb-3 text-muted">&copy; 2018 aeNigmanet</p>
            </a>
        </footer>
    </div>

    <script src="{{asset('js/jquery-3.3.1.min.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>

</body>
</html>

