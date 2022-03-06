@extends('admin.default')
@section('title', 'Ubah Data')
@section('content')
<div class="container">
  <x-alert></x-alert>
  <div class="card">
      <form method="post" action="{{ route('petugas.update', $petugas->id) }}">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email"  name="email" class="form-control" value="{{ $petugas->user->email }}">
        </div>
        <div class="form-group">
          <label for="nama_petugas_edit">Nama Petugas:</label>
          <input required="" type="text" name="nama_petugas" id="nama_petugas_edit" class="form-control" value="{{ $petugas->nama_petugas }}">
        </div>
        <div class="form-group">
          <label for="jenis_kelamin_edit">Jenis Kelamin:</label>
          <select required="" name="jenis_kelamin" id="jenis_kelamin_edit" class="form-control">
              <option disabled="" selected="">- PILIH JENIS KELAMIN -</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
          </select>
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
@endsection
