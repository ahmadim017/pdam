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
<title>Undangan Klarifikasi dan Verifikasi</title>
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
                        <td valign="top" class="text">{{$undangan->nosurat}}</td>
                    </tr>
                    <tr>
                        <td valign="top" class="text">Tanggal</td>
                        <td align="center" valign="top" class="text"><strong>:</strong></td>
                        <td valign="top" class="text">{{Date::createFromDate($undangan->tglsurat)->format('j F Y')}}</td>
                      </tr>
                      <tr>
                        <td valign="top" class="text">Perihal</td>
                        <td align="center" valign="top" class="text"><strong>:</strong></td>
                        <td valign="top" class="text"><strong><u>Undangan Klarifikasi, Verifikasi dan Negoisasi Harga</u></strong></td>
                      </tr>
                    </tr>
            </table><br>
           <table border="0" width="100%" cellspacing="0" cellpadding="0">
            
                <td width="60%" valign="top" style="padding-right:10px">
                    <tr>
                        <td width="60" valign="top" class="text">Kepada Yth.</td>
                    </tr>
                    <tr>
                        <td width="60" valign="top" class="text">Direktur {{$prosestender->user->name}}</td>
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
              <td class="text">Memperhatikan Surat Penawaran Nomor :{{$prosestender->nosuratpenawaran}}  Tanggal {{$prosestender->tglsuratpenawaran}} bersama ini kami harapkan kehadiran saudara pada :</td>
            </tr>
            </table>
            
          <table width="100%" border="0" cellspacing="10" cellpadding="0">
           
            
            <tr>
              <tr>
               <td valign="top" class="text">Hari</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text">{{Date::createFromDate($undangan->tglsurat)->format('l ')}}</td>
            </tr>
            <tr>
              <td valign="top" class="text">Tanggal</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text">{{Date::createFromDate($undangan->tglsurat)->format('j F Y')}}</td>
              </tr>
            <tr>
              <td valign="top" class="text">Waktu</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text"> {{$undangan->waktumulai}} s/d {{$undangan->waktuselesai}}</td>
             
            </tr>
            
            <tr>
              </tr>
              <tr>
               <td valign="top" class="text">Tempat dan Alamat</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text">Kantor Perumda Air Minum Danum Taka Jl Provinis KM. 1,5 RT.03 Penajam Kec. Penajam Kab. PPU Kal-Tim</td>
            </tr>
            <tr>
              <td valign="top" class="text">Acara</td>
              <td align="center" valign="top" class="text">:</td>
              <td valign="top" class="text">Klarifikasi, Verifikasi Data dan Negosiasi Harga  untuk Pekerjaan {{$prosestender->tender->namapaket}}</td>
              </tr>
            
          </table><br>
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
              <td class="text">Demikian Undangan ini kami sampaikan atas perhatian dan kehadiran saudara kami ucapkan terima kasih.</td>
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

