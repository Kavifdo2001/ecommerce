@extends('admin.layouts.admin')
@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1>Admin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 col-md-12 mx-auto">
                        <!-- general form elements -->
                        {{--message--}}
{{--                        @if (count($errors) > 0)--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--                                <ul>--}}
{{--                                    @foreach ($errors->all() as $error)--}}
{{--                                        <li>{{ $error }}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        {{--end--}}
                        <div class="card card-orange">
                            <div class="card-header">
                                <h3 class="card-title text-white">Add Admin</h3>
                            </div>

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('create.admin')}}" enctype="multipart/form-data">
                                @csrf <!-- CSRF Protection -->
                                <div class="card-body">
                                    <div class="form row"></div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-sm-6">
                                            <label for="exampleInputName">First Name</label>
                                            <input type="text" name="f_name" class="form-control" id="exampleInputName" placeholder="First Name" required>

                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <label for="exampleInputName">Last Name</label>
                                            <input type="text" name="l_name" class="form-control" id="exampleInputName" placeholder="Last Name" required>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleInputName">Email</label>
                                            <input type="text" name="email" class="form-control" id="exampleInputName" placeholder="Enter Email" required>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleInputName">Contact</label>
                                            <input type="tel" name="contact" class="form-control" id="exampleInputName" placeholder="Enter Contact No." >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleInputName">Password</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputName" placeholder="Enter Password" required>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleInputName">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputName" placeholder="Enter Password" required>

                                        </div>
                                    </div>


                                    <div class="card-footer">
                                        <button type="submit" class="btn bg-orange text-white">Submit</button>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <h6>All Admins</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($admin as $user)
                                        <tr>
                                            <td>{{$user->f_name}} {{$user->l_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->contact}}</td>
                                            <td>
                                                <a href="{{route('admin.edit',$user->id)}}" class="btn btn-dark btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a href="{{route('delete.admin',$user->id)}}" class="btn btn-warning btn-sm" onclick="return confirm('Do you want to delete?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>


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
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <br>
    <br>



@endsection
