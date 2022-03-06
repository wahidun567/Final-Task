@extends('admin.default')
@section('title', 'Data Pembayaran '. $spp->tahun)
@section('content')
<x-alert></x-alert>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('pembayaran.status-pembayaran.show',$siswa->nisn) }}" class="btn btn-danger btn-sm">
            <i class="fas fa-fw fa-arrow-left"></i> KEMBALI
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if($pembayaran->count() > 0)
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
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pembayaran as $row)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $row->siswa->nama_siswa }}</td>
              <td>{{ $row->siswa->kelas->nama_kelas }}</td>
              <td>{{ $row->nisn }}</td>
              <td>{{ \Carbon\Carbon::parse($row->tanggal_bayar)->format('d-m-Y') }}</td>
              <td>{{ $row->petugas->nama_petugas }}</td>
              <td>{{ $row->bulan_bayar }}</td>
              <td>{{ $row->tahun_bayar }}</td>
              <td>{{ $row->jumlah_bayar }}</td>
              <td>
                <span href="" class="btn btn-success btn-sm"><i class=""></i> DIBAYAR</span>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
          @else
          <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Data Pembayaran Tidak Tersedia!</h4>
            <p>Pembayaran Spp {{ $siswa->nama_siswa }} di Tahun {{ $spp->tahun }} tidak tersedia.</p>
          </div>
          @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="" class="btn btn-primary btn-sm">
            <i class="fas fa-fw fa-circle"></i> STATUS PEMBAYARAN
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if($pembayaran->count() > 0)
          <table id="" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Bulan</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach(Universe::bulanAll() as $key => $value)
            <tr>
              <td>{{ $value['nama_bulan'] }}</td>
              <td>
                @if(Universe::statusPembayaran($siswa->id, $spp->tahun, $value['nama_bulan']) == 'DIBAYAR')
                  <span href="" class="btn btn-success btn-sm"><i class=""></i> 
                    {{ Universe::statusPembayaran($siswa->id, $spp->tahun, $value['nama_bulan']) }}
                  </span>
                @else
                  <span href="" class="btn btn-danger btn-sm"><i class=""></i> 
                    {{ Universe::statusPembayaran($siswa->id, $spp->tahun, $value['nama_bulan']) }}
                  </span>
                @endif
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
          @else
          <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Data Status Pembayaran Tidak Tersedia!</h4>
            <p>Status Pembayaran Spp {{ $siswa->nama_siswa }} di Tahun {{ $spp->tahun }} tidak tersedia.</p>
          </div>
          @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
</div>
@endsection