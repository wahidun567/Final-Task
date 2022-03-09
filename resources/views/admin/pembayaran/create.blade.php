@extends('admin.default')
@section('title', 'Tambah Kelas')
@section('content')
<!-- Create Modal -->
<div class="container">
    <x-alert></x-alert>
    <div class="card">
        <form method="post" action="{{ route('kelas.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nama_kelas_create">Nama Kelas:</label>
                <input required type="" name="nama_kelas" id="nama_kelas_create" class="form-control">
            </div>
            <div class="form-group">
                <label for="kompetensi_keahlian_create">Komptensi Keahlian:</label>
                <input required type="" name="kompetensi_keahlian" id="kompetensi_keahlian_create" class="form-control">
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

