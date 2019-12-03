@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('vehicles.index') }}" class="btn btn-success">
           <span class="fa fa-eye"></span> All Vehicles
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('vehicles.update',$vehicles->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            
    
                                <div class="form-group">
                                    <label for="">Vehicle Make <b style="color: red;">*</b></label>
                                    <select name="make_id" class="form-control">
                                        {{-- <option selected="disabled">Select Skill make</option> --}}
                                        @foreach ($makes as $make)
                                        <option value="{{$make->id}}"
                                            @if ($make->id==$vehicles->make_id)
                                               selected 
                                            @endif>{{$make->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            <div>
                                <label for="name">Serial Num.</label>
                                <input type="text" class="form-control" name="serialnum" value="{{$vehicles->serialnum}}">
                            </div>
                            <div>
                                <label for="name">Model.</label>
                                <input type="text" class="form-control" name="model" value="{{$vehicles->model}}">
                            </div>
                            <div>
                                <label for="name">Engine Num.</label>
                                <input type="text" class="form-control" name="engine" value="{{$vehicles->engine}}">
                            </div>
                            <div>
                                <label for="name">Drive Train Count</label>
                                <input type="number" class="form-control" name="drivetraincount" min="0"
                                oninput="validity.valid||(value='')" value="{{$vehicles->drivetraincount}}">
                            </div>
                            <div>
                                <label for="name">Door Count</label>
                                <input type="number" class="form-control" name="doorcount" min="0"
                                oninput="validity.valid||(value='')" value="{{$vehicles->doorcount}}">
                            </div>
                            <div>
                                <label for="name">Num of Cylinders</label>
                                <input type="number" class="form-control" name="cylindernum" min="0"
                                oninput="validity.valid||(value='')" value="{{$vehicles->cylindernum}}">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('vehicles.index') }}" class="btn btn-default">Cancel</a>

                    </div>
                    </form>
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