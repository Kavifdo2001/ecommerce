<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order #{{ $order->order_no }}</title>
    <style>
        /* Add your PDF-specific styles here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f5f5f5;
            text-align: left;
        }
        .order_summary {
            font-size: 12px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive order_table" style="margin-bottom: 20px;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    @php
                                        $images = json_decode($item->product->images);
                                        $firstImage = $images[0] ?? 'path/to/default/image.jpg';
                                    @endphp
                                    <td>
                                        <img src="{{ asset($firstImage) }}" alt="Product Image" style="width: 50px; height: 50px; vertical-align: middle; margin-right: 10px;">
                                        {{ $item->product->name }}
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ $item->total }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="order_summary">
                        <p><strong>Order No:</strong> &nbsp; {{ $order->order_no }}</p>
                        <p><strong>Total:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${{ $order->grand_total }}</p>
                        <p><strong>Order Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
                        <p><strong>Order Notes:</strong> {{ $order->additional }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
