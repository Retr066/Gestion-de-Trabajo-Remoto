<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/flatpickr.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('chart.js/chart.js') }}"></script>
    <script src="{{ mix('pusher-js/pusher.min.js') }}"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <link rel="stylesheet" href="{{ mix('assets/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        :root {
        --cabecera-color: #334C96;
        --cabecera-letras: white;
        --color-sidebar: #1D2435;
        }
        .cabeceratable {
            background-color:  var(--cabecera-color) ;
            color: var(--cabecera-letras);
        }
        .sidebarcolor {
            background-color: var(--color-sidebar);
            color: var(--cabecera-letras);
        }

    </style>

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
     <script src="{{ mix('js/es.js') }}"></script>
    <script src="{{ mix('js/flatpickr.js') }}"></script>
    <script src="{{ mix('js/rangoPlugin.js') }}"></script>



</head>

<body class="font-sans antialiased">

    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">

        @livewire('navigation-menu')


        <!-- Page Heading -->
        @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

        <!-- Page Content -->

        <main>

            <div class="md:flex ">
                <div class="w-auto min-w-full md:min-w-0  ">
                    <livewire:sidebar />
                </div>
                <div class="w-5/6 min-w-full md:min-w-0">
                {{ $slot }}
                </div>
            </div>
        </main>
    </div>


    @stack('modals')


    @livewireScripts

    @stack('scripts')



</body>

</html>
