@extends('utils.user.app')

@section('content')
    <div class="absolute right-0 left-0 overflow-hidden">
        <img src="{{ asset('media/hutan-pinus.jpg') }}" class="w-full h-[16rem] md:h-[24rem] object-cover z-0"
            alt="cover" />
            
    </div>

    <div class="py-4 mt-[4rem] md:mt-[8rem] relative min-h-screen w-full flex flex-col items-center">
        <div class="p-4 max-w-full bg-white rounded-lg border shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-3 text-red-500 text-center text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                {{ $title }}
            </h5>
            <div class="my-4 flex flex-col md:flex-row flex-wrap justify-start w-full gap-8">
                

                <table class="table-auto w-full">
                <thead class="border-b-2 border-gray-200 bg-white">
                    <tr>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">nama</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">identitas</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">hp</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">tempat wisata</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">tanggal Kunjungan</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">dewasa</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">anak</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">total</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($tickets as $ticket)
                        <tr class="{{ $loop->index % 2 == 1 ? 'bg-white' : '' }}">
                            <td class="p-3 text-sm text-gray-700">{{ $ticket->name }}</td>
                            <td class="p-3 text-sm text-gray-700">{{ $ticket->no_identitas }}</td>
                            <td class="p-3 text-sm text-gray-700">{{ $ticket->no_hp }}</td> 
                            <td class="p-3 text-sm text-gray-700">{{ $ticket->tempat_wisata }}</td>
                            <td class="p-3 text-sm text-gray-700">{{ $ticket->tanggal_kunjungan }}</td>
                            <td class="p-3 text-sm text-gray-700">{{ $ticket->dewasa }}</td>
                            <td class="p-3 text-sm text-gray-700">{{ $ticket->anak }}</td> 
                            <td class="p-3 text-sm text-gray-700">{{ $ticket->total }}</td>
                            <td class="p-3 text-sm text-gray-700">
                                <p class="bg-red-500 px-2 rounded rounded-pill text-white">Bayar</p></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
