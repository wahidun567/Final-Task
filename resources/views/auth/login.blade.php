@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="container pt-5">
    <x-alert></x-alert>
    <div class="row justify-content-center pt-5">
        <b class="text-center fs-2 mb-3">Pembayaran Spp Sekolah</b>
        <div class="col-md-5 card py-4 shadow">
            <form action="/login" method="post">
                @csrf
                <h1 class="h3 mb-4 fw-normal text-center">Please Login</h1>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" autofocus value="{{ old('email') }}" required>
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary shadow mt-4" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection
