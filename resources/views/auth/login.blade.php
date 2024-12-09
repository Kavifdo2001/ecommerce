
{{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}

{{--<style>--}}
{{--    .gradient-custom-2 {--}}
{{--        /* fallback for old browsers */--}}
{{--        background: #fccb90;--}}

{{--        /* Chrome 10-25, Safari 5.1-6 */--}}
{{--        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);--}}

{{--        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */--}}
{{--        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);--}}
{{--    }--}}

{{--    @media (min-width: 768px) {--}}
{{--        .gradient-form {--}}
{{--            height: 100vh !important;--}}
{{--        }--}}
{{--    }--}}
{{--    @media (min-width: 769px) {--}}
{{--        .gradient-custom-2 {--}}
{{--            border-top-right-radius: .3rem;--}}
{{--            border-bottom-right-radius: .3rem;--}}
{{--        }--}}
{{--    }--}}
{{--</style>--}}

{{--<section class="gradient-form" style="background-color: #dedede">--}}
{{--    <div class="container py-5 ">--}}
{{--        <div class="row justify-content-center align-items-center ">--}}
{{--            <div class="">--}}
{{--                <div class="card rounded-3 text-black">--}}
{{--                    <div class="row ">--}}

{{--                        <div class="card-body p-md-5 mx-md-4">--}}

{{--                            <div class="text-center">--}}
{{--                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"--}}
{{--                                     style="width: 185px;" alt="logo">--}}
{{--                                <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>--}}
{{--                            </div>--}}

{{--                            <form action="{{route('user.login')}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <p>Please Login </p>--}}

{{--                                <div data-mdb-input-init class="form-outline ">--}}
{{--                                    <input type="email" id="form2Example11" class="form-control" name="email" placeholder="Enter your email address" />--}}
{{--                                    <label class="form-label" for="form2Example11">email</label>--}}
{{--                                </div>--}}

{{--                                <div data-mdb-input-init class="form-outline ">--}}
{{--                                    <input type="password" id="form2Example22" name="password" class="form-control" required/>--}}
{{--                                    <label class="form-label" for="form2Example22">Password</label>--}}
{{--                                </div>--}}

{{--                                <div class="text-center pt-1 mb-5 pb-1">--}}
{{--                                    <button  class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Login</button>--}}
{{--                                    <a class="text-muted" href="#!">Forgot password?</a>--}}
{{--                                </div>--}}

{{--                            </form>--}}

{{--                        </div>--}}

{{--                        --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

@extends('User.layouts.userFront')
@section('content')

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Login</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">Login</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
{{--            @if (session('error'))--}}
{{--                <p>{{ session('error') }}</p>--}}
{{--            @endif--}}

            <div class="container">
                @if ($message = Session::get('error'))
                    <div class="alert alert-secondary alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="row justify-content-center">

                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>Login</h3>
                                </div>
                                <form action="{{route('user.login')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control" name="email" placeholder="Your Email">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                                    </div>
                                </form>

                                <div class="form-note text-center">Don't Have an Account? <a href="{{route('register')}}">Sign up now</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->



    </div>
    <!-- END MAIN CONTENT -->

@endsection
