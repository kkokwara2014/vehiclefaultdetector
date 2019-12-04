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
                        @if (Auth::check())
                        <li class="nav-item">
                            <form id="logout-user" style="display: none" action="{{ route('user.logout') }}"
                                method="post">
                                {{ csrf_field() }}

                            </form>

                            <a class="nav-link" href="" onclick="
                                      if (confirm('Are you sure you want to logout?')) {
                                          event.preventDefault();
                                      document.getElementById('logout-user').submit();
                                      } else {
                                          event.preventDefault();
                                      }
                                  ">Log out</a>
                            {{-- <a class="nav-link" href="{{route('user.logout')}}"><i class="fa fa-sign-out"></i> Sign
                            --}}
                            {{-- Out</a> --}}
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}"> Login</a>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
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
                                <div class="col-md-7" style="margin-left: -18%">
                                    <h4>{{$fault->category->name}}</h4>
                                    <div>Vehicle :
                                        {{$fault->vehicle->make->name.' - '.$fault->vehicle->model.' : '.$fault->vehicle->serialnum}}
                                    </div>
                                    <div>Category : {{$fault->category->name}} </div>
                                    <div>Problem : {{$fault->problem}} </div>

                                    @if (auth()->check())
                                    <div>Cause : {{$fault->cause}} </div>
                                    <div>Solution : {{$fault->solution}} </div>
                                    <div>

                                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#modal-default">
                                            Write a review
                                        </a>
                                        {{-- <a href="#" data-toggle="modal" data-target="#myModal"
                                            class="btn btn-success btn-sm">Write a review</a> --}}
                                    </div>

                                    @else
                                    <div>
                                        <a href="{{route('login')}}" class="btn btn-primary btn-sm">View details</a>
                                    </div>

                                    @endif
                                    <br>
                                    {{$fault->review as $review}}
                                    <star-rating></star-rating>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br>


                    {{-- Data input modal area --}}
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog modal-md">

                            <form action="{{ route('faultreviews.store') }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Write a review</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="">Rating</label>
                                            <input type="text" class="form-control" name="rating">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Headline</label>
                                            <input type="text" class="form-control" name="headline">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <input type="text" class="form-control" name="description">
                                        </div>

                                        <input type="hidden" name="fault_id" value="{{$fault->id}}">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->

                            </form>
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


                    @endforeach


                    <p>{{$faults->links()}}</p>
                </div>
                <div class="col-md-4">
                    <h3>Useful Links</h3>
                </div>
            </div>
        </div>




        <!-- Bootstrap core JavaScript -->
        <script src="{{asset('bootstrap_assets/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('bootstrap_assets/vendor/jquery/jquery.slim.min.js')}}"></script>
        <script src="{{asset('bootstrap_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('bootstrap_assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>


    </body>

</html>