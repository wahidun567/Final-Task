@extends('admin.default')
@section('title', 'Data History Pembayaran')
@section('content')
<x-alert></x-alert>
<div class="container">
    <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="dataTable2" class="table table-bordered table-striped">
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
              @foreach ( $data as $row)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->siswa->nama_siswa }}</td>
                <td>{{ $row->siswa->kelas->nama_kelas }}</td>
                <td>{{ $row->siswa->nisn }}</td>
                <td>{{ $row->tanggal_bayar }}</td>
                <td>{{ $row->petugas->nama_petugas }}</td>
                <td>{{ $row->bulan_bayar }}</td>
                <td>{{ $row->tahun_bayar }}</td>
                <td>{{ $row->jumlah_bayar }}</td>
                <td>
                  <a href="{{ route('siswa.history-pembayaran.preview', $row->id) }}" class="btn btn-danger btn-sm ml-2" target="_blank">
                    <i class="fas fa-print fa-fw"></i>
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

<!-- /.row -->
@endsection