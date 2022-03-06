@extends('admin.default')
@section('title', 'Data History Pembayaran')
@section('content')
<div class="container">
    <x-alert></x-alert>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>Kelas</th>
              <th>Nisn</th>
              <th>Tanggal Bayar</th>
              <th>Nama Petugas</th>
              <th>Untuk Bulan</th>
              <th>Untuk Tahun</th>
              <th>Nominal</th>
              <th>Print</th>
            </tr>
            </thead>
            <tbody>
              @foreach ( $data as $d )
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->siswa->nama_siswa }}</td>
                <td>{{ $d->siswa->kelas->nama_kelas }}</td>
                <td>{{ $d->siswa->nisn }}</td>
                <td>{{ $d->tanggal_bayar }}</td>
                <td>{{ $d->petugas->nama_petugas }}</td>
                <td>{{ $d->bulan_bayar }}</td>
                <td>{{ $d->tahun_bayar }}</td>
                <td>{{ $d->jumlah_bayar }}</td>
                <td>
                  <a href="{{ route('pembayaran.history-pembayaran.print',$d->id) }}"class="btn btn-danger btn-sm ml-2" target="_blank">
                  <i class="fas fa-print fa-fw"></i></a>
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
