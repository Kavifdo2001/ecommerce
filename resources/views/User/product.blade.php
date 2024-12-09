@extends('User.layouts.userFront')
@section('content')
    <br>
    <br>
<div class="row shop_container">
    @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-6">
            <div class="product_box text-center">
                <a href="{{ route('user.product.view', $product->id) }}">{{ $product->name }}</a>
                <div class="product_img">
                    @php
                        $images = json_decode($product->images);
                        $firstImage = $images[0] ?? 'path/to/default/image.jpg';
                    @endphp
                    <a href="{{ route('products.show', $product->id) }}">
                        <img src="{{ asset($firstImage) }}" alt="product_image">
                    </a>
                    <div class="product_action_box">
                        <ul class="list_none pr_action_btn">
                            <li><a href="#"><i class="icon-heart"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product_info">
                    <h6 class="product_title"><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h6>
                    <div class="product_price">
                        <span class="price">{{ $product->amount }}</span>
                    </div>
                    <div class="pr_desc">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
