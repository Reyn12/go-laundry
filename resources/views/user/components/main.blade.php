<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Laundry</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold text-blue-600">Go Laundry</a>
                </div>
                <div class="flex items-center">
                    <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2">Home</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2">Services</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 px-3 py-2">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto py-4">
        @yield('container')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-lg mt-auto">
        <div class="max-w-7xl mx-auto py-4 px-4">
            <p class="text-center text-gray-600">&copy; 2024 Go Laundry. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
