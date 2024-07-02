@extends('layouts.sbadmin')

@section('footer')

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>   
<script type="text/javascript">


$(document).ready(function() {
    $('#banegoisasi').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#formnegoisasi').submit();
    });

   
});

</script>
<script>
  // Mendapatkan elemen input
  var hpsInput = document.getElementById('hasilnegoisasi');

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

</script>

@endsection

@section('content')

<div class="row">
  <div class="col">
    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{route('tender.index')}}">Daftar Paket</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.show',[$pengadaan->id])}}">Detail Paket</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.aanwizing',[$pengadaan->id])}}">Pemberian Penjelasan</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.pembukaan',[$pengadaan->id])}}">Pembukaan Penawaran</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.evaluasi',[$pengadaan->id])}}">Evaluasi</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.klarifikasi',[$pengadaan->id])}}">Klarifikasi dan Verifikasi</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.negoisasi',[$pengadaan->id])}}">Negoisasi Teknis dan Biaya</a></li>
       
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Pengumuman Pemenang</a></li>
      
      </ol>
    </nav>
  </div>
</div>

<div class="col-md-12">
  <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Pengumuman Pemenang</h6>
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
    <th class="bg-light">Id Paket</th>
<td colspan="3"><strong>{{$pengadaan->id}}</strong></td>
</tr>
  <tr>
      <th class="bg-light">Nama Paket</th>
  <td colspan="3"><strong>{{$pengadaan->namapaket}}</strong></td>
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
    <th class="bg-light">Calon Pemenang</th>
    <td><strong>{{$detailtender->user->administrasi->badanusaha->nama}}. {{$detailtender->user->name}}</strong></td>
</tr>
<tr>
    <th class="bg-light">Harga Penawaran</th>
    <td><strong>Rp. {{number_format($prosestender->hargapenawaran)}}</strong></td>
</tr>
<form id="formnegoisasi" action="{{route('detailtender.bapengumumanpemenang',[$pengadaan->id])}}" method="POST">
@csrf


<tr>
  <th class="bg-light">No Surat Pengumuman Pemenang</th>
  <td><strong><input type="text" name="bapengumumanpemenang" value="{{ old('bapengumumanpemenang', $detailtender->bapengumumanpemenang ?? '') }}" class="form-control {{$errors->first('bapengumumanpemenang') ? "is-invalid" : ""}}"></strong></td>
  <div class="invalid-feedbeck">
            <span class="text-danger">{{$errors->first('bapengumumanpemenang')}}</span>
          </div></td>
</tr>
<tr>
  <th class="bg-light">Tanggal Surat</th>
  <td><strong><input type="date" name="tglpengumuman" value="{{ old('tglpengumuman', $detailtender->tglpengumuman ?? '') }}" class="form-control {{$errors->first('tglpengumuman') ? "is-invalid" : ""}}"></strong></td>
  <div class="invalid-feedbeck">
            <span class="text-danger">{{$errors->first('tglpengumuman')}}</span>
          </div>
</tr>
</form>
@if(optional($detailtender)->bapengumumanpemenang)
<tr>
  <th class="bg-light">Dokumen Pengumuman Pemenang</th>
  <td>
   
    <a href="{{route('tender.bapengumumanpemenang',[$pengadaan->id])}}" target="_blank" class="btn btn-success btn-sm mr-2">Dokumen Surat Pengumuman Pemenang</a>
      
  </td>
</tr>
@endif

</table>
</div>

@if(Auth::user()->role == 'VERIFIKATOR')
@if(optional($detailtender)->bapengumumanpemenang)
<button type="submit" id="banegoisasi" class="btn btn-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg> Update</button>
@else
<button type="submit" id="banegoisasi" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg> Simpan</button>
@endif
@endif

        </div>
      </div>
  

  </div>
</div>
@endsection