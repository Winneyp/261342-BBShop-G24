<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloth Store</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        /* Custom styles for the product cards */
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .product-details {
            padding: 15px;
        }
        .product-price {
            color: #f76c6c;
            font-weight: bold;
        }
        .product-name {
            font-size: 1.1em;
            font-weight: bold;
            color: #333;
        }
        .product-card a {
            text-decoration: none; /* Remove underline */
            color: inherit; /* Use the current text color */
        }
        .top-right {
            position: absolute;
            right: 20px;
            top: 20px;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Cloth Store</h1>

        <div class="top-right">
            @if (Auth::check())
                <a href="{{ route('profile') }}">
                    <img src="{{ asset('path/to/profile_icon.png') }}" alt="Profile" class="profile-icon">
                </a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endif
        </div>

        
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="product-card">
                    <a href="{{ url($product->product_id) }}">
                        <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->description }}" class="product-image">
                        <div class="product-details">
                            <p class="product-name">{{ $product->description }}</p>
                            <p class="product-price">{{ $product->price }} ฿</p>
                            <p class="text-muted">Size: {{ $product->size }} | Color: {{ $product->color }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
