@extends('admin.default')
@section('title', 'Pembayaran')
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
            @foreach ( $siswa as $s )             
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->nama_siswa }}</td>
                <td>{{ $s->nisn }}</td>
                <td>{{ $s->kelas->nama_kelas }}</td>
                <td>{{ $s->jenis_kelamin }}</td>
                <td>
                  <a href="{{ route('pembayaran.bayar', $s->nisn) }}" class="btn btn-primary btn-sm ml-2">
                      <i class="fas fa-money-check"></i> BAYAR 
                  </a>
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
