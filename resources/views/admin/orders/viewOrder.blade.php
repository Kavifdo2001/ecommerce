@extends('admin.layouts.admin')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1>Orders</h1>
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


        <!-- Main content -->

        <div class="main_content">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Order #{{ $order->id }}</h3>
                                </div>
                                <div class="card-body">

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <h4>Customer Details</h4>
                                            <p><strong>Name:</strong> {{ $order->user->name }}</p>
                                            <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                            <p><strong>Contact Number:</strong> {{ $order->user->contact_number }}</p>
                                            <p><strong>Address:</strong> {{ $order->user->address }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Order Details</h4>
                                            <p><strong>Order Amount:</strong> ${{ $order->grand_total }}</p>
                                            <p><strong>Status:</strong>
                                                @if($order->status === 'pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($order->status === 'approved')
                                                    <span class="badge badge-success">Approved</span>
                                                @elseif($order->status === 'rejected')
                                                    <span class="badge badge-danger">Rejected</span>
                                                @endif
                                            </p>
                                            <p><strong>Address:</strong> {{ $order->address }}</p>
                                            <p><strong>Reason for Rejection:</strong> {{ $order->reason ?? 'N/A' }}</p>
                                        </div>
                                    </div>


                                    <h4>Order Items</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($order->orderItems && $order->orderItems->isNotEmpty())
                                            @foreach($order->orderItems as $item)
                                                <tr>
                                                    @php
                                                        $images = json_decode($item->product->images ?? '[]');
                                                        $firstImage = $images[0] ?? 'path/to/default/image.jpg';
                                                    @endphp
                                                    <td>
                                                        <img src="{{ asset($firstImage) }}" alt="Product Image" width="50" height="50">
                                                        {{ $item->product->name ?? 'Unknown Product' }}
                                                    </td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>${{ $item->product->price ?? 0 }}</td>
                                                    <td>${{ $item->total }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4">No items found for this order.</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>

                                    <h4>Order Summary</h4>
                                    <p><strong>Order No:</strong> {{ $order->order_no }}</p>
                                    <p><strong>Total:</strong> ${{ $order->grand_total }}</p>
                                    <p><strong>Order Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
                                    <p><strong>Order Notes:</strong> {{ $order->additional }}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Back to Orders</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <br>
    <br>


@endsection
