<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Invoice #{{ $invoice->id }}</title>
<style>
    body {
        font-family: Arial, sans-serif; 
        background-color: #f9f9f9; 
        margin: 0; 
        padding: 20px;
        color: #333;
    }
    .container {
        max-width: 700px;
        margin: auto;
        background: #fff;
        padding: 30px;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .header, .footer {
        text-align: center;
        color: #777;
        font-size: 12px;
    }
    h1 {
        color: #2F855A;
        margin-bottom: 0;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
        margin-bottom: 30px;
    }
    table th, table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    table th {
        background-color: #f0f0f0;
    }
    .total-row td {
        font-weight: bold;
        border-top: 2px solid #2F855A;
    }
    .button {
        background-color: #28a745;
        color: white;
        padding: 14px 28px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        display: inline-block;
    }
</style>
</head>
<body>
    <div class="container">

        <h1>Invoice #{{ $invoice->id }}</h1>
        <p><strong>Invoice Date:</strong> {{ $invoice->created_at->format('M d, Y') }}</p>
        <p><strong>Due Date:</strong> {{ $invoice->created_at->addDays(3)->format('M d, Y') }}</p>

        <h3>Bill To:</h3>
        <p>
            {{ $invoice->customer->name }}<br>
            {{ $invoice->customer->address }}<br>
            Phone: {{ $invoice->customer->phone}}<br>
            Email: {{ $invoice->customer->email }}
        </p>

        <h3>Company Details:</h3>
        <p>
            Acme Corp.<br>
            456 Business Rd.<br>
            Metropolis, Country<br>
            Phone: (987) 654-3210<br>
            Email: support@acmecorp.com
        </p>

        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $invoice->description }}</td>
                    <td>Rs {{$invoice->due_amount}}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td  style="text-align: right;">Subtotal</td>
                    <td>Rs {{ number_format($invoice->due_amount, 2) }}</td>
                </tr>
                <tr>
                    <td style="text-align: right;">Tax ({{ $invoice->tax_rate ?? 0 }}%)</td>
                    <td>Rs {{ number_format($invoice->tax_amount ?? 0, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td  style="text-align: right;">Total Due</td>
                    <td>Rs {{ number_format($invoice->due_amount, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <p><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>

        <p style="text-align: center; margin: 40px 0;">
            <a href="{{ route('invoices.pay', $invoice->id) }}" class="button">Pay Now</a>
        </p>

        <p>Thank you for your business!</p>

        <div class="footer">
            <p>Test International. | 456 Business Rd. | Colombo, SriLanka</p>
            <p>Email: support@test.com | Phone: (94) 654-3210</p>
        </div>
    </div>
</body>
</html>
