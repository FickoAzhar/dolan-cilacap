<nav class="w-screen h-16 flex justify-center items-center sticky top-0 bg-white shadow-sm z-50">
    <div class="w-full px-20 flex justify-between">
        <a href="{{ url('/') }}" class="text-3xl font-semibold text-red-500 italic">Dolan Cilacap</a>
        <div class="auth">
            @auth
                <div class="flex items-center md:order-2">
                    
                        <img class="w-8 h-8 border border-red-500 rounded-full md:mr-0 rounded-full" src="{{ asset('avatar/ava.png') }}" alt="user photo">
                    
                    <button type="button" class="flex mr-3 text-sm bg-white ml-2"
                        id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                        <span class="sr-only">Open user menu</span>
                        <span class="block text-sm text-gray-900 font-semibold hover:text-red-800">
                            {{ auth()->user()->name }}
                            <i class="fa-solid fa-caret-down"></i>
                        </span>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow w-40"
                        id="dropdown">
                        {{-- <div class="py-3 px-4">
                            <span class="block text-sm text-gray-900">{{ auth()->user()->name }}</span>
                            <span
                                class="block text-sm font-medium text-gray-500 truncate">{{ auth()->user()->email }}</span>
                        </div> --}}
                        <li>
                            <a href="{{ url('myticket') }}"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white hover:text-red-800"><i class="fa-regular fa-user"></i> profile</a>
                        </li>
                        <li>
                            <a href="{{ url('myticket') }}"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white hover:text-red-800"><i class="fa-solid fa-ticket"></i> Tiket
                                Saya</a>
                        </li>
                        <ul class="py-1" aria-labelledby="dropdown">

                            <li>
                                <form action="{{ url('logout') }}" method="POST">
                                    @csrf
                                    <button
                                        class="block w-full py-2 px-4 text-sm text-left text-gray-700 hover:bg-gray-100 hover:text-red-800"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
            <a href="{{ url('login') }}" class="my-auto mt-1">
                <button class="py-1 px-6 mt-1 shadow-md no-underline rounded-full bg-red-500 text-white font-sans font-semibold text-sm border-red btn-red-500 hover:bg-red-400 focus:outline-none active:shadow-none">Login</button>
                </a>
            @endauth
        </div>
    </div>
</nav>
