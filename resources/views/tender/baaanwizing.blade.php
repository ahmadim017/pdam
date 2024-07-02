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
        
        <p class="text"><center><u><b>Berita Acara Penjelasan Dokumen Pascakualifikasi</b></u></center></p>
          <p class="text"><center>Nomor : {{$detailtender->baaanwizing}} </center></p>
             <p class="text"><center>Tanggal : {{Date::createFromDate($detailtender->tglaanwizing)->format('j F Y')}} </center></p><br>
           
            
          
           <table width="100%" border="0" cellspacing="10" cellpadding="0">
            
           <tr>
              <td class="text">Pada Hari {{$day}} Tanggal {{$tanggal}} dengan mengambil tempat di kantor Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara Jl. Propinsi KM 1,5 RT. 03 Penajam,
                Telah mengadakan Rapat Penjelasan Pekerjaan (Aanwizing) dengan Peserta Tender pekerjaan {{$detailtender->tender->namapaket}} yang terdiri dari:
              </td>
            </tr>
            </table>
            
          
           <br>
              
          
            <table width="100%" style="border-collapse: collapse;" cellspacing="0" cellpadding="0">
                <thead>
                  <tr>
                    <th scope="col" class="text" style="border: 1px solid black; padding: 2px; text-align: center;">No.</th>
                    <th scope="col" class="text" style="border: 1px solid black; padding: 2px; text-align: center;">Nama Perusahaan</th>
                    <th scope="col" class="text" style="border: 1px solid black; padding: 2px; text-align: center;">Nama Direktur/Kuasa Direksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($prosestender as $p)
                  <tr>
                   <td class="text" style="border: 1px solid black; padding: 2px; text-align: center;">{{$loop->iteration}}</td>
                   <td class="text" style="border: 1px solid black; padding: 2px;">{{$p->user->administrasi->badanusaha->nama}}. {{$p->user->name}}</td>
                   <td class="text" style="border: 1px solid black; padding: 2px; text-align: center;">{{$p->user->administrasi->namadirektur}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <br>
              
<table width="100%" border="0" cellspacing="10" cellpadding="0">
            
            <tr>
              <td class="text">Pokok-pokok penjelasan dan perubahan serta penambahan yang telah dilaksanakan pada rapat tersebut sebagai berikut :</td>
            </tr>
            </table>
            <table width="100%" border="0" cellspacing="10" cellpadding="0">
              <tr>
                <td valign="top" class="text">1</td>
               <td valign="top" class="text">Penjelasan Umum</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text">Suwito</td>
            </tr>
            <tr>
              <td valign="top" class="text">2</td>
             <td valign="top" class="text">Penjelasan Teknis</td>
            <td align="center" valign="top" class="text">:</td>
            <td valign="top" class="text">Suwito</td>
          </tr>
          <tr>
            <td valign="top" class="text">3</td>
           <td valign="top" class="text">Penjelasan Administrasi</td>
          <td align="center" valign="top" class="text">:</td>
          <td valign="top" class="text">Suwito</td>
        </tr>
        <tr>
          <td valign="top" class="text">4</td>
         <td valign="top" class="text">Penjelasan Dokumen Kualifikasi</td>
        <td align="center" valign="top" class="text">:</td>
        <td valign="top" class="text">Suwito</td>
      </tr>
      <tr>
        <td valign="top" class="text">5</td>
       <td valign="top" class="text">Tanya Jawab peserta rapat</td>
      <td align="center" valign="top" class="text">:</td>
      <td valign="top" class="text">Penjelasan yang diberikan Pejabat Pengadaan dapat dimengerti oleh peserta</td>
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

  <!-- Lampiran -->
  <div class="page-break"></div>
  <div class="">
      <p class="text"><center>Lampiran</center></p><br>
      @foreach ($penjelasan as $index => $item)
    <div class="card mb-3">
        <div class="card-header">
            {{$item->user->name}}
        </div>
        <div class="card-body">
            <h5 class="card-title"> {{$item->dokumen}} - {{$item->bab}}</h5>
            <p class="card-text">{{$item->uraian}}</p>
           
            </div>
            <hr>
            @foreach ($jawaban as $jawab)
                @if ($jawab->id_penjelasan == $item->id)
                    <div class="mb-3">
                        <p>{!!$jawab->jawaban!!}</p>
                        @if ($jawab->file)
                            <a href="{{asset('storage/app/'. $jawab->file)}}" target="_blank" class="btn btn-success btn-sm">Download File</a>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    @endforeach

  
         
    

      <!-- Tambahkan konten lampiran sesuai kebutuhan -->
  </div>       
</body>
</html>

