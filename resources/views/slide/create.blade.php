@extends('layouts.sbadmin')
@section('footer')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
  // fungsi ini akan berjalan ketika akan menambahkan gambar dimana fungsi ini
  // akan membuat preview image sebelum kita simpan gambar tersebut.      
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#previewImage').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  // Ketika tag input file denghan class image di klik akan menjalankan fungsi di atas
  $("#image").change(function() {
      readURL(this);
  });
</script>
@endsection
@section('content')
<div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-secondary">Tambah Slide</h6>
      </div>
      
      <div class="card-body">
    
      @if(session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif 
    
      <form enctype="multipart/form-data"  class="bg-white shadow-sm p-3" action="{{route('slide.store')}}" method="POST">
    
          @csrf
          <div class="form-group mb-3">
          <label for="file">Image</label><br>
          <img id="previewImage" class="mb-2" src="#" width="20%" alt="" >
          <div class="input-group control-group increment" >
          <input class="form-control {{$errors->first('image') ? "is-invalid" : ""}}" value="{{old('image')}}" type="file" name="image" id="image"/>
          </div>
          <small class="text-muted">*file bertipe image max 2mb *pastikan ukuran slide 600x400 agar tampilan silde lebih baik</small>
          <div class="invalid-feedbeck">
            {{$errors->first('image')}}
          </div>
          </div>
          
          <label for="content">keterangan</label>
          <textarea name="keterangan" id="textarea" cols="30" rows="10" class="form-control"></textarea>
          <div class="invalid-feedbeck">
            {{$errors->first('keterangan')}}
          </div>
          <br>
          <button class="btn btn-primary btn-sm" type="submit" value="Save"><i class="fa fa-save fa-sm"></i> Simpan</button>
        <a href="{{route('slide.index')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
      </div>
      </div>
    </div>
@endsection