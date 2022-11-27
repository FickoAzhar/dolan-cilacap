@extends('utils.user.app')

@section('content')
    <div class="absolute right-0 left-0">
        <img src="{{ asset('media/' . $destination->image) }}" class="absolute z-0 w-full h-[16rem] md:h-[24rem] object-cover"
            alt="cover" />
    </div>

    <div class="py-4 mt-[16rem] md:mt-[24rem] relative min-h-screen w-full flex flex-col items-center">
        <div class="px-14 py-8 mb-4 w-full flex sm:d-block">
            <div class="px-3 w-3/4">
                <h1 class="text-2xl text-center font-semibold italic uppercase mb-2">{{ $destination->name }}</h1>
                <p class="text-gray-800 font-semibold mb-3">Tiket masuk : Rp {{ $destination->harga }}</p>
                <p>{{ $destination->deskripsi }}</p>
                
                <iframe class="pt-5 w-full min-h-[20rem] md:h-[32rem] rounded-xl" src="{{ $destination->video }}"
                    target="_blank"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
            <div class="w-1/4 px-5 relative fixed top-0">
                    {{-- <a
                href="{{ url('explore/' . $destination->id . '/tiket') }}"class="bg-red-500 hover:bg-red-400 p-2 mx-auto block text-white w-full text-center shadow-lg rounded whitespace-nowrap">
                Pesan Tiket
            </a> --}}
            @if (!Auth::guest())
                <button
                        class="mt-8 bg-red-500 hover:bg-red-400 p-2 mx-auto text-white w-full text-center shadow-lg rounded whitespace-nowrap"
                        type="button" data-modal-toggle="defaultModal">
                        Pesan Tiket
                </button>
                <div id="defaultModal" tabindex="-1" aria-hidden="true"
                    class="overflow-y-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-96 md:h-full justify-center items-center">
                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Pesan Ticket
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

                            
                            <div class="my-4 space-y-3 px-5">
                                <form action="{{ url('myticket') }}" method="post">
                                    @csrf
                                    <div class="relative z-0 w-full mb-3 group">
                                        <input type="text" name="name" disabled
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                            placeholder="" required value="{{ Auth()->user()->name }}" />
                                        <label for="name"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                                            Lengkap</label>
                                        @error('name')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-3 group">
                                        <input type="text" name="no_identitas"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer" disabled
                                            placeholder="" required value="{{ Auth()->user()->no_identitas }}" />
                                        <label for="no_identitas"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor
                                            Identitas</label>
                                        @error('no_identitas')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-3 group">
                                        <input type="text" name="no_hp"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                            placeholder="" required value="{{ Auth()->user()->no_hp }}" />
                                        <label for="no_hp"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor
                                            HP</label>
                                        @error('no_hp')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-3 group">
                                        <label for="tempat_wisata"
                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-400">Destinasi
                                            wisata</label>
                                        <select id="tempat" name="tempat_wisata"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
                                            <option selected disabled>Pilih destinasi</option>
                                            @foreach ($destinations as $destinasi)
                                                <option value="{{ $destinasi->name }}"
                                                    {{ $destination->name == $destinasi->name || $destinasi->name == old('name') ? 'selected' : '' }}>
                                                    {{ $destinasi->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('tempat_wisata')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="relative">
                                        <label for="tempat_wisata"
                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-400">tanggal kunjungan</label>
                                                           
                                        <input type="datetime-local" id="Test_DatetimeLocal" name="tanggal_kunjungan"
                                            value="{{ old('tanggal_kunjungan') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                            placeholder="hh/bb/tttt">
                                        @error('tanggal_kunjungan')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full my-3 group">
                                        <input type="text" name="dewasa" id="dewasa"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                            placeholder=" " required value="{{ old('dewasa') }}" />
                                        <label for="dewasa"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pengunjung
                                            dewasa
                                        </label>
                                        @error('dewasa')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-3 group">
                                        <input type="text" name="anak" id="anak"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                            placeholder=" " required value="{{ old('anak') }}" />
                                        <label for="anak"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pengunjung
                                            anak-anak
                                        </label>
                                        @error('anak')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-3 group">
                                        <input type="text" name="harga_tiket" id="harga"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                            placeholder=" " required value="{{ old('harga_tiket') }}" />
                                        <label for="harga_tiket"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga
                                            tiket
                                        </label>
                                        @error('harga_tiket')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-3 group">
                                        <input type="text" name="total" id="total"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                            placeholder=" " required value="{{ old('total') }}" />
                                        <label for="total"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total
                                        </label>
                                        @error('total')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex items-center">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">saya setuju dengan syarat dan ketentuan yang berlaku</label>
                                    </div>
                                    <div class="my-4 flex items-center">
                                        <button type="button" id="hitung"
                                            class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-800 dark:hover:bg-blue-700 dark:focus:ring-blue-700 dark:border-blue-700 whitespace-nowrap">Hitung
                                            Total</button>
                                        <button type="submit" id="sendNewSms" name="submit" disabled="disabled"
                                            class="text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-500 dark:hover:bg-red-400 dark:focus:ring-red-400 dark:border-gray-700 whitespace-nowrap">Pesan
                                            Tiket</button>
                                        <a href="{{ url('explore/' . $destination->id) }}"
                                            class="text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-800 dark:hover:bg-red-700 dark:focus:ring-red-700 dark:border-gray-700 whitespace-nowrap">Batal</a>
                                    </div>
                                </form>
                            </div>
       

                        </div>
                    </div>
                </div>
            @else
                <a href="{{ url('login') }}">
                    <button
                        class="mt-8 bg-red-500 hover:bg-red-400 p-2 mx-auto text-white w-full text-center shadow-lg rounded whitespace-nowrap"
                        type="button">
                        Pesan Tiket
                    </button>
                </a>
            @endif
               




            </div>
        </div>       
        
    </div>
@endsection


@section('scripts')
    <script>
        const tempat = document.getElementById('tempat');
        const dewasa = document.getElementById('dewasa');
        const anak = document.getElementById('anak');
        const harga = document.getElementById('harga');
        const total = document.getElementById('total');
        const hitung = document.getElementById('hitung');

        const destinations = {{ Js::from($destinations) }}

        tempat.onchange = function() {
            const newHarga = destinations.filter(destination => destination.name == tempat.value)
            harga.value = newHarga[0].harga
            const tiketDewasa = dewasa.value * harga.value;
            const diskon = harga.value / 2;
            const tiketAnak = anak.value * diskon;
            const totalHarga = tiketDewasa + tiketAnak;
            total.value = totalHarga;
        }

        hitung.onclick = function() {
            const newHarga = destinations.filter(destination => destination.name == tempat.value)
            harga.value = newHarga[0].harga;
            const tiketDewasa = dewasa.value * harga.value;
            const diskon = harga.value / 2;
            const tiketAnak = anak.value * diskon;
            const totalHarga = tiketDewasa + tiketAnak;
            total.value = totalHarga;
        }

        var checker = document.getElementById('default-checkbox');
        var sendbtn = document.getElementById('sendNewSms');
        // when unchecked or checked, run the function
        checker.onchange = function() {
            if (this.checked) {
                sendbtn.disabled = false;
            } else {
                sendbtn.disabled = true;
            }

        }
    </script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
@endsection
