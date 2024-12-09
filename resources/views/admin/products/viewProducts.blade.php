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
                        <h1>View Product</h1>
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

                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-8 col-sm-12">
                                            <label for="exampleInputName">Name</label>
                                            <input  class="form-control" value="{{$product->name}}" readonly>
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
{{--                                                                <button type="button" class="btn btn-danger btn-sm" style="position: absolute; top: 5px; right: 5px;" onclick="removeImage('{{ $index }}')">Remove</button>--}}
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
                                            <input class="form-control" value="{{$product->categorys->category_name}}" readonly>

                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label>Sub Category</label>
                                            <input  class="form-control"   value="{{$product->subcategory->category_name}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleInputContact">Description</label>
                                            <textarea  class="form-control" readonly>{{$product->description}}</textarea>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <label for="exampleInputLocation">Quantity</label>
                                            <input class="form-control" value="{{$product->quantity}}" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4-md-2 col-sm-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword">Amount</label>
                                                <input class="form-control" value="{{$product->amount}}" readonly>
                                            </div>
                                        </div>

                                    </div>

                                    @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- /.card-body -->


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
