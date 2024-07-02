<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <style>
        
        .text {
            text-align: justify;
            font-size: 12px;
        }
        .text2 {
            text-align: justify;
            font-size: 10px;
        }

        .p {
            font-size: 10px;
        }
        .page-break {
            page-break-before: always;
        }
        .card {
            border: 1px solid #000;
            margin-bottom: 10px;
            padding: 10px;
            page-break-inside: avoid;
        }
        .card-header {
            font-weight: bold;
            background-color: #f0f0f0;
            padding: 5px;
        }
        .card-body {
            padding: 10px;
        }
        .card-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .card-text {
            margin-bottom: 5px;
        }
        .btn {
            display: inline-block;
            padding: 5px 10px;
            font-size: 12px;
            text-align: center;
            text-decoration: none;
            white-space: nowrap;
            border-radius: 4px;
            background-color: #28a745;
            color: #fff;
            border: none;
        }
        .btn-sm {
            font-size: 10px;
            padding: 2px 5px;
        }
        /* Anda bisa menambahkan lebih banyak selector CSS di sini */
    </style>
<title>berita acara aanwizing</title>
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
        <p class="text"><center><b>Pengumuman Pemenang Tender</b></center></p>
        <p class="text"><center><b>{{$detailtender->tender->namapaket}}</b></center></p>
        <p class="text"><center><u><b>PERUMDA  AIR MINUM DANUM TAKA KABUPATEN PENAJAM PASER UTARA</b></u></center></p>
          <p class="text2"><center>Nomor : {{$detailtender->bapengumumanpemenang}} </center></p>
             <p class="text2"><center>Tanggal : {{Date::createFromDate($detailtender->tglpengumuman)->format('j F Y')}} </center></p><br>
           
             
          
           <table width="100%" border="0" cellspacing="10" cellpadding="0">
            
           <tr>
              <td class="text">Sehubungan dengan Pelaksanaan Tender pada pekerjaan {{$detailtender->tender->namapaket}} pada Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara, dengan ini mengumumkan pemenang tender untuk paket pekerjaan tersebut diatas yaitu sebagai berikut:
              </td>
            </tr>
            </table>
           <br>
           <table width="100%" border="0" cellspacing="10" cellpadding="0">
              <tr>
               <td valign="top" class="text">Nama Paket Pekerjaan</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text">{{$detailtender->tender->namapaket}}</td>
            </tr>
            <tr>
                <td valign="top" class="text">Uraian Pekerjaan</td>
               <td align="center" valign="top" class="text">:</td>
               <td valign="top" class="text">{{$detailtender->tender->namapaket}}</td>
             </tr>
             <tr>
                <td valign="top" class="text">Nilai Pagu Anggaran</td>
               <td align="center" valign="top" class="text">:</td>
               <td valign="top" class="text">Rp. {{number_format($detailtender->tender->pagu)}}</td>
             </tr>
             <tr>
                <td valign="top" class="text">Nilai Total HPS</td>
               <td align="center" valign="top" class="text">:</td>
               <td valign="top" class="text">Rp. {{number_format($detailtender->tender->hps)}}</td>
             </tr>
            <tr>
             <td valign="top" class="text">Sumber Dana</td>
            <td align="center" valign="top" class="text">:</td>
            <td valign="top" class="text">Perumda Air Minum Danum Taka Kab. Penajam Paser Utara</td>
          </tr>
          <tr>
            <td valign="top" class="text">Lokasi</td>
           <td align="center" valign="top" class="text">:</td>
           <td valign="top" class="text">{{$detailtender->tender->lokasi}}</td>
         </tr>
          <tr>
           <td valign="top" class="text">Waktu Pelaksanaan</td>
          <td align="center" valign="top" class="text">:</td>
          <td valign="top" class="text">{{$detailtender->tender->waktupelaksanaan}}</td>
        </tr>
          </table><br>

           <table width="100%" border="0" cellspacing="10" cellpadding="0">
              <tr>
            <td valign="top" class="text">Dengan ini memberitahukan Pemenang tender pada Pekerjaan  {{$detailtender->tender->namapaket}} pada Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara, Nomor Penawaran {{$prosestender->nosuratpenawaran}}  Tanggal {{Date::createFromDate($prosestender->tglsuratpenawaran)->format('j F Y')}} :</td>
          </tr>
          </table><br>
          <table width="100%" border="0" cellspacing="10" cellpadding="0">
            <tr>
             <td valign="top" class="text">Nama Perusahaan</td>
            <td align="center" valign="top" class="text">:</td>
            <td valign="top" class="text">{{$detailtender->user->administrasi->badanusaha->nama}}. {{$detailtender->user->name}}</td>
          </tr>
          <tr>
              <td valign="top" class="text">Alamat</td>
             <td align="center" valign="top" class="text">:</td>
             <td valign="top" class="text">{{$detailtender->user->administrasi->alamat}} {{$detailtender->user->administrasi->kabupaten->name}} {{$detailtender->user->administrasi->provinsi->name}}</td>
           </tr>
           <tr>
              <td valign="top" class="text">NPWP</td>
             <td align="center" valign="top" class="text">:</td>
             <td valign="top" class="text">{{$detailtender->user->npwp}}</td>
           </tr>
           <tr>
            <td valign="top" class="text">Direktur</td>
           <td align="center" valign="top" class="text">:</td>
           <td valign="top" class="text">{{$detailtender->user->administrasi->namadirektur}}</td>
         </tr>
           <tr>
              <td valign="top" class="text">Harga Penawaran</td>
             <td align="center" valign="top" class="text">:</td>
             <td valign="top" class="text">Rp. {{number_format($prosestender->hargapenawaran)}}</td>
           </tr>
           <tr>
            <td valign="top" class="text">Harga Negoisasi</td>
           <td align="center" valign="top" class="text">:</td>
           <td valign="top" class="text">Rp. {{number_format($detailtender->hasilnegoisasi)}}</td>
         </tr>
        </table><br> 
         
              <table width="100%" border="0" cellspacing="10" cellpadding="0">
              <tr>
            <td valign="top" class="text">Apabila peserta tender keberatan atas penetapan ini dapat menyampaikan keberatan/sanggahan yang disampaikan kepada: Pokja Pemilihan Barang/Jasa Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara , dengan waktu antara tanggal 15 Maret 2022 s.d 19 Maret 2022.</td>
          </tr>
          </table><br>
          <table width="100%" border="0" cellspacing="10" cellpadding="0">
            
            <tr>
              <td class="text">Demikian disampaikan, atas perhatiannya diucapkan terima kasih.</td>
            </tr>
            </table><br>
        
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
                <td class="text"><center> Pokja Pemilihan</center></td>
                  </tr>
                  <tr>
                    <td class="text"><center> Ketua</center></td>
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

