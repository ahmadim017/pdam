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

   


$('.nav-link').click(function(e) {
            e.preventDefault();
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
            
            var target = $(this).attr('href');
            $('.tab-content').hide();
            $(target).show();
        });

        // Show the first tab content by default
        $('.nav-link.active').click();
       });

    </script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      const checkbox = document.getElementById('checkbox-memenuhi');
      const submitButton = document.getElementById('submit-button');
  
      checkbox.addEventListener('change', function () {
          submitButton.disabled = !checkbox.checked;
      });
  });

  document.addEventListener('DOMContentLoaded', function () {
      const checkbox = document.getElementById('checkbox-memenuhi1');
      const submitButton = document.getElementById('submit-button1');
  
      checkbox.addEventListener('change', function () {
          submitButton.disabled = !checkbox.checked;
      });
  });
  </script>
@endsection

@section('content')



<div class="col-md-12">
  <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Detail Penawaran</h6>
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
<td colspan="3"><strong>{{$prosestender->tender->id}}</strong></td>
</tr>
  <tr>
      <th class="bg-light">Nama Paket</th>
  <td colspan="3"><strong>{{$prosestender->tender->namapaket}}</strong></td>
  </tr>
 
  <tr>
    <th class="bg-light">Hps</th>
<td><strong>Rp.{{number_format($prosestender->tender->hps)}}</strong></td>
</tr>
  <tr>
      <th class="bg-light">Nama Peserta</th>
  <td><strong>{{$prosestender->user->administrasi->badanusaha->nama}}. {{$prosestender->user->name}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Npwp</th>
  <td><strong>{{$prosestender->user->npwp}}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">Harga Penawaran</th>
<td><strong>Rp. {{number_format($prosestender->hargapenawaran)}}</strong></td>
</tr>
    <th class="bg-light"> Dokumen Penawaran</th>
    <td>
   
      <div class="list-group">
        <div class="list-group">
          @if($prosestender->filepenawaran)
          <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
              Dokumen Penawaran
          </a>
         
          <div class="list-group-item list-group-item-action align-items-center">
              <div class="d-flex justify-content-between ">
                  <a href="{{asset('storage/app/public/dist/filepenawaran/'. $prosestender->filepenawaran)}}" target="_blank" class="btn btn-success btn-sm mr-2">Download Dokumen Penawaran</a>
                  <button class="btn btn-secondary btn-sm">{{Date::createFromDate($prosestender->updated_at)->format('l, j F Y')}}</span>
              </div>
            </div>
            @else
            Peserta Tidak Mengapload Dokumen Penawaran
            @endif
      </div>
        <!-- Modal -->
        
          
      </div>
        
    </td>
</tr>

</table>
<div class="py-3">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="#evaluasi-administrasi">Evaluasi Penelitian</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#evaluasi-teknis">Evaluasi Teknis</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#evaluasi-biaya">Evaluasi Biaya</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#evaluasi-akhir">Evaluasi Akhir</a>
    </li>
  </ul>
  <div class="tab-content" id="evaluasi-administrasi">
    <form method="POST" action="{{ route('evaluasipenelitian.simpan') }}">
      @csrf
      <input type="hidden" name="id_paket" value="{{$prosestender->tender->id}}">
      <input type="hidden" name="id_user" value="{{$prosestender->user->id}}">
    <table class="table">
      <th>Persyaratan</th>
      <th>Memenuhi Syarat</th>
      <th>Tidak Memenuhi Syarat</th>
      @foreach($kualifikasis as $kualifikasi)
                    <tr class="category">
                        <th colspan="3">{{ $kualifikasi->kategori }}</th>
                    </tr>
                    @foreach($kualifikasi->persyaratankualifikasi as $persyaratan)
                        <tr class="sub-category">
                            <td>{{ $loop->iteration }}. {{ $persyaratan->persyaratan }}</td>
                            <td>
                                <input type="checkbox" name="persyaratan_{{ $persyaratan->id }}" value="ya"
                                @if(isset($evaluasipenelitian[$persyaratan->id]) && $evaluasipenelitian[$persyaratan->id] == 'ya') checked @endif>
                            </td>
                            <td>
                                <input type="checkbox" name="persyaratan_{{ $persyaratan->id }}" value="tidak"
                                @if(isset($evaluasipenelitian[$persyaratan->id]) && $evaluasipenelitian[$persyaratan->id] == 'tidak') checked @endif>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
     
    </table>
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
    <!-- Content for Evaluasi Administrasi -->
  </div>
  <div class="tab-content" id="evaluasi-teknis" style="display:none;">
    <form method="POST" action="{{ route('evaluasiteknis.simpan') }}">
      @csrf
      <input type="hidden" name="id_paket" value="{{$prosestender->tender->id}}">
      <input type="hidden" name="id_user" value="{{$prosestender->user->id}}">
    <table class="table">
      <th>Persyaratan</th>
      <th>Memenuhi Syarat</th>
      <th>Tidak Memenuhi Syarat</th>
      @foreach($kategoriteknis as $kualifikasi)
      <tr class="category">
          <th>{{ $kualifikasi->kategori }}</th>
      </tr>
      @foreach($kualifikasi->evaluasiteknis as $persyaratan)
          <tr class="sub-category">
              <td>{{ $loop->iteration }}. {{ $persyaratan->persyaratan }}</td>
              <td>
                <input type="checkbox" name="persyaratan_{{ $persyaratan->id }}" value="ya"
                @if(isset($persyaratanevaluasiteknis[$persyaratan->id]) && $persyaratanevaluasiteknis[$persyaratan->id] == 'ya') checked @endif>
            </td>
            <td>
                <input type="checkbox" name="persyaratan_{{ $persyaratan->id }}" value="tidak"
                @if(isset($persyaratanevaluasiteknis[$persyaratan->id]) && $persyaratanevaluasiteknis[$persyaratan->id] == 'tidak') checked @endif>
            </td>
            <td>
              <input type="hidden" name="bobot_{{ $persyaratan->id }}" value="{{ $persyaratan->bobot}}">
            </td>
           
          </tr>
      @endforeach
  @endforeach
     
    </table>
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
  </form>
  </div>
  <div class="tab-content" id="evaluasi-biaya" style="display:none;">
    <form method="POST" action="{{ route('evaluasibiaya.simpan') }}">
        @csrf
        <input type="hidden" name="id_paket" value="{{$prosestender->tender->id}}">
      <input type="hidden" name="id_user" value="{{$prosestender->user->id}}">
      <input type="hidden" name="hargaterkoreksi" value="{{ $prosestender->hargapenawaran}}">
      <input type="hidden" name="persenhps" value="{{ number_format(($prosestender->hargapenawaran / $prosestender->tender->hps) * 100, 2) }}">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Harga Penawaran</th>
                    <th>Harga Penawaran Terkoreksi</th>
                    <th>% terhadap HPS</th>
                    <th>Nilai Harga</th>
                    <th>Memenuhi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $prosestender->user->administrasi->badanusaha->nama }}. {{ $prosestender->user->name }}</td>
                    <td>Rp. {{ number_format($prosestender->hargapenawaran) }}</td>
                    <td>Rp. {{ number_format($prosestender->hargapenawaran) }}</td>
                    <td>{{ number_format(($prosestender->hargapenawaran / $prosestender->tender->hps) * 100, 2) }}%</td>
                    <td>{{$evaluasibiaya->nilaiharga}}</td>
                    <td>
                      <input type="checkbox" name="status" value="ya" id="checkbox-memenuhi"
                      @if(isset($evaluasibiaya) && $evaluasibiaya->status == 'ya') checked @endif>
                  </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary btn-sm" id="submit-button" disabled>Submit</button>
    </form>
</div>
<div class="tab-content" id="evaluasi-akhir" style="display:none;">
  <form method="POST" action="{{ route('evaluasiakhir.simpan') }}">
    @csrf
    <input type="hidden" name="id_paket" value="{{$prosestender->tender->id}}">
  <input type="hidden" name="id_user" value="{{$prosestender->user->id}}">
  <input type="hidden" name="nilaikahir" value="{{(($nilaiteknis) * 0.4) + (($evaluasibiaya->nilaiharga) * 0.6)}}">

    <table class="table">
        <thead>
            <tr>
                <th>Nama Perusahaan</th>
                <th>Nilai Teknis</th>
                <th>Skor Teknis</th>
                <th>Nilai Harga</th>
                <th>Skor Harga</th>
                <th>Jumlah Nilai</th>
                <th>Memenuhi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $prosestender->user->administrasi->badanusaha->nama }}. {{ $prosestender->user->name }}</td>
                <td>{{ $nilaiteknis }}</td>
                <td>{{($nilaiteknis) * 0.4 }}</td>
                <td>{{$evaluasibiaya->nilaiharga}}</td>
                <td>{{($evaluasibiaya->nilaiharga) * 0.6}}</td>
                <td>{{(($nilaiteknis) * 0.4) + (($evaluasibiaya->nilaiharga) * 0.6)}}</td>
                <td>
                  <input type="checkbox" name="status" value="ya" id="checkbox-memenuhi1"
                  @if(isset($evaluasiakhir) && $evaluasiakhir->status == 'ya') checked @endif>
              </td>
            </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary btn-sm" id="submit-button1" disabled>Submit</button>
</form>
</div>
 
</div>
</div>



<a href="{{route('tender.evaluasi',[$prosestender->id_paket])}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </div>
      </div>
  

  </div>
</div>
@endsection