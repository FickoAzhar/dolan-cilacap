<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- tailwind css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="overflow-x-hidden">
    @include('sweetalert::alert')
    @include('components.navbar')
    <div class="w-screen min-h-screen flex">
        <div class="bg-white w-full h-full">
            @yield('content')
        </div>
    </div>
    @include('components.footer')
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    @yield('scripts')
</body>

</html>
