@extends('layouts.sbadmin')
@section('header')
<link href="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('footer')
<script src="{{asset('public/sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/sbadmin/js/demo/datatables-demo.js')}}"></script>
@endsection
@section('content')


<div class="row">
  <div class="col-md-12 text-right">
  <a href="{{route('tender.create')}}" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
  </svg> Tambah Paket Pekerjaan</a>
  </div> 
</div><br>

<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Paket Pekerjaan</h6>
    </a>

    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
      <div class="card-body">

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


<div class="table-responsive">    
<table class="table table-striped" id="dataTable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Paket</th>
        <th scope="col">Hps</th>
        <th scope="col">Tahun Anggaran</th>
        <th scope="col">Status</th>
        <th scope="col">Klasifikasi</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tender as $p)
      <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$p->namapaket}}</td>
          <td>Rp.{{number_format($p->hps)}}</td>
          <td>{{$p->tahunanggaran}}</td>
          <td>

            @php
            $hasTodaySchedule = false;
            foreach ($jadwal as $a) {
                // Mengambil tanggal jadwal
                $jadwalDate = \Carbon\Carbon::parse($a->tglpelaksanaan)->toDateString();
    
                // Bandingkan tanggal jadwal dengan tanggal hari ini
                if ($p->id == $a->id_paket && $jadwalDate == now()->toDateString()) {
                    $hasTodaySchedule = true;
                    break;
                }
            }
            
          @endphp
          @php
          $nonTenderStatus = '';
          foreach ($tender as $a) {
              if ($p->id == $a->id_paket) {
                  $nonTenderStatus = $a->status;
                  break;
              }
          }
          @endphp
            @if ($hasTodaySchedule)
            <span class="badge badge-warning">Paket Sedang Berlangsung</span>
            @elseif ($nonTenderStatus == 'Diterima')
            <span class="badge badge-success">Paket Sudah Selesai</span>
            @elseif ($nonTenderStatus == 'Verifikasi')
            <span class="badge badge-danger">Paket Belum Diproses</span>
            @else
            <span class="badge badge-secondary">Belum ada Jadwal</span>
            @endif
            
          </td>
          <td>{{$p->klasifikasi}}</td>
          <td>
              @php
              $hasTender = false;
              foreach ($detailtender as $a) {
                  if ($p->id == $a->id_paket) {
                      $hasTender = true;
                      break;
                  }
              }
              @endphp
  
              @if ($hasTender)
                  <a href="{{route('tender.show',[$p->id])}}" class="badge badge-secondary">View Detail</a>
              @else
                  <a href="{{route('tender.show',[$p->id])}}" class="badge badge-primary">Buat Tender</a>
              @endif
          </td>
      </tr>
  @endforeach
  
    </tbody>
  </table>
</div>
</div>
</div>
</div>
@endsection