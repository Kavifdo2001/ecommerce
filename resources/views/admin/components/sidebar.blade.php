
<style>
    .brand-image-circle {
        border-radius: 50%;
        width: 35px; /* Adjust the width as needed */
        height: 35px; /* Adjust the height as needed */
        object-fit: cover; /* Ensures the image covers the circle area without distortion */
    }


    #mobile {
        height: 667px;
        width: 450px;
        background: #383838;
        position: relative;
        margin: 30px auto;
        -webkit-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        -khtml-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        -o-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    #mobileBodyContent {
        background: #000000;
        position: relative;
        z-index: 20;
        width: 100%;
        height: 100%;
        overflow: hidden;
        visibility: visible;
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        -khtml-transition: all 0.3s ease-in;
        -o-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
    }

    #header {
        height: 60px;
        background: #eae8e5;
    }

    #image {
        height: 280px;
        width: 100%;
        overflow: hidden;
        position: relative;
    }
    #image img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
    }

    #title {
        height: 20px;
        width: 200px;
        margin: 40px auto;
        background: #eae8e5;
    }

    #text .item {
        height: 10px;
        width: calc(100% - 40px);
        margin: 20px auto;
        background: #0e0e0d;
    }

    #burgerBtn {
        border-top: 2px solid #0D75D0FF;
        height: 25px;
        width: 30px;
        box-sizing: border-box;
        position: absolute;
        z-index: 30;
        left: 20px;
        top: 15px;
        cursor: pointer;
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        -khtml-transition: all 0.3s ease-in;
        -o-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
    }
    #burgerBtn:before {
        content: "";
        display: block;
        position: absolute;
        height: 2px;
        width: 30px;
        left: 0;
        background: #0d75d0;
        top: 10px;
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        -khtml-transition: all 0.3s ease-in;
        -o-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
    }
    #burgerBtn:after {
        content: "";
        display: block;
        position: absolute;
        height: 2px;
        width: 30px;
        left: 0;
        background: #0d75d0;
        bottom: 0;
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        -khtml-transition: all 0.3s ease-in;
        -o-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
    }

    #nav {
        position: absolute;
        z-index: 10;
        list-style-type: none;
        margin: 100px 0 0 20px;
        padding: 0;
        overflow: hidden;
    }
    #nav li {
        height: 30px;
        width: 0;
        margin: 30px 0;
        background: #2c2c2c;
        -webkit-transition: all 0.6s ease-in;
        -moz-transition: all 0.6s ease-in;
        -khtml-transition: all 0.6s ease-in;
        -o-transition: all 0.6s ease-in;
        transition: all 0.6s ease-in;
    }
    #nav li + li {
        margin-left: -40px;
    }
    #nav li + li + li {
        margin-left: -80px;
    }
    #nav li + li + li + li {
        margin-left: -120px;
    }

    #demoSelector {
        position: absolute;
        list-style-type: none;
        margin: 0;
        padding: 0;
        top: 333px;
        left: 50%;
        margin-left: 227px;
    }
    #demoSelector li {
        padding: 10px 0 10px 30px;
        position: relative;
        cursor: pointer;
    }
    #demoSelector li:after {
        content: "";
        position: absolute;
        height: 10px;
        width: 10px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -khtml-border-radius: 5px;
        -o-border-radius: 5px;
        border-radius: 5px;
        background: #d8d5d0;
        left: 0;
        top: 18px;
    }
    #demoSelector li:before {
        content: "";
        position: absolute;
        height: 18px;
        width: 18px;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        -khtml-border-radius: 12px;
        -o-border-radius: 12px;
        border-radius: 12px;
        border: 2px solid #888888;
        left: -6px;
        top: 12px;
        -webkit-transform: scale(0);
        -moz-transform: scale(0);
        -khtml-transform: scale(0);
        -o-transform: scale(0);
        transform: scale(0);
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        -khtml-transition: all 0.3s ease-in;
        -o-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
    }
    #demoSelector li.active:before {
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -khtml-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
    }

    .navigation #nav li {
        width: 200px;
        margin-left: 0;
    }
    .navigation #burgerBtn {
        border-color: transparent;
    }
    .navigation #burgerBtn:before {
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -khtml-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
        width: 33px;
        left: -2px;
    }
    .navigation #burgerBtn:after {
        -webkit-transform: rotate(135deg);
        -moz-transform: rotate(135deg);
        -khtml-transform: rotate(135deg);
        -o-transform: rotate(135deg);
        transform: rotate(135deg);
        bottom: 11px;
        width: 33px;
        left: -2px;
    }

    .demo1.navigation #mobileBodyContent {
        -webkit-transform: scale(0.85);
        -moz-transform: scale(0.85);
        -khtml-transform: scale(0.85);
        -o-transform: scale(0.85);
        transform: scale(0.85);
        margin-left: 260px;
    }

    .demo2.navigation #mobileBodyContent {
        margin-left: 320px;
        -webkit-opacity: 0.4;
        -moz-opacity: 0.4;
        -khtml-opacity: 0.4;
        -o-opacity: 0.4;
        opacity: 0.4;
    }

    .demo3.navigation #mobileBodyContent {
        -webkit-opacity: 0;
        -moz-opacity: 0;
        -khtml-opacity: 0;
        -o-opacity: 0;
        opacity: 0;
        -webkit-transform: scale(0.85);
        -moz-transform: scale(0.85);
        -khtml-transform: scale(0.85);
        -o-transform: scale(0.85);
        transform: scale(0.85);
        visibility: hidden;
    }



</style>



<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4"  >
    <!-- Brand Logo -->
    <a href="{{route('admin.home')}}" class="brand-link">
        <img src="" alt="Logo" class="brand-image-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Name</span>
    </a>

    <!-- Sidebar -->


    <!-- Sidebar Menu -->
    <nav class="">
        <ul class="nav nav-pills nav-sidebar " data-widget="treeview" role="menu"  style="width: 100%">

            <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link
                @if(request()->routeIs('category.index') ||
                    request()->routeIs('edit.category') ||
                    request()->routeIs('view.subCategory')||
                    request()->routeIs('view.category')) active @endif">
                    <i class="nav-icon fa fa-list-alt"></i>
                    <p>
                        Categories
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link @if(request()->routeIs('product.index') ||
                    request()->routeIs('product.edit') || request()->routeIs('product.view') ||
                    request()->routeIs('product.create')) active @endif">
                    <i class="nav-icon fa fa-certificate"></i>
                    <p>
                        Products
                    </p>
                </a>
            </li>



            <li class="nav-item">
                <a href="{{ route('admin.orders.index') }}" class="nav-link @if(request()->routeIs('admin.orders.index') || request()->routeIs('admin.orders.view')) active @endif">
                    <i class="nav-icon fa fa-shopping-bag"></i>
                    <p>
                        Orders
                    </p>
                </a>
            </li>






            <li class="nav-item">
                <a href="{{route('admin.index')}}" class="nav-link @if(request()->routeIs('admin.index')) active @endif">
                    <i class="nav-icon fa fa-cog"></i>
                    <p>
                        Settings
                    </p>
                </a>
            </li>

           </ul>
    </nav>



</aside>

<script>
    var burgerBtn = document.getElementById('burgerBtn');
    var mobile = document.getElementById('mobile');
    var demo1 = document.getElementById('demo1');
    var demo2 = document.getElementById('demo2');
    var demo3 = document.getElementById('demo3');

    burgerBtn.addEventListener('click', function() {
        mobile.classList.toggle('navigation');
    }, false);

    demo1.addEventListener('click', function() {
        demo1.classList.add('active');
        demo2.classList.remove('active');
        demo3.classList.remove('active');
        mobile.classList.add('demo1');
        mobile.classList.remove('demo2', 'demo3', 'navigation');
    }, false);

</script>

