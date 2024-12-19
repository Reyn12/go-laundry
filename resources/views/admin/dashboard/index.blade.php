<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        .bg-primary {
        background-color: #0039C9;
        }

        .text-primary {
            color: #0039C9;
        }
    </style>
</head>
<body>

    {{-- container --}}
    <div class="container bg-red-500 w-full h-screen flex">
        
        {{-- Include Sidebar Component --}}
        @include('admin.components.sidebar')

        {{-- Content --}}
        <div class="content bg-red-500 flex-1 h-full p-4">
            <h1 class="text-2xl font-bold text-white">Selamat Datang di Dashboard Admin</h1>
            <p class="text-white mt-4">Ini adalah konten utama dari dashboard admin.</p>
            <!-- Tambahkan lebih banyak konten di sini -->
        </div>
    </div>
</body>
</html>