@extends('admin.layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Orders List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>Order Amount</th>
                                        <th>Address</th>
                                        <th>User Contact No</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user_id }}</td>
                                            <td>{{ $order->user ? $order->user->f_name .' '. $order->user->l_name : 'No User' }}</td>
                                            <td>${{ $order->grand_total }}</td>
                                            <td>{{ $order->user ? $order->user->address : 'No Address' }}</td>
                                            <td>{{ $order->user ? $order->user->contact : 'No Contact' }}</td>
                                            <td>
                                                @if($order->status === 'pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($order->status === 'approved')
                                                    <span class="badge badge-success">Approved</span>
                                                @elseif($order->status === 'rejected')
                                                    <span class="badge badge-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fa fa-check"></i> Approve
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rejectModal" data-orderid="{{ $order->id }}">
                                                        <i class="fa fa-times"></i> Reject
                                                    </button>
                                                </form>

                                            </td>
                                            <td>
                                                <a href="{{ route('admin.orders.viewOrder', $order->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>Order Amount</th>
                                        <th>Address</th>
                                        <th>User Contact No</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <th>View</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="rejectForm" method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Reject Order {{ $order->id }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="status" value="rejected">
                    <input type="hidden" name="order_id" id="order_id">
                    <div class="form-group">
                        <label for="reason">Reason for Rejection</label>
                        <textarea class="form-control" name="reason" id="reason" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#rejectModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var orderId = button.data('orderid');
    var modal = $(this);

    // Set the action URL to update the correct order
    var actionUrl = "{{ route('admin.orders.updateStatus', ':id') }}";
    actionUrl = actionUrl.replace(':id', orderId);

    modal.find('#rejectForm').attr('action', actionUrl);
    modal.find('#order_id').val(orderId);
});


</script>



@endsection
