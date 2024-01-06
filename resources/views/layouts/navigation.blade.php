<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="64px" height="64px"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M378.526,0.363l-98.765,19.765V0H173.658h-31.208H36.35v509.726h106.101h31.208h106.101V189.881L344.221,512 l131.429-26.301L378.526,0.363z M142.451,478.518H67.557v-23.232h74.893V478.518z M142.451,424.078H67.557V31.208h74.893V424.078z M248.552,478.518h-74.893v-23.232h74.893V478.518z M248.553,424.078h-74.893V31.208h74.348l0.545,2.726V424.078z M283.823,51.14 l70.227-14.054l74.321,371.384l-70.143,14.478L283.823,51.14z M364.351,453.551l70.143-14.478l4.433,22.15l-70.229,14.054 L364.351,453.551z"></path> </g> </g> <g> <g> <rect x="84.5" y="63.456" width="41.61" height="31.208"></rect> </g> </g> <g> <g> <rect x="190.617" y="63.456" width="41.61" height="31.208"></rect> </g> </g> <g> <g> <rect x="308.84" y="75.683" transform="matrix(0.9819 -0.1896 0.1896 0.9819 -11.3402 64.0321)" width="40.327" height="31.209"></rect> </g> </g> </g></svg>

                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Book library') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex-shrink-0 flex items-center">
                <form action="{{ route('books.search') }}" method="GET" class="flex items-center">
                    <input type="text" name="query" class="px-3 py-2 rounded-l-md border border-gray-300" placeholder="Search Books...">
                    <button type="submit" class="px-3 py-2 bg-blue-500 text-white rounded-r-md">
                        Search
                    </button>
                </form>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @if (auth()->user()->avatar)
                    <!-- Display the user's avatar if it exists -->
                    <img src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}" alt="User Avatar" style="width: 30px; height: 30px; border-radius: 50%;">
                @else
                    <svg height="34px" width="34px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 502.664 502.664" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path style="fill:#010002;" d="M132.099,230.872c55.394,0,100.088-44.759,100.088-99.937c0-55.243-44.673-99.981-100.088-99.981 c-55.135,0-99.808,44.738-99.808,99.981C32.291,186.091,76.965,230.872,132.099,230.872z"></path> <path style="fill:#010002;" d="M212.3,247.136H52.072C23.469,247.136,0,273.431,0,305.636v160.896 c0,1.769,0.841,3.387,1.014,5.177h262.387c0.108-1.79,0.949-3.408,0.949-5.177V305.636 C264.35,273.431,240.967,247.136,212.3,247.136z"></path> <path style="fill:#010002;" d="M502.664,137.751c-0.108-58.673-53.711-105.934-119.33-105.783 c-65.92,0.108-119.092,47.758-119.006,106.279c0.108,46.226,33.478,85.334,79.812,99.722l0.626,202.55l38.676,27.826 l40.208-28.064l-0.065-26.877h-18.572l-0.086-26.338h18.616l-0.173-29.121h-18.486l-0.086-26.295h18.572l-0.086-26.316h-18.551 l-0.065-26.316l18.637-0.022l-0.302-41.157C469.402,223.279,502.664,184.02,502.664,137.751z M383.399,77.612 c14.776,0,26.899,12.101,26.899,26.856c0.108,14.949-12.015,27.007-26.834,27.007c-14.905,0-26.942-11.886-26.942-26.877 C356.436,89.778,368.494,77.655,383.399,77.612z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g></svg>
                @endif
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('user-books.show')">
                            {{ __('My books') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

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
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

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
