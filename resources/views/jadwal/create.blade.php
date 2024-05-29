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
    <div class="col">
      <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{route('pengadaan.index')}}">Daftar Paket</a></li>
          <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('pengadaan.show',[$pengadaan->id])}}">Detail Paket</a></li>
          <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Jadwal Paket</a></li>
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
    
      @if(session('Status'))
        <div class="alert alert-danger">
        {{session('Status')}}
      </div>
      @endif
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
          <div class="card-body">
            <div class="table-responsive">
                

                <form action="{{route('jadwal.store')}}" method="POST">
                    @csrf
                <table class="table mb-6">
                  <tr>
                    <th class="bg-light">Kode Paket</th>
                <td colspan="3"><strong>{{$pengadaan->id}}</strong></td>
                  </tr>
                  <tr>
                      <th class="bg-light">Nama Paket</th>
                  <td colspan="3"><strong>{{$pengadaan->namapaket}}</strong></td>
                  </tr>

                </table>

                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Hari/Tanggal</th>
                        <th>Waktu Pelaksanaan</th>
                    </thead>
                    <tbody>
                       

                        @foreach ($jadwalnontender as $item)
                        <input type="hidden" name="jadwal[{{$loop->index}}][id_paket]" value="{{$pengadaan->id}}">
                        <input type="hidden" name="jadwal[{{$loop->index}}][kegiatan]" value="{{$item->kegiatan}}">
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->kegiatan}}</td>
                            <td>
                              <input type="date" name="jadwal[{{$loop->index}}][tglpelaksanaan]" value="{{ old('tglpelaksanaan') }}" class="form-control">
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="time" class="form-control" name="jadwal[{{$loop->index}}][waktumulai]"  value="{{ old('waktumulai') }}">
                                    <span class="input-group-text">-</span>
                                    <input type="time" class="form-control" name="jadwal[{{$loop->index}}][waktuselesai]" value="{{ old('waktuselesai') }}">
                                </div>
                            </td>
                        </tr>
                      
                        @endforeach
                    </tbody>
                </table>  
                <button type="submit" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                    <path d="M11 2H9v3h2z"/>
                    <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                  </svg> Simpan</button>
                <a href="{{route('pengadaan.show',[$pengadaan->id])}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i> Kembali</a>
                </form>
              
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection