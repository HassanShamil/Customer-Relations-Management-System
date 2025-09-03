<style>
    .success-container {
        max-width: 600px;
        margin: 60px auto;
        padding: 30px;
        border: 1px solid #d1e7dd;
        border-radius: 8px;
        background-color: #f8fff9;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        text-align: center;
        font-family: Arial, sans-serif;
    }

    .success-icon {
        font-size: 3rem;
        color: #28a745;
        margin-bottom: 20px;
    }

    .success-title {
        color: #28a745;
        margin-bottom: 10px;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        background-color: #28a745;
        color: #fff;
        border-radius: 4px;
        font-size: 0.9rem;
        margin-top: 10px;
    }


    .button {
        display: inline-block;
        padding: 10px 20px;
        margin: 0 8px;
        font-size: 1rem;
        text-decoration: none;
        color: #fff;
        background-color: #007bff;
        border-radius: 4px;
    }

    .button.secondary {
        background-color: #6c757d;
    }

    @media (max-width: 500px) {
        .button {
            display: block;
            width: 100%;
            margin: 10px 0;
        }
    }
</style>

<div class="success-container">
    <div class="success-icon">✅</div>

    <h2 class="success-title">Payment Successful</h2>

    <p>Thank you for your payment for invoice <strong>#{{ $invoice->id }}</strong>.</p>

    <div class="status-badge">
        {{ ucfirst($invoice->status) }}
    </div>

</div>

