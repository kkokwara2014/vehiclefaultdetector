
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

                                        {{-- <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#modal-default">
                                            Write a review
                                        </a> --}}
                                        <br>
                                        <div id="app">
                                            <star-rating @rating-selected="rating = $event" :rating="rating">
                                            </star-rating>
                                        </div>

                                    </div>

                                    @else
                                    <div>
                                        <a href="{{route('login')}}" class="btn btn-primary btn-sm">View details</a>
                                    </div>

                                    @endif
                                    <p></p>
                                    {{-- @forelse ($fault->review as $review) --}}
                                    {{-- <p style="background-color: green; color: cornsilk;">{{ $review->headline }}
                                    </p> --}}


                                    {{-- @empty --}}
                                    {{-- No Review yet. --}}
                                    {{-- @endforelse --}}

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


        <script>
            Vue.component('star-rating', VueStarRating.default);
            new Vue({
                el: "#app",
                data:{
                    rating: 0
                    },
                    
            })
        </script>


        <!-- Bootstrap core JavaScript -->
        <script src="{{asset('bootstrap_assets/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('bootstrap_assets/vendor/jquery/jquery.slim.min.js')}}"></script>
        <script src="{{asset('bootstrap_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('bootstrap_assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>


    </body>

</html>