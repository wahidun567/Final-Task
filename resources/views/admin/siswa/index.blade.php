@extends('admin.default')
@section('title', 'Siswa')
@section('content')
<div class="container">
  <x-alert></x-alert>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus fa-fw"></i> Tambah Data
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>Nisn</th>
              <th>Kelas</th>
              <th>Jenis Kelamin</th>
              <th>No Telepon</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($siswa as $s)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->nama_siswa }}</td>
                <td>{{ $s->nisn }}</td>
                <td>{{ $s->kelas->nama_kelas }}</td>
                <td>{{ $s->jenis_kelamin }}</td>
                <td>{{ $s->no_telepon }}</td>
                <td class="d-flex">
                  <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit fa-fw"></i> Ubah
                  </a>
                  <form action="{{ route('siswa.destroy', $s->id) }}" method="POST">
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

{{-- <!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('siswa.store') }}">
        @csrf
      <div class="modal-body">
          <div class="alert alert-danger print-error-msg" style="display: none;">
            <ul></ul>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <label for="nama_siswa">Nama Siswa:</label>
                <input required="" type="text" name="nama_siswa" id="nama_siswa" class="form-control">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="email">Email:</label>
                <input required="" type="email" name="email" id="email" class="form-control">  
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="nisn">Nisn</label>
                <input required="" type="number" name="nisn" id="nisn" class="form-control">  
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="nis">Nis:</label>
                <input required="" type="number" name="nis" id="nis" class="form-control">  
              </div>
            </div>  
          </div>
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select required="" name="jenis_kelamin" id="jenis_kelamin" class="form-control select2bs4">
                    <option disabled="" selected="">- PILIH JENIS KELAMIN -</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input required="" type="text" name="alamat" id="alamat" class="form-control">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="no_telepon">No Telepon:</label>
                <input required="" type="number" name="no_telepon" id="no_telepon" class="form-control">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="kelas_id">Kelas:</label>
                <select required="" name="kelas_id" id="kelas_id" class="form-control select2bs4">
                  <option disabled="" selected="">- PILIH KELAS -</option>
                  @foreach($kelas as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_kelas }}</option>
                  @endforeach
                </select>
              </div>
            </div>  
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save fa-fw"></i> SIMPAN
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Create Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="update">
      <div class="modal-body">
          <div class="alert alert-danger print-error-msg" style="display: none;">
            <ul></ul>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nama_siswa_edit">Nama Siswa:</label>
                <input type="hidden" name="id_edit" id="id_edit" class="form-control" readonly="">
                <input required="" type="text" name="nama_siswa" id="nama_siswa_edit" class="form-control">
              </div>
            </div>  
            <div class="col-lg-6">
              <div class="form-group">
                <label for="alamat_edit">Alamat:</label>
                <input required="" type="text" name="alamat" id="alamat_edit" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="jenis_kelamin_edit">Jenis Kelamin:</label>
                <select required="" name="jenis_kelamin" id="jenis_kelamin_edit" class="form-control">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="no_telepon_edit">No Telepon:</label>
                <input required="" type="text" name="no_telepon" id="no_telepon_edit" class="form-control">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="kelas_id_edit">Kelas:</label>
                <select required="" name="kelas_id" id="kelas_id_edit" class="form-control">
                  @foreach($kelas as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_kelas }}</option>
                  @endforeach
                </select>
              </div>
            </div>  
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save fa-fw"></i> UPDATE
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal --> --}}
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/datatables.min.css') }}"/>
@endpush
@push('js')
    <script type="text/javascript" src="{{ asset('datatables/datatables.min.js') }}"></script>
@endpush
