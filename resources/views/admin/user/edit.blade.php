@extends('admin.default')
@section('title', 'Ubah Data')
@section('content')
<div class="container">
    <x-alert></x-alert>
    <div class="card">
        <form method="post" action="{{ route('user.update',$user->id) }}">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" required="" id="name" name="name" class="form-control" autofocus value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password"  name="password" class="form-control">
                <small class="text-secondary">Kosongkan password jika tidak ingin diubah</small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="" required="" id="email" name="email" class="form-control" value="{{ $user->email }}">
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
{{-- <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-modalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-update">Update</button>
        </form>
      </div>
    </div>
  </div>
</div> --}}