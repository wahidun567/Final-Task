@extends('admin.default')
@section('title', 'Edit SPP')
@section('content')
<!-- Create Modal -->
<div class="container">
    <x-alert></x-alert>
    <div class="card">
        <form method="post" action="{{ route('spp.update', $spp->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
        <div class="form-group">
            <label for="tahun_edit">Tahun:</label>
            <input required="" type="text" name="tahun" id="tahun_edit" class="form-control" value="{{ $spp->tahun }}">  
        </div>
        <div class="form-group">
            <label for="nominal_edit">Nominal:</label>
            <input required="" type="text" name="nominal" id="nominal_edit" class="form-control" value="{{ $spp->nominal }}">
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

