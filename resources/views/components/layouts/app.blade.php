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

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-banner />

<div class="min-h-screen bg-gray-100 dark:bg-gray-900">

    @if(Auth::user())
    @livewire('navigation-menu')
    @else
        <!-- ========== HEADER ========== -->
        <header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full py-7">
            <nav class="relative max-w-7xl w-full flex flex-wrap md:grid md:grid-cols-12 basis-full items-center px-4 md:px-6 md:px-8 mx-auto">
                <div class="md:col-span-3">
                    <!-- Logo -->
                    <a class="flex-none text-black dark:text-white flex items-center rounded-xl text-xl  font-semibold focus:outline-none focus:opacity-80" href="https://hafyz.dev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"  stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="lucide stroke-black dark:stroke-white lucide-chart-no-axes-gantt"><path d="M8 6h10"/><path d="M6 12h9"/><path d="M11 18h7"/></svg>
                        <span>MiBi</span>
                    </a>
                    <!-- End Logo -->
                </div>

                <!-- Button Group -->
                <div class="flex items-center gap-x-1 md:gap-x-2 ms-auto py-1 md:ps-6 md:order-3 md:col-span-3">
                    <a href="{{ route('login') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl bg-white border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:hover:bg-white/10 dark:text-white dark:hover:text-white dark:focus:text-white">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-lime-400 text-black hover:bg-lime-500 focus:outline-none focus:bg-lime-500 transition disabled:opacity-50 disabled:pointer-events-none">
                        Signup
                    </a>

                    <div class="md:hidden">
                        <button type="button" class="hs-collapse-toggle size-[38px] flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail">
                            <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                            <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                        </button>
                    </div>
                </div>
                <!-- End Button Group -->

                <!-- Collapse -->
                <div id="hs-navbar-hcail" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block md:w-auto md:basis-auto md:order-2 md:col-span-6" aria-labelledby="hs-navbar-hcail-collapse">
                    <div class="flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7 md:mt-0">
                        <div>
                            <a class="relative inline-block text-black focus:outline-none before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 dark:text-white" href="https://hafyz.dev" aria-current="page">Portfolio</a>
                        </div>
                        <div>
                            <a class="inline-block text-black hover:text-gray-600 focus:outline-none focus:text-gray-600 dark:text-white dark:hover:text-neutral-300 dark:focus:text-neutral-300" href="https://hafyz.dev/aboutme">About Me</a>
                        </div>
                        <div>
                            <a class="inline-block text-black hover:text-gray-600 focus:outline-none focus:text-gray-600 dark:text-white dark:hover:text-neutral-300 dark:focus:text-neutral-300" href="https://www.youtube.com/@muneeb-the-dev">Youtube</a>
                        </div>

                        <div>
                            <a class="inline-block text-black hover:text-gray-600 focus:outline-none focus:text-gray-600 dark:text-white dark:hover:text-neutral-300 dark:focus:text-neutral-300" href="https://blog.hafyz.dev">Blog</a>
                        </div>
                    </div>
                </div>
                <!-- End Collapse -->
            </nav>
        </header>
        <!-- ========== END HEADER ========== -->
    @endif
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
