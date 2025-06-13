@extends('layouts.app')

@section('content')

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Permintaan Akun</h1>
  </div> 

  @if (session('success'))
         <script>
             Swal.fire({
            title: "Berhasil",
            text: "{{ session()->get('success') }}",
            icon: "success"
                });
            </script>
      @endif

  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-body">
         <div style="overflow-x: auto;">
             <table class="table tabe-bordered" style="min-with:100%;">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>
            @if (count($users) < 1)
              <tbody>
                <tr>
                  <td colspan="11">
                    <p class="pt-3 text-center">Tidak ada data</p>
                  </td>
                </tr>
              </tbody>
              @else
              <tbody>
                @foreach ($users as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>
                    <div class="d-flex" style="gap:10px;">
                      <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ConfirmationReject-{{ $item->id }}">
                        Tolak
                        </button>
                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#ConfirmationApprove-{{ $item->id }}">
                        Setuju
                        </button>
                    </div>
                    
                  </td>
                </tr>
                @include('pages.account-request.confirmation-approve')
                 @include('pages.account-request.confirmation-reject')
                @endforeach
              </tbody>
            @endif           
          </table>
         </div>
        </div>
      </div>
    </div>
  </div>
@endsection