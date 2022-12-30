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

                        <div class="col-lg-6 mt-5 mt-lg-0">
                            <label for="nama_pt">Nama Perusahaan:</label>
                            <input type="text" class="form-control {{ $errors->has('nama_pt') ? 'is-invalid' : '' }}"
                                id="nama_pt" name="nama_pt" placeholder="Nama perusahaan" />
                            @error('nama_pt')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="tahun_usaha">Tahun Usaha:</label>
                            <input type="number" class="form-control {{ $errors->has('tahun_usaha') ? 'is-invalid' : '' }}"
                                id="tahun_usaha" name="tahun_usaha" placeholder="Tahun usaha" />
                            @error('tahun_usaha')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5 d-none">
                            <label for="npwp">NPWP:</label>
                            <input type="text" class="form-control {{ $errors->has('npwp') ? 'is-invalid' : '' }}"
                                id="npwp" name="npwp" placeholder="nomor npwp" />
                            @error('npwp')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="nama_pimpinan">Nama Pimpinan:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('nama_pimpinan') ? 'is-invalid' : '' }}"
                                id="nama_pimpinan" name="nama_pimpinan" placeholder="Nama pimpinan" />
                            @error('nama_pimpinan')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="nik_pimpinan">NIK Pimpinan:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('nik_pimpinan') ? 'is-invalid' : '' }}"
                                id="nik_pimpinan" name="nik_pimpinan" placeholder="Nomor nik pimpinan" />
                            @error('nik_pimpinan')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="alamat_usaha">Alamat Perusahaan:</label>
                            <input type="text"
                                class="form-control {{ $errors->has('alamat_usaha') ? 'is-invalid' : '' }}"
                                id="alamat_usaha" name="alamat_usaha" placeholder="Alamat perusahaan" />
                            @error('alamat_usaha')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
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
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="hp">No. Telepon / HP Perusahaan:</label>
                            <input type="text" class="form-control {{ $errors->has('hp') ? 'is-invalid' : '' }}"
                                id="hp" name="hp" placeholder="Nomor telepon / hp perusahaan" />
                            @error('hp')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label for="email">Email Perusahaan:</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                id="email" name="email" placeholder="Email perusahaan" />
                            @error('email')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mt-5">
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
                        </div>

                        <div class="col-lg-6 mt-5">
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
                        </div>

                        <div class="col-lg-6 mt-5">
                            <label>Upload Foto KTP (.jpeg/jpg/png)</label>
                            <input type="file"
                                class="form-control {{ $errors->has('logo_usaha_file') ? 'is-invalid' : '' }}"
                                id="logo_usaha_file" name="foto_ktp_file" placeholder="Upload foto KTP" value="">
                            @error('foto_ktp_file')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        @if (isset($data->foto_ktp))
                            <div class="col-lg-6 mt-5 d-flex flex-column">
                                <label for="image">Gambar Foto KTP</label>
                                <img width="100%" src="{{ $data->foto_ktp }}">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-header">
                    <h3 class="card-title">{{ isset($id) ? 'Detail Account Produsen' : 'Input Account Produsen' }}</h3>
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
                                name="password" placeholder="Name" />
                            @error('password')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-3">
                            <label for="password_conf">Password Confirmation:</label>
                            <input type="password"
                                class="form-control {{ $errors->has('password_conf') ? 'is-invalid' : '' }}"
                                id="password_conf" name="password_conf" placeholder="Name">
                            @error('password_conf')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-4"></div>
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
