<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @yield('css')
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        @yield('js')
    </head>
    <body class="" style="font-family: 'Nunito', sans-serif;">
        <div class="max-h-full h-full bg-gray-100 flex">
                <!-- Vertical Menu -->
                @include('amrani.layout.vertical_menu')
                <!-- Page Content -->
                <main class="bg-gray-50 flex-1 max-h-full h-full ">
                    <div class="flex flex-col h-full">
                        <!-- Header -->
                        @include('amrani.layout.header')
                        <!-- Content -->
                        <div class="flex-1 bg-red-100 overflow-y-auto main-content">  
                            @yield('content')  
                        </div>
                    </div>

                </main>
        </div>
        @include('sweetalert::alert')
        <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
    </body>
</html>
