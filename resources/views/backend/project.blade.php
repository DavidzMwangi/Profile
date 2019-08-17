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
                    <h1>Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project</li>
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
                        <h3 class="card-title">Project</h3>

                        <button data-target="#new_coutry_modal" data-toggle="modal" class="btn btn-success float-right" >Add New Project</button>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>


                                <th>Project Name</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Skill Name</th>
                                <th>Client Name</th>
                                <th>Client Description</th>
                                <th>Language</th>
                                <th>Category</th>
                                <th>Picture</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->name}}</td>
                                    <td>{{$project->description}} </td>
                                    <td>{{$project->start_date}} - {{$project->end_date}} </td>
                                    <td>{{$project->skill->name}}  </td>
                                    <td>{{$project->client_name}} </td>
                                    <td>{{$project->client_description}} </td>
                                    <td>{{$project->language}} </td>
                                    <td>{{$project->category}} </td>
                                    <td><img src="{{asset('uploads/project/'.$project->picture)}}" class="img img-size-64"> </td>
                                    <td><a href="{{route('backend.delete_project',$project->id)}}"> <span  class="fa fa-trash"></span></a></td>
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
                    <h5 class="modal-title">Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('backend.save_new_project')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="countries">Name</label>
                                <input class="form-control" name="name" type="text">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="counties_select">Description</label>
                                <input type="text" class="form-control" name="description" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="link">Start Date</label>
                                <input class="form-control" name="start_date" type="date" id="link">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="link">End Date</label>
                                <input class="form-control" name="end_date" type="date" id="link">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="link">Client Name</label>
                                <input class="form-control" name="client_name" type="text" id="link">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="link">Client Description</label>
                                <input class="form-control" name="client_description" type="text" id="link">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="link">Language</label>
                                <input class="form-control" name="language" type="text" id="link">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="link">Category</label>
                                <input class="form-control" name="category" type="text" id="link">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="link">Skill</label>
                                <select class="form-control" name="skill_id">

                                    @foreach($skills as $skill)

                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                        @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="row">

                            <div class="form-group col-md-12">

                                <div class="box-body">
                                    @if(count($errors->all())>0)
                                        <div class="alert-danger">
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </div>

                                    @endif


                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img alt="image"    src="{{asset('uploads/image.png')}}" class="img img-responsive img-thumbnail">

                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"  ></div>
                                            <div id="image_btn">
                                                                            <span class="btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select image</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file"  class="img img-responsive" name="picture" ></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                {{--                                                    <input type="submit"  class="btn btn-success fileinput-exists">--}}

                                            </div>
                                        </div>
                                    </div>


                                </div>


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