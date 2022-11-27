@extends('utils.user.app')

@section('content')
    <div class="absolute right-0 left-0">
        <img src="{{ asset('media/' . $destination->image) }}" class="w-full h-[16rem] md:h-[24rem] object-cover z-0"
            alt="cover" />
    </div>

    <div class="py-4 mt-[4rem] md:mt-[8rem] relative z-10 min-h-screen w-full flex flex-col items-center">
        <div class="p-4 max-w-sm bg-white rounded-lg border shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-3 text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                {{ $title }}
            </h5>
            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Lorem Ipsum is simply dummy text of the printing
                and typesetting industry. Lorem Ipsum has been the industry's</p>
            <div class="my-4 space-y-3">
                <form action="{{ url('myticket') }}" method="post">
                    @csrf
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder="" required value="{{ Auth()->user()->name }}" />
                        <label for="name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                            Lengkap</label>
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="no_identitas"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder="" required value="{{ Auth()->user()->no_identitas }}" />
                        <label for="no_identitas"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor
                            Identitas</label>
                        @error('no_identitas')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
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

                    <div class="relative z-0 w-full mb-6 group">
                        <label for="tempat_wisata"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Destinasi
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
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input datepicker datepicker-format="dd/mm/yyyy" type="text" name="tanggal_kunjungan"
                            value="{{ old('tanggal_kunjungan') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                            placeholder="hh/bb/tttt">
                        @error('tanggal_kunjungan')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    
                    <div class="relative z-0 w-full my-6 group">
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
                    <div class="relative z-0 w-full mb-6 group">
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

                    <div class="relative z-0 w-full mb-6 group">
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

                    <div class="relative z-0 w-full mb-6 group">
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
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">saya
                            dan
                            rombongan telam
                            membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditentukan</label>
                    </div>
                    <div class="my-4 flex justify-between items-center">
                        <button type="button" id="hitung"
                            class="text-white bg-blue-800 hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-800 dark:hover:bg-blue-700 dark:focus:ring-blue-700 dark:border-blue-700 whitespace-nowrap">Hitung
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
