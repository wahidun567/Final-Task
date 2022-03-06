@extends('admin.default')
@section('title', 'Home')
@section('content')
<div class="container">
<x-alert></x-alert>
    <div class="row">
	<div class="col-lg">
		<div class="jumbotron">
		@role('admin|petugas')
		<h1 class="display-4 fs-1">Hello, {{ Universe::petugas()->nama_petugas }}!</h1>
		@endrole

		@role('siswa')
		<h1 class="display-4 fs-1">Hello, {{ Universe::siswa()->nama_siswa }}!</h1>
		@endrole
		<p class="lead">Selamat datang di WEB SPPKU.</p>
		<hr class="my-4">
		</div>
	</div>
</div>
</div>

@endsection
