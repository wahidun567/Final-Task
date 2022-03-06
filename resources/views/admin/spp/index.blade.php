@extends('admin.default')
@section('title', 'Management SPP')
@section('content')
<div class="container">
  <x-alert></x-alert>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('spp.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus fa-fw"></i> Tambah Data
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Nominal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $spp as $s )
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->tahun }}</td>
                <td>{{ $s->nominal }}</td>
                  <td class="d-flex">
                    <a href="{{ route('spp.edit', $s->id) }}" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit fa-fw"></i> Ubah
                    </a>
                    <form action="{{ route('spp.destroy', $s->id) }}" method="POST">
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