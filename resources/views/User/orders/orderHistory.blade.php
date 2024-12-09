@extends('User.layouts.userFront')
@section('content')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Order History</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">Order History</li>
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
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Order No</th>
{{--                                    <th>Products</th>--}}
{{--                                    <th>Total</th>--}}
{{--                                    <th>Notes</th>--}}
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $order->order_no }}</td>
{{--                                        <td>--}}
{{--                                            @foreach ($order->orderItems as $item)--}}
{{--                                                @php--}}
{{--                                                    $images = json_decode($item->product->images);--}}
{{--                                                    $firstImage = $images[0] ?? 'path/to/default/image.jpg';--}}
{{--                                                @endphp--}}
{{--                                                <img src="{{ asset($firstImage) }}" alt="" width="35" height="35">--}}
{{--                                                {{ $item->product->name }} (x{{ $item->quantity }})<br>--}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}
{{--                                        <td>${{ $order->grand_total }}</td>--}}
{{--                                        <td>{{ $order->additional }}</td>--}}
                                        <td>
                                            <a href="{{route('orders.view',$order->id)}}" class="btn btn-warning">View</a>
                                            <a href="{{route('orders.pdf',$order->id)}}" class="btn btn-warning" target="_blank">Invoice</a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No orders found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
