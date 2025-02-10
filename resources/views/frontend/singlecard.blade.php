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

        .product-detail-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .product-detail-container .image-col,
        .product-detail-container .details-col {
            flex: 1;
            margin-right: 20px;
        }

        .product-detail-container .details-col {
            max-width: 500px;
        }

        .product-detail-container img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <!-- Platform Navigation -->
    <nav class="nav-platform">
        <div class="container">
            <div class="d-flex justify-content-between w-100">
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
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Panal</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="product-detail-container">
            <!-- Product Image -->
            <div class="image-col">
                <div class="card border-0">
                    <img src="{{ asset('backend/img/' . ($datas->image ?? 'stream card.jpeg')) }}"
                        class="card-img-top rounded" alt="Product Image">
                </div>
            </div>

            <!-- Product Details -->
            <div class="details-col">
                <form action="" method="">
                    @csrf
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Platform:</h5>
                            <span>{{ $datas->platform->name ?? '' }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Usage:</h5>
                            <span>{{ $datas->usage ?? '' }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Version:</h5>
                            <span>
                                @if ($datas && $datas->CardVersion && !$datas->CardVersion->isEmpty())
                                    <select class="form-control">
                                        @foreach ($datas->CardVersion as $version)
                                            <option value="{{ $version->version->id ?? '' }}">
                                                {{ $version->version->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                @endif
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Delivery Time:</h5>
                            <span>{{ $datas->deliveryTime ?? '' }}</span>
                        </div>
                    </div>

                    <!-- Amount Selection -->
                    <div class="mb-4">
                        <h5 class="mb-3">Available Amount</h5>
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            @if ($datas && $datas->AmountCard && !$datas->AmountCard->isEmpty())
                                @foreach ($datas->AmountCard as $amount)
                                    <button
                                        class="btn btn-outline-secondary">{{ $amount->amount->title ?? '' }}€</button>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Stock Status -->
                    <div class="stock-badge mb-4">
                        {{ $datas->qty ?? '' }} in stock
                    </div>

                    <!-- Quantity Selection -->
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="amount-button" onclick="decrementQuantity()">-</div>
                        <input type="text" class="amount-display form-control" value="1" readonly>
                        <div class="amount-button" onclick="incrementQuantity()">+</div>
                        <button class="btn btn-warning">BUY NOW</button>
                        <button class="btn btn-outline-primary">ADD TO CART</button>
                    </div>
                </form>
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
