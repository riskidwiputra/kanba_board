<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kanba Board') }}</title>

        <!-- Fonts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <script src="{{ mix('/js/app.js') }}" defer></script> --}}
         <link href="{{ asset('build/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('build/assets/css/app-creative.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <livewire:styles/>
      
        <livewire:scripts/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



        <style>
            .color_primary{background-color: rgb(246, 248, 250);};
            .custom-card {
            position: relative;
            overflow: hidden;
            color: white;
            transition: background-color 0.3s;
            max-height: 200px; /* Batasi tinggi card */
            height: 200px; /* Batasi tinggi card */
        }

        .custom-card img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .custom-card .card-title {
            position: absolute;
            top: 0;
            left: 0;
            padding: 20px 25px;
            margin: 0;
            font-size: 18px;
            color: white; /* Warna teks putih */
        }

        .custom-card:hover {
            background-color: rgba(0, 0, 0, 0.5); /* Pergelapan latar belakang saat dihover */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            cursor: pointer;
            

        }
        .custom-card img {
            -webkit-filter: brightness(100%);
            max-height: 200px; /* Batasi tinggi gambar */
        }

        .custom-card img:hover {
            -webkit-filter: brightness(70%);
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
            -ms-transition: all 1s ease;
            transition: all 1s ease;
        }

        .title-card a:hover{
            color: green;
            cursor: pointer;
        }
        .title-card a:focus { color: yellow }
        </style>
    </head>
    <body class="font-sans antialiased ">
        <div class="min-h-screen bg-white wrapper">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="color_primary shadow">
                    <div class="max-w-12xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
