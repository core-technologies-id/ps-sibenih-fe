@extends('layouts.main')
@section('style')
@endsection
@section('content')
    <div id="slider" class="inspiro-slider dots-creative" data-height-xs="360" data-fade="true">
        <div class="slide kenburns" data-bg-image="http://localhost:8000/assets/images/bg-login.jpg">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center">
                    <h1 data-caption-animation="zoom-out">Si-Benih</h1>
                    <p class="text-small">
                        Sistem Informasi Sarana & Prasarana Perbenihan
                    </p>
                </div>
            </div>
        </div>
        <div class="slide kenburns"
            data-bg-image="/assets/images/home/main-banner/ramadhani-rafid-XMSUfFloaHU-unsplash.webp">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center">
                    <h1 data-caption-animation="zoom-out">Si-Benih</h1>
                    <p class="text-small">
                        Sistem Informasi Sarana & Prasarana Perbenihan
                    </p>
                </div>
            </div>
        </div>
    </div>
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
                                <a href="{{ route('registrasi') }}" class="btn">Registrasi</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>
@endsection