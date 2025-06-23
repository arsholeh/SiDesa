@extends('layouts.app')

@section('content')

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Data Penduduk</h1>
  </div> 

  <div class="row">
    <div class="col">
      <form action="/complaint/{{ $complaint->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="card">
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="title">Judul</label>
              <input type="text" id="title" name="title" value="{{ old('title', $complaint->title) }}" class="form-control @error('title')
                is-invalid
              @enderror">
              @error('title')
              <span class="invalid-feedback">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group mb-3">
              <label for="content">Konten</label>
              <textarea  id="content" name="content" class="form-control @error('content')
                is-invalid
              @enderror" cols="30" rows="10">{{ old('content', $complaint->content) }}</textarea>
              @error('content')
              <span class="invalid-feedback">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group mb-3">
              <label for="photo_proof">Bukti Foto</label>
              <input type="file" id="photo_proof" name="photo_proof" value="{{ old('photo_proof', $complaint->photo_proof) }}" class="form-control @error('photo_proof')
                is-invalid
              @enderror">
              @error('photo_proof')
              <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-end" style="gap: 10px;">
              <a href="/complaint" class="btn btn-outline-secondary">Kembali</a>
              <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection