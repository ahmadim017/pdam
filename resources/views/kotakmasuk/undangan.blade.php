<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <style>

        .text {
            font-size: 12px;
        }

        /* Anda bisa menambahkan lebih banyak selector CSS di sini */
    </style>
<title>Undangan Penunjukan Langsung</title>
</head>
<body>
    <div class="">
        <table width="100%">
            <tr>
                <td width="90" height="80" align="center"><img src="{{asset('public/image/ppu.png')}}" width="70px"></td>
                <td><center><font size="2"><b> PEMERINTAH KABUPATEN PENAJAM PASER UTARA</b></font><br>
                    <font size="2"><b>PERUMDA AIR MINUM DANUM TAKA</font></b><br>
                    <font size="2"><b>UNIT KERJA PENGADAAN BARANG DAN JASA (UKPBJ)
                    </font></b><br>
                    <font size ="1">Jalan Provinsi KM 1,5 RT. 03 Penajam 76141</font></center>
                </td>
                <td width="90" height="80" align="center"><img src="{{asset('public/image/logo.png')}}" width="70px"></td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>
        </table><br>
        
          <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td width="60%" valign="top" style="padding-right:10px">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="60" valign="top" class="text">Nomor</td>
                        <td width="10" align="center" valign="top" class="text"><strong>:</strong></td>
                        <td valign="top" class="text">{{$nontender->nosurat}}</td>
                    </tr>
                    <tr>
                        <td valign="top" class="text">Tanggal</td>
                        <td align="center" valign="top" class="text"><strong>:</strong></td>
                        <td valign="top" class="text">{{Date::createFromDate($nontender->created_at)->format('j F Y')}}</td>
                      </tr>
                      <tr>
                        <td valign="top" class="text">Perihal</td>
                        <td align="center" valign="top" class="text"><strong>:</strong></td>
                        <td valign="top" class="text"><strong><u>Undangan Penunjukan Langsung</u></strong></td>
                      </tr>
                    </tr>
            </table><br>
           <table border="0" width="100%" cellspacing="0" cellpadding="0">
            
                <td width="60%" valign="top" style="padding-right:10px">
                    <tr>
                        <td width="60" valign="top" class="text">Kepada Yth.</td>
                    </tr>
                    <tr>
                        <td width="60" valign="top" class="text">Direktur {{$nontender->user->name}}</td>
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
              <td valign="top" class="text">{{$nontender->paketpekerjaan->namakegiatan}}</td>
            </tr>
            <tr>
              <td valign="top" class="text">Lingkup Pekerjaan</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text">{{$nontender->paketpekerjaan->namapaket}}</td>
              </tr>
            <tr>
              <td valign="top" class="text">Nilai Total HPS</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text"> Rp. {{number_format($nontender->paketpekerjaan->hps)}}</td>
             
            </tr>
            
            <tr>
              <td valign="top" class="text"><b>2. Pelaksanaan Pengadaan</b></td>
              </tr>
              <tr>
               <td valign="top" class="text">Tempat dan Alamat</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text">Kantor Perumda Air Minum Danum Taka Jl Provinis KM. 1,5 RT.03 Penajam Kec. Penajam Kab. PPU Kal-Tim</td>
            </tr>
            <tr>
              <td valign="top" class="text">Website</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text">E-Proc Danum Taka</td>
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
        
           <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="60%" valign="top" style="padding-right:10px">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>&nbsp;<br></td>
                        </tr>
                </table>
            <td valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><br><br></td>
                    </tr>
                <tr>
                <td class="text"><center> Pejabat Pengadaan</center></td>
                  </tr>
               
                <tr>
                    <td><br><br></td>
                </tr>
                <tr>
                    <td class="text"><center><b><u>Suwito</u></b></center></td>
                </tr>
                <tr>
                    <td class="text"><center><b>NIK. 640 194 061</b></center></td>
                </tr>
                </table>
            </table>
          </div>

        
</body>
</html>

