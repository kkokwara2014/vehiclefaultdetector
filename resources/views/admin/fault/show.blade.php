@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Fault
            <small>Fault Details</small>
          </h1>
          {{-- <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol> --}}
        </section>
      
        <!-- Main content -->
        <section class="content">
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
            <a href="{{ route('faults.index') }}" class="btn btn-success btn-sm">
                    Back</a>
        <br><br>

        <div class="row">
            <div class="col-md-10">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                            <div class="row">
                                    <div class="col-md-5">
                                        <img src="{{url('vehicleparts_images',$fault->imagename)}}" alt=""
                                            class="img-responsive img-rounded" width="500" height="500">
        
                                    </div>
                                    <div class="col-md-7">
                                        <p>
                                            <h2>{{$fault->category->name}}</h2>
                                        </p>
                                        <hr>
                                        <div>Vehicle : {{$fault->vehicle->make->name.' - '.$fault->vehicle->model.' : '.$fault->vehicle->serialnum}} </div>
                                        <div>Category : {{$fault->category->name}} </div>
                                        <div>Problem : {{$fault->problem}} </div>
                                        <div>Cause : {{$fault->cause}} </div>
                                        <div>Solution : {{$fault->solution}} </div>
        
                                        <br>
                                        <div>
                                            Added By :
                                            <strong>{{strtoupper($fault->user->lastname).', '.$fault->user->firstname}}</strong>
                                        </div>
                                        <div>Phone : {{$fault->user->phone}}</div>
                                    </div>
        
                                </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
       
    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    {{-- <section class="col-lg-5 connectedSortable"> --}}


    {{-- </section> --}}
    <!-- right col -->
</div>
<!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection