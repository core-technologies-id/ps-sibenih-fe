@extends('layouts.main')
@section('style')
@endsection
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.css') }}">

@section('content')
    <section id="page-title" class="text-light" data-bg-parallax="/assets/images/info-perbenihan/ketersediaan-benih/6.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Permohonan Sertifikasi Benih Tanaman Pangan</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">
                        <a href="#">Permohonan</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="col-md-6 mb-3">
                @if (session('flash_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('flash_success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif
            </div>

            <form class="form card card-custom"
                action="{{ isset($id) ? route('tanampangan.update', ['tanampangan' => $id]) : route('tanampangan.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($id))
                    @method('PUT')
                @endif

                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-avatar text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            Form Permohonan Tanampangan
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-12 mt-4">
                            <h4>Input Tanam Pangan : </h4>
                        </div>
                        <div class="col-lg-12">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="s1_nomor_antrian">Nomor Antrian: <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input name="s1_nomor_antrian" id="s1_nomor_antrian" type="text"
                                            class="form-control"
                                            value="{{ isset($data['s1_nomor_antrian']) ? $data['s1_nomor_antrian'] : $nomer_antrian }}"
                                            readonly />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for="s1_nomor_surat">Nomor Surat: </label>
                                    <div class="input-group">
                                        <input name="s1_nomor_surat" id="s1_nomor_surat" type="text" class="form-control"
                                            value="{{ isset($data['s1_nomor_surat']) ? $data['s1_nomor_surat'] : old('s1_nomor_surat') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for="s1_nomor_lapangan">Nomor Lapangan: </label>
                                    <div class="input-group">
                                        <input name="s1_nomor_lapangan" id="s1_nomor_lapangan" type="text"
                                            class="form-control"
                                            value="{{ isset($data['s1_nomor_lapangan']) ? $data['s1_nomor_lapangan'] : old('s1_nomor_lapangan') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="s1_block">Blok: <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input name="s1_block" id="s1_block" type="text" class="form-control"
                                            value="{{ isset($data['s1_block']) ? $data['s1_block'] : old('s1_block') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="s1_komoditas_id">Komoditas: <span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('s1_komoditas_id') ? 'is-invalid' : '' }}"
                                        id="s1_komoditas_id" name="s1_komoditas_id"
                                        value="{{ @old('komoditas') ? @old('komoditas') : (isset($data->s1_komoditas_id) ? $data->s1_komoditas_id : @old('s1_komoditas_id')) }}">

                                    </select>
                                    @error('s1_komoditas_id')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="s1_produsen_id">Produsen: <span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('s1_produsen_id') ? 'is-invalid' : '' }}"
                                        id="s1_produsen_id" name="s1_produsen_id"
                                        value="{{ @old('s1_produsen_id') ? @old('s1_produsen_id') : (isset($data->s1_produsen_id) ? $data->s1_produsen_id : @old('s1_produsen_id')) }}"
                                        disabled>

                                    </select>
                                    @error('s1_produsen_id')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>Nama Pimpinan: <span class="text-danger">*</span></label>
                                    <input name="Judul" id="nama_pimpinan" type="text" class="form-control" disabled />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3 mb-3">
                                    <label>Alamat Lengkap Usaha: <span class="text-danger">*</span></label>
                                    <input id="alamat_lengkap_usaha" type="text" class="form-control" disabled />
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="s1_produsen_alamat_id">Alamat Lengkap Produks: <span
                                            class="text-danger">*</span></label>
                                    <select
                                        class="form-control {{ $errors->has('s1_produsen_alamat_id') ? 'is-invalid' : '' }} varietas"
                                        id="s1_produsen_alamat_id" name="s1_produsen_alamat_id"
                                        value="{{ @old('s1_produsen_alamat_id') ? @old('s1_produsen_alamat_id') : (isset($data->s1_produsen_alamat_id) ? $data->s1_produsen_alamat_id : @old('s1_produsen_alamat_id')) }}"
                                        disabled>
                                    </select>
                                    @error('s1_produsen_alamat_id')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="s1_musim_tanam">Musim Tanam Pangan :</label>
                                    <select class="form-control {{ $errors->has('s1_musim_tanam') ? 'is-invalid' : '' }}"
                                        id="s1_musim_tanam" name="s1_musim_tanam"
                                        value="{{ @old('s1_musim_tanam') ? @old('s1_musim_tanam') : (isset($data->s1_musim_tanam) ? $data->s1_musim_tanam : @old('s1_musim_tanam')) }}">

                                        <option value="oktmar"
                                            {{ isset($data->s1_musim_tanam) ? ($data->s1_musim_tanam == 'oktmar' ? 'selected' : '') : '' }}>
                                            Oktober - Maret</option>
                                        <option value="asep"
                                            {{ isset($data->s1_musim_tanam) ? ($data->s1_musim_tanam == 'asep' ? 'selected' : '') : '' }}>
                                            April - September</option>
                                    </select>
                                    @error('s1_musim_tanam')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label>Desa: </label>
                                    <input id="desa" type="text" class="form-control" disabled />
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label>Kabupaten: </label>
                                    <input id="kabupaten" type="text" class="form-control" disabled />
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label>Kecamatan: </label>
                                    <input id="kecamatan" type="text" class="form-control" disabled />
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label>Luas Pertanaman: <span class="text-danger">*</span></label>
                                    <input id="s1_luas_tanah" name="s1_luas_tanah" type="number"
                                        class="form-control {{ $errors->has('s1_luas_tanah') ? 'is-invalid' : '' }}"
                                        value="{{ @old('s1_luas_tanah') ? @old('s1_luas_tanah') : (isset($data->s1_luas_tanah) ? $data->s1_luas_tanah : @old('s1_luas_tanah')) }}" />
                                    @error('s1_luas_tanah')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="s2_tgl_tebar">Tanggal Tebar: </label>
                                    <input type="date" class="form-control" id="s2_tgl_tebar" name="s2_tgl_tebar"
                                        value="{{ isset($data['s2_tgl_tebar']) ? \Carbon\Carbon::parse($data['s2_tgl_tebar'])->format('m/d/Y') : old('s2_tgl_tebar') }}" />
                                </div>
                                <div class="col-lg-3">
                                    <label for="s2_tgl_tanam">Tanggal Tanam: </label>
                                    <input type="date" class="form-control" id="s2_tgl_tanam" name="s2_tgl_tanam"
                                        value="{{ isset($data['s2_tgl_tanam']) ? \Carbon\Carbon::parse($data['s2_tgl_tanam'])->format('m/d/Y') : old('s2_tgl_tanam') }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Tanaman Sebelumnya : </h4>
                        </div>
                        <div class="col-lg-12">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="s2_varietas_id">Varietas: <span class="text-danger">*</span></label>
                                    <select
                                        class="form-control {{ $errors->has('s2_varietas_id') ? 'is-invalid' : '' }} varietas"
                                        id="s2_varietas_id" name="s2_varietas_id"
                                        value="{{ @old('s2_varietas_id') ? @old('s2_varietas_id') : (isset($data->s2_varietas_id) ? $data->s2_varietas_id : @old('s2_varietas_id')) }}"
                                        disabled>

                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="s2_jenis_tanaman">Jenis Tanaman: <span
                                            class="text-danger">*</span></label>
                                    <input name="s2_jenis_tanaman" id="s2_jenis_tanaman" type="text"
                                        class="form-control {{ $errors->has('s2_jenis_tanaman') ? 'is-invalid' : '' }}"
                                        value="{{ isset($data['s2_jenis_tanaman']) ? $data['s2_jenis_tanaman'] : old('s2_jenis_tanaman') }}" />
                                    @error('s2_jenis_tanaman')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="s2_tgl_panen">Tanggal Panen: </label>
                                    <input type="date" class="form-control" id="s2_tgl_panen" name="s2_tgl_panen"
                                        value="{{ isset($data['s2_tgl_panen']) ? \Carbon\Carbon::parse($data['s2_tgl_panen'])->format('m/d/Y') : old('s2_tgl_panen') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Benih Asal : </h4>
                        </div>
                        <div class="col-lg-12">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="s3_produsen_id">Produsen: <span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('s3_produsen_id') ? 'is-invalid' : '' }}"
                                        id="s3_produsen_id" name="s3_produsen_id"
                                        value="{{ @old('s3_produsen_id') ? @old('s3_produsen_id') : (isset($data->s3_produsen_id) ? $data->s3_produsen_id : @old('s3_produsen_id')) }}">

                                    </select>
                                    @error('s3_produsen_id')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="s3_kelas_benih_id">Kelas Benih Asal: <span
                                            class="text-danger">*</span></label>
                                    <select
                                        class="form-control {{ $errors->has('s3_kelas_benih_id') ? 'is-invalid' : '' }}"
                                        id="s3_kelas_benih_id" name="s3_kelas_benih_id"
                                        value="{{ @old('s3_kelas_benih_id') ? @old('s3_kelas_benih_id') : (isset($data->s3_kelas_benih_id) ? $data->s3_kelas_benih_id : @old('s3_kelas_benih_id')) }}">
                                    </select>
                                    @error('s3_kelas_benih_id')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="s3_no_kel_benih">No Kelas Benih: <span
                                            class="text-danger">*</span></label>
                                    <input name="s3_no_kel_benih" id="s3_no_kel_benih" type="text"
                                        class="form-control"
                                        value="{{ isset($data['s3_no_kel_benih']) ? $data['s3_no_kel_benih'] : old('s3_no_kel_benih') }}" />
                                    @error('s3_no_kel_benih')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="s3_no_label_sumber">No. Seri Label Benih: </label>
                                    <input name="s3_no_label_sumber" id="s3_no_label_sumber" type="text"
                                        class="form-control"
                                        value="{{ isset($data['s3_no_label_sumber']) ? $data['s3_no_label_sumber'] : old('s3_no_label_sumber') }}" />
                                    @error('s3_no_label_sumber')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="s3_jml_benih">Jumlah Benih (KG): <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input name="s3_jml_benih" id="s3_jml_benih" type="number"
                                            class="form-control {{ $errors->has('s3_jml_benih') ? 'is-invalid' : '' }}"
                                            value="{{ isset($data['s3_jml_benih']) ? $data['s3_jml_benih'] : old('s3_jml_benih') }}" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                KG
                                            </span>
                                        </div>
                                    </div>
                                    @error('s3_jml_benih')
                                        <small class="text-danger"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Kelas Benih Yang Dihasilkan : </h4>
                        </div>
                        <div class="col-lg-6">
                            <label for="s2_kelas_benih_id">Kelas Benih: <span class="text-danger">*</span></label>
                            <select class="form-control {{ $errors->has('s2_kelas_benih_id') ? 'is-invalid' : '' }}"
                                id="s2_kelas_benih_id" name="s2_kelas_benih_id"
                                value="{{ @old('s2_kelas_benih_id') ? @old('s2_kelas_benih_id') : (isset($data->s2_kelas_benih_id) ? $data->s2_kelas_benih_id : @old('s2_kelas_benih_id')) }}">

                            </select>
                            @error('s2_kelas_benih_id')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Lampiran : </h4>
                        </div>
                        <div class="col-lg-12">
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <label>Tanda Tangan : </label>
                                    <img class="imgPreview img-fluid col-sm-5 d-block mb-3"
                                         @if (isset($data->s6_ttd)) src="{{ $data->s6_ttd }}" @endif>
                                    <input type="file" class="form-control" id="imageFile"
                                           onchange="tampilImage()" name="s6_ttd">
                                </div>
                                {{-- @if (isset($data->s6_ttd))
                                    <div class="col-lg-4 mt-5 d-flex flex-column">
                                        <label for="image">Gambar TTD</label>
                                        <img width="100%" src="{{ $data->s6_ttd }}"
                                            alt="{{ $data->s6_ttd }}">
                                    </div>
                                @endif --}}
                                <div class="col-lg-4">
                                    <label>Label Benih : </label>
                                    <img class="imgPreview2 img-fluid col-sm-5 d-block mb-3"
                                         @if (isset($data->s6_label_benih)) src="{{ $data->s6_label_benih }}" @endif>
                                    <input type="file" class="form-control" id="imageFile2"
                                           onchange="tampilImage2()" name="s6_label_benih">
                                </div>
                                {{-- @if (isset($data->s6_label_benih))
                                    <div class="col-lg-4 mt-5 d-flex flex-column">
                                        <label for="image">Gambar Label Benih</label>
                                        <img width="100%" src="{{ $data->s6_label_benih }}"
                                            alt="{{ $data->s6_label_benih }}">
                                    </div>
                                @endif --}}
                                <div class="col-lg-4">
                                    <label>Lokasi : </label>
                                    <img class="imgPreview3 img-fluid col-sm-5 d-block mb-3"
                                         @if (isset($data->s6_dena_lokasi)) src="{{ $data->s6_dena_lokasi }}" @endif>
                                    <input type="file" class="form-control" id="imageFile3"
                                           onchange="tampilImage3() "name="s6_dena_lokasi">
                                </div>
                                {{-- @if (isset($data->s6_dena_lokasi))
                                    <div class="col-lg-4 mt-5 d-flex flex-column">
                                        <label for="image">Gambar Dena Lokasi</label>
                                        <img width="100%" src="{{ $data->s6_dena_lokasi }}"
                                            alt="{{ $data->s6_dena_lokasi }}">
                                    </div>
                                @endif --}}
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Surat Rekomendasi : </label>
                                    <img class="imgPreview4 img-fluid col-sm-5 d-block mb-3"
                                         @if (isset($data->s6_surat_rekom)) src="{{ $data->s6_surat_rekom }}" @endif>
                                    <input type="file" class="form-control" id="imageFile4"
                                           onchange="tampilImage4()" name="s6_surat_rekom">
                                </div>
                                {{-- @if (isset($data->s6_surat_rekom))
                                    <div class="col-lg-4 mt-5 d-flex flex-column">
                                        <label for="image">Gambar Surat Rekomendasi</label>
                                        <img width="100%" src="{{ $data->s6_surat_rekom }}"
                                            alt="{{ $data->s6_surat_rekom }}">
                                    </div>
                                @endif --}}
                                <div class="col-lg-4">
                                    <label>Surat Pengantar : </label>
                                    <img class="imgPreview5 img-fluid col-sm-5 d-block mb-3"
                                         @if (isset($data->s6_surat_pengantar)) src="{{ $data->s6_surat_pengantar }}" @endif />
                                    <input type="file" class="form-control" id="imageFile5"
                                           onchange="tampilImage5()" name="s6_surat_pengantar">
                                </div>
                                {{-- @if (isset($data->s6_surat_pengantar_file))
                                    <div class="col-lg-4 mt-5 d-flex flex-column">
                                        <label for="image">Gambar Surat Pengantar</label>
                                        <img width="100%" src="{{ $data->s6_surat_pengantar }}"
                                            alt="{{ $data->s6_surat_pengantar }}">
                                    </div>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Keterangan : </h4>
                        </div>
                        <div class="col-lg-12">
                            <div class="row mb-3">
                                <div class="col-lg-6 me-5">
                                    <label class="form-label">Pemeriksaan Lapangan (Tidak Lulus /
                                        Lulus)</label>
                                    <span class="switch">
                                            <label for="s7_pemeriksaan_lapangan">
                                                <input type="checkbox" name="s7_pemeriksaan_lapangan"
                                                       id="s7_pemeriksaan_lapangan" value="1"
                                                    {{ radio_selected(@old('s7_pemeriksaan_lapangan'), $data->s7_pemeriksaan_lapangan ?? null, '1') }} />
                                                <span></span>
                                            </label>
                                        </span>
                                </div>
                                <div class="col-lg-6 me-5">
                                    <label class="form-label">Disertifikasi (Tidak / Ya)</label>
                                    <span class="switch">
                                            <label for="s7_disertifikasi">
                                                <input type="checkbox" name="s7_disertifikasi"
                                                       id="s7_disertifikasi" value="1"
                                                    {{ radio_selected(@old('s7_disertifikasi'), $data->s7_disertifikasi ?? null, '1') }} />
                                                <span></span>
                                            </label>
                                        </span>
                                </div>
                            </div>
                            @if (isset($id))
                                <div class="row mt-5">
                                    <div class="col-lg-6 me-5">
                                        <label for="status">Status:</label>
                                        <select
                                            class="form-control form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                            id="status" name="status"
                                            value="{{ @old('status') ? @old('status') : (isset($data->status) ? $data->status : @old('status')) }}">
                                            <option value="draft"
                                                {{ option_selected(@old('status'), $data->status ?? null, 'draft') }}>
                                                Draft</option>
                                            <option value="revision"
                                                {{ option_selected(@old('status'), $data->status ?? null, 'revision') }}>
                                                Revision</option>
                                            <option value="reject"
                                                {{ option_selected(@old('status'), $data->status ?? null, 'reject') }}>
                                                Reject</option>
                                            <option value="verified"
                                                {{ option_selected(@old('status'), $data->status ?? null, 'verified') }}>
                                                Verified</option>
                                            <option value="revision_updated" class="d-none" {{ option_selected(@old('status'), $data->status ?? null, 'revision_updated') }}>
                                                Revision Updated</option>
                                        </select>
                                        @error('status')
                                        <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                            @endif
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
@section('script')
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
    <script>
        const isUpdate = {{ isset($id) ? 'true' : 'false' }};

        function produsenGetDetail(value) {
            $.ajax({
                url: "{{ route('sibenih.produsen.get_data') }}?datatable=false&id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#nama_pimpinan').val(data[0].nama_pimpinan);
                    $('#alamat_lengkap_usaha').val(data[0].alamat_usaha);
                }
            })
        }

        function varietasHelper(value) {
            $.ajax({
                url: "/master/varietas?where=id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.results.forEach((el) => {
                        $('#s2_varietas_id').append(new Option(el.text, el.id, true, true))
                    })
                    $('#s2_varietas_id').prop("disabled", false);
                }
            });
        }

        function komoditasHelper(value) {
            $.ajax({
                url: "/master/komoditas?where=id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const kabupaten_id = value;
                    data.results.forEach((el) => {
                        $('#s1_komoditas_id').append(new Option(el.text, el.id, true, true))
                    })
                    const varValue =
                        {{ isset($data->s2_varietas_id) ? $data->s2_varietas_id : @old('s2_varietas_id') ?? 'null' }};
                    varietasHelper(varValue)
                }
            });
        }

        function produsenAlamatHelper(produsenAlamat, produsen_id) {
            $.ajax({
                url: "/master/produsen-alamat?where=s1_produsen_id=" + produsen_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.results.forEach((el) => {
                        $('#s1_produsen_alamat_id').append(new Option(el.text, el.id, true, true))
                    })
                    produsen_alamat_temp = data.results
                    produsen_alamat_temp.forEach((dt) => {
                        if (dt.id === produsenAlamat) {
                            $('#kabupaten').val(dt.kabupaten)
                            $('#kecamatan').val(dt.kecamatan)
                            $('#desa').val(dt.desa)
                        }
                    })
                }
            });
        }

        function produsenHelper(value, id = '') {
            $.ajax({
                url: "/master/produsen?where=id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const kabupaten_id = value;
                    data.results.forEach((el) => {
                        if (el.id === value) {
                            $('#' + id).append(new Option(el.text, el.id, true, true))
                        } else {
                            $('#' + id).append(new Option(el.text, el.id))
                        }
                    })

                    if (id === 's1_produsen_id') {
                        $('#s1_produsen_alamat_id').prop("disabled", false);
                        produsenGetDetail(value)
                    }
                }
            });
        }

        function kelasBenihHelper(value, id = '') {
            $.ajax({
                url: "/master/kelas?where=id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const kabupaten_id = value;
                    data.results.forEach((el) => {
                        $('#' + id).append(new Option(el.text, el.id, true, true))
                    })
                }
            });
        }

        function initEdit() {
            const produsenValue =
                {{ isset($data->s1_produsen_id) ? $data->s1_produsen_id : @old('s1_produsen_id') ?? 'null' }};
            const produsenValue3 =
                {{ isset($data->s3_produsen_id) ? $data->s3_produsen_id : @old('s3_produsen_id') ?? 'null' }};
            const produsenAlamat =
                {{ isset($data->s1_produsen_alamat_id) ? $data->s1_produsen_alamat_id : @old('s1_produsen_alamat_id') ?? 'null' }};
            const komValue =
                {{ isset($data->s1_komoditas_id) ? $data->s1_komoditas_id : @old('s1_komoditas_id') ?? 'null' }};
            const kelasBenihValue3 =
                {{ isset($data->s3_kelas_benih_id) ? $data->s3_kelas_benih_id : @old('s3_kelas_benih_id') ?? 'null' }};
            const kelasBenihValue2 =
                {{ isset($data->s2_kelas_benih_id) ? $data->s2_kelas_benih_id : @old('s2_kelas_benih_id') ?? 'null' }};
            produsenHelper(produsenValue, 's1_produsen_id')
            produsenHelper(produsenValue3, 's3_produsen_id')
            produsenAlamatHelper(produsenAlamat, produsenValue)
            komoditasHelper(komValue)
            kelasBenihHelper(kelasBenihValue3, 's3_kelas_benih_id')
            kelasBenihHelper(kelasBenihValue2, 's2_kelas_benih_id')
        }

        if (isUpdate) {
            initEdit()
        }

        $(document).ready(function() {
            let komoditas_id = null
            let produsen_id = {{ $userId }}
            // GET KOMODITAS
            $('#s1_komoditas_id').select2({
                theme: "bootstrap",
                placeholder: 'Pilih Komoditas',
                allowClear: true,
                ajax: {
                    url: '/master/komoditas',
                    data: function(params) {
                        const query = {
                            idField: 'id',
                            displayField: 'nama'
                        }

                        if (params.term) {
                            query.where = `nama LIKE '%${params.term}%'`
                        }

                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    }
                }
            })
            $('#s1_komoditas_id').on('select2:clear', function() {
                setTimeout(() => {
                    $('#s2_varietas_id').prop("disabled", true);
                }, 100)
                $('#s2_varietas_id').val('');
                $('#s2_varietas_id').trigger('change');
            })
            $('#s1_komoditas_id').on('change', function() {
                komoditas_id = $('#s1_komoditas_id').val() * 1
                $('#s2_varietas_id').prop("disabled", false);
            })

            // GET VARIETAS
            $('#s2_varietas_id').select2({
                theme: "bootstrap",
                placeholder: 'Pilih Varietas',
                allowClear: true,
                ajax: {
                    url: '/master/varietas',
                    data: function(params) {
                        const query = {
                            idField: 'id',
                            displayField: 'nama'
                        }

                        if (params.term) {
                            query.where =
                                `komoditas_id=${komoditas_id} and nama LIKE '%${params.term}%'`
                        } else {
                            query.where = `komoditas_id=${komoditas_id}`
                        }

                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    }
                }
            })

            // GET PRODUSEN
            $('#s1_produsen_id').select2({
                theme: "bootstrap",
                placeholder: 'Pilih Produsen',
                allowClear: true,
                // ajax: {
                //     url: '/master/produsen',
                //     data: function (params) {
                //         const query = {
                //             idField: 'id',
                //             displayField: 'nama_pt'
                //         }
                //
                //         if (params.term) {
                //             query.where = `nama_pt LIKE '%${params.term}%'`
                //         }
                //
                //         // Query parameters will be ?search=[term]&page=[page]
                //         return query;
                //     }
                // }
            })
            $('#s3_produsen_id').select2({
                theme: "bootstrap",
                placeholder: 'Pilih Produsen',
                allowClear: true,
                ajax: {
                    url: '/master/produsen',
                    data: function(params) {
                        const query = {
                            idField: 'id',
                            displayField: 'nama_pt'
                        }

                        if (params.term) {
                            query.where = `nama_pt LIKE '%${params.term}%'`
                        }

                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    }
                }
            })
            $('#s3_kelas_benih_id').select2({
                theme: "bootstrap",
                placeholder: 'Pilih Kelas Benih',
                allowClear: true,
                ajax: {
                    url: '/master/kelas',
                    data: function(params) {
                        const query = {
                            idField: 'id',
                            displayField: 'nama'
                        }

                        if (params.term) {
                            query.where = `nama LIKE '%${params.term}%'`
                        }

                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    }
                }
            })
            $('#s2_kelas_benih_id').select2({
                theme: "bootstrap",
                placeholder: 'Pilih Kelas Benih',
                allowClear: true,
                ajax: {
                    url: '/master/kelas',
                    data: function(params) {
                        const query = {
                            idField: 'id',
                            displayField: 'nama'
                        }

                        if (params.term) {
                            query.where = `nama LIKE '%${params.term}%'`
                        }

                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    }
                }
            })
            $('#s1_produsen_id').on('select2:clear', function() {
                setTimeout(() => {
                    $('#s1_produsen_alamat_id').prop("disabled", true);
                }, 100)
                $('#s1_produsen_alamat_id').val('');
                $('#s1_produsen_alamat_id').trigger('change');
                $('#kabupaten').val('');
                $('#kecamatan').val('');
                $('#desa').val('');
            })
            $('#s1_produsen_id').on('change', function() {
                produsen_id = $('#s1_produsen_id').val() * 1
                $('#s1_produsen_alamat_id').prop("disabled", false);
                produsenGetDetail(produsen_id)
            })
            produsenHelper(produsen_id, 's1_produsen_id')

            // GET PRODUSEN ALAMAT
            $('#s1_produsen_alamat_id').select2({
                theme: "bootstrap",
                placeholder: 'Pilih Lokasi Produksi',
                allowClear: true,
                ajax: {
                    url: '/master/produsen-alamat',
                    data: function(params) {
                        const query = {
                            idField: 'id',
                            displayField: 's1_alamat_lengkap'
                        }

                        if (params.term) {
                            query.where =
                                `s1_produsen_id=${produsen_id} and s1_alamat_lengkap LIKE '%${params.term}%'`
                        } else {
                            query.where = `s1_produsen_id=${produsen_id}`
                        }

                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    },
                    success: function(data) {
                        produsen_alamat_temp = data.results
                    }
                }
            })
            $('#s1_produsen_alamat_id').on('change', function() {
                const val = $('#s1_produsen_alamat_id').val() * 1
                produsen_alamat_temp.forEach((dt) => {
                    if (dt.id === val) {
                        $('#kabupaten').val(dt.kabupaten)
                        $('#kecamatan').val(dt.kecamatan)
                        $('#desa').val(dt.desa)
                    }
                })
            })

            $('#s1_musim_tanam').select2({
                theme: "bootstrap",
                placeholder: 'Pilih Musim Tanam',
                allowClear: true,
            })

        })

        function tampilImage() {
            const image = document.querySelector('#imageFile');
            const imgPreview = document.querySelector('.imgPreview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function tampilImage2() {
            const image = document.querySelector('#imageFile2');
            const imgPreview = document.querySelector('.imgPreview2');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function tampilImage3() {
            const image = document.querySelector('#imageFile3');
            const imgPreview = document.querySelector('.imgPreview3');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function tampilImage4() {
            const image = document.querySelector('#imageFile4');
            const imgPreview = document.querySelector('.imgPreview4');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function tampilImage5() {
            const image = document.querySelector('#imageFile5');
            const imgPreview = document.querySelector('.imgPreview5');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
