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
<title>berita Acara Negoisasi</title>
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
        
        <p class="text"><center><u><b>Berita Acara Negoisasi</b></u></center></p>
          <p class="text2"><center>Nomor : {{$detailtender->banegoisasi}} </center></p>
             <p class="text2"><center>Tanggal : {{Date::createFromDate($detailtender->tglnegoisasi)->format('j F Y')}} </center></p><br>
           
             
          
           <table width="100%" border="0" cellspacing="10" cellpadding="0">
            
           <tr>
              <td class="text">Pada Hari {{$day}} Tanggal {{$tanggal}} dengan mengambil tempat di kantor Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara Jl. Propinsi KM 1,5 RT. 03 Penajam,
                kami yang bertanda tangan dibawah ini masing-masing Ketua, Sekretaris dan Anggota Pokja Pemilihan Barang dan Jasa Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara berdasarkan Surat Keputusan Direktur Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara Nomor 21 Tahun 2021 Tanggal 9 Desember 2021 bersama-sama dengan
                 {{$detailtender->user->administrasi->badanusaha->nama}}. {{$detailtender->user->name}} telah melakukan Negosiasi terhadap harga satuan pekerjaan {{$detailtender->tender->namapaket}}, 
                 Negosiasi ini dilakukan atas dasar mufakat dan persetujuan bersama dalam memperoleh harga wajar yang dapat dipertanggung jawabkan serta tidak saling merugikan.
              </td>
            </tr>
            </table>
           <br>
           <table width="100%" border="0" cellspacing="10" cellpadding="0">
            <tr>
          <td valign="top" class="text">Sesuai hasil Negosiasi tersebut diatas, maka dapat diuraikan sebagai berikut :</td>
        </tr>
        </table><br>

          
          
          <table width="100%" style="border-collapse: collapse;" cellspacing="0" cellpadding="0">
                <thead>
                  <tr>
                    <th scope="col" class="text2" style="border: 1px solid black; padding: 2px; text-align: center;">No.</th>
                    <th scope="col" class="text2" style="border: 1px solid black; padding: 2px; text-align: center;">Calon Penyedia</th>
                    <th scope="col" class="text2" style="border: 1px solid black; padding: 2px; text-align: center;">Harga Penawaran</th>
                    <th scope="col" class="text2" style="border: 1px solid black; padding: 2px; text-align: center;">Hasil Negoisasi Harga/Biaya</th>
                    <th scope="col" class="text2" style="border: 1px solid black; padding: 2px; text-align: center;">Hasil Pengurangan</th>  
                </tr>
                </thead>
                <tbody>
              
                  <tr>
                   <td class="text2" style="border: 1px solid black; padding: 2px; text-align: center;">1.</td>
                   <td class="text2" style="border: 1px solid black; padding: 2px;">{{$detailtender->user->administrasi->badanusaha->nama}}. {{$detailtender->user->name}}</td>
                   <td class="text2" style="border: 1px solid black; padding: 2px; text-align: center;">Rp. {{number_format($prosestender->hargapenawaran)}}</td>
                   <td class="text2" style="border: 1px solid black; padding: 2px; text-align: center;">Rp. {{number_format($detailtender->hasilnegoisasi)}}</td> 
                   <td class="text2" style="border: 1px solid black; padding: 2px; text-align: center;">Rp. {{number_format(($prosestender->hargapenawaran) - ($detailtender->hasilnegoisasi))}}</td>                   
                </tr>
                </tbody>
              </table>
              <br>
              <table width="100%" border="0" cellspacing="10" cellpadding="0">
              <tr>
            <td valign="top" class="text">Perincian lebih lanjut mengenai perubahan-perubahan Rencana Anggaran biaya pelaksanaan pekerjaan yang mengalami perubahan sebagai Negosiasi tertera pada lampiran Berita Acara Negosiasi ini.</td>
          </tr>
          </table><br>
          <table width="100%" border="0" cellspacing="10" cellpadding="0">
            
            <tr>
              <td class="text">Demikian Berita Acara dibuat dengan benar untuk dipergunakan sebagaimana mestinya.</td>
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

