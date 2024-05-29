@extends('layouts.sbadmin')

@section('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<!-- Sertakan CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<!-- Sertakan Skrip Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- Sertakan Skrip jQuery Mask (hanya salah satu, sesuaikan dengan preferensi Anda) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

<!-- Inisialisasi Select2 -->

   
<script type="text/javascript">


$(document).ready(function() {
    $('#uploadButton1').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#uploadForm1').submit();
    });

   
});



    </script>
<script>
    // Mendapatkan elemen input
    var hpsInput = document.getElementById('nilaikontrak');

    // Menambahkan event listener untuk memantau input
    hpsInput.addEventListener('input', function() {
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

    $(document).ready(function() {
    $('#uploadButton').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#uploadForm').submit();
    });

   
});
</script>
@endsection

@section('content')

<div class="row">
  <div class="col">
    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{route('pengadaan.index')}}">Daftar Paket</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('pengadaan.show',[$pengadaan->id])}}">Detail Paket</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('pengadaan.aanwizing',[$pengadaan->id])}}">Pemberian Penjelasan</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('pengadaan.evaluasi',[$pengadaan->id])}}">Evaluasi</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Negoisasi Teknis dan Biaya</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Buat Kontrak</a></li>
      </ol>
    </nav>
  </div>
</div>

<div class="col-md-12">
  <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Detail Paket</h6>
      </a>
      @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif 
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
          <div class="table-responsive">
<table class="table">
  
  <tr>
      <th class="bg-light">Nama Paket</th>
  <td colspan="3"><strong>{{$pengadaan->namapaket}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">Pagu</th>
<td><strong>Rp.{{number_format($pengadaan->pagu)}}</strong></td>
</tr>
  <tr>
    <th class="bg-light">Hps</th>
<td><strong>Rp.{{number_format($pengadaan->hps)}}</strong></td>
</tr>
  <tr>
      <th class="bg-light">Lokasi Pekerjaan</th>
  <td><strong>{{$pengadaan->lokasi}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Tahun Anggaran</th>
  <td><strong>{{$pengadaan->tahunanggaran}}</strong></td>
  </tr>
  
  <tr>
      <th class="bg-light">Jangka Waktu Pelaksanaan</th>
  <td><strong>{{$pengadaan->waktupelaksanaan}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">Kategori Pengadaan</th>
    <td><strong>{{$pengadaan->klasifikasi}}</strong></td>
</tr>
<tr>
    <th class="bg-light">Metode Pengadaan</th>
    <td><strong>{{$nontender->metodepengadaan}}</strong></td>
</tr>
<tr>
  <th class="bg-light">Nama Penyedia</th>
  <td><strong>{{$nontender->user->name}}</strong></td>
</tr>
<tr>
    <th class="bg-light">Npwp</th>
    <td><strong>{{$nontender->user->npwp}}</strong></td>
  </tr>
<tr>
  <th class="bg-light">Harga Penawaran</th>
  <td><strong>Rp. {{number_format($nontender->hargapenawaran)}}</strong></td>
</tr>
<form action="{{route('kontrak.store')}}" id="uploadForm" method="POST">
<tr>
    <th class="bg-light">Nilai Kontrak</th>
    <td>
      <input type="text" name="nilaikontrak" id="nilaikontrak" class="form-control {{$errors->first('nilaikontrak') ? "is-invalid" : ""}}" value="{{ old('nilaikontrak', $kontrak->nilaikontrak ?? '') }}">
      <div class="invalid-feedback">
        <span class="text-danger">{{$errors->first('nilaikontrak')}}</span>
      </div>
     
    </td>
    
  </tr>
<tr>
    <th class="bg-light">No Surat Perjanjian/Kontrak</th>
    <td>
      <input type="text" name="nosurat" class="form-control {{$errors->first('nosurat') ? "is-invalid" : ""}}" value="{{ old('nosurat', $kontrak->nosurat ?? '') }}">
      <div class="invalid-feedback">
        <span class="text-danger">{{$errors->first('nosurat')}}</span>
      </div>
     
    </td>
    
  </tr>
  <tr>
    <th class="bg-light">Tanggal Surat</th>
    <td>
      <input type="date" name="tglsurat" class="form-control {{$errors->first('tglsurat') ? "is-invalid" : ""}}" value="{{ old('tglsurat', isset($kontrak) ? \Carbon\Carbon::parse($kontrak->tglsurat)->format('Y-m-d') : '') }}">
      <div class="invalid-feedback">
        <span class="text-danger">{{$errors->first('tglsurat')}}</span>
      </div>
    </td>
  </tr>

  @if(optional($kontrak)->nilaikontrak)
<tr>
  <th class="bg-light">Dokumen Kontrak</th>
  <td>
   
    <a href="{{route('kontrak.cetak',[$nontender->id])}}" target="_blank" class="btn btn-success btn-sm mr-2">Download Dokumen kontrak</a>
      
  </td>
</tr>
@endif
</table>
</div>

    @csrf
    <input type="hidden" value="{{$pengadaan->id}}" name="id_paket">
    <input type="hidden" value="{{$nontender->id_user}}" name="id_user">
</form>
@if(optional($kontrak)->nosurat)
<button type="submit" id="uploadButton" class="btn btn-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg> Ubah</button>
@else
<button type="submit" id="uploadButton" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg> Simpan</button>
@endif

<a href="{{route('pengadaan.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </div>
      </div>
  

  </div>
</div>
@endsection