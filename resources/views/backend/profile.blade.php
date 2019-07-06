@extends('backend.layouts.master')

@section('style')
    <link href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" />

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @php
            $user=\Illuminate\Support\Facades\Auth::user();

        @endphp
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('uploads/profile/'. $user->picture)}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">Software Engineer</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fa fa-pencil mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="fa fa-file-text-o mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Basic Info</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="#picture" data-toggle="tab">Picture</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">


                                <div class="active tab-pane" id="activity">
                                    <form class="form-horizontal" method="post" action="{{route('backend.update_user_data_1')}}">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName" name="name" value="{{$user->name}}" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" name="email" value="{{$user->email}}" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email 2</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email_2" id="inputEmail" value="{{$user->email_2}}" placeholder="Email 2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-10 control-label">Phone Number</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail" name="phone" value="{{$user->phone}}" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-10 control-label">Phone Number 2</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail" name="phone_2"  value="{{$user->phone_2}}" placeholder="Phone Number 2">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->


                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" method="post" action="{{route('backend.update_user_data_2')}}">

                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-10 control-label">Completed Works</label>

                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" value="{{$user->completed_works}}" name="completed_works" id="inputName" placeholder="Completed Works">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-10 control-label">Completed Years</label>

                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" value="{{$user->completed_years}}" id="inputEmail" name="completed_years" placeholder="Completed Years">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName2" class="col-sm-10 control-label">No Of Clients</label>

                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="inputName2" value="{{$user->clients}}" name="no_of_clients" placeholder="No of Clients">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputExperience" class="col-sm-10 control-label">Profile Description</label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience" name="profile_description" placeholder="Profile Description">
                                                    {{$user->profile_description}}
                                                </textarea>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="picture">

                                    <div class="box-body">
                                        @if(count($errors->all())>0)
                                            <div class="alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </div>

                                        @endif

                                        <form role="form" name="businessPic" method="post" action="{{route('backend.update_user_picture')}}" enctype="multipart/form-data">

                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img alt="image"    src=" {{asset('uploads/profile/'. $user->picture)}}" class="img img-responsive img-thumbnail">

                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"  ></div>
                                                    <div id="image_btn">
                                                                            <span class="btn btn-default btn-file">
                                                                                <span class="fileinput-new">Select image</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file"  class="img img-responsive" name="user_pic" ></span>
                                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        <input type="submit"  class="btn btn-success fileinput-exists">

                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @endsection
@section('script')
    <script src="{{asset('plugins/holder-master/holder.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jasny-bootstrap/js/jasny-bootstrap.js')}}"></script>
    @endsection
