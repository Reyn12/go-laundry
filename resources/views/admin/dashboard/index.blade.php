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
    <div class="container w-full h-screen flex">
        
        {{-- Include Sidebar Component --}}
        @include('admin.components.sidebar')

        {{-- Content --}}
        <div class="content bg-gray-100 flex-1 h-full p-4 overflow-y-scroll w-full">
            
            {{-- Header --}}
            <div class="sticky top-0 z-10 mb-4">
                @include('admin.components.header')
            </div>
            
            {{-- Main Content --}}
            <div class="flex w-full gap-3">
                {{-- Left Section (Tengah) --}}
                <div class="w-3/4 flex flex-col gap-4">
                    {{-- Card 3 Total --}}
                    @include('admin.components.card3Total')

                    {{-- Card Total Transaksi --}}
                    @include('admin.components.cardTotalTransaksi')

                    {{-- Card 10 Transaksi --}}
                    @include('admin.components.card10Transaksi')
                </div>

                {{-- Right Section (Kanan) --}}
                <div class="w-1/4">
                    {{-- Card Berita dan Update --}}
                    @include('admin.components.cardBeritaUpdate')
                    {{-- Rating dan Ulasan --}}
                    @include('admin.components.cardRatingUlasan')
                </div>
            </div>
        </div>
    </div>
</body>
</html>