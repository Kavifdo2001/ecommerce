@extends('User.layouts.userFront')
@section('content')

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center order_complete">
                        <i class="fas fa-check-circle"></i>
                        <div class="heading_s1">
                            <h3>Your order is completed!</h3>
                        </div>
                        <p>Thank you for your order! Your order is being processed and will be completed within few minutes.</p>
                        <a href="{{route('user.index')}}" class="btn btn-fill-out">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

@endsection
