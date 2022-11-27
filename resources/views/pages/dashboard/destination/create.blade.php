@extends('utils.admin.app')

@section('content')
    <div class="p-4">
        <form id="fileUploadForm" method="POST" action="{{ url('dashboard/destinations') }}" enctype="multipart/form-data"
            class="md:w-2/3 w-full">
            @csrf

            {{-- gambar --}}
            <label for="image" class="tracking-wide text-sm font-medium">Gambar</label>
            <label
                class="w-fit flex gap-1 items-center justify-center py-1 px-2 md:px-4 md:py-2 bg-white rounded-sm shadow-sm tracking-wide border-2 cursor-pointer hover:bg-red-400 hover:text-white mb-2">
                <svg class="w-7 h-7 md:w-8 md:h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <span class="text-sm md:text-base leading-normal">Select a file</span>
                <input type='file' class="hidden" id="image" name="image" onchange="previewImg()" />
            </label>
            <div id="file-upload-filename" class="mb-2 font-light text-sm"></div>
            @error('image')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror

            {{-- nama destinasi --}}
            <label for="name" class="tracking-wide text-sm font-medium">Nama Destinasi</label>
            <input id="name" type="text" name="name" placeholder="input destinasi name here"
                class="w-full border-2 rounded-sm mb-2" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror

            {{-- deskripsi --}}
            <label for="deskripsi" class="tracking-wide text-sm font-medium">Deskripsi</label>
            <textarea id="deskripsi" rows="9" cols="70" name="deskripsi"
                class="w-full py-1 px-2 md:py-2 md:px-4 border-2 rounded-sm mb-2" placeholder="input text here" required> 
            </textarea>
            @error('deskripsi')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror

            {{-- video --}}
            <label for="video" class="tracking-wide text-sm font-medium">Link video</label>
            <input id="video" type="text" name="video" placeholder="input link here"
                class="w-full border-2 rounded-sm mb-2" value="{{ old('video') }}" required>
            @error('video')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror

            {{-- harga --}}
            <label for="harga" class="tracking-wide text-sm font-medium">Harga Tiket</label>
            <input id="harga" type="text" name="harga" placeholder="input price here"
                class="w-full border-2 rounded-sm mb-2" value="{{ old('harga') }}" required>
            @error('harga')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror


            <div class="flex justify-center mt-2">
                <button type="submit"
                    class="w-full text-sm md:text-base py-2 px-2 md:py-2 md:px-3 bg-red-500 text-white rounded-md shadow-sm mb-2 flex gap-1 justify-center items-center hover:bg-red-400">Tambah</button>
            </div>
        </form>
    </div>
@endsection
