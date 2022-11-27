@extends('utils.user.app')

@section('content')
    <div class="absolute right-0 left-0 overflow-hidden">
        <img src="{{ asset('media/cilacap.jpg') }}" class="w-full h-[16rem] md:h-[24rem] object-cover z-0"
            alt="cover" />
    </div>

    <div class="mt-[8rem] md:mt-[18rem] relative min-h-screen w-full lg:w-3/4 px-4 justify-center m-auto">
        <div class="p-4 w-full text-center bg-white rounded-lg border shadow-md sm:p-8">
            <h5 class="mb-2 text-3xl font-bold text-gray-900">Pilih Tiket Wisata Tujuanmu Sekarang!</h5>
            <p class="mb-5 text-base text-gray-500 sm:text-lg">Pesan tiket wisata dengan mudah dan cepat. Tidak perlu risau, hanya dengan satu sentuhan jari, tiket yang kamu butuhkan bisa didapatkan dengan mudah. Silahkan pencet tombol dibawah ini untuk melihat list harga dan explore tempat wisata yang anda butuhkan!</p>
            <div class="justify-center items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">


                <button
                    class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                    type="button" data-modal-toggle="defaultModal">
                    Lihat List Harga
                </button>

                <div id="defaultModal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Daftar Harga
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="defaultModal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>

                            <div class="p-6 space-y-6">

                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Tempat Wisata
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Harga
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    <span class="sr-only">explore</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($destinations as $destination)
                                                <tr class="bg-white dark:bg-gray-800">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                        {{ $destination->name }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        Rp{{ $destination->harga }}
                                                    </td>
                                                    <td class="px-6 py-4 text-right">
                                                        <a href="{{ url('explore/' . $destination->id) }}"
                                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Explore</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <a href="#explore"
                    class="w-full sm:w-auto bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5">
                    <div class="text-left">
                        <div class="-mt-1 font-sans text-sm font-semibold">Explore Destinasi Wisata</div>
                    </div>
                </a>
            </div>
        </div>

        <div id="explore" class="py-12 w-full grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($destinations as $destination)
                <div class="w-full box-border bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ url('explore/' . $destination->id) }}">
                        <img class="pb-4 rounded-t-lg h-52 w-full" src="{{ asset('media/' . $destination->image) }}"
                            alt="{{ $destination->name }}">
                    </a>
                    <div class="px-5">
                        <a href="{{ url('explore/' . $destination->id) }}">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white ">
                                {{ $destination->name }}
                            </h5>
                        </a>
                    </div>
                    <div class="px-5 pb-5">
                        <h5 class="text-base text-gray-500 sm:text-lg tracking-tight ">
                            <article>{!! Str::limit($destination->deskripsi, 73) !!}</article>
                        </h5>
                    </div>
                    <div class="px-5 pb-5 mb-0 flex justify-between items-center">
                        <span class="text-xl font-bold text-gray-900">Rp{{ $destination->harga }}</span>
                        <a href="{{ url('explore/' . $destination->id) }}"
                            class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Explore</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection
