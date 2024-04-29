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
    $('#uploadButton').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#uploadForm').submit();
    });

   
});

$(document).ready(function() {
    $('#uploadButton1').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#uploadForm1').submit();
    });

   
});

$(document).ready(function() {
    $('#uploadButton2').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#uploadForm2').submit();
    });

   
});

$(document).ready(function() {
    $('#uploadButton3').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#uploadForm3').submit();
    });

   
});

$(document).ready(function() {
    $('#uploadButton4').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#uploadForm4').submit();
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
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Detail Paket</a></li>
        @if(optional($nontender)->hargapenawaran)
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('pengadaan.evaluasi',[$pengadaan->id])}}">Evaluasi</a></li>
        @else
        
        @endif
        @if(optional($nontender)->hargapenawaran)
        <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('pengadaan.kontrak',[$pengadaan->id])}}">Buat Kontrak</a></li>
        @else
        
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
      @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
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
  <th class="bg-light">Dokumen Persiapan Pengadaan</th>
  <td>
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
   
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        Dokumen Persiapan Pengadaan
      </a>
      <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
          Kerangka Acuan Kerja(KAK) / Spesifikasi Tenis dan Gambar
          
          @if($kak->isEmpty())
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
          </svg>
         
          @else
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-success font-bold bi bi-check2-circle" viewBox="0 0 16 16">
            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
          </svg>
          @endif
      </a>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Kerangka Acuan Kerja (KAK) / Spesifikasi Tenis dan Gambar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

               

                    <div class="alert alert-warning" role="alert">
                        <h6><b>Petunjuk Upload Dokumen</b></h6>
                        <p>Dokumen yang diupload hanya file/dokumen yang memiliki ekstensi <b>*.doc, .pdf, .rar, .jpeg, .png, .zip, .xls</b></p>
                    </div>
                    <form id="uploadForm" action="{{ route('kak.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$pengadaan->id}}" name="id_paket">
                        <input type="file" class="form-control mb-3" name="file">
                       
                    </form>
    
                    <table class="table">
                        <thead>
                            <th scope="col">Nama File</th>
                            <th scope="col">Tanggal Upload</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                          @foreach($kak as $item)
                            <tr>
                                <td><a href="{{asset('storage/app/'. $item->file)}}" target="_blank">{{$item->name_file}}</a></td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                  <form action="{{ route('kak.destroy', [$item->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin ingin dihapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="uploadButton">Upload</button>
                </div>
            </div>
        </div>
    </div>
      <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
          Rancangan Kontrak
          @if($rancangankontrak->isEmpty())
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-plus" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
              <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
          </svg>
      @else
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-success font-bold bi bi-check2-circle" viewBox="0 0 16 16">
              <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
              <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
          </svg>
      @endif
      </a>
      <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Rancangan Kontrak</h1>
             
            </div>
            <div class="modal-body">
              <div class="alert alert-warning" role="alert">
               <h6><b>Petunjuk Upload Dokumen</b></h6>
               <p>Dokumen yang diupload hanya file/dokumen yang memiliki ekstensi <b>*.doc,.pdf,.rar,jpeg,png,.zip,.xls</b></p>
              </div>
              <form id="uploadForm1" action="{{ route('rancangankontrak.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$pengadaan->id}}" name="id_paket">
                <input type="file" class="form-control mb-3" name="file">
               
            </form>
              <table class="table">
                <thead>
                  <th scope="col">Nama File</th>
                  <th scope="col">Tanggal Upload</th>
                  <th scope="col">Aksi</th>
                </thead>
                <tbody>
                  @foreach($rancangankontrak as $item)
                            <tr>
                                <td><a href="{{asset('storage/app/'. $item->file)}}" target="_blank">{{$item->name_file}}</a></td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                  <form action="{{ route('rancangankontrak.destroy', [$item->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin ingin dihapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                </tbody>
              </table>
            </div>
            
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="uploadButton1">Upload</button>
            </div>
            
          </div>
        </div>
      </div>
      <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
          Uraian Singkat Pekerjaan
          @if($uraianpekerjaan->isEmpty())
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-plus" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
              <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
          </svg>
      @else
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-success font-bold bi bi-check2-circle" viewBox="0 0 16 16">
              <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
              <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
          </svg>
      @endif
      </a>
      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Uraian Singkat Pekerjaan</h1>
             
            </div>
            <div class="modal-body">
              <div class="alert alert-warning" role="alert">
               <h6><b>Petunjuk Upload Dokumen</b></h6>
               <p>Dokumen yang diupload hanya file/dokumen yang memiliki ekstensi <b>*.doc,.pdf,.rar,jpeg,png,.zip,.xls</b></p>
              </div>
              <form id="uploadForm2" action="{{ route('uraianpekerjaan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$pengadaan->id}}" name="id_paket">
                <input type="file" class="form-control mb-3" name="file">
               
            </form>
              <table class="table">
                <thead>
                  <th scope="col">Nama File</th>
                  <th scope="col">Tanggal Upload</th>
                  <th scope="col">Aksi</th>
                </thead>
                <tbody>
                  @foreach($uraianpekerjaan as $item)
                            <tr>
                                <td><a href="{{asset('storage/app/'. $item->file)}}" target="_blank">{{$item->name_file}}</a></td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                  <form action="{{ route('uraianpekerjaan.destroy', [$item->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin ingin dihapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="uploadButton2">Upload</button>
          </div>
          </div>
        </div>
      </div>
      <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        Informasi Lainnya (Jika ada)
        @if($doklainnya->isEmpty())
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-plus" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
              <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
          </svg>
      @else
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-success font-bold bi bi-check2-circle" viewBox="0 0 16 16">
              <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
              <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
          </svg>
      @endif
    </a>
       <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar Informasi Lainnya</h1>
             
            </div>
            <div class="modal-body">
              <div class="alert alert-warning" role="alert">
               <h6><b>Petunjuk Upload Dokumen</b></h6>
               <p>Dokumen yang diupload hanya file/dokumen yang memiliki ekstensi <b>*.doc,.pdf,.rar,jpeg,png,.zip,.xls</b></p>
              </div>
              <form id="uploadForm3" action="{{ route('doklainnya.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$pengadaan->id}}" name="id_paket">
                <input type="file" class="form-control mb-3" name="file">
               
            </form>
              <table class="table">
                <thead>
                  <th scope="col">Nama File</th>
                  <th scope="col">Tanggal Upload</th>
                  <th scope="col">Aksi</th>
                </thead>
                <tbody>
                  @foreach($doklainnya as $item)
                            <tr>
                                <td><a href="{{asset('storage/app/'. $item->file)}}" target="_blank">{{$item->name_file}}</a></td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                  <form action="{{ route('doklainnya.destroy', [$item->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin ingin dihapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="uploadButton3">Upload</button>
          </div>
          </div>
        </div>
      </div>
  </div>
  
    

  </td>
</tr>

<tr>
  <th class="bg-light">Jadwal Paket</th>
  <td>
    @if(session('jadwal'))
    <div class="alert alert-success">
      {{session('jadwal')}}
    </div>
  @endif  

    @if ($jadwal)
    <a href="{{route('jadwal.view',[$pengadaan->id])}}" class="badge badge-secondary">Jadwal Paket</a>
@else
<a href="{{route('jadwal.buat',[$pengadaan->id])}}" class="badge badge-secondary"> Belum ada Jadwal </a>
@endif
    

    
  </td>
</tr>
<form action="{{route('nontender.store')}}" id="uploadForm4" method="POST">
  @csrf
  <input type="hidden" value="{{$pengadaan->id}}" name="id_paket">
<tr >
  <th class="bg-light">Metode Pengadaan</th>
  <td>
    
     <select name="metodepengadaan" class="form-control  {{$errors->first('id_user') ? "is-invalid" : ""}}" style="width: 50%;">
                <option value=""></option>
                @foreach ($metodepengadaan as $item)
                @if($nontender)
                <option @if($nontender->metodepengadaan == $item->nama) selected @endif value="{{$item->nama}}">{{$item->nama}}</option>   
                @else
                
                <option value="{{$item->nama}}">{{$item->nama}}</option>   
                @endif
                @endforeach
     </select>
     <div class="invalid-feedback">
      <span class="text-danger">{{$errors->first('metodepengadaan')}}</span>
    </div>
      
</td>
</tr>
<tr>
  <th class="bg-light">Daftar Penyedia</th>
  <td>
   
      
     <select name="id_user" id="id_user" class="form-control {{$errors->first('id_user') ? "is-invalid" : ""}}">
                <option value=""></option>
                @foreach ($pengajuan as $item)
                @if($nontender)
                <option @if($nontender->id_user == $item->id_user) selected @endif value="{{$item->id_user}}">{{$item->user->name}} | {{$item->user->npwp}}</option>   
                @else
                <option value="{{$item->id_user}}">{{$item->user->name}} | {{$item->user->npwp}}</option>  
                @endif
                @endforeach
               
                </select>
                <div class="invalid-feedback">
                  <span class="text-danger">{{$errors->first('id_user')}}</span>
                </div>

           
      
 
</td>
</tr>
<tr>
  <th class="bg-light">No Surat Undangan</th>
  <td>
    <input type="text" name="nosurat" class="form-control {{$errors->first('nosurat') ? "is-invalid" : ""}}" value="{{ old('nosurat', $nontender->nosurat ?? '') }}">
    <div class="invalid-feedback">
      <span class="text-danger">{{$errors->first('nosurat')}}</span>
    </div>
    @if(optional($nontender)->nosurat)
    <div class="my-3">
      <a href="{{route('nontender.cetak',[$pengadaan->id])}}" class="badge badge-success" target="_blank" rel="noopener noreferrer" >Download Surat Undangan</a>
    </div>
    @endif
  </td>
  
</tr>
<tr>
  <th class="bg-light">Tanggal Surat</th>
  <td>
    <input type="date" name="tglsurat" class="form-control {{$errors->first('tglsurat') ? "is-invalid" : ""}}" value="{{ old('tglsurat', isset($nontender) ? \Carbon\Carbon::parse($nontender->tglsurat)->format('Y-m-d') : '') }}">
    <div class="invalid-feedback">
      <span class="text-danger">{{$errors->first('tglsurat')}}</span>
    </div>
  </td>
</tr>

</form>
</table>
</div>
@if(optional($nontender)->status == 'Diterima')
<div></div>
@elseif($nontender)
<button type="submit" id="uploadButton4" class="btn btn-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg> Perbaharui Paket</button>
@else
<button type="submit" id="uploadButton4" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
  <path d="M11 2H9v3h2z"/>
  <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
</svg> Simpan dan Buat Paket</button>
@endif

<a href="{{route('pengadaan.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </div>
      </div>
  

  </div>
</div>
@endsection