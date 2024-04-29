@extends('layouts.sbadmin')

@section('footer')
    <!-- Sertakan jQuery terlebih dahulu -->
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
@endsection

@section('content')

<div class="row">
    <div class="col">
      <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{route('pengadaan.index')}}">Daftar Paket</a></li>
          <li class="breadcrumb-item text-secondary" aria-current="page"><a href="{{route('pengadaan.show',[$pengadaan->id])}}">Detail Paket</a></li>
          <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Daftar Penyedia</a></li>
        </ol>
      </nav>
    </div>
  </div>

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

    <div class="col-md-12">
        <div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Penyedia</h6>
      </a>
  
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
          <div class="table-responsive">
              <form action="{{route('nontender.store')}}" method="POST">
                  @csrf
                  <input type="hidden" value="{{$pengadaan->id}}" name="id_paket">
                  <table class="table">
                    <tr>
                        <th class="bg-light" style="width: 300px;">Daftar Penyedia</th>
                        <td  style="width: 700px;"><select name="id_user" id="id_user" class="form-control">
                            <option value=""></option>
                            @foreach ($pengajuan as $item)
                            <option value="{{$item->id_user}}">{{$item->user->name}} | {{$item->user->npwp}}</option>    
                            @endforeach
                            
                            </select>
                        </td>
                    </tr>
                   
                  </table>
                  
                  <button class="btn btn-success btn-sm" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                    <path d="M11 2H9v3h2z"/>
                    <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                  </svg> Simpan</button>
                  <a href="{{route('pengadaan.show',[$pengadaan->id])}}" class="btn btn-secondary btn-sm">Kembali</a>
              </form>

          </div>
        </div>
      </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                  <thead>
                    <th>#</th>
                    <th>Nama Perusahaan</th>
                    <th>NPWP</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    @foreach ($nontender as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->user->name}}</td>
                      <td>{{$item->user->npwp}}</td>
                      <td>
                        <form action="{{ route('nontender.destroy', [$item->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin ingin dihapus?')">
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
              
          </div>
    </div>
 </div>
        </div>
    </div>
 @endsection