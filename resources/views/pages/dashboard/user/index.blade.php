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

        <div class="w-full flex justify-end">
            <a href="{{ url('dashboard/users/create') }}"
                class="py-2 px-3 bg-red-500 text-white rounded-md shadow-sm mb-2 flex gap-1 justify-center items-center hover:bg-red-400">
                <i class="fa-regular fa-plus mt-1"></i>
                Tambah User
            </a>
        </div>

        <div class="overflow-auto rounded-lg shadow">
            <table class="table-auto w-full">
                <thead class="border-b-2 border-gray-200 bg-white">
                    <tr>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">nama</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">email</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">Role</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left text-black">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr class="{{ $loop->index % 2 == 1 ? 'bg-white' : '' }}">
                            <td class="p-3 text-sm text-gray-700">{{ $user->name }}</td>
                            <td class="p-3 text-sm text-gray-700">{{ $user->email }}</td>
                            <td class="p-3 text-sm text-gray-700">{{ $user->is_admin }}</td> 
                            
                            <td class="p-3 text-sm text-gray-700">
                                <div class="flex flex-row gap-2">
                                    <a href="{{ url('dashboard/users/' . $user->id . '/edit') }}">
                                        <i class="fa-solid fa-pen-to-square fa-lg hover:text-red-500"></i>
                                    </a>
                                    <form action="{{ url('dashboard/users/' . $user->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('Apakah kamu yakin?')">
                                            <i class="fa-solid fa-trash-can fa-lg hover:text-red-500"></i>
                                        </button>

                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
