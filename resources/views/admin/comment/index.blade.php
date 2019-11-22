@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Comments
            <small>Control panel</small>
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
            <section class="col-lg-11 connectedSortable">

                <div class="row">
                    <div class="col-md-8">
                        <a href="{{route('comment.create')}}" class="btn btn-primary"><span
                                class="fa fa-comment-o"></span>
                            Begin Commenting</a>
                        <br><br>
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12" style="overflow-y: auto; height: auto;">

                                        
                                        @forelse ($comments as $comt)
                                        {{-- @if (Auth::user()->id==$comt->user->id||Auth::user()->role->id==1) --}}

                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="{{url('user_images',$comt->user->userimage)}}"
                                                            class="img-circle" width="40" height="40">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div style="font-weight: bold">
                                                            {{$comt->user->lastname.', '.$comt->user->firstname}} ({{$comt->user->role->name}}) says:
                                                        </div>
                                                        <div>{!! htmlspecialchars_decode($comt->comment) !!}</div>
                                                        <div style="text-align: right">
                                                            <small>Sent : {{$comt->created_at->diffForHumans()}}
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                    class="fa fa-calendar"></span>
                                                                {{date('F d, Y',strtotime($comt->created_at))}} &nbsp;
                                                                <span class="fa fa-clock-o"></span>
                                                                {{date('H:i:s',strtotime($comt->created_at))}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- @endif --}}
                                        @empty
                                        <li class="list-group-item alert alert-warning"><strong>No Comments
                                                yet!</strong>
                                        </li>
                                        @endforelse

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