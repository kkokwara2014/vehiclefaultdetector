{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Vehicle Fault Detection System</title>

        <!-- Bootstrap core CSS -->
        <link href="{{asset('bootstrap_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
                <a class="navbar-brand" href="#">VehicleFaultDetector</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        @if (Route::has('login'))

                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                        @endauth

                        @endif

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-8">
                    <h3>Vehicle Faults</h3>
                    @foreach($faults as $fault)
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{url('vehicleparts_images',$fault->imagename)}}" alt=""
                                        class="img-responsive img-rounded" width="150" height="150">
                                </div>
                                <div class="col-md-7">
                                    <h4>{{$fault->category->name}}</h4>
                                    <div>Vehicle :
                                        {{$fault->vehicle->make->name.' - '.$fault->vehicle->model.' : '.$fault->vehicle->serialnum}}
                                    </div>
                                    <div>Category : {{$fault->category->name}} </div>
                                    <div>Problem : {{$fault->problem}} </div>

                                    <div style="margin-left: 75%;">
                                        <a href="#" class="btn btn-primary btn-sm">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>


                    @endforeach


                    <p>{{$faults->links()}}</p>
                </div>
                <div class="col-md-4">
                    <h3>Useful Links</h3>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="{{asset('bootstrap_assets/vendor/jquery/jquery.slim.min.js')}}"></script>
        <script src="{{asset('bootstrap_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    </body>

</html>