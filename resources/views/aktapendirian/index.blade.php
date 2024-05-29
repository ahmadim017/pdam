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
                   Mohon Untuk melengkapi Data Perusahaan Anda, Isi sesuai dengan Perusahaan Anda miliki. 
                </li>
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
                    <h1 class="font-semibold text-2xl">Akta Pendirian</h1>
                    <hr class="my-4 border-2 border-cyan-700">

                    
                   
                        <div class="relative w-full max-w-6xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow ">
                                <form action="{{route('aktapendirian.store')}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 ">Nomor <span class="text-red-500">*</span></label>
                                            <input type="text" name="nomor"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nomor Izin" required="">
                                            @error('nomor')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal Surat <span class="text-red-500">*</span></label>
                                            <input type="date" name="tglsurat"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nomor Izin" required="">
                                            @error('tglsurat')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 ">Notaris <span class="text-red-500">*</span></label>
                                            <input type="text" name="notaris"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required>
                                            @error('notaris')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 ">Tempat Notaris<span class="text-red-500">*</span></label>
                                            <input type="text" name="lokasi"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Kab/Kota" required>
                                            @error('lokasi')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 ">Dokumen<span class="text-red-500">*</span></label>
                                            <input type="file" name="file"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                                            @error('file')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                            <span class="text-xs text-gray-500">( jpg, pdf, doc, png / Maksimal : 5120 KB )</span>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modal Di setorkan<span class="text-red-500">*</span></label>
                                            <div class="flex">
                                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md ">
                                                    Rp.</span>
                                                    <input type="text" name="modal" id="modal" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 " placeholder="Modal Di setorkan">
                                            </div>
                                            @error('modal')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                       
                                    </div>
                                    @if($pengajuanpenyedia->konfirmasi == 'ya')

                                    @else
                                    <button type="submit" class="text-white inline-flex items-center bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                                        Simpan
                                    </button>
                                    @endif
                                    
                                </form>
                            </div>
                        </div>

                        <div class="relative overflow-x-auto max-w-6xl max-h-full shadow-md sm:rounded-lg mt-3">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-gray-700  bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nomor
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                       Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Notaris
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                       Tempat Notaris
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                       Modal Usaha
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                        Dokumen
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                       
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($aktapendirian as $item)
                               <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                                  
                                <td class="px-6 py-4">{{$loop->iteration}}</td> 
                                <td class="px-6 py-4">{{$item->nomor}}</td>
                                <td class="px-6 py-4">{{$item->tglsurat}}</td>
                                <td class="px-6 py-4">{{$item->notaris}}</td>
                                <td class="px-6 py-4">{{$item->lokasi}}</td>
                                <td class="px-6 py-4">Rp. {{number_format($item->modal)}}</td>
                                <td><a href="{{asset('storage/app/public/dist/fileaktependirian/'.$item->file)}}" class="text-white bg-emerald-500 hover:bg-emerald-700 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " target="_blank"><svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
                                  </svg></a></td>
                                  <td >
                                    @if($pengajuanpenyedia->konfirmasi == 'ya')

                                    @else
                                    <form action="{{route('aktapendirian.destroy', [$item->id])}}" onsubmit="return confirm('Apakah Anda Yakin ingin dihapus?')" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-white bg-red-500 hover:bg-red-700 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "><svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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

     @include('akteperubahan.index')
                   
     @include('pengesahan.index')
     

     @section('footer')
     <script>
        // Mendapatkan elemen input
        var modalusahaInput = document.getElementById('modal');
    
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