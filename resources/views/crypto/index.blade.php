<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cryptocurrency Prices</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Crypto Prices</h2>

        @if (session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('crypto.fetch') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary mb-3">Fetch Latest Prices</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Symbol</th>
                    <th>Price (USD)</th>
                    <th>Last Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cryptos as $crypto)
                    <tr>
                        <td>{{ $crypto->name }}</td>
                        <td>{{ $crypto->symbol }}</td>
                        <td>${{ number_format($crypto->price_usd, 2) }}</td>
                        <td>{{ $crypto->last_updated }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
