@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Fault
            <small>All Faults</small>
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
           <span class="fa fa-plus"></span> Add Fault
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
                                    <th>Category</th>
                                    <th>Vehicle</th>
                                    <th>Problem</th>
                                    <th>Cause</th>
                                    <th>Solution</th>
                                    <th>Created By</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faults as $fault)
                                <tr>
                                    <td>{{$fault->category->name}}</td>
                                    <td>{{$fault->vehicle->make->name.' - '.$fault->vehicle->model.' : '.$fault->vehicle->serialnum}}</td>
                                    <td>{{$fault->problem}}</td>
                                    <td>{{$fault->cause}}</td>
                                    <td>{{$fault->solution}}</td>
                                    <td>{{$fault->user->lastname.' - '.$fault->user->firstname}}</td>
                                    <td><a href="{{ route('faults.show',$fault->id) }}"><span
                                        class="fa fa-eye fa-2x text-primary"></span></a></td>
                                    
                                <td><a href="{{ route('faults.edit',$fault->id) }}"><span class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$fault->id}}" style="display: none"
                                            action="{{ route('faults.destroy',$fault->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$fault->id}}').submit();
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
                                        <th>Category</th>
                                    <th>Vehicle</th>
                                    <th>Problem</th>
                                    <th>Cause</th>
                                    <th>Solution</th>
                                    <th>Created By</th>
                                    <th>View</th>
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

                <form action="{{ route('faults.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><span class="fa fa-ticket"></span> Add Fault</h4>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                        <label for="">Vehicle Part</label>
                                        <select name="category_id" class="form-control">
                                            <option selected="disabled">Select Vehicle Part</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="form-group">
                                        <label for="">Vehicle</label>
                                        <select name="vehicle_id" class="form-control">
                                            <option selected="disabled">Select Vehicle</option>
                                            @foreach ($vehicles as $vehicle)
                                            <option value="{{$vehicle->id}}">{{$vehicle->make->name.' - '.$vehicle->model.' : '.$vehicle->serialnum}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                            <label for="">Problem</label>
                                        <input type="text" class="form-control" name="problem" placeholder="Vehicle Problem">
                                    </div> 

                                    <div class="form-group">
                                            <label for="">Cause</label>
                                            <textarea name="cause" class="form-control" cols="10" rows="3"></textarea>
                                        </div>
                                    <div class="form-group">
                                            <label for="">Soultion</label>
                                            <textarea name="solution" class="form-control" cols="10" rows="3"></textarea>
                                        </div>
                                        <div>
                                            <label for="">Upload Faulty Vehicle part image</label>
                                            <input type="file" name="imagename">
                                        </div>  
                                        
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    
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