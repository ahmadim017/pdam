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
        <li class="breadcrumb-item"><a href="{{route('tender.index')}}">Daftar Paket</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.show',[$pengadaan->id])}}">Detail Paket</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.aanwizing',[$pengadaan->id])}}">Pemberian Penjelasan</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.pembukaan',[$pengadaan->id])}}">Pembukaan Penawaran</a></li>
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Evaluasi</a></li>
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
        <h6 class="m-0 font-weight-bold text-primary">Evaluasi</h6>
      </a>
      @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif 
    @if(session('Status'))
      <div class="alert alert-danger">
        {{session('Status')}}
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
<form id="uploadForm1" action="{{route('detailtender.baevaluasi',[$pengadaan->id])}}" method="POST">
  @csrf
<tr>
  <th class="bg-light">Berita Acara Hasil Evaluasi</th>
  <td><input type="text" name="baevaluasi" value="{{ old('baevaluasi', $detailtender->baevaluasi ?? '') }}" class="form-control"></td>
</tr>
<tr>
  <th class="bg-light">Tanggal Berita Acara Hasil Evaluasi</th>
  <td><input type="date" name="tglbaevaluasi" value="{{ old('baevaluasi', $detailtender->tglbaevaluasi ?? '') }}"  class="form-control"></td>
</tr>
@if(optional($detailtender)->baevaluasi)
<tr>
  <th class="bg-light">Dokumen BA Hasil Evaluasi Pascakualifikasi</th>
  <td>
   
    <a href="{{route('tender.baevaluasi',[$pengadaan->id])}}" target="_blank" class="btn btn-success btn-sm mr-2">Dokumen BA Hasil Evaluasi Pascakualifikasi</a>
      
  </td>
</tr>
@endif
</form>
    <table class="table">
      <thead  class="table-light">
        <th>No.</th>
        <th>Nama Peserta</th>
        <th>Penawaran</th>
        <th>Undangan Verifikasi</th>
        <th><button class="btn btn-primary btn-sm">EP</button></th>
        <th><button class="btn btn-success btn-sm">ET</button></th>
        <th><button class="btn btn-info btn-sm">EB</button></th>
        <th><button class="btn btn-warning btn-sm">CP</button></th>
        <th></th>
      </thead>
      <tbody>
        
        @foreach ($prosestender as $item)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>
            @if($item->hargapenawaran)
           <a href="{{route('tender.penawaran',[$item->id])}}" >{{$item->user->administrasi->badanusaha->nama}}. {{$item->user->name}}</a>
           @else
           {{$item->user->administrasi->badanusaha->nama}}. {{$item->user->name}}
            @endif
          </td>
          <td>Rp. {{number_format($item->hargapenawaran)}}</td>
          <td>
            @if(in_array($item->id_user, $epData) && in_array($item->id_user, $etData) && in_array($item->id_user, $ebData))
            @if(in_array($item->id_user, $undanganverifikasi))
             <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}" class="btn btn-info btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
              <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
            </svg> Kirim Ulang</a></a> <a href="{{route('tender.cetak',[$item->id])}}" target="_blank" class="btn btn-warning btn-sm">Cetak</a>
            @else
            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}" class="btn btn-success btn-sm">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
              </svg> Kirim</a></a>
            @endif
            @endif
            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$item->id}}" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel{{$item->id}}">Kirim Undangan Verifikasi</h1>
                    
                  </div>
                  <div class="modal-body">
                    
                    <form action="{{ route('tender.sendemail', ['id_prosestender' => $item->id]) }}" method="POST" >
                      @csrf
                      <table class="table">
                        <tr>
                          <th class="bg-light">No Surat Undangan Verifikasi</th>
                          <td> <input type="text" name="nosurat" value="{{ old('nosurat', $undanganverifikasi->nosurat ?? '') }}" class="form-control"></td>
                        </tr>
                        <tr>
                          <th class="bg-light">Tanggal Surat</th>
                          <td> <input type="date" name="tglsurat" value="{{ old('tglsurat', $undanganverifikasi->tglsurat ?? '') }}" class="form-control"></td>
                        </tr>
                        <tr>
                          <th class="bg-light">Waktu</th>
                          <td> <div class="input-group">
                            <input type="time" class="form-control" name="waktumulai"  value="{{ old('waktumulai', $undanganverifikasi->waktumulai ?? '') }}">
                            <span class="input-group-text">-</span>
                            <input type="time" class="form-control" name="waktuselesai" value="{{ old('waktuselesai', $undanganverifikasi->waktuselesai ?? '') }}">
                        </div></td>
                        </tr>
                       
                      </table>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Simpan</button>
                    </div>
                   
                  </form>
                  </div></div>
              </div>
            </div>
            </a>
           
           </td>
          <td> @if(in_array($item->id_user, $epData))
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                <path d="M13.485 1.344a1 1 0 0 1 1.415 1.414l-8.485 8.485a1 1 0 0 1-1.415 0L.344 8.415a1 1 0 0 1 1.415-1.415l2.829 2.828L13.485 1.344z"/>
            </svg>
            @else
            -
            @endif</td>
          <td>@if(in_array($item->id_user, $etData))
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                <path d="M13.485 1.344a1 1 0 0 1 1.415 1.414l-8.485 8.485a1 1 0 0 1-1.415 0L.344 8.415a1 1 0 0 1 1.415-1.415l2.829 2.828L13.485 1.344z"/>
            </svg>
            @else
            -
            @endif</td>
          <td>@if(in_array($item->id_user, $ebData))
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                <path d="M13.485 1.344a1 1 0 0 1 1.415 1.414l-8.485 8.485a1 1 0 0 1-1.415 0L.344 8.415a1 1 0 0 1 1.415-1.415l2.829 2.828L13.485 1.344z"/>
            </svg>
            @else
            -
            @endif</td>
            <td>
              
              @if(in_array($item->id_user, $epData) && in_array($item->id_user, $etData) && in_array($item->id_user, $ebData) && in_array($item->id_user, $usersWithMaxHarga))
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.396.198-.824-.149-.746-.592l.83-4.73-3.523-3.356c-.33-.315-.158-.888.283-.95l4.898-.696 2.065-4.187c.183-.37.73-.37.914 0l2.065 4.187 4.898.696c.441.062.613.635.283.95l-3.523 3.356.83 4.73c.078.443-.35.79-.746.592l-4.247-2.207-4.247 2.207z"/>
                  </svg>
                  
              @else
                  -
              @endif

             
          </td>
        </tr>
        
        @endforeach
      </tbody>
    </table>

    <div class="mt-4">
      <strong>Keterangan:</strong>
      <ul>
          <li><button class="btn btn-primary btn-sm">EP</button> : Evaluasi Penelitian</li>
          <li><button class="btn btn-success btn-sm">ET</button> : Evaluasi Teknis</li>
          <li><button class="btn btn-info btn-sm">EB</button> : Evaluasi Biaya</li>
          <li><button class="btn btn-warning btn-sm">CP</button> : Calon Pemenang</li>
      </ul>
  </div>

</table>
</div>


@if(Auth::user()->role == 'VERIFIKATOR')

@if(optional($detailtender)->baevaluasi)
<button type="submit" id="uploadButton1" class="btn btn-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg> Update</button>
@else
<button type="submit" id="uploadButton1" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg> Simpan</button>
@endif
@endif
<a href="{{route('tender.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </div>
      </div>
  

  </div>
</div>
@endsection