@extends('layouts.main')
@section('style')
@endsection
@section('content')
    <section class="fullscreen" data-bg-parallax="http://localhost:8000/assets/images/bg-login.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 center p-50 b-r-6">
                    <div class="card border-0 shadow-inner">
                        <h3 class="text-center mt-3">Login Sibenih!</h3>
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="nama_pimpinan">Username :</label>
                                    <input type="text" class="form-control {{ $errors->has('nama_pimpinan') ? 'is-invalid' : '' }}" 
                                        placeholder="Username" name="nama_pimpinan" id="nama_pimpinan">
                                    @error('nama_pimpinan')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Password :</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Login</button>
                                    <a href="#" class="btn">Registrasi</a></p>
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
        