<nav class="h-16 flex justify-center items-center sticky top-0 bg-white shadow-sm z-50">
    <div class="w-full px-5 flex justify-between">
        <p class="text-3xl font-semibold text-red-500 ">
            {{ $title }}
        </p>
        <form action="{{ url('logout') }}" method="POST">
            @csrf
            <button class="w-full text-start font-semibold hover:text-red-500">
                {{ auth()->user()->name }}
                <i class="fa-solid fa-right-from-bracket"></i>
            </button>
        </form>
    </div>
</nav>
