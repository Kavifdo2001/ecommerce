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
                        <h1>Add Product</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
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
                                <h3 class="card-title text-white">Add Product</h3>
                            </div>

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('add.product')}}" enctype="multipart/form-data">
                                @csrf <!-- CSRF Protection -->
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-8 col-sm-12">
                                            <label for="exampleInputName">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Product Name" >
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="exampleInputPassword">Product Image</label>
                                            <input type="file" name="images[]" class="form-control" multiple>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 col-sm-12">
                                            <label>Category</label>

                                            <select type="text" class="form-control" name="category" id="categorySelect">
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label>Sub Category</label>
                                            <select type="text" class="form-control" name="sub_category" id="subCategorySelect">
                                                @foreach($subCategories as $subCategory)
                                                    <option value="{{$subCategory->id}}" data-parent="{{$subCategory->parent_id}}">{{$subCategory->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleInputContact">Description</label>
                                            <textarea type="text" name="description" class="form-control" id="exampleInputContact" placeholder="Description"></textarea>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="exampleInputLocation">Quantity</label>
                                            <input type="number" class="form-control" name="quantity">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword">Amount</label>
                                                <input type="number" name="amount" class="form-control" id="exampleInputPassword" placeholder="Enter Price" min="0" step="0.01">
                                            </div>
                                        </div>

                                    </div>

                                    @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn bg-orange text-white">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.card -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    document.getElementById('categorySelect').addEventListener('change', function() {
        var selectedCategory = this.value;
        var subCategorySelect = document.getElementById('subCategorySelect');

        // Clear existing options
        subCategorySelect.innerHTML = '<option value="" disabled>Select Sub Category</option>';

        // Populate subcategories based on selected category
        @foreach($subCategories as $subCategory)
        if ('{{$subCategory->parent_id}}' == selectedCategory) {
            var option = document.createElement('option');
            option.value = '{{$subCategory->id}}';
            option.text = '{{$subCategory->category_name}}';
            subCategorySelect.appendChild(option);
        }
        @endforeach
    });
</script>





@endsection
