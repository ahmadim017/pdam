@extends('layouts.sbadmin')

@section('header')

<script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

@endsection

@section('footer')
<script>
    @foreach ($penjelasan as $index => $item)
        CKEDITOR.replace('textarea{{$index}}', {
            language: 'en-gb'
        });
    @endforeach

    $(document).ready(function() {
    $('#form').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#Form').submit();
    });

   
});
</script>
<script>
$(document).ready(function() {
    $('#uploadButton1').click(function() {
        // Memanggil submit form ketika tombol Upload ditekan
        $('#uploadForm1').submit();
    });

   
});
    </script>
<script>
    function toggleAnswerForm(button) {
        var answerForm = button.nextElementSibling;
        if (answerForm.style.display === "none") {
            answerForm.style.display = "block";
        } else {
            answerForm.style.display = "none";
        }
    }
</script>
@endsection

@section('content')

<div class="row">
  <div class="col">
    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('tender.index')}}">Daftar Paket</a></li>
            <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.show',[$pengadaan->id])}}">Detail Paket</a></li>
            <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Pemberian Penjelasan</a></li>
            <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.pembukaan',[$pengadaan->id])}}">Pembukaan Penawaran</a></li>
            <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.evaluasi',[$pengadaan->id])}}">Evaluasi</a></li>
            <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.klarifikasi',[$pengadaan->id])}}">Klarifikasi dan Verifikasi</a></li>
            <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('tender.negoisasi',[$pengadaan->id])}}">Negoisasi Teknis dan Biaya</a></li>
            <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Pengumuman Pemenang</a></li>
          
    </nav>
  </div>
</div>

<div class="col-md-12">
  <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Aanwizing</h6>
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
  <form id="uploadForm1" action="{{route('detailtender.baaanwizing',[$pengadaan->id])}}" method="POST">
    @csrf
    
  <tr>
    <th class="bg-light">No. Berita Acara Penjelasan Pekerjaan</th>
    <td><input type="text" name="baaanwizing"  class="form-control" value="{{ old('baaanwizing', $detailtender->baaanwizing ?? '') }}">
        <div class="invalid-feedbeck">
            <span class="text-danger">{{$errors->first('baaanwizing')}}</span>
          </div>
    </td>
  </tr>
  <tr>
    <th class="bg-light">Tanggal Berita Acara Penjelasan Pekerjaan</th>
    <td><input type="date" name="tglaanwizing" class="form-control" value="{{ old('tglaanwizing', $detailtender->tglaanwizing ?? '') }}">
        <div class="invalid-feedbeck">
            <span class="text-danger">{{$errors->first('tglaanwizing')}}</span>
          </div>
    </td>
  </tr>
</form>
@if(optional($detailtender)->baaanwizing)
<tr>
  <th class="bg-light">Dokumen BA Pemberian Penjelasan</th>
  <td>
   
    <a href="{{route('tender.baaanwizing',[$pengadaan->id])}}" target="_blank" class="btn btn-success btn-sm mr-2">Dokumen BA Pemberian Penjelasan</a>
      
  </td>
</tr>
@endif

</table>

</div>
<div class="col-md-12 mb-4">
  @if(Auth::user()->role =='VERIFIKATOR')
  @if(optional($detailtender)->baaanwizing)
    <button type="submit" id="uploadButton1" class="btn btn-secondary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
        <path d="M11 2H9v3h2z"/>
        <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
      </svg> Update</button>
  @else
  <button type="submit" id="uploadButton1" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
        <path d="M11 2H9v3h2z"/>
        <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
      </svg> Simpan</button>
  @endif
  @endif
    <a href="{{route('tender.show',[$pengadaan->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
    </div>  
</div>
</div>
  </div>
<div class="py-3">
    
       
    @foreach ($penjelasan as $index => $item)
    <div class="card mb-3">
        <div class="card-header">
            {{$item->user->name}}
        </div>
        <div class="card-body">
            <h5 class="card-title"> {{$item->dokumen}} - {{$item->bab}}</h5>
            <p class="card-text">{{$item->uraian}}</p>
            <button type="button" class="btn btn-primary btn-sm" onclick="toggleAnswerForm(this)">Jawab Pertanyaan</button>
            <div class="answer-form" style="display: none;">
                <form action="{{route('nontender.jawab')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$pengadaan->id}}" name="id_paket">
                    <input type="hidden" name="id_penjelasan" value="{{$item->id}}">
                    <div class="mb-3 mt-3">
                        <textarea name="jawaban" id="textarea{{$index}}" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" name="file">
                        <small class="text-muted">*kosongkan jika tidak ada file yg diupload</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                      </svg> Kirim</button>
                </form>
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


         
    
</div>
  

@endsection