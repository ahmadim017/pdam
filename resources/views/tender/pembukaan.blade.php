@extends('layouts.sbadmin')

@section('footer')

   
<script type="text/javascript">


$(document).ready(function() {
    $('#uploadButton1').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#uploadForm1').submit();
    });

   
});

</script>
<script type="text/javascript">


// Tampilkan tabel daftar penyedia saat tombol diklik
$('#bukaPenawaranButton').click(function() {
  
    $('#bukaPenawaranForm').submit();
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
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Pembukaan Penawaran</a></li>
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
        <h6 class="m-0 font-weight-bold text-primary">Pembukaan Penawaran</h6>
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
<form id="bukaPenawaranForm" action="{{route('detailtender.pembukaanpenawaran',[$pengadaan->id])}}" method="POST">
@csrf


<tr>
  <th class="bg-light">Ba Pembukaan Dokumen Penawaran</th>
  <td><strong><input type="text" name="bapembukaanpenawaran" value="{{ old('bapembukaanpenawaran', $detailtender->bapembukaanpenawaran ?? '') }}" class="form-control {{$errors->first('baaritmatik') ? "is-invalid" : ""}}"></strong></td>
  <div class="invalid-feedbeck">
            <span class="text-danger">{{$errors->first('bapembukaanpenawaran')}}</span>
          </div></td>
</tr>
<tr>
  <th class="bg-light">Tanggal Berita Acara</th>
  <td><strong><input type="date" name="tglpembukaanpenawaran" value="{{ old('tglpembukaanpenawaran', $detailtender->tglpembukaanpenawaran ?? '') }}" class="form-control {{$errors->first('tglaritmatik') ? "is-invalid" : ""}}"></strong></td>
  <div class="invalid-feedbeck">
            <span class="text-danger">{{$errors->first('tglpembukaanpenawaran')}}</span>
          </div>
</tr>

</form>
@if(optional($detailtender)->bapembukaanpenawaran)
<tr>
  <th class="bg-light">Dokumen BA Pemberian Penjelasan</th>
  <td>
   
    <a href="{{route('tender.bapembukaan',[$pengadaan->id])}}" target="_blank" class="btn btn-success btn-sm mr-2">Dokumen BA Pembukaan Penawaran</a>
      
  </td>
</tr>
@endif

@if(optional($detailtender)->bapembukaanpenawaran)
<tr>
  <th class="bg-light">Daftar Penyedia</th>
  <td>
   
    <div class="mt-3">
      <table class="table">
        <thead class="table-light">
          <th>No.</th>
          <th>Nama Peserta</th>
          <th>Harga Penawaran</th>
          <th>Keterangan</th>
        </thead>
        <tbody>
          @php
            // Temukan harga penawaran terendah
            $hargaTerendah = $prosestender->min('hargapenawaran');
          @endphp
          @foreach ($prosestender as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="{{route('tender.penawaran',[$item->id])}}">{{$item->user->administrasi->badanusaha->nama}}. {{$item->user->name}}</a></td>
            <td>Rp. {{number_format($item->hargapenawaran)}}</td>
            <td>
              @if ($item->hargapenawaran == $hargaTerendah)
                Penawaran harga terendah
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </td>
</tr>
@endif

</table>
</div>

@if(Auth::user()->role == 'VERIFIKATOR')
@if(optional($detailtender)->bapembukaanpenawaran)
<button type="submit" id="bukaPenawaranButton" class="btn btn-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg> Update</button>
@else
<button type="submit" id="bukaPenawaranButton" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
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