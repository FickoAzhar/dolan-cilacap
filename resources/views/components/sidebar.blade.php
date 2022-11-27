<aside class="w-64 bg-gray-100 fixed top-0 bottom-0" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded h-screen flex flex-col justify-between">
        <ul class="space-y-2">
            <li>
                <p class="px-2 text-2xl font-semibold text-red-500 italic mb-5">
                    Dolan Cilacap
                </p>
            </li>
            <li class ="hover:bg-red-50">
                <a href="{{ url('dashboard') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-500 hover:text-black rounded-lg">
                    <i class="fa-solid fa-gauge fa-lg"></i>
                    <span class="ml-3 font-semibold">Dashboard</span>
                </a>
            </li>
            <li class ="hover:bg-red-50">
                <a href="{{ url('dashboard/destinations') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-500 hover:text-black rounded-lg bg-black-300">
                    <i class="fa-sharp fa-solid fa-map-location "></i>
                    <span class="flex-1 ml-3 whitespace-nowrap font-semibold">Destinasi</span>
                </a>
            </li>
            <li class ="hover:bg-red-50">
                <a href="{{ url('dashboard/tickets') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-500 hover:text-black rounded-lg">
                    <i class="fa-solid fa-ticket"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap font-semibold">ticket</span>
                </a>
            </li>
            <li class ="hover:bg-red-50">
                <a href="{{ url('dashboard/users') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-500 hover:text-black rounded-lg">
                    <i class="fa-solid fa-user"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap font-semibold">user</span>
                </a>
            </li>
            
        </ul>
    </div>
</aside>
