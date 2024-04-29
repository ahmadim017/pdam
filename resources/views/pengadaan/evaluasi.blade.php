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
        $('#id_user').select2({
            placeholder: 'Pilih Daftar Penyedia',
            allowClear: true
        });
    });
</script>
   
<script type="text/javascript">


$(document).ready(function() {
    $('#uploadButton1').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#uploadForm1').submit();
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
        @if($nontender->hargapenawaran)
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Evaluasi</a></li>
        @endif
        @if($nontender->status == 'Diterima')
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('pengadaan.kontrak',[$pengadaan->id])}}">Buat Kontrak</a></li>
        @endif
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
  <th class="bg-light">Nama Penyedia</th>
  <td><strong>{{$nontender->user->name}}</strong></td>
</tr>
<tr>
  <th class="bg-light">Harga Penawaran</th>
  <td><strong>Rp. {{number_format($nontender->hargapenawaran)}}</strong></td>
</tr>
<tr>
  <th class="bg-light">Nilai Kontrak</th>
  <td>
   
    <div class="list-group">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
            Dokumen Penawaran
        </a>
        <div class="list-group-item list-group-item-action align-items-center">
            <div class="d-flex justify-content-between ">
                <a href="{{asset('storage/app/public/dist/filepenawaran/'. $nontender->filepenawaran)}}" target="_blank" class="btn btn-success btn-sm mr-2">Download Dokumen Penawaran</a>
                <button class="btn btn-secondary btn-sm">{{Date::createFromDate($nontender->updated_at)->format('l, j F Y')}}</span>
            </div>
          </div>
    </div>
      <!-- Modal -->
      
        
    </div>
      
  </td>
</tr>


</table>
</div>
<form action="{{route('nontender.evaluasi',[$nontender->id])}}" id="uploadForm1" method="POST" onsubmit="return confirm('Apakah Anda sudah mengavaluasi dengan benar?')">
  @csrf
  <input type="hidden" value="{{$pengadaan->id}}" name="id_paket">
</form>
@if($nontender->status == 'Diterima')
<button type="submit" id="uploadButton1" class="btn btn-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg> Batalkan</button>
@else
<button type="submit" id="uploadButton1" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg> Setuju</button>
@endif

<a href="{{route('pengadaan.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </div>
      </div>
  

  </div>
</div>
@endsection