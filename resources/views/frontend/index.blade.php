<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Laravel Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        /* Platform Navigation Styles */
        .nav-platform {
            background-color: #2C3E50;
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .nav-platform .nav-link {
            color: #fff;
            padding: 0.8rem 1.5rem;
            font-size: 1.1rem;
            text-transform: uppercase;
            font-weight: 600;
        }

        .nav-platform .nav-link:hover {
            color: #f39c12;
        }

        .nav-platform .nav-item {
            margin-right: 10px;
        }

        /* Main Content Styling */
        .product-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            object-fit: cover;
            width: 100%;
            height: 250px;
        }

        .product-card .card-body {
            padding: 20px;
        }

        .product-card label {
            font-size: 1.2rem;
            margin-top: 15px;
            color: #555;
        }

        .product-title {
            font-size: 1.4rem;
            font-weight: bold;
            color: #333;
        }

        .product-usage {
            font-size: 1rem;
            color: #7f8c8d;
        }

        /* Product Details Layout */
        .card-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        /* Platform Navigation Button Styles */
        .login-register-buttons .nav-link {
            font-size: 1.1rem;
            padding: 0.8rem 1.2rem;
            background-color: #f39c12;
            color: #fff;
            border-radius: 4px;
            font-weight: 600;
        }

        .login-register-buttons .nav-item {
            margin-left: 15px;
        }

        .login-register-buttons .nav-link:hover {
            background-color: #e67e22;
        }

        /* Card Image Styling */
        .product-card .card-body .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-platform .nav-link {
                padding: 0.8rem 1rem;
            }

            .product-card img {
                height: 200px;
            }
        }
    </style>
</head>

<body>
    <!-- Platform Navigation -->
    <nav class="nav-platform">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex mx-auto">
                    @foreach ($platforms as $plstform)
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ $plstform->name }}</a>
                            </li>
                        </ul>
                    @endforeach
                </div>
                <ul class="nav login-register-buttons">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Panel</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-wrapper">
                        <!-- Product Cards -->
                        @foreach ($cards as $card)
                            <div class="product-card">
                                <div class="card-body">
                                    <a href="{{ route('singleCard', $card->id) }}">
                                        <img src="{{ asset('backend/img/' . $card->image) }}" alt="No Image Found" />
                                    </a>
                                    <div class="product-title ">{{ $card->title }}</div>
                                    <div class="product-usage">{{ $card->usage }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function incrementQuantity() {
            const input = document.querySelector('.amount-display');
            input.value = parseInt(input.value) + 1;
        }

        function decrementQuantity() {
            const input = document.querySelector('.amount-display');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
</body>

</html>
