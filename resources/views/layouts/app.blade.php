<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Theme-switching script -->
        <script>
            if (localStorage.getItem('dark-mode') === 'true' || (!('dark-mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
              document.documentElement.classList.add('dark');
            } else {
              document.documentElement.classList.remove('dark');
            }
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="flex h-screen bg-gray-100 dark:bg-gray-800">
            <!-- Sidebar -->
            @include('layouts.sidebar')

            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header -->
                @include('layouts.header')

                <!-- Page Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-800">
                    <div class="container mx-auto px-6 py-8">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
         <script>
            // This script is for the theme toggle in the header
            var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon-header');
            var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon-header');

            if (localStorage.getItem('dark-mode') === 'true' || (!('dark-mode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
              themeToggleLightIcon.classList.remove('hidden');
            } else {
              themeToggleDarkIcon.classList.remove('hidden');
            }

            var themeToggleBtn = document.getElementById('theme-toggle-header');

            themeToggleBtn.addEventListener('click', function() {
              themeToggleDarkIcon.classList.toggle('hidden');
              themeToggleLightIcon.classList.toggle('hidden');
              if (localStorage.getItem('dark-mode')) {
                  if (localStorage.getItem('dark-mode') === 'true') {
                      document.documentElement.classList.remove('dark');
                      localStorage.setItem('dark-mode', 'false');
                  } else {
                      document.documentElement.classList.add('dark');
                      localStorage.setItem('dark-mode', 'true');
                  }
              } else {
                  if (document.documentElement.classList.contains('dark')) {
                      document.documentElement.classList.remove('dark');
                      localStorage.setItem('dark-mode', 'false');
                  } else {
                      document.documentElement.classList.add('dark');
                      localStorage.setItem('dark-mode', 'true');
                  }
              }
            });
        </script>
    </body>
</html>