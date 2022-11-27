@extends('utils.admin.app')

@section('content')
    <div class="flex-1 px-2 md:px-3 mt-14  md:mt-0 min-h-screen pt-2">
        @if (session()->has('success'))
            <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show"
                role="alert">
                {{ session('success') }}
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 ml-auto text-green-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="overflow-auto rounded-lg shadow mt-5 pt-5">
            <table class="table-auto w-full">
                <thead class="border-b-2 border-gray-200 bg-white">
                    <tr>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">nama</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">No. Identitas</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">No. Hp</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black ">Tempat Wisata</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black ">tgl Kunjungan</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black ">Dewasa</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black ">Anak</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black ">Total</th>
                        {{-- <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">Aksi</th> --}}
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

                            {{-- <td class="p-3 text-sm text-gray-700">
                                <div class="flex flex-row gap-2">
                                    <a href="{{ url('dashboard/tickets/' . $ticket->id . '/edit') }}">
                                        <svg class="w-6 h-6 dark:text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ url('dashboard/tickets/' . $ticket->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('Apakah kamu yakin?')">
                                            <svg class="w-6 h-6 dark:text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                                                </path>
                                            </svg>
                                        </button>

                                    </form>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
