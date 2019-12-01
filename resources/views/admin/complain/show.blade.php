@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <div>
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">
                Back</a>
        </div>
        <br>
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-12">
                                <h2>Comments</h2>
                                <ul class="list-group">
                                    @forelse ($discussions as $comt)
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="{{url('user_images',$comt->user->userimage)}}"
                                                        class="img-circle" width="40" height="40">
                                                </div>
                                                <div class="col-md-10">
                                                    <div></div>
                                                    <div>{!! htmlspecialchars_decode($comt->comment) !!}</div>
                                                    <div style="text-align: right">
                                                        <small>Sent : {{$comt->created_at->diffForHumans()}}
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                                class="fa fa-calendar"></span>
                                                            {{$comt->commentdate}} &nbsp; <span
                                                                class="fa fa-clock-o"></span>
                                                            {{$comt->commenttime}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <li class="list-group-item alert alert-warning"><strong>No Comments yet!</strong>
                                    </li>
                                    @endforelse
                                </ul>
                            </div>
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