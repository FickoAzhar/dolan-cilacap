@extends('utils.auth.app')
@section('content')
    {{-- alert --}}
    @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
            role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if (session()->has('loginError'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <span class="font-medium">{{ session('loginError') }}</span>
        </div>
    @endif
    {{-- end alert --}}

    <form action="{{ url('login') }}" method="post">
        @csrf
        <div class="w-full rounded-md border -space-y-px">
            <input type="email" placeholder="Email" name="email"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-400 focus:border-red-400  focus:z-10 sm:text-sm rounded-t-md"
                required autocomplete="off" value="{{ old('email') }}" />
            @error('email')
                <p class="mt-2 text-sm text-red-600
            dark:text-red-500">{{ $message }}</p>
            @enderror
            <input type="password" placeholder="Password" name="password"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-400 focus:border-red-400  focus:z-10 sm:text-sm rounded-b-md"
                required />
            @error('password')
                <p class="mt-2 text-sm text-red-600
            dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button
            class="my-3 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white border-gray-300 focus:outline-none focus:shadow-lg focus:ring-offset-2 focus:ring-gray-300 shadow-sm bg-red-500">Login</button>
        <div class="flex gap-1">
            <p>Belum punya akun?</p> <a href="{{ url('register') }}" class="text-blue-500">Daftar</a>
        </div>
    </form>
@endsection
