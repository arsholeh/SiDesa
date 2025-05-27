@extends('layouts.app')

@section('content')

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Data Penduduk</h1>
  </div> 

  <div class="row">
    <div class="col">
      <form action="/resident/{{ $resident->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="card">
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="nik">NIK</label>
              <input type="number" inputmode="numeric" id="nik" name="nik" value="{{ old('nik', $resident->nik) }}" class="form-control @error('nik')
                is-invalid
              @enderror">
              @error('nik')
                <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="name">Nama Lengkap</label>
              <input type="text" id="name" name="name" value="{{ old('name', $resident->name) }}" class="form-control @error('name')
                is-invalid
              @enderror">
              @error('name')
              <span class="invalid-feedback">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group mb-3">
              <label for="gender">Jenis Kelamin</label>
              <select name="gender" id="gender" class="form-control">
                <option value="male">Laki-Laki</option>
                <option value="female">Perempuan</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="birth_date">Tanggal Lahir</label>
              <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $resident->birth_date) }}" class="form-control @error('birth_date')
                is-invalid
              @enderror">
              @error('birth_date')
              <span class="invalid-feedback">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group mb-3">
              <label for="birth_place">Tempat Lahir</label>
              <input type="text" id="birth_place" name="birth_place" value="{{ old('birth_place', $resident->birth_place) }}" class="form-control @error('birth_place')
                is-invalid
              @enderror">
              @error('birth_place')
              <span class="invalid-feedback">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group mb-3">
              <label for="address">Alamat</label>
              <textarea  id="address" name="address" class="form-control @error('address')
                is-invalid
              @enderror" cols="30" rows="10">{{ old('address', $resident->address) }}</textarea>
              @error('address')
              <span class="invalid-feedback">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group mb-3">
              <label for="religion">Agama</label>
              <input type="text" id="religion" name="religion" value="{{ old('religion', $resident->religion) }}" class="form-control @error('religion')
                is-invalid
              @enderror">
              @error('religion')
              <span class="invalid-feedback">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="marital_status">Status Perkawinan</label>
              <select name="marital_status" id="marital_status" class="form-control">
                <option value="single">Belum Menikah</option>
                <option value="married">Sudah Menikah</option>
                <option value="divorced">Cerai</option>
                <option value="widowed">Duda/Janda</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="occupation">Pekerjaan</label>
              <input type="text" id="occupation" name="occupation" value="{{ old('occupation', $resident->occupation) }}" class="form-control @error('occupation')
                is-invalid
              @enderror">
              @error('occupation')
              <span class="invalid-feedback">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group mb-3">
              <label for="phone">Telephone</label>
              <input type="number" inputmode="numeric" id="phone" name="phone" value="{{ old('phone', $resident->phone) }}" class="form-control @error('phone')
                is-invalid
              @enderror">
              @error('phone')
              <span class="invalid-feedback">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group mb-3">
              <label for="status">Status Penduduk</label>
              <select name="status" id="status" class="form-control">
                <option value="active">Aktif</option>
                <option value="moved">Pindah</option>
                <option value="deceased">Almarhum</option>
              </select>
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