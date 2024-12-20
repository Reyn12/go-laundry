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
    {{-- Styles Untuk Register User --}}
    @include('user.components.registerUserStyles')
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Left Side - Enhanced Blue Section -->
        @include('user.components.leftSectionRegisterUser')
        <!-- Right Side - Form Section -->
        @include('user.components.rightSectionRegisterUser')
                <!-- Form section -->
                @include('user.components.formRegisterUser')
                <!-- Popup Overlay -->
                @include('user.components.popupRegisterUser')
            </div>
        </div>
    </div>
    {{-- Script Validasi dan Popup --}}
    @include('user.components.scriptPopupRegisterUser')
    <script>
        lucide.createIcons();
    </script>
</body>
</html>