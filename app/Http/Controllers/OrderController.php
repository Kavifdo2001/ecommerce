<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function orderHistory()
    {
        $userId = Auth::id();
        $orders = Order::where('user_id', $userId)->with('orderItems.product')->orderBy('created_at', 'desc')->get();

        return view('User.profile', compact('orders'));

        $orders = Order::with('user')
         ->orderBy('created_at', 'desc')
        ->get();

         return view('admin.orders.index', compact('orders'));
    }

    public function viewOrder($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);

        return view('User.orders.viewOrder', compact('order'));
    }

    public function orderPdf($id)
    {

        $user = Auth::user();
        $order = Order::with('orderItems.product')->findOrFail($id);


        $path = public_path('assets/images/Logo/Logo.jpeg');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64Image = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $currentDate = Carbon::now()->format('Y-m-d');

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Source Sans Pro');


        // Instantiate Dompdf
        $dompdf = new Dompdf($pdfOptions);

        // Render the view to HTML
        $pdfContent = view('User.orders.orderPdf', compact('base64Image','currentDate','user', 'order'))->render();

        // Load HTML content into Dompdf
        $dompdf->loadHtml($pdfContent);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A3', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (inline download)
        return $dompdf->stream('Invoice.pdf', array('Attachment' => 0));

    }

    public function adminOrderList()
    {
        $orders = Order::with('orderItems.product')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // View details of a specific order
    public function adminViewOrder($id)
    {
//        $order = Order::with('orderItems.product')->findOrFail($id);

        $order = Order::with('orderItems.product')->findOrFail($id);
//        dd($order->toArray());

        return view('admin.orders.viewOrder', compact('order'));
    }



    public function updateStatus(Request $request, $orderId)
{
    //var_dump($orderId); die();
    $order = Order::findOrFail($orderId);

    // Update the order status and reason
    $order->status = $request->input('status');
    $order->reason = $request->input('reason');
    $order->save();

    // Optionally send an email
    // if ($order->status === 'rejected') {
    //     Mail::to($order->user->email)->send(new OrderRejectedMail($order));
    // }

    return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
}














}
