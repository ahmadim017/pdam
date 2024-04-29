@extends('layouts.sbadmin')

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
    
      <form enctype="multipart/form-data"  class="bg-white shadow-sm p-3" action="{{route('slide.update',[$slide->id])}}" method="POST">
    
          @csrf
          @method('PUT')
          <label for="file">Image</label>
          <img id="previewImage" class="mb-2" src="{{ $slide->getImage() }}" width="20%" alt="">
          <div class="input-group control-group increment" >
          <input class="form-control {{$errors->first('image') ? "is-invalid" : ""}}" value="{{old('image')}}" type="file" name="image"/>
          </div>
          <small class="text-muted">*file bertipe image max 2mb *pastikan ukuran slide 600x400 agar tampilan silde lebih baik</small>
          <div class="invalid-feedbeck">
            {{$errors->first('image')}}
          </div>
          <br>
          <label for="content">keterangan</label>
          <textarea name="keterangan" id="textarea" cols="30" rows="10" class="form-control"></textarea>
          <div class="invalid-feedbeck">
            {{$errors->first('keterangan')}}
          </div>
          <br>
          <label for="content">keterangan</label>
          <select name="status" class="form-control" id="">
            <option @if($slide->status == 'active')selected @endif value="active">active</option>
            <option @if($slide->status == 'inactive')selected @endif value="inactive">inactive</option>
          </select>
          <br>
          <button class="btn btn-primary btn-sm" type="submit" value="Save"><i class="fa fa-save fa-sm"></i> Simpan</button>
        <a href="{{route('slide.index')}}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
        </form>
      </div>
      </div>
    </div>
@endsection