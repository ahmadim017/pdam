@extends('layouts.sbadmin')

@section('content')
<div class="col-md-12">
  <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-secondary">Pengumuman</h6>
      </a>
  
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
          <div class="table-responsive">
<table class="table">
  <tr>
      <th class="bg-light" width="200">Judul</th>
      <td colspan="3"><strong>{{$pengumuman->judul}}</strong></td>
  </tr>
  <tr>
      <th class="bg-light">Keterangan</th>
  <td colspan="3"><strong>{!!$pengumuman->keterangan!!}</strong></td>
  </tr>
  <tr>
    <th class="bg-light">View</th>
<td colspan="3"><strong>{{$pengumuman->view}}</strong></td>
</tr>
<tr>
  <th class="bg-light">Tanggal Publish</th>
<td><strong>{{$pengumuman->created_at}}</strong></td>
</tr>
<tr>
  <th class="bg-light">File Pengumuman</th>
<td>
  @if($pengumuman->file)
  <strong><a href="{{asset('storage/filepengumuman/'.$pengumuman->file)}}" target="_blank" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16">
  <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
  <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
</svg> FIle Pengumuman</a></strong>
@else
<strong><a href="#" class="btn btn-light btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16">
  <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
  <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
</svg> FIle Pengumuman Belum di upload</a></strong>
@endif
</td>
</tr>
</table>
</div>

<a href="{{route('pengumuman.edit',[$pengumuman->id])}}" class="btn btn-primary btn-sm">Edit</a> 
              <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus?')" action="{{route('pengumuman.destroy',[$pengumuman->id])}}" class="d-inline" method="POST">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <input type="submit" value="Delete" class="btn btn-danger btn-sm">
              </form>
<a href="{{route('pengumuman.index')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </div>
      </div>
  

  </div>
</div>
@endsection