@extends('admin.layouts.admin')
@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1>Categories</h1>
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
                        <!-- General Form Elements -->
                        {{-- Display Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
        
                        {{-- Display Success Message --}}
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
        
                        <div class="card card-orange">
                            <div class="card-header">
                                <h3 class="card-title text-white">Add Category</h3>
                            </div>
                            <!-- /.card-header -->
                            
                            <!-- Form Start -->
                            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf <!-- CSRF Protection -->
                                <div class="card-body">
                                    <!-- Category Name Input -->
                                    <div class="form-group row">
                                        <div class="col-md-8 col-sm-12">
                                            <label for="categoryName">Category Name</label>
                                            <input type="text" name="category_name" class="form-control" id="categoryName" placeholder="Enter Category Name" required>
                                        </div>
                                    </div>
        
                                    <!-- Category Image Upload -->
                                    <div class="form-group row">
                                        <div class="col-md-8 col-sm-12">
                                            <label for="categoryImage">Category Image</label>
                                            <input type="file" name="img" class="form-control-file" id="categoryImage">
                                        </div>
                                    </div>
        
                                    <!-- Submit Button -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn bg-orange text-white">Submit</button>
                                    </div>
                                </div>
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
                                        <h6>Category Table</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Main Category</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->category_name}}</td>

                                            <td>
                                                <a href="{{route('view.category',$category->id)}}" class="btn btn-dark btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{route('view.subCategory',$category->id)}}" class="btn btn-success btn-sm">Add Sub Category&nbsp;
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a href="{{route('edit.category',$category->id)}}" class="btn btn-primary btn-sm">Edit Category&nbsp;
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{route('delete.category',$category->id)}}" class="btn btn-warning btn-sm" onclick="return confirm('Do you want to delete?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>


                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Category Name</th>

                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
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
