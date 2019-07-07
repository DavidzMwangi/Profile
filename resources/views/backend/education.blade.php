@extends('backend.layouts.master')
@section('style')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables/dataTables.bootstrap4.css')}}">
    <link href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" />

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Education</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Education</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Education</h3>

                        <button data-target="#new_coutry_modal" data-toggle="modal" class="btn btn-success float-right" >Add New Education</button>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>

                            <tr>
                                <th>Education Name</th>
                                <th>Location</th>
                                <th>Education</th>
                                <th>Acquired Grade</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($educations as $education)


                                <tr>
                                    <td>{{$education->name}}</td>
                                    <td>{{$education->location}} </td>
                                    <td>{{$education->education}} </td>
                                    <td>{{$education->acquired_grade}} </td>
                                    <td><a href="{{route('backend.delete_education',$education->id)}}"> <span  class="fa fa-trash"></span></a></td>
                                </tr>

                            @endforeach

                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <div class="modal " tabindex="-1" role="dialog" id="new_coutry_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Education</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('backend.save_new_education')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="countries">Name</label>
                                <input class="form-control" name="name" type="text">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="counties_select">Location</label>
                                <input type="text" class="form-control" name="location" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="link">Education</label>
                                <input class="form-control" name="education" id="link">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="link">Acquired Grade</label>
                                <input class="form-control" name="acquired_grade" id="link">
                            </div>


                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success fileinput-exists" >Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables/dataTables.bootstrap4.js')}}"></script>

    <script src="{{asset('plugins/holder-master/holder.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jasny-bootstrap/js/jasny-bootstrap.js')}}"></script>
    <script>


        $('#example1').DataTable();
    </script>

@endsection