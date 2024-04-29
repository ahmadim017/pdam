<x-app-layout>
   
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @php
      $userId = Auth::user()->id; // ID pengguna yang sedang masuk
      $nontender = \App\Models\nontender::where('id_user', $userId)->where('status','Verifikasi')->get();
       
      @endphp

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
  <div class="px-8 py-4 bg-amber-50 shadow-md overflow-hidden sm:rounded-lg mb-4 text-sm text-justify">
      <h1 class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>  <span class="ml-2">INFORMASI</span></h1>
        <ul class="mt-4 list-disc list-inside">
          <li>
             Klik Nama Paket Untuk mengikuti Proses Pengadaan Tender atau Non tender. 
          </li>
        </ul>
     
          </div>
  </div>

<div class="py-3">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
              <h1 class="font-semibold text-2xl">Tender</h1>
              <hr class="my-4 border-2 border-cyan-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-6 py-3">
                              #
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Nama Paket
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Hps
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Jenis Pekerjaan
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Akhir Pendaftaran
                          </th>
                         
                      </tr>
                  </thead>
                  <tbody>
                    
                      <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        
                        <td class="px-6 py-4"></td> 
                        <td class="px-6 py-4"></td> 
                        <td class="px-6 py-4"></td> 
                        <td class="px-6 py-4"></td> 
                        <td class="px-6 py-4"></td> 
                      </tr>

                      
                    
                  </tbody>
              </table>
            </div>
          </div>
      </div>
  </div>

  <div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="font-semibold text-2xl">Non Tender</h1>
                <hr class="my-4 border-2 border-cyan-700">
              <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Paket
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hps
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tahapan
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($nontender as $item)
                       <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                          
                        <td class="px-6 py-4">{{$loop->iteration}}</td> 
                        <td class="px-6 py-4"><a href="{{route('paketbaru.show',[$item->id_paket])}}" class="text-blue-500 hover:underline">{{$item->paketpekerjaan->namapaket}}</a></td> 
                        <td class="px-6 py-4">Rp. {{number_format($item->paketpekerjaan->hps)}}</td> 
                        <td class="px-6 py-4">
                            @php
                            $hasTodaySchedule = false;
                            foreach ($jadwal as $a) {
                                // Mengambil tanggal jadwal
                                $jadwalDate = \Carbon\Carbon::parse($a->tglpelaksanaan)->toDateString();
                    
                                // Bandingkan tanggal jadwal dengan tanggal hari ini
                                if ($item->id_paket == $a->id_paket && $jadwalDate == now()->toDateString()) {
                                    $hasTodaySchedule = true;
                                    break;
                                }
                            }
                        @endphp
                            @if ($hasTodaySchedule)
                            <a data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-blue-500 hover:underline">
                                {{$a->kegiatan}}
                            </a>
                            
                            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-6xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Tahapan Paket Saat Ini {{$item->paketpekerjaan->namapaket}}
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="py-3">
                                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                                                    <div class="p-6 bg-white border-b border-gray-200">
                                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-6">
                                                            <thead class="text-xs text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                <tr>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        #
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        Tahapan
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        Hari/Tanggal Pelaksanaan
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        Waktu Mulai
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        Waktu Selesai
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php 
                                                                    $jadwals = \App\Models\jadwal::where('id_paket', $item->id_paket)->get();
                                                                @endphp
                                                                @foreach ($jadwals as $a)
                                                                 <!-- Ganti $paketId dengan id_paket yang Anda inginkan -->
                                                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                                        <td class="px-6 py-4">{{$loop->iteration}}</td> 
                                                                        <td class="px-6 py-4">{{$a->kegiatan}}</td> 
                                                                        <td class="px-6 py-4">{{Date::createFromDate($a->tglpelaksanaan)->format('l, j F Y')}}</td> 
                                                                        <td class="px-6 py-4">{{$a->waktumulai}}</td>
                                                                        <td class="px-6 py-4">{{$a->waktuselesai}}</td>
                                                                    </tr>
                                                               
                                                            @endforeach
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div> 

                        @else
                            Tidak Ada Jadwal
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
    </div>

    
</x-app-layout>



