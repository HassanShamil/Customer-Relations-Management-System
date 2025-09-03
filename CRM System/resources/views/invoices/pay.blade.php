<style>
    .pay-container {
        max-width: 600px;
        margin: 60px auto;
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        font-family: Arial, sans-serif;
    }

    .pay-header {
        background-color: #28a745;
        color: white;
        padding: 15px 20px;
        border-radius: 6px 6px 0 0;
        font-size: 1.3rem;
        font-weight: bold;
    }

    .pay-body {
        padding: 20px;
    }

    .pay-body p {
        margin: 10px 0;
        font-size: 1rem;
    }

    .amount-box {
        background-color: #e8f4fd;
        border-left: 4px solid #0d6efd;
        padding: 15px;
        margin: 20px 0;
        border-radius: 4px;
        font-weight: bold;
        color: #0d6efd;
    }

    .pay-button {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #28a745;
        color: white;
        text-align: center;
        font-size: 1rem;
        font-weight: bold;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .pay-button:hover {
        background-color: #218838;
    }

    .note {
        font-size: 0.85rem;
        color: #6c757d;
        text-align: center;
        margin-top: 20px;
    }

    @media (max-width: 600px) {
        .pay-container {
            margin: 30px 10px;
            padding: 20px;
        }
    }
</style>

<div class="pay-container">
    <div class="pay-header">Pay Invoice</div>

    <div class="pay-body">
        <p><strong>Customer:</strong> {{ $invoice->customer->name }}</p>
        <p><strong>Invoice Title:</strong> {{ $invoice->title }}</p>

        <div class="amount-box">
            Amount Due: Rs {{ number_format($invoice->due_amount, 2) }}
        </div>

        <form action="{{ route('stripe.checkout', $invoice->id) }}" method="POST">
            @csrf
            <button type="submit" class="pay-button">
                💳 Pay with Stripe
            </button>
        </form>

        <p class="note">
            Transactions are securely processed via Stripe. We do not store your payment information.
        </p>
    </div>
</div>

