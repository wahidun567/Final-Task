@extends('admin.default')
@section('title', 'Tambah User')
@section('content')
<div class="container">
    <x-alert></x-alert>
    <div class="card">
        <form method="post" action="{{ route('user.store') }}">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="n">Name</label>
                <input type="" required="" id="n" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="e">Email</label>
                <input type="" required="" id="e" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="p">Password</label>
                <input type="password" required="" id="p" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="r">Role</label>
                <select name="role" id="r" class="form-control">
                    <option disabled="">- PILIH ROLE -</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                    <option value="user">User</option>
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
