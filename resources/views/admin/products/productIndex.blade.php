@extends('admin.layouts.admin')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1>Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
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
                        <div class="card">
                            <div class="card-header">
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <a href="{{route('product.create')}}" class="btn bg-orange text-white mb-3">Add Products</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Images</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                @if (!empty($product->images))
                                                    @php
                                                        $images = json_decode($product->images, true);
                                                    @endphp
                                                    @if (is_array($images))
                                                        @foreach ($images as $image)
                                                            <img src="{{ asset($image) }}" alt="Product Image" width="50" height="50">
                                                        @endforeach
                                                    @else
                                                        <p>No images available</p>
                                                    @endif
                                                @else
                                                    <p>No images available</p>
                                                @endif
                                            </td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->amount}}</td>
                                            <td>
                                                <a href="{{route('product.view',$product->id)}}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Images</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Price</th>
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
