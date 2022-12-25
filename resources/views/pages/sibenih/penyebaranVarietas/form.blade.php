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
        <div class="slide kenburns" data-bg-image="/assets/images/home/main-banner/ramadhani-rafid-XMSUfFloaHU-unsplash.webp">
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
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="content col-lg-9">
                @include('components.message')
                <div class="card shadow-inner border-0">
                    <div class="card-body">
                        <h3 class="mb-5 text-center">Penyebaran Varietas</h3>
                        <form id="form1" class="form-validate" action="{{ route('penyebaran_varietas.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="kabupaten_id">Kabupaten :</label>
                                    <select name="kabupaten_id" class="form-control {{ $errors->has('kabupaten_id') ? 'is-invalid' : '' }}" id="kabupaten_id">
                                        <option value="" disabled selected>--Pilih Kabupaten--</option>
                                        @foreach ($kabupatens as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kabupaten_id')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="varietas_id">Varietas :</label>
                                    <select name="varietas_id" class="form-control {{ $errors->has('varietas_id') ? 'is-invalid' : '' }}" id="varietas_id">
                                        <option value="" disabled selected>--Pilih Varietas--</option>
                                        @foreach ($varietas as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('varietas_id')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="year">Tahun :</label>
                                    <input type="text" class="form-control" name="year" value="{{ date('Y') }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="month">Bulan :</label>
                                    <input type="month" class="form-control {{ $errors->has('month') ? 'is-invalid' : '' }}" name="month" placeholder="Bulan" value="{{ old('month', date('Y-m')) }}">
                                    @error('month')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="value">Jumlah :</label>
                                    <input type="number" min="0" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" name="value" placeholder="Jumlah">
                                    @error('value')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn m-t-30 mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection