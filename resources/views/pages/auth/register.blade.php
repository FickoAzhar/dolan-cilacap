@extends('utils.auth.app')

@section('content')
    <form action="{{ url('register') }}" method="post">
        @csrf
        <div class="w-full rounded-md border-0 -space-y-px">
            <input type="text" name="name" id="name" placeholder="Nama Lengkap"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-400 focus:border-red-400  focus:z-10 sm:text-sm rounded-t-md"
                autocomplete="off" value="{{ old('name') }}" />
            @error('name')
                <p class="mt-2 text-sm text-red-600
                dark:text-red-500">{{ $message }}</p>
            @enderror
            <input type="text" name="no_identitas" id="no_identitas" placeholder="Nomor Identitas"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-400 focus:border-red-400  focus:z-10 sm:text-sm"
                autocomplete="off" value="{{ old('no_identitas') }}" />
            @error('no_identitas')
                <p class="mt-2 text-sm text-red-600
                dark:text-red-500">{{ $message }}</p>
            @enderror
            <input type="text" name="no_hp" id="no_hp" placeholder="Nomor HP"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-400 focus:border-red-400  focus:z-10 sm:text-sm"
                autocomplete="off" value="{{ old('no_hp') }}" />
            @error('no_hp')
                <p class="mt-2 text-sm text-red-600
                dark:text-red-500">{{ $message }}</p>
            @enderror
            <input type="email" name="email" id="email" placeholder="Email"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-400 focus:border-red-400  focus:z-10 sm:text-sm"
                autocomplete="off" value="{{ old('email') }}" />
            @error('email')
                <p class="mt-2 text-sm text-red-600
            dark:text-red-500">{{ $message }}</p>
            @enderror
            <input type="password" name="password" id="password" placeholder="Password"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-400 focus:border-red-400  focus:z-10 sm:text-sm rounded-b-md" />
            @error('password')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="my-3 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white border-gray-300 focus:outline-none focus:shadow-lg focus:ring-offset-2 focus:ring-gray-300 shadow-sm bg-red-500">Register</button>
        <div class="flex gap-1">
            <p>Sudah punya akun?</p> <a href="{{ url('login') }}" class="text-blue-500">Login</a>
        </div>
    </form>
@endsection
