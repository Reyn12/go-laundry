<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Laundry Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a237e;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-card {
            background: white;
            border-radius: 15px;
            padding: 18rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            min-width: 1175px;
            width: 95%;
            max-width: 2000px;
        }
        .login-card h2 {
            font-size: 3.0rem;
            margin-bottom: 18rem;
            
        }
        .login-card .form-control {
            padding: 0.8rem;
            font-size: 1.4rem;
        }
        .login-card .btn {
            padding: 0.8rem;
            font-size: 1.1rem;
        }
        .laundry-image {
            max-width: 100%;
            height: 600px;
            display: block;
            margin: 10px;
            animation: bounce 8s linear infinite;
            transition: transform 0.3s ease;
            position: 18rem;
        }

        .laundry-image:hover {
            transform: scale(1.1);
        }

        .logo-text {
            font-size: 6rem;
            font-weight: 800;
            color: #ffffff;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 1.5rem;
            animation: fadeIn 1.5s ease-out;
        }

        @keyframes bounce {
            0% {
                transform: translate(0, 0);
            }
            25% {
                transform: translate(50px, 50px);
            }
            50% {
                transform: translate(0px, 100px);
            }
            75% {
                transform: translate(-50px, 50px);
            }
            100% {
                transform: translate(0, 0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="row w-100">
            <!-- Image Section -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div>
                    <h1 class="logo-text">GO LAUNDRYY</h1>
                    <img src="{{ asset('images/washing-machine.png') }}" alt="Laundry" class="laundry-image">
                </div>
            </div>
            <!-- Login Form Section -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="login-card w-100">
                    <h2 class="text-center mb-4"><strong>Welcome Back!</strong></h2>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" class="form-control" placeholder="Masukkan Username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Ingat Saya</label>
                        </div>
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='/user/dashboard';">Login</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="" class="text-decoration-none">Lupa Password</a>
                        </div>
                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-light">
                                <img src="https://img.icons8.com/color/48/000000/google-logo.png" width="20" class="me-2">Sign In with Google
                            </button>
                        </div>
                        <div class="text-center mt-3">
                            <small>Belum punya akun? <a href="#" class="text-primary">Daftar Sekarang!</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
