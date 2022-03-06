@extends('admin.default')
@section('title', 'Status Pembayaran Siswa')
@section('content')
<div class="container">
<x-alert></x-alert>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>Nisn</th>
              <th>Kelas</th>
              <th>Jenis Kelamin</th>
              <th>Detail</th>
            </tr>
            </thead>
            <tbody>
              @foreach ( $data as $d )
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->nama_siswa }}</td>
                <td>{{ $d->nisn }}</td>
                <td>{{ $d->kelas->nama_kelas }}</td>
                <td>{{ $d->jenis_kelamin }}</td>
                <td>
                  <a href="{{ route('pembayaran.status-pembayaran.show', $d->nisn) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-info fa-fw"></i>DETAIL</a>
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