<nav x-data="{ open: false }" class="bg-white dark:bg-gray-900 shadow">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('blog') }}" class="text-black dark:text-white flex items-center rounded-xl text-xl font-semibold focus:outline-none focus:opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="lucide stroke-black dark:stroke-white lucide-chart-no-axes-gantt">
                        <path d="M8 6h10"/><path d="M6 12h9"/><path d="M11 18h7"/>
                    </svg>
                    <span>MiBi</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex md:items-center space-x-8">
                <a href="https://hafyz.dev" class="text-black dark:text-white hover:text-gray-600 dark:hover:text-neutral-300 focus:outline-none focus:text-gray-600 dark:focus:text-neutral-300">
                    Portfolio
                </a>
                <a href="https://hafyz.dev/aboutme" class="text-black dark:text-white hover:text-gray-600 dark:hover:text-neutral-300 focus:outline-none focus:text-gray-600 dark:focus:text-neutral-300">
                    About Me
                </a>
                <a href="https://www.youtube.com/@muneeb-the-dev" class="text-black dark:text-white hover:text-gray-600 dark:hover:text-neutral-300 focus:outline-none focus:text-gray-600 dark:focus:text-neutral-300">
                    Youtube
                </a>
                <a href="https://blog.hafyz.dev" class="text-black dark:text-white hover:text-gray-600 dark:hover:text-neutral-300 focus:outline-none focus:text-gray-600 dark:focus:text-neutral-300">
                    Blog
                </a>
            </div>

            <!-- User Dropdown and Hamburger -->
            <div class="flex items-center">
                <!-- If user is authenticated, show settings dropdown -->
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <!-- Add more links here as needed -->
                            <div class="border-t border-gray-200 dark:border-gray-600"></div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <!-- Show login/register buttons if user is not authenticated -->
                    <a href="{{ route('login') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl bg-white border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:border-neutral-700 dark:hover:bg-neutral-700 dark:text-white">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl bg-lime-400 text-black hover:bg-lime-500 focus:outline-none focus:bg-lime-500 transition">
                        Signup
                    </a>
                @endauth

                <!-- Hamburger for mobile -->
                <div class="-me-2 flex items-center md:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="https://hafyz.dev" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-100 focus:border-gray-300 dark:focus:bg-gray-700">
                Portfolio
            </a>
            <a href="https://hafyz.dev/aboutme" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-100 focus:border-gray-300 dark:focus:bg-gray-700">
                About Me
            </a>
            <a href="https://www.youtube.com/@muneeb-the-dev" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-100 focus:border-gray-300 dark:focus:bg-gray-700">
                Youtube
            </a>
            <a href="https://blog.hafyz.dev" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-100 focus:border-gray-300 dark:focus:bg-gray-700">
                Blog
            </a>
        </div>
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            @auth
                <div class="flex items-center px-4">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    <div class="ml-3">
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
