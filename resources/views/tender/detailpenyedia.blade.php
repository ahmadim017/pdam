@extends('layouts.sbadmin')



@section('content')

  <div class="row">
    <div class="col">
      <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item text-secondary" aria-current="page"><a href="#">Data Penyedia</a></li>
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

 
 <div class="col-12">
    <div class="card shadow mb-4">
          <div class="card-body">
            <h3 class="mb-4 font-italic me-1">Informasi<span class="text-primary font-italic me-1"> Penyedia</span></h3>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nama Perusahaan</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Badan Usaha</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->administrasi->badanusaha->nama}}</p>
              </div>
            </div><hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">No Hp</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->administrasi->telpon}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nama Direktur</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->administrasi->namadirektur}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Alamat Perusahaan</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->administrasi->alamat}}</p>
              </div>
            </div><hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Kabupaten</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->administrasi->kabupaten->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Provinsi</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->administrasi->provinsi->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Kode Pos</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->administrasi->kodepos}}</p>
              </div>
            </div>
            <hr>
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Npwp Perusahaan</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->npwp}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">File NPWP</p>
              </div>
              <div class="col-sm-9">
                <a href="{{asset('storage/app/public/dist/img/'.$pengajuan->user->administrasi->filenpwp)}}" target="_blank" class="btn btn-primary">Preview</a>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nomor PKP</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->administrasi->nopkp}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">File PKP</p>
              </div>
              <div class="col-sm-9">
                <a href="{{asset('storage/app/public/dist/img/'.$pengajuan->user->administrasi->filepkp)}}" target="_blank" class="btn btn-primary">Preview</a>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Website</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->administrasi->website}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Kantor Cabang</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$pengajuan->user->administrasi->kantorcabang}}</p>
              </div>
            </div>
            <hr>
          </div>
        </div>
 </div>
 
 
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-body">
        <h3 class="mb-4 font-italic me-1">Informasi<span class="text-primary font-italic me-1"> Izin Usaha</span></h3>
        
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <th scope="col">
                #
            </th>
            <th scope="col">
                Kualifikasi
            </th>
            <th scope="col">
                Jenis Izin
            </th>
            <th scope="col">
                Nomor
            </th>
            <th scope="col">
                Masa Berlaku
            </th>
            <th scope="col">
               Instansi Pemberi
            </th>
            <th scope="col">
                Modal Usaha
             </th>
            <th scope="col">
                File Izin
             </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($izinusaha as $i)
                <tr>
                  <td>{{$loop->iteration}}</td> 
                  <td>{{$i->kualifikasi}}</td> 
                  <td>{{$i->jenisizin}}</td> 
                  <td>{{$i->nomorizin}}</td> 
                  <td>{{$i->berlaku}}</td> 
                  <td>{{$i->instansipemberi}}</td> 
                  <td>Rp. {{number_format($i->modalusaha)}}</td>
                  <td><a href="{{asset('storage/app/public/dist/fileizin/'.$i->fileizin)}}" class="btn btn-success btn-sm" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708z"/>
                    <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                  </svg></a></td>
          
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>

  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-body">
        <h3 class="mb-4 font-italic me-1">Informasi<span class="text-primary font-italic me-1"> Akta Pendirian</span></h3>
        
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3">
                #
            </th>
            <th scope="col" class="px-6 py-3">
                Nomor
            </th>
            <th scope="col" class="px-6 py-3">
               Tanggal
            </th>
            <th scope="col" class="px-6 py-3">
                Notaris
            </th>
            <th scope="col" class="px-6 py-3">
               Tempat Notaris
            </th>
            <th scope="col" class="px-6 py-3">
               Modal Usaha
             </th>
             <th scope="col" class="px-6 py-3">
                Dokumen
            </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($aktapendirian as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
               
             <td class="px-6 py-4">{{$loop->iteration}}</td> 
             <td class="px-6 py-4">{{$item->nomor}}</td>
             <td class="px-6 py-4">{{$item->tglsurat}}</td>
             <td class="px-6 py-4">{{$item->notaris}}</td>
             <td class="px-6 py-4">{{$item->lokasi}}</td>
             <td class="px-6 py-4">Rp. {{number_format($item->modal)}}</td>
                  <td><a href="{{asset('storage/app/public/dist/fileaktependirian/'.$item->file)}}" class="btn btn-success btn-sm" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708z"/>
                    <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                  </svg></a></td>
          
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>

  @if($aktaperubahan)
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-body">
        <h3 class="mb-4 font-italic me-1">Informasi<span class="text-primary font-italic me-1"> Akta Perubahan</span></h3>
        
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3">
                #
            </th>
            <th scope="col" class="px-6 py-3">
                Nomor
            </th>
            <th scope="col" class="px-6 py-3">
               Tanggal
            </th>
            <th scope="col" class="px-6 py-3">
                Notaris
            </th>
            <th scope="col" class="px-6 py-3">
                Dokumen
            </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($aktaperubahan as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
               
             <td class="px-6 py-4">{{$loop->iteration}}</td> 
             <td class="px-6 py-4">{{$item->nomor}}</td>
             <td class="px-6 py-4">{{$item->tglsurat}}</td>
             <td class="px-6 py-4">{{$item->notaris}}</td>
                  <td><a href="{{asset('storage/app/public/dist/fileakteperubahan/'.$item->dokumen)}}" class="btn btn-success btn-sm" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708z"/>
                    <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                  </svg></a></td>
            
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
 @else
<div></div>
 @endif

 @if($pengesahan)
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-body">
        <h3 class="mb-4 font-italic me-1">Informasi<span class="text-primary font-italic me-1"> Pengesahan Kemenkumham</span></h3>
        
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3">
                #
            </th>
            <th scope="col" class="px-6 py-3">
                Nomor
            </th>
            <th scope="col" class="px-6 py-3">
               Tanggal
            </th>
            <th scope="col" class="px-6 py-3">
                Dokumen
            </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengesahan as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                               
              <td class="px-6 py-4">{{$loop->iteration}}</td> 
              <td class="px-6 py-4">{{$item->nomor}}</td>
              <td class="px-6 py-4">{{$item->tglsurat}}</td>
                  <td><a href="{{asset('storage/app/public/dist/filepengesahan/'.$item->file)}}" class="btn btn-success btn-sm" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708z"/>
                    <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                  </svg></a></td>
           
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
 @else
<div></div>
 @endif
  
 @if($pengurusperusahaan)
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-body">
        <h3 class="mb-4 font-italic me-1">Informasi<span class="text-primary font-italic me-1"> Pengurus Perusahaan</span></h3>
        
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3">
                #
            </th>
            <th scope="col" class="px-6 py-3">
                Nik
            </th>
            <th scope="col" class="px-6 py-3">
              Nama
            </th>
            <th scope="col" class="px-6 py-3">
                Jabatan
            </th>
            <th scope="col" class="px-6 py-3">
               Alamat
            </th>
             <th scope="col" class="px-6 py-3">
                Dokumen
            </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengurusperusahaan as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
               
             <td class="px-6 py-4">{{$loop->iteration}}</td> 
             <td class="px-6 py-4">{{$item->nik}}</td>
             <td class="px-6 py-4">{{$item->nama}}</td>
             <td class="px-6 py-4">{{$item->jabatan}}</td>
             <td class="px-6 py-4">{{$item->alamat}}</td>
                  <td><a href="{{asset('storage/app/public/dist/filepengurusperusahaan/'.$item->file)}}" class="btn btn-success btn-sm" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708z"/>
                    <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                  </svg></a></td>               
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
 @else
<div></div>
 @endif

 @if($pajak)
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-body">
        <h3 class="mb-4 font-italic me-1">Informasi<span class="text-primary font-italic me-1"> Pajak Perusahaan</span></h3>
        
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3">
                #
            </th>
            <th scope="col" class="px-6 py-3">
                Jenis Pajak
            </th>
            <th scope="col" class="px-6 py-3">
                Nomor Bukti
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal Bukti
            </th>
            <th scope="col" class="px-6 py-3">
                Keterangan
            </th>
            <th scope="col" class="px-6 py-3">
                Dokumen
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pajak as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
               
             <td class="px-6 py-4">{{$loop->iteration}}</td> 
             <td class="px-6 py-4">{{$item->jenispajak}}</td>
             <td class="px-6 py-4">{{$item->nomorbuktipajak}}</td>
             <td class="px-6 py-4">{{$item->tanggalbukti}}</td>
             <td class="px-6 py-4">{{$item->keterangan}}</td>
                  <td><a href="{{asset('storage/app/public/dist/filepajak/'.$item->file)}}" class="btn btn-success btn-sm" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708z"/>
                    <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                  </svg></a></td>                               
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
 @else
<div></div>
 @endif

 @if($dokumenlainnya)
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-body">
        <h3 class="mb-4 font-italic me-1">Informasi<span class="text-primary font-italic me-1"> Dokumen Lainnya</span></h3>
        
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3">
                #
            </th>
            <th scope="col" class="px-6 py-3">
                Nama Dokumen
            </th>
            <th scope="col" class="px-6 py-3">
                Nomor Dokumen
            </th>
            <th scope="col" class="px-6 py-3">
                Dokumen
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dokumenlainnya as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                  
              <td class="px-6 py-4">{{$loop->iteration}}</td> 
              <td class="px-6 py-4">{{$item->namadokumen}}</td>
              <td class="px-6 py-4">{{$item->nomordokumen}}</td>
                  <td><a href="{{asset('storage/app/public/dist/filedokumenlainnya/'.$item->filedokumen)}}" class="btn btn-success btn-sm" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708z"/>
                    <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                  </svg></a></td>
                              
                                   
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
 @else
<div></div>
 @endif

 @if($pengalamanpekerjaan)
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-body">
        <h3 class="mb-4 font-italic me-1">Informasi<span class="text-primary font-italic me-1"> Pengalaman Pekerjaan</span></h3>
        
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3">
                #
            </th>
            <th scope="col" class="px-6 py-3">
                Nama Kontrak
            </th>
            <th scope="col" class="px-6 py-3">
                Nomor Kontrak
            </th>
            <th scope="col" class="px-6 py-3">
                Lokasi
            </th>
            <th scope="col" class="px-6 py-3">
                Instansi
            </th>
            <th scope="col" class="px-6 py-3">
                Nilai Kontrak
              </th>
              <th scope="col" class="px-6 py-3">
                Persentasi Pelaksanaan (%)
            </th>
            <th scope="col" class="px-6 py-3">
               Tanggal Pelaksanaan
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengalamanpekerjaan as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                  
              <td class="px-6 py-4">{{$loop->iteration}}</td> 
              <td class="px-6 py-4">{{$item->namakontrak}}</td>
              <td class="px-6 py-4">{{$item->nokontrak}}</td>
              <td class="px-6 py-4">{{$item->lokasi}}</td>
              <td class="px-6 py-4">{{$item->instansi}}</td>
              <td class="px-6 py-4">Rp. {{number_format($item->nilaikontrak)}}</td>
              <td class="px-6 py-4">{{$item->persentasipelaksanaan}}</td>
              <td class="px-6 py-4">{{$item->tglpelaksanaan}}</td>        
                                   
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
 @else
<div></div>
 @endif

 @if($tenagaahli)
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-body">
        <h3 class="mb-4 font-italic me-1">Informasi<span class="text-primary font-italic me-1"> Tenaga Ahli</span></h3>
        
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3">
                #
            </th>
            <th scope="col" class="px-6 py-3">
                Nama
            </th>
            <th scope="col" class="px-6 py-3">
               Pendidikan
            </th>
            <th scope="col" class="px-6 py-3">
                Jabatan
            </th>
            <th scope="col" class="px-6 py-3">
                Pengalaman
            </th>
            <th scope="col" class="px-6 py-3">
                Keahlian
              </th>
              <th scope="col" class="px-6 py-3">
                Dokumen
            </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tenagaahli as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
               
             <td class="px-6 py-4">{{$loop->iteration}}</td> 
             <td class="px-6 py-4">{{$item->nama}}</td>
             <td class="px-6 py-4">{{$item->pendidikan}}</td>
             <td class="px-6 py-4">{{$item->jabatan}}</td>
             <td class="px-6 py-4">{{$item->pengalamankerja}}</td>
             <td class="px-6 py-4">{{$item->keahlian}}</td>        
             <td><a href="{{asset('storage/app/public/dist/filetenagaahli/'.$item->dokumen)}}" class="btn btn-success btn-sm" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708z"/>
              <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
            </svg></a></td>                 
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
 @else
<div></div>
 @endif

 @if($perlengkapan)
 <div class="col-12">
   <div class="card shadow mb-4">
     <div class="card-body">
       <h3 class="mb-4 font-italic me-1">Informasi<span class="text-primary font-italic me-1"> Peralatan/Perlengkapan</span></h3>
       
       <table class="table" id="dataTable">
         <thead>
           <tr>
            <th scope="col" class="px-6 py-3">
              #
          </th>
          <th scope="col" class="px-6 py-3">
              Nama Alat
          </th>
          <th scope="col" class="px-6 py-3">
              Jumlah
          </th>
          <th scope="col" class="px-6 py-3">
              Merek /Tipe
          </th>
          <th scope="col" class="px-6 py-3">
              Kapasitas / Spesifikasi
          </th>
          <th scope="col" class="px-6 py-3">
              Kondisi %
            </th>
            <th scope="col" class="px-6 py-3">
              Status Kepemilikan
          </th>
          <th scope="col" class="px-6 py-3">
             Dokumen
            </th>
           </tr>
         </thead>
         <tbody>
          @foreach ($perlengkapan as $item)
          <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
             
           <td class="px-6 py-4">{{$loop->iteration}}</td> 
           <td class="px-6 py-4">{{$item->namaalat}}</td>
           <td class="px-6 py-4">{{$item->jumlah}}</td>
           <td class="px-6 py-4">{{$item->tipe}}</td>
           <td class="px-6 py-4">{{$item->spesifikasi}}</td>
           <td class="px-6 py-4">{{$item->kondisi}}</td>
           <td class="px-6 py-4">{{$item->status}}</td>        
            <td><a href="{{asset('storage/app/public/dist/fileperlengkapan/'.$item->dokumen)}}" class="btn btn-success btn-sm" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
             <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708z"/>
             <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
           </svg></a></td>                 
           @endforeach
         </tbody>
       </table>

     </div>
   </div>
 </div>
@else
<div></div>
@endif
<div class="text-right mb-4">
    <a href="{{route('tender.klarifikasi',[$pengajuan->id_paket])}}" class="btn btn-primary btn-sm">Kembali</a>
</div>


@endsection