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
                   Mohon Untuk melengkapi Data Izin Usaha Perusahaan Anda, Isi sesuai dengan izin usaha yang Perusahaan Anda miliki. 
                </li>
                <li>
                    yang bertanda <span class="text-red-500">*</span> wajib diisi.
                 </li>
              </ul>
           
                </div>
        </div>
     

     <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-semibold text-2xl">Izin Usaha</h1>
                    <hr class="my-4 border-2 border-cyan-700">

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
                    @if ($pengajuanpenyedia->konfirmasi == 'ya')
                    
                    @else
                    <div class="flex items-center justify-end my-4">
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white inline-flex items-center bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> Tambah Izin Usaha
                        </button>
                    </div>
                    @endif
                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-6xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Data Izin Usaha
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form class="p-4 md:p-5" method="POST" action="{{route('izinusaha.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klasifikasi <span class="text-red-500">*</span></label>
                                            <select name="id_klasifikasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                               <option value="">Pilih Klasifikasi</option>
                                                @foreach ($klasifikasi as $item)
                                               <option value="{{$item->id}}">{{$item->klasifikasi}}</option>
                                               @endforeach
                                               
                                            </select>
                                            
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Izin (SIUP/ NIB/ SBUJK) <span class="text-red-500">*</span></label>
                                            <select name="jenisizin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value="">Pilih Jenis Izin Usaha</option>
                                                <option value="SIUP">SIUP</option>
                                                <option value="NIB">NIB</option>
                                                <option value="SBUJK">SBUJK</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Izin <span class="text-red-500">*</span></label>
                                            <input type="text" name="nomorizin"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nomor Izin" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berlaku Sampai <span class="text-red-500">*</span></label>
                                            <input type="date" name="berlaku"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                            <span class="text-xs text-red-500">Apabila tidak memiliki masa berlaku silahkan di isi dalam jangka waktu 10 th kedepan</span>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instansi Pemberi <span class="text-red-500">*</span></label>
                                            <input type="text" name="instansipemberi"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Instansi Pemberi" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kualifikasi <span class="text-red-500">*</span></label>
                                            <select name="kualifikasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value=""></option>
                                                <option value="Besar">Besar</option>
                                                <option value="Menengah">Menengah</option>
                                                <option value="Kecil">Kecil</option>
                                                <option value="Mikro">Mikro</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nominal Modal Usaha <span class="text-red-500">*</span></label>
                                            <div class="flex">
                                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                    Rp.</span>
                                                    <input type="text" name="modalusaha" id="modalusaha" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nominal Modal Usaha">
                                            </div>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File Izin Usaha <span class="text-red-500">*</span></label>
                                            <div class="flex">
                                                
                                                    <input type="file" name="fileizin" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                        <div class="col-span-2">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                            <textarea name="keterangan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Keterangan"></textarea>                    
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
                                        Kualifikasi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jenis Izin
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nomor
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Masa Berlaku
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                       Instansi Pemberi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Modal Usaha
                                     </th>
                                    <th scope="col" class="px-6 py-3">
                                        File Izin
                                     </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($izinusaha as $i)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                  
                                   <td class="px-6 py-4">{{$loop->iteration}}</td> 
                                   <td class="px-6 py-4">{{$i->kualifikasi}}</td> 
                                   <td class="px-6 py-4">{{$i->jenisizin}}</td> 
                                   <td class="px-6 py-4">{{$i->nomorizin}}</td> 
                                   <td class="px-6 py-4">{{$i->berlaku}}</td> 
                                   <td class="px-6 py-4">{{$i->instansipemberi}}</td> 
                                   <td class="px-6 py-4">Rp. {{number_format($i->modalusaha)}}</td>
                                   <td><a href="{{asset('storage/app/public/dist/fileizin/'.$i->fileizin)}}" class="text-white bg-emerald-500 hover:bg-emerald-700 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" target="_blank"><svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
                                  </svg></a></td>
                                  <td >
                                    @if ($pengajuanpenyedia->konfirmasi == 'ya')
                                   
                                    @else
                                    <form action="{{route('izinusaha.destroy', [$i->id])}}" onsubmit="return confirm('Apakah Anda Yakin ingin dihapus?')" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-white bg-red-500 hover:bg-red-700 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"><svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                          </svg></button>
                                    </form>
                                    @endif
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
        var modalusahaInput = document.getElementById('modalusaha');
    
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