<h2>Invoice: {{ $invoice->title }}</h2>

<p>Hello {{ $invoice->customer->name }},</p>

<p>You have received an invoice of <strong>${{ number_format($invoice->due_amount, 2) }}</strong>.</p>

<p>Description: {{ $invoice->description }}</p>

<p>Status: {{ ucfirst($invoice->status) }}</p>

<a href="{{ route('invoices.pay', $invoice->id) }}"
   style="display: inline-block; background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">
    Pay Now
</a>


