<x-app-layout>
    @include('layouts.stepe')
     
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="px-8 py-4 bg-amber-50 shadow-md overflow-hidden sm:rounded-lg mb-4 text-sm text-justify">
            <h1 class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>  <span class="ml-2">INFORMASI</span></h1>
              <ul class="mt-4 list-disc list-inside">
                <li>
                    yang bertanda <span class="text-red-500">*</span> wajib diisi.
                 </li>
              </ul>
           
                </div>
                @if(session('status'))
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                            {{ session('status') }}
                            </div>
                        @endif

                        @if(session('Status'))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                            {{ session('Status') }}
                            </div>
                        @endif
        </div>
     

     <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-semibold text-2xl">Data Pengalaman Perusahaan</h1>
                    <hr class="my-4 border-2 border-cyan-700">

                    
                    <div class="flex items-center justify-end my-4">
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white inline-flex items-center bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> Tambah Data Pengalaman
                        </button>
                    </div>
                    
                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-6xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Data Pengalaman
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{route('pengalaman.store')}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                       
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kontrak <span class="text-red-500">*</span></label>
                                            <input type="text" name="namakontrak"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('namakontrak')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Kontrak</label>
                                            <input type="text" name="nokontrak"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('nokontrak')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi <span class="text-red-500">*</span></label>
                                            <input type="text" name="lokasi"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('lokasi')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                            <span class="text-gray-500 text-xs">Kab/Kota</span>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instansi</label>
                                            <input type="text" name="instansi"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('instansi')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Kontrak <span class="text-red-500">*</span></label>
                                            <input type="text" id="nilaikontrak" name="nilaikontrak"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('nilaikontrak')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                            <span class="text-gray-500 text-xs">Kab/Kota</span>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Persentasi Pelaksanaan (%)</label>
                                            <input type="text" name="persentasipelaksanaan"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('persentasipelaksanaan')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pelaksanaan <span class="text-red-500">*</span></label>
                                            <input type="date" name="tglpelaksanaan"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('tglpelaksanaan')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
        
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        
                                        Simpan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 

                    <!--modal-->

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Kontrak
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nomor Kontrak
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Lokasi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Instansi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nilai Kontrak
                                      </th>
                                      <th scope="col" class="px-6 py-3">
                                        Persentasi Pelaksanaan (%)
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                       Tanggal Pelaksanaan
                                      </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengalaman as $item)
                               <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                  
                                <td class="px-6 py-4">{{$loop->iteration}}</td> 
                                <td class="px-6 py-4">{{$item->namakontrak}}</td>
                                <td class="px-6 py-4">{{$item->nokontrak}}</td>
                                <td class="px-6 py-4">{{$item->lokasi}}</td>
                                <td class="px-6 py-4">{{$item->instansi}}</td>
                                <td class="px-6 py-4">Rp. {{number_format($item->nilaikontrak)}}</td>
                                <td class="px-6 py-4">{{$item->persentasipelaksanaan}}</td>
                                <td class="px-6 py-4">{{$item->tglpelaksanaan}}</td>
                                  <td >
                                    
                                    <form action="{{route('pengalaman.destroy', [$item->id])}}" onsubmit="return confirm('Apakah Anda Yakin ingin dihapus?')" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-white bg-red-500 hover:bg-red-700 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"><svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                          </svg></button>
                                    </form>
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

     @section('footer')
     
     <script>
        // Mendapatkan elemen input
        var modalusahaInput = document.getElementById('nilaikontrak');
    
        // Menambahkan event listener untuk memantau input
        modalusahaInput.addEventListener('input', function() {
            // Mengambil nilai input tanpa tanda titik
            var rawValue = this.value.replace(/\./g, '');
    
            // Format mata uang dengan menambahkan titik setiap tiga digit dari belakang
            var formattedValue = '';
            for (var i = rawValue.length - 1, j = 0; i >= 0; i--, j++) {
                if (j > 0 && j % 3 == 0) {
                    formattedValue = '.' + formattedValue;
                }
                formattedValue = rawValue.charAt(i) + formattedValue;
            }
    
            // Mengatur nilai input dengan format mata uang yang sudah diformat
            this.value = formattedValue;
        });
    </script>
         <script>
            // set the modal menu element
        const $targetEl = document.getElementById('modalEl');

        // options with default values
        const options = {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            backdropClasses:
                'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
            closable: true,
            onHide: () => {
                console.log('modal is hidden');
            },
            onShow: () => {
                console.log('modal is shown');
            },
            onToggle: () => {
                console.log('modal has been toggled');
            },
        };

        // instance options object
        const instanceOptions = {
        id: 'modalEl',
        override: true
        };
         </script>
     @endsection
 </x-app-layout>