@extends('admin.default')
@section('title', 'Tambah SPP')
@section('content')
<div class="container">
    <x-alert></x-alert>
    <div class="card">
        <form method="post" action="{{ route('spp.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <input required="" type="text" name="tahun" id="tahun" class="form-control">  
            </div>
            <div class="form-group">
                <label for="nominal">Nominal:</label>
                <input required="" type="text" name="nominal" id="nominal" class="form-control">
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

