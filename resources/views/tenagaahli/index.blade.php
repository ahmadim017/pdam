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
                    <h1 class="font-semibold text-2xl">Data Tenaga Ahli Perusahaan</h1>
                    <hr class="my-4 border-2 border-cyan-700">

                    
                    <div class="flex items-center justify-end my-4">
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white inline-flex items-center bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> Tambah Data Tenaga Ahli
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
                                        Tambah Data Tenaga Ahli
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{route('tenagaahli.store')}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                       
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span class="text-red-500">*</span></label>
                                            <input type="text" name="nama"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('nama')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir<span class="text-red-500">*</span></label>
                                            <input type="date" name="tgllahir"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('tgllahir')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin <span class="text-red-500">*</span></label>
                                            
                                            
                                            <div class="justify-between">
                                                <input id="bordered-radio-1" type="radio" value="Laki-laki" name="jeniskelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki - Laki</label>
                                           
                                                <input checked id="bordered-radio-2" type="radio" value="Perempuan" name="jeniskelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                            </div>
                                            @error('jeniskelamin')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan <span class="text-red-500">*</span></label>
                                            <input type="text" name="pendidikan"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('pendidikan')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan <span class="text-red-500">*</span></label>
                                            <input type="text" name="jabatan"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('jabatan')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengalaman Pekerjaan (*Tahun)</label>
                                            <input type="text" name="pengalamankerja"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('pengalamankerja')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keahlian <span class="text-red-500">*</span></label>
                                            <input type="text" name="keahlian"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('keahlian')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat <span class="text-red-500">*</span></label>
                                            <input type="text" name="alamat"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('alamat')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Kepegawaian <span class="text-red-500">*</span></label>
                                            
                                            
                                            <div class="justify-between">
                                                <input id="bordered-radio-1" type="radio" value="tetap" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tetap</label>
                                           
                                                <input checked id="bordered-radio-2" type="radio" value="tidak tetap" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak Tetap</label>
                                            </div>
                                            @error('status')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dokumen</label>
                                            <input type="file" name="dokumen"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @error('dokumen')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                            <span class="text-xs text-gray-500">seperti ijazah sertifikat keahlian dll, pdf </span>
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
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                       Pendidikan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jabatan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pengalaman
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Keahlian
                                      </th>
                                      <th scope="col" class="px-6 py-3">
                                        Dokumen
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                      </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenagaahli as $item)
                               <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                  
                                <td class="px-6 py-4">{{$loop->iteration}}</td> 
                                <td class="px-6 py-4">{{$item->nama}}</td>
                                <td class="px-6 py-4">{{$item->pendidikan}}</td>
                                <td class="px-6 py-4">{{$item->jabatan}}</td>
                                <td class="px-6 py-4">{{$item->pengalamankerja}}</td>
                                <td class="px-6 py-4">{{$item->keahlian}}</td>
                                <td><a href="{{asset('storage/app/public/dist/filetenagaahli/'.$item->dokumen)}}" class="text-white bg-emerald-500 hover:bg-emerald-700 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" target="_blank"><svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
                                  </svg></a></td>
                                  <td >
                                    
                                    <form action="{{route('tenagaahli.destroy', [$item->id])}}" onsubmit="return confirm('Apakah Anda Yakin ingin dihapus?')" method="POST">
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