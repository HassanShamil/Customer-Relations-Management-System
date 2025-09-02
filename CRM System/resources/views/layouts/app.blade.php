<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRM Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">CRM Admin</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/customers">Customers</a></li>
                <li class="nav-item"><a class="nav-link" href="/proposals">Proposals</a></li>
                <li class="nav-item"><a class="nav-link" href="/invoices">Invoices</a></li>
                <li class="nav-item"><a class="nav-link" href="/transactions">Transactions</a></li>
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="btn btn-warning btn-sm" type="submit">Log out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

</body>
</html>
