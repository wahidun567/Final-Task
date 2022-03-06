@extends('admin.default')
@section('title', 'Admin')
@section('content')
<div class="container">
  <x-alert></x-alert>
  <div class="row">
    <div class="col-lg-6">
      <div class="callout callout-danger">
          <h5>Pemberitahuan!</h5>

          <p>Admin adalah petugas yang memiliki akses penuh aplikasi , 
          mengakses data Admin sama dengan mengakses data petugas yang bersangkutan.</p>
        </div>
    </div>
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('admin-list.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus fa-fw"></i> Tambah Data
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Email</th>
              <th>Nama Petugas</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach ( $admin as $a )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $a->email }}</td>
                  <td>{{ $a->name }}</td>
                  <td class="d-flex">
                    <a href="{{ route('admin-list.edit', $a->id) }}" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit fa-fw"></i> Ubah
                    </a>
                    <form action="{{ route('admin-list.destroy', $a->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm ml-1" onclick="return confirm('Yakin ingin menghapus data ini?')" type="submit">
                        <i class="fas fa-trash fa-fw"></i> Hapus
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  <!-- /.col -->
  </div>
</div>

@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/datatables.min.css') }}"/>
@endpush
@push('js')
    <script type="text/javascript" src="{{ asset('datatables/datatables.min.js') }}"></script>
@endpush






