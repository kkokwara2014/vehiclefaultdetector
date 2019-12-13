
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

        {{-- Vue Star-rating --}}
        <script src="https://unpkg.com/vue@2.1.10/dist/vue.js"></script>
        <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
            <a class="navbar-brand" href="{{route('index')}}">VehicleFaultDetector</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        {{-- @if (Auth::check()) --}}
                        <li class="nav-item">
                            {{-- <form id="logout-user" style="display: none" action="{{ route('user.logout') }}"
                                method="post">
                                {{ csrf_field() }}

                            </form> --}}

                            {{-- <a class="nav-link" href="" onclick=" --}}
                                      {{-- if (confirm('Are you sure you want to logout?')) {
                                          event.preventDefault();
                                      document.getElementById('logout-user').submit();
                                      } else {
                                          event.preventDefault();
                                      }
                                  ">Log out</a> --}}
                            {{-- <a class="nav-link" href="{{route('user.logout')}}"><i class="fa fa-sign-out"></i> Sign
                            --}}
                            {{-- Out</a> --}}
                        </li>
                        {{-- @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}"> Login</a>
                        </li>
                        @endif --}}

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container">
            <br>
            <div class="jumbotron text-center" >
                <h1>Vehicle Fault Detection System</h1>
                <h4>[Peace Group Factory, Emene. Enugu State]</h4>
                <hr>
                by
                <h5>AGBO, Martina Ogechukwu - 2017/HND/24844/CS</h5>
                <br>
            <a href="{{route('faults')}}" class="btn btn-primary">Continue >></a>
            </div>
            
        </div>


        


        <!-- Bootstrap core JavaScript -->
        <script src="{{asset('bootstrap_assets/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('bootstrap_assets/vendor/jquery/jquery.slim.min.js')}}"></script>
        <script src="{{asset('bootstrap_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('bootstrap_assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>


    </body>

</html>