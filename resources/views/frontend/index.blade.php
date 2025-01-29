<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Laravel Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-platform {
            background-color: #1a1a1a;
            padding: 10px 0;
        }

        .nav-platform .nav-link {
            color: #ffffff;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        .nav-platform .nav-link:hover {
            color: #cccccc;
        }

        .amount-button {
            width: 40px;
            height: 40px;
            border: 1px solid #dee2e6;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .amount-display {
            width: 60px;
            text-align: center;
        }

        .stock-badge {
            background-color: #f8f9fa;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            color: #198754;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stock-badge::before {
            content: "✓";
        }

        .login-register-buttons {
            margin-left: auto;
        }
    </style>
</head>

<body>
    <!-- Platform Navigation -->
    <nav class="nav-platform">
        <div class="container">
            <!-- Centering the menu and right-aligning Login/Register buttons -->
            <div class="d-flex justify-content-between w-100">
                <!-- Centered Navigation Menu -->
                <ul class="nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">STEAM</a>
                    </li>
                </ul>

                <!-- Right-aligned Login and Register Buttons -->
                <ul class="nav login-register-buttons">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li> --}}
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Panal</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                <div class="card border-0">
                    <img src="{{ asset('frontend/img/googleplay.jpg') }}" class="card-img-top rounded"
                        alt="Product Image">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Platform:</h5>
                        <span>Roblox</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Usage:</h5>
                        <span>Global</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Version:</h5>
                        <span>
                            <select class="form-control">
                                <option value="0">Select One</option>
                                <option value="1">United State</option>
                                <option value="0">Canada</option>
                            </select>
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Delivery Time:</h5>
                        <span>Instant Deliverable</span>
                    </div>
                </div>

                <!-- Amount Selection -->
                <div class="mb-4">
                    <h5 class="mb-3">Available Amount</h5>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        @foreach ([1, 2, 3, 4, 5] as $amount)
                            <button class="btn btn-outline-secondary">{{ $amount }}€</button>
                        @endforeach
                    </div>
                </div>

                <!-- Stock Status -->
                <div class="stock-badge mb-4">
                    550 in stock
                </div>

                <!-- Quantity Selection -->
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="amount-button" onclick="decrementQuantity()">-</div>
                    <input type="text" class="amount-display form-control" value="1" readonly>
                    <div class="amount-button" onclick="incrementQuantity()">+</div>
                    <button class="btn btn-warning">BUY NOW</button>
                    <button class="btn btn-outline-primary">ADD TO CART</button>
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
