@extends('admin.layouts.admin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>View Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <!-- Display Validation Errors -->
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

                    <!-- Display Success Message -->
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <!-- Main Category Section -->
                    <div class="card card-orange">
                        <div class="card-header">
                            <h3 class="card-title text-white">Main Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- Display Main Category Details -->
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-8 col-sm-12">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="categoryName" value="{{ $category->category_name }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Subcategory Section -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <!-- Display Subcategories -->
                    <div class="card card-orange">
                        <div class="card-header">
                            <h3 class="card-title text-white">Sub Categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Subcategory Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($subCategories as $subcategory)
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" value="{{ $subcategory->category_name }}" readonly>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="1">No subcategories found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->

@endsection
