@extends('User.layouts.userFront')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    @if ($message = Session::get('success'))
        <div class="alert alert-secondary alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Shopping Cart</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Shopping Cart</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody id="cart-items-body">
                            @foreach($cartItems as $cart)
                                <tr>
                                    @php
                                        $images = json_decode($cart->product->images);
                                        $firstImage = $images[0] ?? 'path/to/default/image.jpg';
                                    @endphp
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset($firstImage) }}" alt="product1"></a></td>
                                    <td class="product-name" data-title="Product"><a href="#">{{$cart->product->name}}</a></td>
                                    <td class="product-price" data-title="Price">{{$cart->product->amount}}</td>
                                    <td class="product-quantity" data-title="Quantity">
                                        <div class="quantity">
                                            <input type="button" value="-" class="minus">
                                            <input type="text" name="quantity" value="{{$cart->quantity}}" title="Qty" class="qty" size="4">
                                            <input type="button" value="+" class="plus">
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Total">${{$cart->total}}</td>
                                    <td class="product-remove" data-title="Remove"><a href="{{route('cart.remove', $cart->id)}}"><i class="ti-close"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="6" class="px-0">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-4 col-md-6 mb-3 mb-md-0"></div>
                                        <div class="col-lg-8 col-md-6 text-left text-md-right">
                                            <button class="btn btn-line-fill btn-sm" type="submit">Update Cart</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Cart Totals</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong>${{$grandTotal}}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{route('cart.checkout')}}" id="proceed-button" class="btn btn-fill-out">Proceed To CheckOut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->



</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var cartItemsBody = document.getElementById('cart-items-body');
        var proceedButton = document.getElementById('proceed-button');

        if (cartItemsBody.children.length === 0) {
            proceedButton.disabled = true;
            proceedButton.classList.add('disabled');
        }
    });
</script>
@endsection

