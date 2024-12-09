<p>Hello {{ $order->user->name }},</p>

<p>We regret to inform you that your order #{{ $order->id }} has been rejected.</p>

<p><strong>Reason for Rejection:</strong></p>
<p>{{ $order->reason }}</p>

<p>Thank you for understanding.</p>