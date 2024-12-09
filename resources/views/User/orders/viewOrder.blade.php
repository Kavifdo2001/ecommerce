@extends('User.layouts.userFront')
@section('content')

    <style>
        strong,p{
            color: black;
        }
    </style>
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>View Order</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">View Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->
    <div class="main_content">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        @php
                                            $images = json_decode($item->product->images);
                                            $firstImage = $images[0] ?? 'path/to/default/image.jpg';
                                        @endphp
                                        <td>
                                            <img src="{{ asset($firstImage) }}" alt="Product Image" width="50" height="50">
                                            {{ $item->product->name }}
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ $item->total }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br>
                            <div class="order_summary">
                                <p><strong>Order No:</strong> &nbsp; {{ $order->order_no }}</p>
                                <p><strong>Total:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${{ $order->grand_total }}</p>
                                <p><strong>Order Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
                                <p><strong>Order Notes:</strong> {{ $order->additional }}</p>

                            </div>
                        </div>
                        <a href="{{ route('user.index') }}" class="btn btn-fill-out">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
