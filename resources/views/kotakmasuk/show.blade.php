<x-app-layout>
   
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
     



<div class="py-3">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
              <h1 class="font-semibold text-2xl">Kotak Masuk</h1>
              <hr class="my-4 border-2 border-cyan-700">
            <div class="relative overflow-x-auto  sm:rounded-lg">
             
                
                   <table border="0" width="100%" cellspacing="0" cellpadding="0">
                    
                        <td width="60%" valign="top" style="padding-right:10px">
                            <tr>
                                <td width="60" valign="top" class="text">Kepada Yth.</td>
                            </tr>
                            <tr>
                                <td width="60" valign="top" class="text">Direktur {{$kotakmasuk->user->name}}</td>
                            </tr>
                             <tr>
                                <td width="60" valign="top" class="text">Di</td>
                            </tr>
                             
                            <tr>
                                <td width="60" valign="top" class="text">&nbsp;&nbsp;&nbsp;&nbsp;Tempat</td>
                            </tr>
                            </td>
                    </table><br>
                  
                   <table width="100%" border="0" cellspacing="10" cellpadding="0">
                    
                   <tr>
                      <td class="text">Dengan ini Saudara kami undang untuk mengikuti proses Penunjukan Langsung paket Pekerjaan Pengadaan barang/jasa sebagai berikut:</td>
                    </tr>
                    </table>
                    
                  <table width="100%" border="0" cellspacing="10" cellpadding="0">
                   
                    
                    <tr>
                      <td valign="top" class="text"><b>1. Nama Paket</b></td>
                      </tr>
                      <tr>
                       <td valign="top" class="text">Nama Paket Pekerjaan</td>
                      <td align="center" valign="top" class="text">:</td>
                      <td valign="top" class="text">{{$kotakmasuk->paketpekerjaan->namakegiatan}}</td>
                    </tr>
                    <tr>
                      <td valign="top" class="text">Lingkup Pekerjaan</td>
                      <td align="center" valign="top" class="text">:</td>
                      <td valign="top" class="text">{{$kotakmasuk->paketpekerjaan->namapaket}}</td>
                      </tr>
                    <tr>
                      <td valign="top" class="text">Nilai Total HPS</td>
                      <td align="center" valign="top" class="text">:</td>
                      <td valign="top" class="text"> Rp. {{number_format($kotakmasuk->paketpekerjaan->hps)}}</td>
                     
                    </tr>
                    
                    <tr>
                      <td valign="top" class="text"><b>2. Pelaksanaan Pengadaan</b></td>
                      </tr>
                      <tr>
                       <td valign="top" class="text">Tempat dan Alamat</td>
                      <td align="center" valign="top" class="text">:</td>
                      <td valign="top" class="text">Kantor Perumda Air Minum Danum Taka Jl Provinis KM. 1,5 RT.03 Penajam Kec. Penajam Kab. PPU Kal-Tim</td>
                    </tr>
                    
                    
                  </table><br>
                  <table width="100%" border="0" cellspacing="10" cellpadding="0">
                    
                    <tr>
                      <td class="text">Saudara diminta untuk memasukkan penawaran administrasi, teknis dan harga, secara langsung sesuai dengan jadwal pelaksanaan sebagai berikut:</td>
                    </tr>
                    </table> <br>
                    <table width="100%" style="border-collapse: collapse;" cellspacing="0" cellpadding="0">
                        <thead>
                          <tr>
                            <th scope="col" class="text" style="border: 1px solid black; padding: 2px; text-align: center;">No.</th>
                            <th scope="col" class="text" style="border: 1px solid black; padding: 2px; text-align: center;">Kegiatan</th>
                            <th scope="col" class="text" style="border: 1px solid black; padding: 2px; text-align: center;">Hari/Tanggal</th>
                            <th scope="col" class="text" style="border: 1px solid black; padding: 2px; text-align: center;">Waktu Pelaksanaan</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($jadwal as $jadwal)
                          <tr>
                           <td class="text" style="border: 1px solid black; padding: 2px; text-align: center;">{{$loop->iteration}}</td>
                           <td class="text" style="border: 1px solid black; padding: 2px;">{{$jadwal->kegiatan}}</td>
                           <td class="text" style="border: 1px solid black; padding: 2px; text-align: center;">{{Date::createFromDate($jadwal->tglpelaksanaan)->format('l, j F Y')}}</td>
                           <td class="text" style="border: 1px solid black; padding: 2px; text-align: center;">{{$jadwal->waktumulai}} {{$jadwal->waktuselesai}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <br>
                      
        
        <table width="100%" border="0" cellspacing="10" cellpadding="0">
                    
                    <tr>
                      <td class="text">Apabila Saudara butuh keterangan dan penjelasan lebih lanjut, dapat menghubungi Pejabat pengadaan sesuai alamat tersebut di atas sampai dengan batas akhir pemasukan Dokumen Penawaran.</td>
                    </tr><br>
                    <tr>
                      <td class="text">Demikian disampaikan untuk diketahui.</td>
                    </tr>
                    </table>
                
            </div>
            <div class="mt-6">
                <a href="{{route('undangan.cetak',[$kotakmasuk->id_paket])}}" target="_blank" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Download Surat Undangan</a>
            </div>
            
          </div>
      </div>
      <div class="flex items-center justify-end mt-4">
  
        <a href="{{route('kotakmasuk.index')}}" class="inline-flex items-center px-4 py-2 bg-cyan-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-cyan-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Kembali</a>
       
    </div>
  </div>

  

     
</div>

    </div>

    
</x-app-layout>



