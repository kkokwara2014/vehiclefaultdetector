@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Vehicle
            <small>All Vehicles</small>
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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
           <span class="fa fa-plus"></span> Add Vehicle
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Make</th>
                                    <th>Serial Num.</th>
                                    <th>Model</th>
                                    <th>Engine</th>
                                    <th>Drive Train Num.</th>
                                    <th>Door Count</th>
                                    <th>Cylinder Num.</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td>{{$vehicle->make->name}}</td>
                                    <td>{{$vehicle->serialnum}}</td>
                                    <td>{{$vehicle->model}}</td>
                                    <td>{{$vehicle->engine}}</td>
                                    <td>{{$vehicle->drivetraincount}}</td>
                                    <td>{{$vehicle->cylindernum}}</td>
                                <td><a href="{{ route('vehicles.edit',$vehicle->id) }}"><span class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$vehicle->id}}" style="display: none"
                                            action="{{ route('vehicles.destroy',$vehicle->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$vehicle->id}}').submit();
                                                            } else {
                                                                event.preventDefault();
                                                            }
                                                        "><span class="fa fa-trash fa-2x text-danger"></span>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                        <th>Make</th>
                                        <th>Serial Num.</th>
                                        <th>Model</th>
                                        <th>Engine</th>
                                        <th>Drive Train Num.</th>
                                        <th>Door Count</th>
                                        <th>Cylinder Num.</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>


        {{-- Data input modal area --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">

                <form action="{{ route('vehicles.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><span class="fa fa-car"></span> Add Vehicle</h4>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                        <label for="">Vehicle Make</label>
                                        <select name="make_id" class="form-control">
                                            <option selected="disabled">Select Vehicle Make</option>
                                            @foreach ($makes as $make)
                                            <option value="{{$make->id}}">{{$make->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                            <label for="">Serial Number</label>
                                        <input type="text" class="form-control" name="serialnum" placeholder="Vehicle Serial Number" maxlength="17">
                                    </div> 
                                    <div class="form-group">
                                            <label for="">Model</label>
                                        <input type="text" class="form-control" name="model" placeholder="Vehicle Model" maxlength="4">
                                    </div> 
                                    <div class="form-group">
                                            <label for="">Engine Number</label>
                                        <input type="text" class="form-control" name="engine" placeholder="Vehicle Engine Number">
                                    </div> 
                                    <div class="form-group">
                                            <label for="">Drive Train Count</label>
                                        <input type="number" class="form-control" name="drivetraincount" min="0"
                                        oninput="validity.valid||(value='')">
                                    </div> 
                                    <div class="form-group">
                                            <label for="">Door Count</label>
                                        <input type="number" class="form-control" name="doorcount" min="0"
                                        oninput="validity.valid||(value='')">
                                    </div> 
                                    <div class="form-group">
                                            <label for="">Cylinder Count</label>
                                        <input type="number" class="form-control" name="cylindernum" min="0"
                                        oninput="validity.valid||(value='')">
                                    </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->

                </form>
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

       
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