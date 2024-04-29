<x-app-layout>
    @include('layouts.stepe')
     
       
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="px-8 py-4 bg-amber-50 shadow-md overflow-hidden sm:rounded-lg mb-4 text-sm text-justify">
            <h1 class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>  <span class="ml-2">INFORMASI</span></h1>
              <ul class="mt-4 list-disc list-inside">
                @if($perubahan)
                <li>
                    INFO! Pengajuan Perubahan/Perbaikan data Anda Sedang Diproses
                 </li>
                 @else

                 @endif
                
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
            

                              
                    <div class="flex items-center justify-center my-2">
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white inline-flex items-center bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" ria-hidden="true" fill="currentColor" class="bi bi-send-check" viewBox="0 0 16 16">
                                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372zm-2.54 1.183L5.93 9.363 1.591 6.602z"/>
                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686"/>
                              </svg> Ajukan Perubahan/Perbaikan Data
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
                                        Yakin Ajukan Perubahan/Perbaikan Data?
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{route('perubahan.simpan')}}" onsubmit="return confirm('Apakah Anda sudah yakin Ajukan Perubahan/Perbaikan Data?')" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                    @csrf
                                    
                                    
                                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Alasan Perubahan Data?</h2>
                                <div class="py-3">
                                    <input type="text" name="alasan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Alasan Perubahan" required>
                                </div>
                                    
                                   
                                    <button type="submit" class="text-white inline-flex items-center bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                       Kirim
                                    </button>
                                   
                                </form>
                            </div>
                        </div>
                    </div> 

                    <!--modal-->

                    

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