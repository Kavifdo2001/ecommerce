@extends('admin.layouts.admin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Edit Category</h1>
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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    {{--end--}}
                    <div class="card card-orange">
                        <div class="card-header">
                            <h3 class="card-title text-white">Update Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('update.category', $category->id) }}" enctype="multipart/form-data">
                            @csrf <!-- CSRF Protection -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="categoryName">Category Name</label>
                                        <input type="text" name="category_name" class="form-control" id="categoryName" value="{{ old('category_name', $category->category_name) }}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="categoryImage">Category Image</label>
                                        <input type="file" name="category_image" class="form-control" id="categoryImage">
                                        @if ($category->image)
                                            <div class="mt-2">
                                                <label>Current Image:</label>
                                                <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="100">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-orange text-white">Update</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-md-12 mx-auto">
                    <!-- general form elements -->
                    <div class="card card-orange">
                        <div class="card-header">
                            <h3 class="card-title text-white">Update Subcategories</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('update.subCategory') }}" enctype="multipart/form-data">
                            @csrf <!-- CSRF Protection -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Subcategory Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subCategories as $subcategory)
                                        <tr>
                                            <td>
                                                <input type="text" name="sub_category[{{ $subcategory->id }}]" class="form-control" value="{{ old('sub_category.' . $subcategory->id, $subcategory->category_name) }}">
                                            </td>
                                            <td>
                                                <a href="{{ route('delete.category', $subcategory->id) }}" class="btn btn-warning btn-sm" onclick="return confirm('Do you want to delete?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-orange text-white">Update</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<br>
<br>

@endsection
