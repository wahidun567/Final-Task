@extends('admin.default')
@section('title', 'Tambah data')
@section('content')
<!-- Create Modal -->
<div class="container">
    <x-alert></x-alert>
    <div class="card">
        <form method="post" action="{{ route('siswa.store') }}">
        @csrf
        <div class="card-body">
            <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                <label for="nama_siswa">Nama Siswa:</label>
                <input required="" type="text" name="nama_siswa" id="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror">
                @error('nama_siswa')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label for="email">Email:</label>
                <input required="" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">  
                @error('email')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label for="nisn">Nisn</label>
                <input required="" type="number" name="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror">  
                @error('nisn')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label for="nis">Nis:</label>
                <input required="" type="number" name="nis" id="nis" class="form-control @error('nis') is-invalid @enderror">  
                @error('nis')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </div>
            </div>  
            </div>
            <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select required="" name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    <option disabled="" selected="">- PILIH JENIS KELAMIN -</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input required="" type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">
                @error('alamat')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label for="no_telepon">No Telepon:</label>
                <input required="" type="number" name="no_telepon" id="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror">
                @error('no_telepon')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label for="kelas_id">Kelas:</label>
                <select required="" name="kelas" id="kelas_id" class="form-control @error('kelas') is-invalid @enderror">
                    <option disabled="" selected="">- PILIH KELAS -</option>
                    @foreach($kelas as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_kelas }}</option>
                    @endforeach
                </select>
                @error('nama_kelas')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </div>
            </div>  
            </div>
        </div>
        <div class="card-footer">
        <button type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">KEMBALI</button>
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fas fa-save fa-fw"></i> SIMPAN
        </button>
        </div>
        </form>
    </div>
</div>
<!-- Create Modal -->
@endsection

