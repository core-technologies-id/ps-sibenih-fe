@extends('layouts.main')
@section('style')
@endsection
@section('content')
<section class="fullscreen" data-bg-parallax="/assets/images/bg-login.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 center p-50 b-r-6">
                @if (session()->has('success'))
                    <div role="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <a class="font-weight-bolder text-decoration-none text-white" href="/registrasi/export" target="_blank"> Print formulir sekarang</a>. 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                <div class="card border-0 shadow-inner">
                    <h3 class="text-center mt-3">Login Sibenih!</h3>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="username">Username :</label>
                                <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" 
                                    placeholder="Username" name="username" id="username">
                                @error('username')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Password :</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-success w-50">Login</button>
                            </div>
                            <div class="col-md text-center">
                                <span>Belum Daftar?</span> <a href="{{ route('registrasi') }}" class="text-decoration-none">Registrasi disini!</a>
                            </div>
                        </form>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection