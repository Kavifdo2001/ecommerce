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
                        <h1>Edit Product</h1>
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
                                <h3 class="card-title text-white"> Product</h3>
                            </div>

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
                                @csrf <!-- CSRF Protection -->
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-8 col-sm-12">
                                            <label for="exampleInputName">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputName" value="{{$product->name}}">
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="exampleInputPassword">Product Image</label>
                                            <input type="file" name="images[]" class="form-control" multiple>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mt-3">
                                            <label>Available Images</label>
                                            <div>
                                                @if (!empty($product->images))
                                                    @php
                                                        $images = json_decode($product->images, true);
                                                    @endphp
                                                    @if (is_array($images))
                                                        @foreach ($images as $index => $image)
                                                            <div style="display: inline-block; margin: 5px; position: relative;">
                                                                <img src="{{ asset($image) }}" alt="Product Image" width="100" height="100">
                                                                <button type="button" class="btn btn-danger btn-sm" style="position: absolute; top: 5px; right: 5px;" onclick="removeImage('{{ $index }}')">Remove</button>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p>No images available</p>
                                                    @endif
                                                @else
                                                    <p>No images available</p>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 col-sm-12">
                                            <label>Category</label>
                                            <select type="text" class="form-control" name="category" id="categorySelect">
                                                <option value="{{$product->categorys->id}}" selected>{{$product->categorys->category_name}}</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label>Sub Category</label>
                                            <select type="text" class="form-control" name="sub_category" id="subCategorySelect">
                                                <option value="{{$product->subcategory->id}}" selected>{{$product->subcategory->category_name}}</option>
                                                @foreach($subCategories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleInputContact">Description</label>
                                            <textarea type="text" name="description" class="form-control" id="exampleInputContact" placeholder="Description">{{$product->description}}</textarea>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="exampleInputLocation">Quantity</label>
                                            <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword">Amount</label>
                                                <input type="number" name="amount" class="form-control" id="exampleInputPassword" placeholder="Enter Price" min="0" step="0.01" value="{{$product->amount}}">
                                            </div>
                                        </div>

                                    </div>

                                    @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn bg-orange text-white">Update</button>
                                </div>

                            </form>

                            <form id="removeImageForm" action="{{ route('product.removeImage', $product->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="image_index" id="imageIndex">
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
    <script>
        function removeImage(index) {
            if (confirm('Are you sure you want to remove this image?')) {
                document.getElementById('imageIndex').value = index;
                document.getElementById('removeImageForm').submit();
            }
        }
    </script>

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
            if ('{{$subCategory->parent_id}}' === selectedCategory) {
                var option = document.createElement('option');
                option.value = '{{$subCategory->id}}';
                option.text = '{{$subCategory->category_name}}';
                subCategorySelect.appendChild(option);
            }
            @endforeach
        });
    </script>



@endsection
