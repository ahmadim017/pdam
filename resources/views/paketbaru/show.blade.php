<x-app-layout>
   
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
    <!-- Breadcrumb -->
    <nav class="flex px-5 py-3 mt-6 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('paketbaru.index')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
            <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Informasi Paket</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
            <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('paketbaru.penjelasan',[$nontender->id])}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pemberian Penjelasan</a>
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
              <h1 class="font-semibold text-2xl">Informasi Non Tender</h1>
              <hr class="my-4 border-2 border-cyan-700">
              <form action="{{route('nontender.update',[$nontender->id])}}" onsubmit="return confirm('Apakah Anda Yakin dengan penawaran Anda?')" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  
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
                           Hps
                        </th>
                        <td class="pl-2">
                          Rp. {{number_format($nontender->paketpekerjaan->hps)}}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                           Metode Pemilihan
                        </th>
                        <td class="pl-2">
                          {{ $nontender->metodepengadaan}}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                           Tahun Anggaran
                        </th>
                        <td class="pl-2">
                          {{ $nontender->paketpekerjaan->tahunanggaran}}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                           Lokasi Pekerjaan
                        </th>
                        <td class="pl-2">
                          {{ $nontender->paketpekerjaan->lokasi}}
                        </td>
                    </tr>
                    
                      <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                           Tahapan Paket Saat ini
                        </th>
                        <td class="pl-2">
                            @php
                            $hasTodaySchedule = false;
                            foreach ($jadwal as $a) {
                                // Mengambil tanggal jadwal
                                $jadwalDate = \Carbon\Carbon::parse($a->tglpelaksanaan)->toDateString();
                    
                                // Bandingkan tanggal jadwal dengan tanggal hari ini
                                if ($nontender->id_paket == $a->id_paket && $jadwalDate == now()->toDateString()) {
                                    $hasTodaySchedule = true;
                                    break;
                                }
                            }
                        @endphp
                        @if ($hasTodaySchedule)
                        <span class="px-2 py-1 text-xs font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded">{{$a->kegiatan}}</span>
                        @elseif ($nontender->status == 'Diterima')
                        <span class="px-2 py-1 text-xs font-semibold leading-tight text-green-700 bg-green-100 rounded">Paket Sudah Selesai</span>
                        @elseif ($nontender->status == 'Verifikasi')
                        <span class="px-2 py-1 text-xs font-semibold leading-tight text-red-700 bg-red-100 rounded">Paket Belum Diproses</span>
                        @else
                        <span class="px-2 py-1 text-xs font-semibold leading-tight text-gray-700 bg-gray-200 rounded">Belum ada Jadwal</span>
                        @endif
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                           Dokumen Pengadaan
                        </th>
                        <td class="pl-2">
                          

                    
                        <div id="accordion-open" data-accordion="open">
                            <h2 id="accordion-open-heading-1">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                                <span class="flex items-center"> Kerangka Acuan Kerja / KAK</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                @foreach($kak as $k)
                                <div class="p-2">
                                    <a href="{{asset('storage/app/'.$k->file)}}" target="_blank" class="inline-flex items-center p-2 rounded-md bg-cyan-700 text-xs text-white"> Download Dokumen KAK</a>
                                </div>
                                @endforeach
                            </div>
                            </div>
                            @if($rancangankontrak->isEmpty())
                            
                            @else
                            <h2 id="accordion-open-heading-2">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-2" aria-expanded="false" aria-controls="accordion-open-body-2">
                                <span class="flex items-center">Rancangan Kontrak</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                @foreach($rancangankontrak as $k)
                                <div class="p-2">
                                    <a href="{{asset('storage/app/'.$k->file)}}" target="_blank" class="inline-flex items-center p-2 rounded-md bg-cyan-700 text-xs text-white"> Download Dokumen Rancangan Kontrak</a>
                                </div>
                                @endforeach
                            </div>
                            </div>
                            @endif
                            @if($uraianpekerjaan->isEmpty())
                            
                            @else
                            <h2 id="accordion-open-heading-3">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-3" aria-expanded="false" aria-controls="accordion-open-body-3">
                                <span class="flex items-center"> Uraian Singkat Pekerjaan</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
                            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                @foreach($uraianpekerjaan as $k)
                                <div class="p-2">
                                    <a href="{{asset('storage/app/'.$k->file)}}" target="_blank" class="inline-flex items-center p-2 rounded-md bg-cyan-700 text-xs text-white"> Download Dokumen Uraian Pekerjaan</a>
                                </div>
                                @endforeach
                            </div>
                            </div>
                            @endif
                                @if($doklainnya->isEmpty())
                            
                                @else
                                <h2 id="accordion-open-heading-4">
                                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-4" aria-expanded="false" aria-controls="accordion-open-body-4">
                                        <span class="flex items-center"> Dokumen Lainnya</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                        </svg>
                                    </button>
                                    </h2>
                                    <div id="accordion-open-body-4" class="hidden" aria-labelledby="accordion-open-heading-4">
                                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                        @foreach($doklainnya as $k)
                                        <div class="p-2">
                                            <a href="{{asset('storage/app/'.$k->file)}}" target="_blank" class="inline-flex items-center p-2 rounded-md bg-cyan-700 text-xs text-white"> Download Dokumen Pendukung Lainnya</a>
                                        </div>
                                        @endforeach
                                    </div>
                                    </div>
                                @endif
                        </div>
  

                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                          Dokumen Penawaran Anda
                        </th>
                        <td class="pl-2">
                          

                        <div class="max-w-3xl bg-white border border-gray-200 rounded-lg shadow ">
                            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 " id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                <li class="me-2">
                                    <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-gray-600 rounded-ss-lg hover:bg-gray-100 ">Upload Dokumen Penawaran</button>
                                </li>
                            </ul>
                            <div id="defaultTabContent">
                                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                                    <input name="filepenawaran" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                    
                                    <div class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="user_avatar_help">ukuran file mximal 10mb</div>
                                    @error('filepenawaran')
                                    <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>    
                                
                                @if($nontender->filepenawaran)
                                <div class="p-4">
                                    <a href="{{asset('storage/app/public/dist/filepenawaran/'.$nontender->filepenawaran)}}" target="_blank" class="inline-flex items-center p-2 rounded-md bg-cyan-700 text-xs text-white"> Download Dokumen Penawaran</a>
                                </div>
                                
                                @endif
                            </div>
                        </div>

                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                           Nomor Surat Penawaran Harga
                        </th>
                        <td class="pl-2">
                            <input type="text" value="{{ old('nosuratpenawaran', $nontender->nosuratpenawaran ?? '') }}" name="nosuratpenawaran" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="027/xxx/xxx/">
                            @error('nosuratpenawaran')
                            <div class="text-red-500">{{ $message }}</div>
                    @enderror
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                           Tanggal Surat Penawaran Harga
                        </th>
                        <td class="pl-2">
                            <input type="date" value="{{ old('tglsuratpenawaran', $nontender->tglsuratpenawaran ?? '') }}" name="tglsuratpenawaran" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('tglsuratpenawaran')
                                    <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-100">
                            Harga Penawaran
                        </th>
                        <td class="pl-2">
                            @php
                                // Mengambil nilai lama atau dari model dan konversi ke float
                                $hargaPenawaran = old('hargapenawaran', $nontender->hargapenawaran ?? '0');
                                $hargaPenawaran = floatval(str_replace('.', '', $hargaPenawaran));
                            @endphp
                    
                            <input type="text" id="hargapenawaran" value="{{ number_format($hargaPenawaran, 0, '', '.') }}" name="hargapenawaran" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1xxx">
                        </td>
                    </tr>
                 
              </table>

              
            </div>
            @php
            $kegiatan = false;
            foreach ($jadwal as $a) {
                // Mengambil tanggal jadwal
                $jadwalDate = \Carbon\Carbon::parse($a->tglpelaksanaan)->toDateString();
        
                // Bandingkan tanggal jadwal dengan tanggal hari ini
                if ($nontender->id_paket == $a->id_paket && $jadwalDate == now()->toDateString()) {
                    if ($a->kegiatan == 'Pemasukan Dokumen Penawaran') {
                        $kegiatan = true;
                        break;
                    }
                }
            }
        @endphp
        
        @if($nontender->status == 'Diterima' )
            
        @elseif($kegiatan)
        <x-button class="ml-3 mt-3">
            {{ __('Simpan') }}
        </x-button>
        @else
        
        @endif
            <a href="{{route('paketbaru.index')}}" class="  mt-3 inline-flex items-center px-4 py-2 bg-cyan-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Kembali</a>
           
        </form>
          </div>
      </div>
  </div>
</div>
</div>
@section('footer')
<script>
   // Mendapatkan elemen input
   var hargapenawaranInput = document.getElementById('hargapenawaran');

   // Menambahkan event listener untuk memantau input
   hargapenawaranInput.addEventListener('input', function() {
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

   
@endsection   
</x-app-layout>
