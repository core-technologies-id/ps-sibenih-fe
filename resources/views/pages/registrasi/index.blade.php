@extends('layouts.main')
@section('style')
@endsection
@section('content')
    <section id="page-title" class="text-light" data-bg-parallax="/assets/images/info-perbenihan/ketersediaan-benih/6.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Registrasi</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">
                        <a href="#">Registrasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            @include('components.message')
            <form class="form card card-custom" action="/registrasi/process" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-avatar text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            Registrasi
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="nomor_tiket">Nomor Tiket:</label>
                            <input type="text" class="form-control {{ $errors->has('nomor_tiket') ? 'is-invalid' : '' }}"
                                id="nomor_tiket" name="nomor_tiket" placeholder="Nomor tiket" value="{{ $nomer_tiket }}"
                                readonly />
                            @error('nomor_tiket')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="nomor_rekomendasi">Nomor Rekomendasi:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('nomor_rekomendasi') ? 'is-invalid' : '' }}"
                                id="nomor_rekomendasi" name="nomor_rekomendasi" placeholder="Nomor rekomendasi"
                                value="{{ @old('nomor_rekomendasi') }}" />
                            @error('nomor_rekomendasi')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        {{-- <div class="col-lg-6 mt-5 mt-lg-0">
                            <label for="nama_pt">Kelompok Tani / Perusahaan :</label>
                            <input type="text" class="form-control {{ $errors->has('nama_pt') ? 'is-invalid' : '' }}"
                                id="nama_pt" name="nama_pt" placeholder="Kelompok Tani / Perusahaan" / value="{{ @old('nama_pt') }}">
                            @error('nama_pt')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div> --}}

                        {{-- <div class="col-lg-6 mt-5 d-none">
                            <label for="tahun_usaha">Tahun Usaha:</label>
                            <input type="number" class="form-control {{ $errors->has('tahun_usaha') ? 'is-invalid' : '' }}"
                                id="tahun_usaha" name="tahun_usaha" placeholder="Tahun usaha" />
                            @error('tahun_usaha')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div> --}}

                        {{-- <div class="col-lg-6 mt-5 d-none">
                            <label for="npwp">NPWP:</label>
                            <input type="text" class="form-control {{ $errors->has('npwp') ? 'is-invalid' : '' }}"
                                id="npwp" name="npwp" placeholder="nomor npwp" />
                            @error('npwp')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div> --}}

                        <div class="col-lg-6 mt-5">
                            <label for="nama_pt">Nama Perusahaan:</label>
                            <input type="text" class="form-control {{ $errors->has('nama_pt') ? 'is-invalid' : '' }}"
                                id="nama_pt" name="nama_pt" placeholder="Nama perusahaan"
                                value="{{ @old('nama_pt') }}" />
                            @error('nama_pt')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="tahun_usaha">Tahun Usaha:</label>
                            <input type="number" class="form-control {{ $errors->has('tahun_usaha') ? 'is-invalid' : '' }}"
                                id="tahun_usaha" name="tahun_usaha" placeholder="Tahun usaha"
                                value="{{ @old('tahun_usaha') }}" />
                            @error('tahun_usaha')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="npwp">NPWP:</label>
                            <input type="text" class="form-control {{ $errors->has('npwp') ? 'is-invalid' : '' }}"
                                id="npwp" name="npwp" placeholder="nomor npwp"
                                value="{{ @old('npwp') }}" />
                            @error('npwp')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="nama_pimpinan">Nama Pimpinan:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('nama_pimpinan') ? 'is-invalid' : '' }}"
                                id="nama_pimpinan" name="nama_pimpinan" placeholder="Nama pimpinan"
                                value="{{ @old('nama_pimpinan') }}" />
                            @error('nama_pimpinan')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="nik_pimpinan">NIK Pimpinan:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('nik_pimpinan') ? 'is-invalid' : '' }}"
                                id="nik_pimpinan" name="nik_pimpinan" placeholder="Nomor nik pimpinan"  value="{{ @old('nik_pimpinan') }}" />
                            @error('nik_pimpinan')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="alamat_usaha">Alamat Perusahaan:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('alamat_usaha') ? 'is-invalid' : '' }}"
                                id="alamat_usaha" name="alamat_usaha" placeholder="Alamat perusahaan"
                                value="{{ @old('alamat_usaha') }}" />
                            @error('alamat_usaha')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="kota">Kabupaten/Kota:</label>
                            <select class="form-control form-control {{ $errors->has('kota') ? 'is-invalid' : '' }}"
                                id="kota" name="kota"
                                value="{{ @old('kota') }}">
                                <option value="">-- Pilih Kota / Kabupaten --</option>
                                @foreach ($kabs as $kab)
                                    <option value="{{ $kab->nama }}"
                                        {{ option_selected(@old('kota'), $data->kota ?? null, $kab->nama) }}>
                                        {{ $kab->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kota')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="hp">No. Telepon / HP Perusahaan:</label>
                            <input type="text" class="form-control {{ $errors->has('hp') ? 'is-invalid' : '' }}"
                                id="hp" name="hp" placeholder="Nomor telepon / hp perusahaan"
                                value="{{ @old('hp') }}" />
                            @error('hp')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="email">Email Perusahaan:</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                id="email" name="email" placeholder="Email perusahaan"
                                value="{{ @old('email') }}" />
                            @error('email')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="status_usaha">Status Usaha:</label>
                            <select
                                class="form-control form-control {{ $errors->has('status_usaha') ? 'is-invalid' : '' }}"
                                id="status_usaha" name="status_usaha"
                                value="{{ @old('status_usaha') }}">
                                <option value="">-- Pilih Status Usaha --</option>
                                <option value="produsen"
                                    {{ option_selected(@old('status_usaha'), $data->status_usaha ?? null, 'produsen') }}>
                                    Produsen dan Pengedar Benih</option>
                                <option value="pengedar"
                                    {{ option_selected(@old('status_usaha'), $data->status_usaha ?? null, 'pengedar') }}>
                                    Pengedar Benih</option>
                            </select>
                            @error('status_usaha')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="bentuk_usaha">Bentuk Usaha:</label>
                            <select
                                class="form-control form-control {{ $errors->has('bentuk_usaha') ? 'is-invalid' : '' }}"
                                id="bentuk_usaha" name="bentuk_usaha"
                                value="{{ @old('bentuk_usaha') }}">
                                <option value="">-- Pilih Bentuk Usaha --</option>
                                <option value="perseorangan"
                                    {{ option_selected(@old('bentuk_usaha'), $data->bentuk_usaha ?? null, 'perseorangan') }}>
                                    Perseorangan</option>
                                <option value="badan_usaha"
                                    {{ option_selected(@old('bentuk_usaha'), $data->bentuk_usaha ?? null, 'badan_usaha') }}>
                                    Badan Usaha</option>
                                <option value="badan_hukum"
                                    {{ option_selected(@old('bentuk_usaha'), $data->bentuk_usaha ?? null, 'badan_hukum') }}>
                                    Badan Hukum</option>
                                <option value="instansi_pemerintah"
                                    {{ option_selected(@old('bentuk_usaha'), $data->bentuk_usaha ?? null, 'instansi_pemerintah') }}>
                                    Instansi Pemerintah</option>
                            </select>
                            @error('bentuk_usaha')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        {{-- <div class="col-lg-6 mt-5">
                            <label for="nama_pimpinan">Nama Petani / Pimpinan :</label>
                            <input type="text"
                                class="form-control {{ $errors->has('nama_pimpinan') ? 'is-invalid' : '' }}"
                                id="nama_pimpinan" name="nama_pimpinan" placeholder="Nama Petani / Pimpinan"
                                value="{{ @old('nama_pimpinan') }}" />
                            @error('nama_pimpinan')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div> --}}

                        {{-- <div class="col-lg-6 mt-5">
                            <label for="alamat_usaha">Alamat :</label>
                            <input type="text"
                                class="form-control {{ $errors->has('alamat_usaha') ? 'is-invalid' : '' }}"
                                id="alamat_usaha" name="alamat_usaha" placeholder="Alamat"
                                value="{{ @old('alamat_usaha') }}" />
                            @error('alamat_usaha')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div> --}}

                        {{-- <div class="col-lg-6 mt-5 d-none">
                            <label for="kota">Kabupaten/Kota Letak Tanah:</label>
                            <select class="form-control form-control {{ $errors->has('kota') ? 'is-invalid' : '' }}"
                                id="kota" name="kota">
                                <option value="">-- Pilih Kota / Kabupaten --</option>
                                @foreach ($kabs as $kab)
                                    <option value="{{ $kab->nama }}">
                                        {{ $kab->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kota')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div> --}}

                        {{-- <div class="col-lg-6 mt-5">
                            <label for="hp">Nomor HP :</label>
                            <input type="text" class="form-control {{ $errors->has('hp') ? 'is-invalid' : '' }}"
                                id="hp" name="hp" placeholder="Nomor HP" value="{{ @old('hp') }}" />
                            @error('hp')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div> --}}

                        {{-- <div class="col-lg-6 mt-5">
                            <label for="email">Alamat email :</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                id="email" name="email" placeholder="Alamat email" value="{{ @old('email') }}" />
                            @error('email')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div> --}}

                        {{-- <div class="col-lg-6 mt-5 d-none">
                            <label for="status_usaha">Status Usaha:</label>
                            <select
                                class="form-control form-control {{ $errors->has('status_usaha') ? 'is-invalid' : '' }}"
                                id="status_usaha" name="status_usaha">
                                <option value="">-- Pilih Status Usaha --</option>
                                <option value="produsen">
                                    Produsen dan Pengedar Benih</option>
                                <option value="pengedar">
                                    Pengedar Benih</option>
                            </select>
                            @error('status_usaha')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div> --}}

                        {{-- <div class="col-lg-6 mt-5 d-none">
                            <label for="bentuk_usaha">Bentuk Usaha:</label>
                            <select
                                class="form-control form-control {{ $errors->has('bentuk_usaha') ? 'is-invalid' : '' }}"
                                id="bentuk_usaha" name="bentuk_usaha"
                                value="{{ @old('bentuk_usaha') ? @old('bentuk_usaha') : (isset($data->bentuk_usaha) ? $data->bentuk_usaha : @old('bentuk_usaha')) }}">
                                <option value="">-- Pilih Bentuk Usaha --</option>
                                <option value="perseorangan">
                                    Perseorangan</option>
                                <option value="badan_usaha">
                                    Badan Usaha</option>
                                <option value="badan_hukum">
                                    Badan Hukum</option>
                                <option value="instansi_pemerintah">
                                    Instansi Pemerintah</option>
                            </select>
                            @error('bentuk_usaha')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div> --}}

                        {{-- <div class="col-lg-6 mt-5">
                            <label for="is_petani">Petani :</label>
                            <select class="form-control form-control {{ $errors->has('is_petani') ? 'is-invalid' : '' }}"
                                id="is_petani" name="is_petani"
                                value="{{ @old('is_petani') ? @old('is_petani') : (isset($data->is_petani) ? $data->is_petani : @old('is_petani')) }}">
                                <option value="" selected disabled>-- Keterangan --</option>
                                <option value="iya">Iya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                            @error('is_petani')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div> --}}

                        <div class="col-lg-6 mt-5">
                            <label>Upload Foto Pimpinan (.jpeg/jpg/png)</label>
                            <input type="file"
                                class="form-control {{ $errors->has('foto_pimpinan') ? 'is-invalid' : '' }}"
                                name="foto_pimpinan" placeholder="Upload foto pimpinan" value="">
                            @error('foto_pimpinan')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label>Upload Cap Perusahaan (.jpeg/jpg/png)</label>
                            <input type="file"
                                class="form-control {{ $errors->has('logo_usaha') ? 'is-invalid' : '' }}"
                                name="logo_usaha" placeholder="Upload logo perusahaan" value="">
                            @error('logo_usaha')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="foto_ktp">Upload Foto KTP (.jpeg/jpg/png)</label>
                            <input type="file" class="form-control {{ $errors->has('foto_ktp') ? 'is-invalid' : '' }}"
                                name="foto_ktp" placeholder="Upload foto KTP" value="">
                            @error('foto_ktp')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Input Account Produsen</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="username">Username:</label>
                            <input @if (isset($id)) readonly @endif type="text"
                                class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username"
                                name="username" placeholder="Username" />
                            @error('username')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-3">
                            <label for="password">Password:</label>
                            <input type="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
                                name="password" placeholder="Input Password" />
                            @error('password')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-3">
                            <label for="password_conf">Password Confirmation:</label>
                            <input type="password"
                                class="form-control {{ $errors->has('password_conf') ? 'is-invalid' : '' }}"
                                id="password_conf" name="password_conf" placeholder="Confirm Password">
                            @error('password_conf')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-4">
                            <span>Sudah mendaftar?</span> <a href="{{ url('login') }}">Login disini!</a>
                        </div>
                        <div class="col-lg-8 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
