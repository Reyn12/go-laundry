<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Laundry Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FAEDE4;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .laundry-image {
            max-width: 100%;
            display: block;
            margin: 0 auto 20px;
        }
        .logo-text {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            text-align: center;
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
                            <input type="text" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Ingat Saya</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none">Lupa Password</a>
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
