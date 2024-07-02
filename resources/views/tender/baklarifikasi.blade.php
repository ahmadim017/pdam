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

        .p {
            font-size: 12px;
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
<title>berita acara klarifikasi dan verifikasi</title>
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
        
        <p class="text"><center><u><b>Berita Acara Klarfikasi dan Verifikasi</b></u></center></p>
          <p class="text"><center>Nomor : {{$detailtender->baklarifikasi}} </center></p>
             <p class="text"><center>Tanggal : {{Date::createFromDate($detailtender->tglbaklarifikasi)->format('j F Y')}} </center></p><br>
           
             <table width="100%" border="0" cellspacing="10" cellpadding="0">
              <tr>
               <td valign="top" class="text">Pekerjaan</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text">{{$detailtender->tender->namapaket}}</td>
            </tr>
            <tr>
             <td valign="top" class="text">Sumber Dana</td>
            <td align="center" valign="top" class="text">:</td>
            <td valign="top" class="text">Perumda Air Minum Danum Taka Kab. Penajam Paser Utara</td>
          </tr>
          <tr>
           <td valign="top" class="text">Tahun Anggaran</td>
          <td align="center" valign="top" class="text">:</td>
          <td valign="top" class="text">{{$detailtender->tender->tahunanggaran}}</td>
        </tr>
          </table><br>
          
           <table width="100%" border="0" cellspacing="10" cellpadding="0">
            
           <tr>
              <td class="text">Pada Hari {{$day}} Tanggal {{$tanggal}} dengan mengambil tempat di kantor Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara Jl. Propinsi KM 1,5 RT. 03 Penajam,
                kami yang bertanda tangan dibawah ini masing-masing Ketua, Sekretaris dan Anggota Pokja Pemilihan Barang/jasa berdasarkan Surat Peraturan Direktur Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara Nomor :    21  Tahun 2021 tanggal  9 Desember 2021 telah menyelesaikan Klarifikasi dan Verifikasi data kualifikasi  {{$detailtender->user->administrasi->badanusaha->nama}}. {{$detailtender->user->name}}.
              </td>
            </tr>
            </table>
           <br>
           <table width="100%" border="0" cellspacing="10" cellpadding="0">
            
            <tr>
              <td class="text">Data-data yang perlu dibawa untuk verifikasi data adalah :</td>
            </tr>
            </table> <br>
            <table class="text" width="100%" border="0" cellspacing="10" cellpadding="0">
             
              <tr>
                  <td>1.</td>
                  <td>Sertifikat Badan Usaha yang berlaku (Asli)</td>
              </tr>
              <tr>
                  <td>2.</td>
                  <td>Akte Pendirian Perusahaan (Asli)</td>
              </tr>
              <tr>
                  <td>3.</td>
                  <td>Bukti Telah melunasi kewajiban pajak (Asli)</td>
              </tr>
              <tr>
                  <td>4.</td>
                  <td>Bukti Pengalaman tertinggi (Asli).</td>
              </tr>
              <tr>
                  <td>5.</td>
                  <td>Berita Acara Penyerahan Pekerjaan selesai pada Bukti Pengalaman Tertinggi (Asli)</td>
              </tr>
              <tr>
                  <td>6.</td>
                  <td>SIUP (Asli)</td>
              </tr>
              <tr>
                  <td>7.</td>
                  <td>Izin Gangguan (Asli)</td>
              </tr>
              <tr>
                  <td>8.</td>
                  <td>NPWP (Asli)</td>
              </tr>
          
      </table><br>
        
      <table width="100%" border="0" cellspacing="10" cellpadding="0">
            
        <tr>
          <td class="text">Dari hasil pemeriksaan data tersebut dapat disimpulkan bahwa data yang dilampirkan adalah Asli.</td>
        </tr>
        </table><br>
           
          <table width="100%" border="0" cellspacing="10" cellpadding="0">
            
            <tr>
              <td class="text">Demikian Berita Acara ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</td>
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

