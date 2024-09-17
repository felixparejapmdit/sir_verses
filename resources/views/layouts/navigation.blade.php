<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Left: Logo and Dashboard Link -->
            <div class="flex items-center">
                <!-- Logo (no link) -->
                <div class="shrink-0 flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </div>

                <!-- Dashboard Link (moved here from the logo) -->
                <div class="ml-4">
                    <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        Dashboard
                    </a>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="flex-1 flex justify-center mt-2">
                <form action="{{ route('verse_search') }}" method="GET">
                    <div class="flex items-center">
                        <input type="text" name="query" placeholder="Search..." class="w-full py-2 pl-10 text-sm text-gray-700 dark:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600">
                        <button type="submit" class="ml-2">
                            <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>


            <!-- Announcements/Notifications Section -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100 hover:border-gray-300 focus:outline-none focus:text-gray-700 dark:focus:text-gray-100 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>Notifications</div>
                            <div class="ml-1">
                                <svg class="h-4 w-4 fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 2a6 6 0 00-6 6v5.586L2.293 15.293a1 1 0 001.414 1.414L10 12.414l6.293 6.293a1 1 0 001.414-1.414L16 13.586V8a6 6 0 00-6-6z" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400">
                            No new notifications.
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            
            <!-- Navigation Links -->
            <div class="space-x-8 sm:-my-px sm:ms-10 sm:flex hidden" style="display:none;">

                <!-- Settings Dropdown -->
                <div class="mt-4 hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100 hover:border-gray-300 focus:outline-none focus:text-gray-700 dark:focus:text-gray-100 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Settings</div>

                                <div class="ml-1">
                                    <svg class="h-4 w-4 fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Add Verses Link -->
                            <x-responsive-nav-link :href="route('verses')" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                {{ __('Add Verses') }}
                            </x-responsive-nav-link>

                            <!-- Events Link -->
                            <x-responsive-nav-link :href="route('events.index')" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                {{ __('Events') }}
                            </x-responsive-nav-link>

                            <!-- Event Types Link -->
                            <x-responsive-nav-link :href="route('eventtypes.index')" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                {{ __('Event Types') }}
                            </x-responsive-nav-link>
                        </x-slot>
                    </x-dropdown>
                </div>
                       </div>
      

    <!-- Create Dropdown -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <div class="relative mr-3">
            <button class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition duration-150 ease-in-out" id="dropdown-button">
                <div>Create New</div>
                <div class="ml-1">
                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-md hidden" id="dropdown-menu">
                <div class="py-1">
                    <!-- Hymn Add verse -->
                    <a href="{{ route('verses') }}" class="block px-4 py-2 text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        {{ __('Verses') }}
                    </a>
                    <!-- User Create Link -->
                    <a href="{{ route('users.create') }}" class="block px-4 py-2 text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        {{ __('User') }}
                    </a>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('dropdown-button').addEventListener('click', function() {
                document.getElementById('dropdown-menu').classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!event.target.closest('#dropdown-button') && !event.target.closest('#dropdown-menu')) {
                    document.getElementById('dropdown-menu').classList.add('hidden');
                }
            });
        </script>

        <!-- Profile Dropdown -->
        <div class="relative">
            <button class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition duration-150 ease-in-out" id="profile-dropdown-button">
                @if (Auth::check())
                    <div>
                        <span style="background: linear-gradient(to right, #475b9a, #6aa8c4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold;">{{ Auth::user()->name }}</span>
                    </div>
                @else
                    <script type="text/javascript">
                        window.location.href = "{{ route('login') }}"; // Redirect to the login page
                    </script>
                @endif

                <div class="ml-1">
                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-md hidden" id="profile-dropdown-menu">
                <div class="py-1">
                    <!-- User Profile -->
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        {{ __('Profile') }}
                    </a>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <x-nav-link :href="route('admin.settings')" :active="request()->routeIs('admin.settings')">
            <i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
        </x-nav-link>
    </div>
  </div>
    </div>
    <script>
        document.addEventListener('click', function(event) {
            if (!event.target.closest('#profile-dropdown-button') && !event.target.closest('#profile-dropdown-menu')) {
                document.getElementById('profile-dropdown-menu').classList.add('hidden');
            }
        });

        document.getElementById('profile-dropdown-button').addEventListener('click', function() {
            document.getElementById('profile-dropdown-menu').classList.toggle('hidden');
        });
    </script>

    <!-- Hamburger -->
    <div class="-me-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
    </ div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</div>
</nav>