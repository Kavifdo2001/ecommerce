@extends('User.layouts.userFront')
@section('content')

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                @if ($message = Session::get('error'))
                    <div class="alert alert-secondary alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form action="{{route('order.store')}}" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s1">
                            <h4>Billing Details</h4>
                        </div>


                            <div class="heading_s1">
                                <h4>Additional information</h4>
                            </div>
                            <div class="form-group mb-0">
                                <textarea rows="5" class="form-control" name="additional" placeholder="Order notes"></textarea>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="heading_s1">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table">

                                    @csrf
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cartItems as $cart)
                                            <tr>
                                                @php
                                                    $images = json_decode($cart->product->images);
                                                    $firstImage = $images[0] ?? 'path/to/default/image.jpg';
                                                @endphp
                                                <td class="product-thumbnail"><img src="{{ asset($firstImage) }}" alt="product" width="50" height="50"></td>
                                                <td>{{ $cart->product->name }} <span class="product-qty">x {{ $cart->quantity }}</span></td>
                                                <td>${{ $cart->total }}</td>
                                                <input type="hidden" name="products_id[]" value="{{ $cart->product->id }}">
                                                <input type="hidden" name="quantities[]" value="{{ $cart->quantity }}">
                                                <input type="hidden" name="totals[]" value="{{ $cart->total }}">
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Total</th>
                                            <td class="product-subtotal">${{ $grandTotal }}</td>

                                        </tr>
                                        </tfoot>
                                    </table>
                                    <input type="hidden" name="grand_total" value="{{$grandTotal}}">
                                    <button type="submit" class="btn btn-fill-out btn-block">Place Order</button>

                            </div>
                        </div>
                    </div>

                </div>
                    <input type="hidden" name="order_no" value="{{$newQuoteNo}}" readonly>
                </form>
            </div>
        </div>
        <!-- END SECTION SHOP -->


    </div>
    <!-- END MAIN CONTENT -


@endsection
