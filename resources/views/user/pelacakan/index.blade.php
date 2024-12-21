<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelacakan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .pelacakan-container { max-width: 800px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; }
        .pelacakan-header { margin-bottom: 20px; }
        .pelacakan-item { border-bottom: 1px solid #ddd; padding: 10px 0; }
        .pelacakan-item img { width: 50px; height: 50px; object-fit: cover; }
        .pelacakan-item .details { margin-left: 10px; }
    </style>
</head>
<body>
    <div class="pelacakan-container">
        <div class="pelacakan-header">
            <h1>Pelacakan ID: {{ $pelacakan['id'] }}</h1>
            <p>{{ $pelacakan['date'] }} from {{ $pelacakan['source'] }}</p>
            <p>Status: <strong>{{ $pelacakan['status'] }}</strong></p>
        </div>

        @foreach ($pelacakan['items'] as $item)
            <div class="pelacakan-item">
                <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}">
                <div class="details">
                    <h2>{{ $item['name'] }} ({{ $item['quantity'] }} pcs)</h2>
                    <p>{{ $item['details'] }} - Color: {{ $item['color'] }}</p>
                    <p>Status: {{ $item['status'] }}</p>
                    <p>Price: {{ $item['quantity'] }} x Rp {{ number_format($item['price_per_item'], 0, ',', '.') }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
