@extends('User.layouts.userFront')
@section('content')

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Product Detail</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">Product Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <!-- START MAIN CONTENT -->
    @if ($message = Session::get('success'))
        <div class="alert alert-secondary alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <div class="product-image">
                            <div class="product_img_box">
                                {{-- <img id="product_img" src="{{ asset($products->images[0]) }}" data-zoom-image="{{ asset($products->images[0]) }}" alt="{{ $products->name }}"/> --}}
                                <a href="#" class="product_img_zoom" title="Zoom">
                                    <span class="linearicons-zoom-in"></span>
                                </a>
                            </div>
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                                @foreach ($products->images as $index => $image)
                                    <div class="item">
                                        <a href="#" class="product_gallery_item @if($index == 0) active @endif" data-image="{{ asset($image) }}" data-zoom-image="{{ asset($image) }}">
                                            <img src="{{ asset($image) }}" alt="product_small_img{{ $index + 1 }}" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-6 col-md-6">
                        <form action="{{route('cart.add')}}" method="POST">
                            @csrf
                        <div class="pr_detail">
                            <div class="product_description">
                                <h4 class="product_title">{{$products->name}}</h4>
                                <input type="hidden" name="product_id" value="{{$products->id}}">
                                <div class="product_price">
                                    <span class="price">{{$products->amount}}</span>
                                    <input type="hidden" name="amount" value="{{$products->amount}}">
                                    <del>$12{{$products->del_amount}}</del>
{{--                                    <div class="on_sale">--}}
{{--                                        <span>35% Off</span>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="pr_desc">
                                   <p>{{$products->description}}</p>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa
                                        enim. Nullam id varius nunc id varius nunc.</p>
                                </div>
                            </div>

                            <hr />
                            <div class="cart_extra">
                                <div class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </div>
                                <div class="cart_btn">
                                    @auth
                                        <button class="btn btn-fill-out btn-addtocart" type="submit" {{ $isInCart ? 'disabled' : '' }}>
                                            {{ $isInCart ? 'Already in Cart' : 'Add to cart' }}
                                        </button>
                                    @else
                                        <button class="btn btn-fill-out btn-addtocart" type="button" onclick="return alert('Please log in to add to the cart')">
                                            <i class="icon-basket-loaded"></i> Add to cart
                                        </button>
                                    @endauth
                                    <a class="add_wishlist" href="#"><i class="icon-heart" style="color: black"></i></a>
                                </div>
                            </div>
                            <hr/>
                        </div>
                        </form>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-dark" id="Description-tab" data-toggle="tab"
                                       href="#Description" role="tab" aria-controls="Description" aria-selected="true" style="color: black">
                                        Description
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info"
                                       role="tab" aria-controls="Additional-info" aria-selected="false">
                                        Additional info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab"
                                       aria-controls="Reviews" aria-selected="false">
                                        Reviews (2)
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                    {{$products->description}}
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Capacity</td>
                                            <td>5 Kg</td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td>Black, Brown, Red,</td>
                                        </tr>
                                        <tr>
                                            <td>Water Resistant</td>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Material</td>
                                            <td>Artificial Leather</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                    <div class="comments">
                                        <h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5>
                                        <ul class="list_none comment_list mt-4">
                                            <li>
                                                <div class="comment_img">
                                                    <img src="assets/images/user1.jpg" alt="user1"/>
                                                </div>
                                                <div class="comment_block">
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:80%"></div>
                                                        </div>
                                                    </div>
                                                    <p class="customer_meta">
                                                        <span class="review_author">Alea Brooks</span>
                                                        <span class="comment-date">March 5, 2018</span>
                                                    </p>
                                                    <div class="description">
                                                        <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="comment_img">
                                                    <img src="assets/images/user2.jpg" alt="user2"/>
                                                </div>
                                                <div class="comment_block">
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:60%"></div>
                                                        </div>
                                                    </div>
                                                    <p class="customer_meta">
                                                        <span class="review_author">Grace Wong</span>
                                                        <span class="comment-date">June 17, 2018</span>
                                                    </p>
                                                    <div class="description">
                                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="review_form field_form">
                                        <h5>Add a review</h5>
                                        <form class="row mt-3">
                                            <div class="form-group col-12">
                                                <div class="star_rating">
                                                    <span data-value="1"><i class="far fa-star"></i></span>
                                                    <span data-value="2"><i class="far fa-star"></i></span>
                                                    <span data-value="3"><i class="far fa-star"></i></span>
                                                    <span data-value="4"><i class="far fa-star"></i></span>
                                                    <span data-value="5"><i class="far fa-star"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                                            </div>

                                            <div class="form-group col-12">
                                                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="small_divider"></div>
                        <div class="divider"></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>

            </div>
        </div>
        <!-- END SECTION SHOP -->
    </div>
    <!-- END MAIN CONTENT -->
    <script>
        function addToCart(productId, productName, productPrice, productImage) {
            event.preventDefault(); // Prevent the form from submitting

            const quantity = document.querySelector('input[name="quantity"]').value;

            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: productId,
                    product_name: productName,
                    product_price: productPrice,
                    product_image: productImage,
                    quantity: quantity
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCartCount();
                        updateCartItems();
                        alert(data.success);
                    }
                });
        }
    </script>

{{--    <script>--}}
{{--        function addToCart(productId, productName, productPrice) {--}}
{{--            const quantity = document.querySelector('input[name="quantity"]').value;--}}

{{--            fetch('/cart/add', {--}}
{{--                method: 'POST',--}}
{{--                headers: {--}}
{{--                    'Content-Type': 'application/json',--}}
{{--                    'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
{{--                },--}}
{{--                body: JSON.stringify({--}}
{{--                    product_id: productId,--}}
{{--                    product_name: productName,--}}
{{--                    product_price: productPrice,--}}
{{--                    quantity: quantity--}}
{{--                })--}}
{{--            })--}}
{{--                .then(response => response.json())--}}
{{--                .then(data => {--}}
{{--                    if(data.success) {--}}
{{--                        updateCartCount();--}}
{{--                        alert(data.success);--}}
{{--                    }--}}
{{--                });--}}
{{--        }--}}
{{--    </script>--}}


@endsection
