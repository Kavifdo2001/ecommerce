
@extends('User.layouts.userFront')
@section('content')

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Register</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">Register</li>
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
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>Create an Account</h3>
                                </div>
                                <form action="{{route('user.register')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" required class="form-control" name="f_name" placeholder="Enter First Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required class="form-control" name="l_name" placeholder="Enter Last Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control" name="email" placeholder="Enter Your Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control" name="address" placeholder="Enter Your Address">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control" name="contact" placeholder="Enter Your Mobile Number">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required="" type="password" name="confirm_password" placeholder="Confirm Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                                <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block">Register</button>
                                    </div>
                                </form>

                                <div class="form-note text-center">Already have an account? <a href="{{route('login')}}">Log in</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->


        @if (session('error'))
            <p>{{ session('error') }}</p>
        @endif
    </div>
    <!-- END MAIN CONTENT -->

@endsection
