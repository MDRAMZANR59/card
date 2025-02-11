<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | SB Admin 2</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* Custom Styles for Links */
        .custom-link {
            color: #007bff;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .custom-link:hover {
            color: #0056b3;
            text-decoration: underline;
            transform: scale(1.1);
        }

        .link-container {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
        }

        .link-container a {
            color: #6c757d;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
        }

        .link-container a:hover {
            color: #28a745;
            transform: scale(1.1);
        }

        .forgot-password {
            text-align: center;
        }

        .back-home {
            text-align: center;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- Image Section -->
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="{{ asset('backend/img/loginPage.jpg') }}" alt="Login Background"
                                    class="img-fluid rounded-start" />
                            </div>

                            <!-- Form Section -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <!-- Login Form -->
                                    <form method="POST" action="{{ route('login') }}" class="user">
                                        @csrf

                                        <!-- Email Field -->
                                        <div class="form-group mb-3">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" placeholder="Enter Email Address..." required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Password Field -->
                                        <div class="form-group mb-3">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password" required>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                        <hr>

                                    </form>

                                    <!-- Forgot Password and Back to Home Links -->
                                    <div class="link-container">
                                        <div class="forgot-password">
                                            <a class="custom-link" href="{{ route('password.request') }}">
                                                <i class="fas fa-lock me-2"></i>Forgot Password?
                                            </a>
                                        </div>
                                        <div class="back-home">
                                            <a class="custom-link" href="{{ route('home') }}">
                                                <i class="fas fa-home me-2"></i>Back To Home
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
