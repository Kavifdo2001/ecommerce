@extends('User.layouts.userFront')

@section('content')

<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Account details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Account Details</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('user.updateProfile') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>First Name <span class="required">*</span></label>
                                            <input required class="form-control" name="f_name" type="text" value="{{ $user->f_name }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input required class="form-control" name="l_name" type="text" value="{{ $user->l_name }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Contact No <span class="required">*</span></label>
                                            <input required class="form-control" name="contact" type="text" value="{{ $user->contact }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Address <span class="required">*</span></label>
                                            <input required class="form-control" name="address" type="text" value="{{ $user->address }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input required class="form-control" name="email" type="email" value="{{ $user->email }}">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Orders</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive order_table">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order Date</th>
                                                <th>Order No</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $order->order_no }}</td>
                                                    <td>
                                                        <a href="{{ route('orders.view', $order->id) }}" class="btn btn-warning">View</a>
                                                        <a href="{{ route('orders.pdf', $order->id) }}" class="btn btn-warning" target="_blank">Invoice</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">No orders found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <!-- Address content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

@endsection
