<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Merchant-Manage</title>
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
    <div class="w-full h-screen flex bg-gray-100">
        {{-- Include Sidebar Component --}}
        @include('admin.components.sidebar')

        {{-- Content --}}
        <div class="content flex-1 h-full p-4 overflow-y-scroll">
            {{-- Header --}}
            <div class="sticky top-0 z-10 mb-4">
                @include('admin.components.header')
            </div>
            
            {{-- Main Content --}}
            <div class="flex flex-col bg-white rounded-lg shadow-lg"> 
                {{-- Navigation Tabs --}}
                @include('admin.components.nav-MerchantManage')

                {{-- Sort dan Filter Merchant--}}
                @include('admin.components.sortDanFilterMerchant')

                {{-- Conditional Content --}}
                {{-- Conditional Content --}}
                @if(request()->routeIs('admin.dashboard.merchant-manage.index') || request()->routeIs('admin.dashboard.merchant-manage.all'))
                    {{-- Card All Merchant --}}
                    @include('admin.components.cardAllMerchant')
                @elseif(request()->routeIs('admin.dashboard.merchant-manage.pending'))
                    {{-- Card Pending Verifikasi --}}
                    @include('admin.components.cardPendingVerifikasi')
                @endif

                {{-- Content Area (kosong dulu) --}}
                <div class="p-6">
                    <!-- Content akan ditambahkan nanti -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>