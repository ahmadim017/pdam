<x-app-layout>
   
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
    <!-- Breadcrumb -->
    <nav class="flex px-5 py-3 mt-6 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 " aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('paketbaru.index')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            Home
            </a>
        </li>
        <li>
            <div class="flex items-center">
            <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('paketbaru.show',[$nontender->id_paket])}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 ">Informasi Paket</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
            <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 ">Pemberian Penjelasan</a>
            </div>
        </li>
        </ol>
    </nav>

                        @if(session('status'))
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50">
                            {{ session('status') }}
                            </div>
                        @endif

                        @if(session('Status'))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 ">
                            {{ session('Status') }}
                            </div>
                        @endif
    </div>

<div class="py-3">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
              <h1 class="font-semibold text-2xl">Informasi Pemberian Penjelasan</h1>
              <hr class="my-4 border-2 border-cyan-700">
            
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                  
                      <tr class="border-b">
                          <th scope="col" class="px-6 py-3 bg-gray-100">
                              Nama Paket
                          </th>
                          <td class="pl-2">
                            {{ $nontender->paketpekerjaan->namapaket}}
                          </td>
                      </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                           Sisa Waktu
                        </th>
                        <td class="pl-2">
                           
                        @if ($sisawaktu)
                            <span class="px-2 py-1 text-xs font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded">{{ $sisawaktu }} jam</span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded">Waktu Selesai</span>
                        @endif
                        </td>
                    </tr>
                 
              </table>

              
            </div>

            <div class="flex items-center justify-end my-4">
                @if ($sisawaktu == 0)
                
                @else 
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white inline-flex items-center bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Kirim Pertanyaan
               </button>
                @endif
                <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-6xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Tambah Pertanyaan
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" method="POST" action="{{route('pertanyaan.store')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_paket" value="{{$nontender->id_paket}}">
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    
                                    <div class="col-span-2">
                                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dokumen</label>
                                        <input type="text" name="dokumen"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Dokumen.." required="">
                                    </div>
                                    <div class="col-span-2">
                                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bab</label>
                                        <input type="text" name="bab"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Bab.." required="">
                                    </div>
                                    
                                    <div class="col-span-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uraian <span class="text-red-500">*</span></label>
                                        <textarea name="uraian" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Uraian.."></textarea>                    
                                        @error('uraian')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-span-2 sm:col-span-1">
                                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File</label>
                                        <div class="flex">
                                            
                                                <input type="file" name="file" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                    </div>
                                </div>
                               
                                <button type="submit" class="text-white inline-flex items-center bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    
                                    Simpan
                                </button>
                               
                               
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
                
            @foreach ($penjelasan as $item)
            <div class="max-w-6xl bg-white border border-gray-200 rounded-lg shadow mb-3">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                    <li class="me-2 flex items-center">
                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class=" p-4 text-gray-600 rounded-ss-lg hover:bg-gray-100 flex items-center">
                            <svg class="w-6 h-6 text-gray-800 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                            </svg>
                            <div class="flex justify-between w-full">
                                <div class="flex-grow">
                                    {{$item->dokumen}} - {{$item->bab}}
                                </div>
                                <div class="ml-2">
                                {{Date::createFromDate($item->created_at)->format('l j F Y H:i:s')}}
                                </div>
                            </div>
                            
                        </button>
                        
                    </li>
                </ul>
            
                <div class=" p-4 bg-white rounded-lg md:p-8 ">
                    <p class="text-md text-gray-800">{{$item->uraian}}</p>
                </div>    

                <hr>

                @foreach ($jawaban as $jawab)
                @if ($jawab->id_penjelasan == $item->id)
                    <div class="p-4 bg-white rounded-lg md:p-8 ">
                        <button class="mb-3 text-gray-600 rounded-ss-lg flex items-center">
                            <svg class="w-6 h-6 text-gray-800 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                            </svg>
                                {{Date::createFromDate($jawab->created_at)->format('l j F Y H:i:s')}}
                        </button>
                        <p class="text-gray-800 text-md font-semibold">{!!$jawab->jawaban!!}</p>
                        <div class="mt-3">
                            @if ($jawab->file)
                            <a href="{{asset('storage/app/'. $jawab->file)}}" target="_blank" class="bg-green-400 text-green-800 text-sm m-3 px-2 py-1 font-medium rounded-md">Download File</a>
                        @endif
                        </div>
                        
                    </div>
                @endif
            @endforeach
            </div>
            
            @endforeach
           
               
                
           


           
            <a href="{{route('paketbaru.index')}}" class="  mt-3 inline-flex items-center px-4 py-2 bg-cyan-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Kembali</a>
           
       
          </div>
      </div>
  </div>
</div>
</div>

</x-app-layout>
