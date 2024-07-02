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
        
        td {
                
                vertical-align: top;
            }
         
            ol {
                padding-left: 20px;
            }
            ol li {
                margin-bottom: 8px;
            }
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
        <p class="text"><center><u><b>KEPUTUSAN POKJA PEMILIHAN BARANG/JASA PERUMDA  AIR MINUM DANUM TAKA KABUPATEN PENAJAM PASER UTARA TAHUN ANGGARAN {{$detailtender->tender->tahunanggaran}}</b></u></center></p>
          <p class="text"><center>Nomor : {{$detailtender->bapengumumanpemenang}} </center></p>
            <br>
           
            <p class="text"><center><b>TENTANG PENETAPAN PELAKSANAAN PENGADAAN SECARA TENDER PEKERJAAN {{$detailtender->tender->namapaket}} PADA PERUMDA  AIR MINUM DANUM TAKA KABUPATEN PENAJAM PASER UTARA TAHUN ANGGARAN {{$detailtender->tender->tahunanggaran}}</b></center></p>
                <br>

                <p class="text"><center><b>POKJA PEMILIHAN BARANG/JASA PERUMDA AIR MINUM DANUM TAKA KABUPATEN PENAJAM PASER UTARA TAHUN ANGGARAN {{$detailtender->tender->tahunanggaran}}</b></center></p>
                <br>
          
                <table  width="100%">
                    <tr>
                        <td class="text">Mambaca</td>
                        <td>:</td>
                        <td>
                            <ol class="text">
                                <li>1. Surat penawaran harga dari {{$penawarCount}}  calon penyedia yang untuk pekerjaan {{$detailtender->tender->namapaket}} pada Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara;</li>
                                <li>2. Berita Acara Pembukaan Surat Penawaran Harga Nomor : {{$detailtender->bapembukaanpenawaran}} Tanggal {{Date::createFromDate($detailtender->tglpembukaanpenawaran)->format('j F Y')}} Pekerjaan {{$detailtender->tender->namapaket}};</li>
                                <li>3. Berita Acara Evaluasi Penawaran Nomor : {{$detailtender->baevaluasi}} Tanggal {{Date::createFromDate($detailtender->tglbaevaluasi)->format('j F Y')}} Pekerjaan {{$detailtender->tender->namapaket}};</li>
                                <li>4. Berita Acara Klarifikasi dan Verifikasi Nomor : {{$detailtender->baklarifikasi}} Tanggal {{Date::createFromDate($detailtender->tglbaklarifikasi)->format('j F Y')}} Pekerjaan {{$detailtender->tender->namapaket}};</li>
                                <li>5. Berita Acara Negosiasi Harga Nomor : {{$detailtender->banegoisasi}} Tanggal {{Date::createFromDate($detailtender->tglnegoisasi)->format('j F Y')}} Pekerjaan {{$detailtender->tender->namapaket}};</li>
                                <li>6. Pengumuman Pemenang Tender Nomor : {{$detailtender->bapengumumanpemenang}} Tanggal {{Date::createFromDate($detailtender->tglpengumuman)->format('j F Y')}} Pekerjaan {{$detailtender->tender->namapaket}};</li>
                            </ol>
                        </td>
                    </tr>
                </table>
           <br>
           <table width="100%">
            <tr>
                <td class="text">Mengingat</td>
                <td class="text">:</td>
                <td>
                    <ol class="text">
                        <li>1. Peraturan Daerah Nomor 5 Tahun 2005 tentang Perusahan Daerah Air Minum Kabupaten Penajam Paser Utara sebagaimana telah di ubah dengan Peraturan Daerah Kabupaten Penajam Paser Utara Nomor 3 Tahun 2020 tentang Perubahan bentuk Perusahaan Daerah Air Minum Kabupaten Penajam Paser Utara menjadi Perusahaan Umum Daerah Air Minum Danum Taka;</li>
                        <li>2. Keputusan Bupati Penajam Paser Utara Nomor : 539/210/2019 tanggal 25 September 2019 tentang Pengangkatan Direksi Perusahaan Daerah Air Minum Kabupaten Penajam Paser Utara periode 2019 – 2024;</li>
                        <li>3. Surat Keputusan Direktur Perumda Air Minum Danum Taka Nomor : 1 Tahun 2021 Tanggal 8 Februari 2021 Tentang Pedoman Pelaksanaan Pengadaan Barang dan Jasa dilingkungan Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara beserta lampirannya.</li>
                    </ol>
                </td>
            </tr>
        </table>
        <p class="text"><center><b>MEMUTUSKAN</b></center></p><br>

        <table>
            <tr>
                <td class="text">PERTAMA</td>
                <td class="text">:</td>
                <td>
                    <ol class="text">
                        <li>Pelaksana Pekerjaan {{$detailtender->tender->namapaket}} pada Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara Tahun Anggaran {{$detailtender->tender->tahunanggaran}}, dilaksanakan oleh:</li>
                    </ol>
                </td>
            </tr>
        </table>
        <table width="100%">
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
              <td valign="top" class="text">Harga Penawaran</td>
             <td align="center" valign="top" class="text">:</td>
             <td valign="top" class="text">Rp. {{number_format($prosestender->hargapenawaran)}}</td>
           </tr>
           <tr>
            <td valign="top" class="text">Terbilang</td>
           <td align="center" valign="top" class="text">:</td>
           <td valign="top" class="text"><i>{{$hargapenawaran}}</i></td>
         </tr>
           <tr>
            <td valign="top" class="text">Harga Negoisasi</td>
           <td align="center" valign="top" class="text">:</td>
           <td valign="top" class="text">Rp. {{number_format($detailtender->hasilnegoisasi)}}</td>
         </tr>
         <tr>
            <td valign="top" class="text">Terbilang</td>
           <td align="center" valign="top" class="text">:</td>
           <td valign="top" class="text"><i>{{$harganegoisasi}}</i></td>
         </tr>
        </table><br> 
           
           
        <table>
            <tr>
                <td class="text">KEDUA</td>
                <td class="text">:</td>
                <td>
                    <ol class="text">
                        <li>Keputusan ini berlaku sejak tanggal ditetapkan, dengan ketentuan apabila dikemudian hari ternyata terdapat kekeliruan akan diadakan perbaikan sebagaimana mestinya.</li>
                    </ol>
                </td>
            </tr>
        </table>
 
        <br> 
         
            
         
        
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
                        <td class="text"><center> DITETAPKAN : PENAJAM</center></td>
                          </tr>
                          <tr>
                            <td class="text"><center> PADA TANGGAL : {{Date::createFromDate($detailtender->tglpenetapan)->format('j F Y')}} </center></td>
                              </tr>
                              <hr>
                <tr>
                <td class="text"><center> Pokja Pemilihan Barang/Jasa</center></td>
                  </tr>
                  <tr>
                    <td class="text"><center> Perumda Air Minum Danum Taka Kabupaten Penajam Paser Utara</center></td>
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

