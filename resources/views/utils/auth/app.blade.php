<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- tailwind css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>

<body>
    @include('sweetalert::alert')
    <div class="w-screen min-h-screen flex justify-center items-center">
        <div class="w-full flex flex-col items-center px-4 md:px-0">
            <div class="flex">
                <img src="" alt="">
            </div>
            <div class="w-full max-w-md flex flex-col justify-center">
                <p class="text-left text-2xl font-bold mb-8 text-zinc-800">{{ $title }}</p>

                @yield('content')
            </div>
        </div>
    </div>

    
</body>

</html>
