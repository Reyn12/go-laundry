<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Page</title>
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
</head>
@extends('user.components.main')
@section('container')
<div class="lg:flex lg:gap-2">
  <!-- Sidebar -->
<div class="hidden lg:block">
    @include('user.components.sidebar')
</div>
  <!-- Main Content -->
  <div class="lg:w-full bg-white">
 
  <body class="bg-gray-100 py-10">
    <div class="container-fluid mx-auto">
      <!-- History Rating Section -->
      <div class="bg-white rounded-lg  p-6 mb-10">
        <h2 class="text-center text-2xl font-bold mb-6">HISTORY RATING</h2>
        <div class="grid grid-cols-3 gap-6 items-center ">
          <!-- Rating Breakdown -->
          <div class="space-y-4">
            <!-- 5 Star -->
            <div class="flex items-center">
              <span class="text-black-500 text-lg font-bold mr-2">5</span>
              <div class="w-full bg-gray-200 h-2 rounded-full mr-2">
                <div class="bg-yellow-500 h-2 rounded-full" style="width: 100%;"></div>
              </div>
              <span class="text-gray-600 text-sm font-medium">100%</span>
            </div>
            <!-- 4 Star -->
            <div class="flex items-center">
              <span class="text-black-500 text-lg font-bold mr-2">4</span>
              <div class="w-full bg-gray-200 h-2 rounded-full mr-2">
                <div class="bg-yellow-500 h-2 rounded-full" style="width: 80%;"></div>
              </div>
              <span class="text-gray-600 text-sm font-medium">80%</span>
            </div>

            <!-- 3 Star -->
            <div class="flex items-center">
              <span class="text-black-500 text-lg font-bold mr-2">3</span>
              <div class="w-full bg-gray-200 h-2 rounded-full mr-2">
                <div class="bg-yellow-500 h-2 rounded-full" style="width: 60%;"></div>
              </div>
              <span class="text-gray-600 text-sm font-medium">60%</span>
            </div>

            <!-- 2 Star -->
            <div class="flex items-center">
              <span class="text-black-500 text-lg font-bold mr-2">2</span>
              <div class="w-full bg-gray-200 h-2 rounded-full mr-2">
                <div class="bg-yellow-500 h-2 rounded-full" style="width: 40%;"></div>
              </div>
              <span class="text-gray-600 text-sm font-medium">40%</span>
            </div>

            <!-- 1 Star -->
            <div class="flex items-center">
              <span class="text-black-500 text-lg font-bold mr-2">1</span>
              <div class="w-full bg-gray-200 h-2 rounded-full mr-2">
                <div class="bg-yellow-500 h-2 rounded-full" style="width: 30%;"></div>
              </div>
              <span class="text-gray-600 text-sm font-medium">30%</span>
            </div>
      </div>

            <!-- Overall Rating -->
            <div class="flex flex-col items-center">
                  <p class="text-gray-600 font-medium text-sm mb-2">Overall</p>
                  <h3 class="text-4xl font-bold mb-2">4.0</h3>
            <div class="flex">
              <span class="text-yellow-500 text-2xl">&#9733;</span>
              <span class="text-yellow-500 text-2xl">&#9733;</span>
              <span class="text-yellow-500 text-2xl">&#9733;</span>
              <span class="text-yellow-500 text-2xl">&#9733;</span>
              <span class="text-gray-300 text-2xl">&#9734;</span>
            </div>
            <p class="text-gray-500 text-sm mt-2">47 Ratings</p>
      </div>

            <!-- Last Month Rating -->
            <div class="flex flex-col items-center">
              <p class="text-gray-600 font-medium text-sm mb-2">Last Month</p>
              <h3 class="text-4xl font-bold mb-2">3.0</h3>
              <div class="flex">
                <span class="text-yellow-500 text-2xl">&#9733;</span>
              <span class="text-yellow-500 text-2xl">&#9733;</span>
              <span class="text-yellow-500 text-2xl">&#9733;</span>
              <span class="text-gray-300 text-2xl">&#9734;</span>
              <span class="text-gray-300 text-2xl">&#9734;</span>
            </div>
      </div>
</div>
</div>
@include('user.components.contentbawahrating')
    </body>
    </html>
  </div>
</div>
@endsection
