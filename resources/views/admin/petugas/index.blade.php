@extends('admin.default')
@section('title', 'Data Petugas')
@section('content')
<div class="container">
  <x-alert></x-alert>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('petugas.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus fa-fw"></i> Tambah Data
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Jenis Kelamin</th>
                <th>Kode Petugas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $data as $d )
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->nama_petugas }}</td>
                <td>{{ $d->jenis_kelamin }}</td>
                <td>{{ $d->kode_petugas }}</td>
                  <td class="d-flex">
                    <a href="{{ route('petugas.edit', $d->id) }}" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit fa-fw"></i> Ubah
                    </a>
                    <form action="{{ route('petugas.destroy', $d->id) }}" method="POST">
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