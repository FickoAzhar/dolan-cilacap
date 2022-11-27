<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- tailwind css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>

<body>
    @include('sweetalert::alert')
    @include('components.sidebar')
   

    <div class="pl-64 min-h-screen">
        <div class="flex flex-col justify-between">
            @include('components.headerAdmin')
            @yield('content')
            {{-- @include('components.footer') --}}
        </div>
    </div>
    @yield('scripts')
    @include('components.footer')
</body>

</html>
