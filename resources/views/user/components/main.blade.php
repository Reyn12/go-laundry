<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Laundry</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Pastikan body mengisi seluruh halaman */
        html, body {
            height: 100%; 
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        /* Konten utama akan mengisi ruang yang tersisa */
        main {
            flex: 1;
            padding-bottom: 60px; /* Memberikan ruang untuk footer */
        }

        footer {
            background-color: white;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 1rem 0;
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
    </style>
</head>
<body class="bg-gray-100">
    <!-- Main Content -->
    <main class="container-fluid-fluid mx-auto py-4">
        <div class="ml-20">
            @yield('container')
        </div>
    </main>
</body>
</html>
