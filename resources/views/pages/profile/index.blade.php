@extends('layouts.app')

@section('content')

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Profile</h1>
  </div> 

  <div class="row">
    <div class="col">
      <form action="/profile/{{ Auth::user()->id}}" method="post">
        @csrf
        <div class="card">
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="name">Nama Lengkap</label>
              <input type="text" id="name" name="name" value="{{Auth::user()->name}}" class="form-control @error('name')
                is-invalid
              @enderror">
              @error('name')
                <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="email">Email</label>
              <input type="text" id="email" name="email" value="{{Auth::user()->email}}" class="form-control @error('email')
                is-invalid
              @enderror">
              @error('email')
              <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>
          </div> 
          <div class="card-footer">
            <div class="d-flex justify-content-end" style="gap: 10px;">
              <a href="/resident" class="btn btn-outline-secondary">Kembali</a>
              <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection