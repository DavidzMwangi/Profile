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
                    <h1>Media</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Media</li>
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
                        <h3 class="card-title">Media</h3>

                        <button data-target="#new_coutry_modal" data-toggle="modal" class="btn btn-success float-right" >Add Media</button>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Media Name</th>
                                <th>Description</th>
                                <th>Link</th>
                                <th>Picture</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medias as $media)


                                <tr>
                                    <td>{{$media->name}}</td>
                                    <td>{{$media->description}} </td>
                                    <td>{{$media->link}} </td>
                                    <td><img src="{{asset('uploads/media/'.$media->picture)}}" class="img img-size-64"> </td>
                                    <td><a href="{{route('backend.delete_media',$media->id)}}"> <span  class="fa fa-trash"></span></a></td>
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
                    <h5 class="modal-title">Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('backend.save_new_media')}}" method="post" enctype="multipart/form-data">
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
                                <label for="link">Link</label>
                                <input class="form-control" name="link" id="link">
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
                                                                                <input type="file"  class="img img-responsive" name="user_pic" ></span>
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