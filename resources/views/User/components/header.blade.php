<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar" style="background-color: black;">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="lng_dropdown mr-2">
                        </div>
                        <div class="mr-3">
                        </div>
                        <ul class="contact_detail text-center text-lg-left">
                            <li>
                                <i class="ti-mobile" style="color: white;"></i>
                                <span style="color: white;">123-456-7890</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-center text-md-right">
                        <ul class="header_list">
                            @guest
                                @if(Route::has('login'))
                                    <li><a href="{{ route('login') }}" style="color: white;"><i class="ti-user"></i><span>Login</span></a></li>
                                @endif
                            @else
                                <a class="nav-li" href="@if(Auth::user()->type == 'user')@endif">
                                    <a class="btn btn-primary" href="{{ route('user.profile') }}" style="background-color: black; color: white;">{{ Auth::user()->f_name . ' ' . Auth::user()->l_name }}

                                </a>

                                <a class="nav-li" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <button class="btn btn-primary" style="background-color: black; color: white;">{{ __('Logout') }}</button>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ route('user.index') }}">
                    <img class="logo_light" src="assets/images/Client Files- No Watermark/WordMark/Wordmark-Invert.png" alt="logo" style="width: 120px; height: 50px;" />
                    <img class="logo_dark" src="assets/images/Client Files- No Watermark/WordMark/Wordmark-Invert.png" alt="logo" style="width: 120px; height: 50px;" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu" style="color: white;"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li><a class="nav-link nav_item" href="{{ route('user.index') }}" style="color: white;">Home</a></li>
                        <li><a class="nav-link nav_item" href="{{ route('user.product') }}" style="color: white;">Products</a></li>

                        <li><a class="nav-link nav_item" href="{{ route('user.aboutUs') }}" style="color: white;">About Us</a></li>

                        <li><a class="nav-link nav_item" href="{{ route('user.contactUs') }}" style="color: white;">Contact Us</a></li>

                    </ul>
                </div>
                <li class="dropdown cart_dropdown">
                    <a class="nav-link cart_trigger" href="#" data-toggle="dropdown">
                        <i class="linearicons-cart" style="color: white;"></i>
                        <span class="cart_count" style="color: white;">{{ $cartItemCount }}</span>
                    </a>

                    <div class="cart_box dropdown-menu dropdown-menu-right">
                        <ul class="cart_list" id="cart_list">
                            @foreach($cartItems as $cart)
                                @php
                                    $images = json_decode($cart->product->images);
                                    $firstImage = $images[0] ?? 'path/to/default/image.jpg';
                                @endphp
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close" style="color: white;"></i></a>
                                    <a href="#"><img src="{{ asset($firstImage) }}" alt="cart_thumb1" /></a>
                                    <span class="cart_quantity">{{ $cart->quantity }} x <span class="cart_amount"><span class="price_symbole">$</span></span>{{ $cart->product->amount }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="cart_footer">
                            @auth
                                <p class="cart_buttons">
                                    <a href="{{ route('cart.view') }}" class="btn btn-fill-line rounded-0 view-cart" style="color: white; background-color: black; width: 100%; margin-bottom: 5px;">View Cart</a>
                                    <a href="{{ route('orders.history') }}" class="btn btn-fill-line rounded-0 view-cart" style="color: white; background-color: black; width: 100%;">Orders</a>
                                    <a href="{{ route('user.wishlist') }}" class="btn btn-fill-line rounded-0 view-cart" style="color: white; background-color: black; width: 100%;">Wishlist</a>
                                </p>
                            @else
                                <p class="cart_buttons">
                                    <a href="" class="btn btn-fill-line rounded-0 view-cart" onclick="return alert('Please log in to view cart')" style="color: white; background-color: black; width: 100%; margin-bottom: 5px;">View Cart</a>
                                    <a href="" class="btn btn-fill-line rounded-0 view-cart" onclick="return alert('Please log in to view cart')" style="color: white; background-color: black; width: 100%;">Orders</a>
                                    <a href="" class="btn btn-fill-line rounded-0 view-cart" onclick="return alert('Please log in to view cart')" style="color: white; background-color: black; width: 100%;">Wishlist</a>
                                </p>
                            @endauth
                        </div>
                    </div>
                </li>
            </nav>
        </div>
    </div>
</header>
