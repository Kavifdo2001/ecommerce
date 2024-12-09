@extends('User.layouts.userFront')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    .section {
        width: 100%;
        height: 400px; /* Adjust height as needed */
    }

    .background_bg {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .furniture_banner {
        padding: 20px;
        color: white;
    }

    .btn-fill-out {
        background-color: white;
        color: black;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-fill-out:hover {
        background-color: black;
        color: white;
    }
</style>

<!-- START SECTION BANNER -->
<div class="banner_section full_screen staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow carousel_style2" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active background_bg overlay_bg_50" style="background-image: url('{{ asset('assets/images/my/bg_1.jpg') }}');">
                <div class="banner_slide_content banner_content_inner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-md-10">
                                <div class="banner_content text_white text-center">
                                    <img src="{{ asset('assets/images/Client Files- No Watermark/Iconic Mark/Icon-Invert.png') }}" alt="Descriptive Text" style="max-width: 350px; height: 350px; margin-bottom: 20px;">
                                    <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.4s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    <a class="btn btn-white staggered-animation" href="shop-left-sidebar.html" data-animation="fadeInUp" data-animation-delay="0.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- START SECTION CATEGORIES -->
<div class="section pt-0 small_pb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cat_overlap radius_all_5">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4">
                            <div class="text-center text-md-left">
                                <h4>Categories</h4>
                                <p class="mb-2">There are many variations of passages of Lorem</p>
                                <a href="#" class="btn btn-line-fill btn-sm">View All</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="cat_slider mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5"
                                 data-loop="true" data-dots="false" data-nav="true" data-margin="30"
                                 data-responsive='{"0":{"items": "1"}, "380":{"items": "2"}, "991":{"items": "3"}, "1199":{"items": "4"}}'>
                                @foreach($categories as $category)
                                    <div class="item">
                                        <div class="categories_box">
                                            <a href="#">
                                                @if (!empty($category->img))
                                                    <div style="display: inline-block; margin: 5px; position: relative;">
                                                        <img src="{{ asset($category->img) }}" alt="Category Image" width="100" height="100">
                                                    </div>
                                                @else
                                                    <p>No images available</p>
                                                @endif
                                                <i class="{{ $category->icon_class }}"></i>
                                                <span>{{ $category->category_name }}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CATEGORIES -->

<!-- START SECTION ABOUT -->
<div class="section">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-lg-6">
            	<div class="about_img scene mb-4 mb-lg-0">
                    <img src="{{ asset('assets/images/about_img.jpg') }}" alt="about_img"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="heading_s1">
                    <h2>Who We Are</h2>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quibusdam enim expedita sed nesciunt incidunt accusamus adipisci officia libero laboriosam!</p>
                <p>Proin gravida nibh vel velit auctor aliquet. Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION ABOUT -->

<!-- START SECTION WHY CHOOSE -->
<div class="section bg_light_blue2 pb_70">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8">
            	<div class="heading_s1 text-center">
                	<h2>Why Choose Us?</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
        </div>
        <div class="row justify-content-center">
        	<div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-pencil-alt"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Creative Design</h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-layers"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Flexible Layouts</h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-email"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Email Marketing</h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION WHY CHOOSE -->
<br>
<br>
<br>
<br>
<!-- START SECTION SHOP -->
<div class="section small_pt pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Our Top Products</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius.</p>
            </div>
        </div>

        <div class="row shop_container">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="product_box text-center">
                        <a href="{{ route('user.product.view', $product->id) }}">{{ $product->name }}</a>
                        <div class="product_img">
                            @php
                                $images = json_decode($product->images);
                                $firstImage = $images[0] ?? 'path/to/default/image.jpg'; // Provide a default image path if no images are available
                            @endphp
                            <a href="#">
                                <img src="{{ asset($firstImage) }}" alt="product_image">
                            </a>
                            <div class="product_action_box">
                                <ul class="list_none pr_action_btn">
                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_info">
                            <h6 class="product_title"><a href="{{ route('user.product.view', $product->id) }}">{{ $product->name }}</a></h6>
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
    </div>
</div>
<!-- END SECTION SHOP -->
<br>
<br>
<br>
<br>
<br>
@endsection
