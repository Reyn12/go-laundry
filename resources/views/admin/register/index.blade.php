<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Service Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.js"></script>
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
    {{-- Styles Untuk Register Admin --}}
    @include('admin.components.registerAdminStyles')
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Left Side - Enhanced Blue Section -->
        @include('admin.components.leftSectionRegisterAdmin')
        <!-- Right Side - Form Section -->
        @include('admin.components.rightSectionRegisterAdmin')
                <!-- Form section -->
                @include('admin.components.formRegister')
                <!-- Popup Overlay -->
                @include('admin.components.popupRegisterAdmin')
            </div>
        </div>
    </div>
    {{-- Script Validasi dan Popup --}}
    @include('admin.components.scriptPopupRegisterAdmin')
    <script>
        lucide.createIcons();
    </script>
</body>
</html>