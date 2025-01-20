<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Laundry</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
         html, body {
            height: 100%; 
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        main {
            flex: 1; 
        }
        footer {
            background-color: white;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            padding: 1rem;
            text-align: center;
            color: #4B5563; 
        }

        .max-w-7xl {
            max-width: 80rem;
            margin: 0 auto;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Main Content -->
    <main class="container-fluid mx-auto py-4">
    <div class="ml-20">
        @yield('container')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-lg">
        <div class="container-fixed max-w-7xl mx-auto py-4 px-4">
            <p class="text-center text-gray-600">&copy; 2024 Go Laundry. All rights reserved.</p>
        </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
