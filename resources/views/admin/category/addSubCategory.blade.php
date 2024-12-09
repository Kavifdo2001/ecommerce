@extends('admin.layouts.admin')
@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1>Sub Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
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
                            <div class="card-header">
                                <h3 class="card-title text-white">Add Sub Category</h3>
                            </div>

                            <!-- /.card-header -->
                            <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-8 col-sm-12">
                                            <label for="exampleInputName">Main Category</label>
                                            <input  name="category_name" class="form-control" id="exampleInputName" placeholder="Enter Category Name" value="{{$mainCategory->category_name}}" readonly>

                                        </div>
                                    </div>


                                    <form method="POST" action="{{route('store.subCategory')}}" enctype="multipart/form-data">
                                        @csrf <!-- CSRF Protection -->
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-md-8 col-sm-12">
                                                    <label for="exampleInputName">Add Sub Category</label>
                                                    <input type="text" name="sub_category" class="form-control" id="exampleInputName" placeholder="Enter Sub Category Name" required>
                                                    <input type="hidden" name="category_id" class="form-control" id="exampleInputName" placeholder="Enter Sub Category Name" value="{{$mainCategory->id}}">

                                                </div>
                                            </div>


                                                <button type="submit" class="btn bg-orange text-white">Add</button>

                                        </div>
                                        <!-- /.card-body -->
                                    </form>

                                </div>
                                <!-- /.card-body -->

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
                                        <h6>Sub Category Table</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table  class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Category Name</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subCategories as $category)
                                        <tr>
                                            <td>{{$category->category_name}}</td>

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
