@extends('admin.default')
@section('title', 'Tambah Kelas')
@section('content')
<div class="container">
    <x-alert></x-alert>
    <div class="card">
        <form method="post" action="{{ route('admin-list.store') }}">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="email">Email:</label>
                <input required="" type="email" name="email" id="email" class="form-control" autofocus>
            </div>
            <div class="form-group">
                <label for="nama_petugas">Nama Petugas:</label>
                <input required="" type="text" name="nama_petugas" id="nama_petugas" class="form-control">
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
