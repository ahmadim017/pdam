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




<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Penyedia</h6>
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
        <th scope="col">Badan Usaha</th>
        <th scope="col">Nama Perusahaan</th>
        <th scope="col">NPWP</th>
        <th scope="col">Alasan</th>
        <th scope="col">Tanggal Pengajuan Perubahan</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($perubahan as $p)
      <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$p->user->administrasi->badanusaha->nama}}</td>
            <td>{{$p->user->name}}</td>
            <td>@if($p->user->administrasi)
              {{ $p->user->administrasi->npwp }}
          @else
              // Handle jika entri administrasi tidak ditemukan
              No administrative data found.
          @endif
        </td>
            <td>{{$p->alasan}}</td>
            <td>
              {{Date::createFromDate($p->created_at)->format('l, j F Y')}}
            </td>
            
            <td>
              <form action="{{ route('penyedia.terima', ['id' => $p->id_user]) }}" method="post" class="d-inline">
                @csrf
                <input type="hidden" name="status" value="verifikasi">
                <input type="hidden" name="id" value="{{$p->id}}">
                <input type="hidden" name="konfirmasi" value="tidak">
                <button type="submit" class="btn btn-primary btn-sm">Proses</button>
            </form>
            
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