@extends('admin.layouts.admin')
@section('content')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Admin</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
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
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
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
                            <div class="card-header" >
                                <h3 class="card-title text-white"> Admin</h3>
                            </div>

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('update.admin', $user->id)}}" enctype="multipart/form-data">
                                @csrf <!-- CSRF Protection -->
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-6 col-sm-6">
                                            <label for="exampleInputName">First Name</label>
                                            <input type="text" name="f_name" class="form-control" id="exampleInputName" value="{{$user->f_name}}">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label for="exampleInputName">Last Name</label>
                                            <input type="text" name="l_name" class="form-control" id="exampleInputName" value="{{$user->l_name}}">
                                        </div>


                                    </div>

                                    <div class="form-group row">

                                        <div class="col-md-4 col-sm-12">
                                            <label for="exampleInputPassword">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                        </div>


                                    </div>



                                    <div class="form-group row">

                                        <div class="col-md-4 col-sm-12">
                                            <label for="exampleInputLocation">Contact</label>
                                            <input type="tel" name="contact" class="form-control" value="{{$user->contact}}">
                                        </div>

{{--                                        <div class="col-md-4 col-sm-12">--}}
{{--                                            <label for="exampleInputLocation">Password</label>--}}
{{--                                            <input type="text" class="form-control" value="{{$user->password}}">--}}
{{--                                        </div>--}}
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn bg-orange text-white">Update</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br>
    <br>
    <!-- /.card -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

@endsection
