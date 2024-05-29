@extends('layouts.sbadmin')
@section('footer')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    // Mendapatkan elemen input
    var hpsInput = document.getElementById('hps');

    // Menambahkan event listener untuk memantau input
    hpsInput.addEventListener('input', function() {
        // Mengambil nilai input tanpa tanda titik
        var rawValue = this.value.replace(/\./g, '');

        // Format mata uang dengan menambahkan titik setiap tiga digit dari belakang
        var formattedValue = '';
        for (var i = rawValue.length - 1, j = 0; i >= 0; i--, j++) {
            if (j > 0 && j % 3 == 0) {
                formattedValue = '.' + formattedValue;
            }
            formattedValue = rawValue.charAt(i) + formattedValue;
        }

        // Mengatur nilai input dengan format mata uang yang sudah diformat
        this.value = formattedValue;
    });

    var hpsInput = document.getElementById('pagu');

    // Menambahkan event listener untuk memantau input
    hpsInput.addEventListener('input', function() {
        // Mengambil nilai input tanpa tanda titik
        var rawValue = this.value.replace(/\./g, '');

        // Format mata uang dengan menambahkan titik setiap tiga digit dari belakang
        var formattedValue = '';
        for (var i = rawValue.length - 1, j = 0; i >= 0; i--, j++) {
            if (j > 0 && j % 3 == 0) {
                formattedValue = '.' + formattedValue;
            }
            formattedValue = rawValue.charAt(i) + formattedValue;
        }

        // Mengatur nilai input dengan format mata uang yang sudah diformat
        this.value = formattedValue;
    });
</script>
@endsection
@section('content')
<div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Paket Pekerjaan</h6>
      </div>
      
      <div class="card-body">
    
      @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
    
      <form enctype="multipart/form-data"  class="bg-white shadow-sm p-3" action="{{route('tender.store')}}" method="POST">
    
          @csrf
         
          <label for="content">Nama Kegiatan</label>
         <input type="text" class="form-control" name="namakegiatan">
          <div class="invalid-feedbeck">
            <span class="text-danger">{{$errors->first('namakegiatan')}}</span>
          </div>
          <br>
          <label for="content">Nama Paket</label>
          <input type="text" class="form-control" name="namapaket">
           <div class="invalid-feedbeck">
             <span class="text-danger">{{$errors->first('namapaket')}}</span>
           </div>
           <br>
           <label for="content">Pagu</label>
           <input type="text" class="form-control" name="pagu" id="pagu">
            <div class="invalid-feedbeck">
              <span class="text-danger">{{$errors->first('pagu')}}</span>
            </div>
            <br>
           <label for="content">HPS</label>
          <input type="text" class="form-control" name="hps" id="hps">
           <div class="invalid-feedbeck">
             <span class="text-danger">{{$errors->first('hps')}}</span>
           </div>
           <br>
           
           <label for="content">Tahun Anggaran</label>
          <select name="tahunanggaran" class="form-control">
                <option value=""></option>
                @foreach ($tahun as $item)
                    <option value="{{$item->tahun}}">{{$item->tahun}}</option>
                @endforeach
          </select>
           <div class="invalid-feedbeck">
             <span class="text-danger">{{$errors->first('tahunanggaran')}}</span>
           </div>
           <br>
           <label for="content">Lokasi Pekerjaan</label>
           <input type="text" class="form-control" name="lokasi">
            <div class="invalid-feedbeck">
              <span class="text-danger">{{$errors->first('lokasi')}}</span>
            </div>
            <br>
            <label for="content">Waktu Pelaksanaan Pekerjaan</label>
            <input type="text" class="form-control" name="waktupelaksanaan">
             <div class="invalid-feedbeck">
               <span class="text-danger">{{$errors->first('waktupelaksanaan')}}</span>
             </div>
             <br>
             <label for="content">Jenis Pengadaan</label>
          <select name="klasifikasi" class="form-control">
                <option value=""></option>
                @foreach ($klasifikasi as $item)
                    <option value="{{$item->klasifikasi}}">{{$item->klasifikasi}}</option>
                @endforeach
          </select>
           <div class="invalid-feedbeck">
             <span class="text-danger">{{$errors->first('klasifikasi')}}</span>
           </div>
           <br>
          <button class="btn btn-primary btn-sm" type="submit" value="Save"><i class="fa fa-save fa-sm"></i> Simpan</button>
        <a href="{{route('tender.index')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
      </div>
      </div>
    </div>
@endsection