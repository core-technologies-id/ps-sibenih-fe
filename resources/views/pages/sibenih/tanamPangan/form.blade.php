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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
            </div>

            <form class="form card card-custom" action="{{ isset($id) ? route('tanampangan.update', ['tanampangan' => $id]) : route('tanampangan.store') }}" 
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
                    <div class="row mb-3">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Input Form Tanampangan</h4>
                        </div>
                        <div class="col-lg-3">
                            <label for="s1_nomer_antrian">Nomor Antrian :</label>
                            <div class="input-group">
                                <input name="s1_nomer_antrian" id="s1_nomer_antrian" type="text" class="form-control"
                                    value="{{ isset($data['s1_nomer_antrian']) ? $data['s1_nomer_antrian'] : $nomer_antrian }}" readonly />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="nomor_surat">Nomor Surat :</label>
                            <div class="input-group">
                                <input name="nomor_surat" id="nomor_surat" type="text" class="form-control"
                                    value="{{ isset($data['nomor_surat']) ? $data['nomor_surat'] : old('nomor_surat') }}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="s1_nomor_lapangan">Nomor Lapangan :</label>
                            <div class="input-group">
                                <input name="s1_nomor_lapangan" id="s1_nomor_lapangan" type="text" class="form-control"
                                    value="{{ isset($data['s1_nomor_lapangan']) ? $data['s1_nomor_lapangan'] : old('s1_nomor_lapangan') }}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="s1_block">Blok :</label>
                            <div class="input-group">
                                <input name="s1_block" id="s1_block" type="text" class="form-control"
                                    value="{{ isset($data['s1_block']) ? $data['s1_block'] : old('s1_block') }}" />
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <label for="s1_komoditas_id">Komoditas :</label>
                            <select class="form-control {{ $errors->has('s1_komoditas_id') ? 'is-invalid' : '' }}" id="s1_komoditas_id"
                                name="s1_komoditas_id"
                                value="{{ @old('komoditas') ? @old('komoditas') : (isset($data->s1_komoditas_id) ? $data->s1_komoditas_id : @old('s1_komoditas_id')) }}">
                                <option value="">-- Pilih Komoditas --</option>
                                @foreach ($komoditas as $item)
                                    <option value="{{ $item->id }}"
                                        {{ option_selected(@old('s1_komoditas_id'), $data->s1_komoditas_id ?? null, $item->id) }}
                                        >{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <label for="s1_produsen_id">Produsen :</label>
                            <select class="form-control {{ $errors->has('s1_produsen_id') ? 'is-invalid' : '' }}" id="s1_produsen_id"
                                name="s1_produsen_id"
                                value="{{ @old('s1_produsen_id') ? @old('s1_produsen_id') : (isset($data->s1_produsen_id) ? $data->s1_produsen_id : @old('s1_produsen_id')) }}">
                                <option value="">-- Pilih Perusahaan --</option>
                                @foreach ($produsens as $prod)
                                    <option value="{{ $prod->id }}"
                                        {{ option_selected(@old('s1_produsen_id'), $data->s1_produsen_id ?? null, $prod->id) }}
                                        >{{ $prod->nama_pt }}</option>
                                @endforeach
                            </select>
                            @error('s1_produsen_id')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-4 mt-5">
                            <label for="s1_produsen_alamat_id">Alamat Produsen :</label>
                            <select class="form-control {{ $errors->has('s1_produsen_alamat_id') ? 'is-invalid' : '' }} varietas"
                                id="s1_produsen_alamat_id" name="s1_produsen_alamat_id"
                                value="{{ @old('s1_produsen_alamat_id') ? @old('s1_produsen_alamat_id') : (isset($data->s1_produsen_alamat_id) ? $data->s1_produsen_alamat_id : @old('s1_produsen_alamat_id')) }}">
                                <option value="">-- Pilih Alamat Produsen --</option>
                            </select>
                            @error('s1_produsen_alamat_id')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 mt-3">
                            <label>Nama Pimpinan: <span class="text-danger">*</span></label>
                            <input id="nama_pimpinan" type="text" class="form-control"
                                value="{{ isset($data['Judul']) ? $data['Judul'] : '' }}" readonly />
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label>Alamat Lengkap: <span class="text-danger">*</span></label>
                            <input id="alamat_lengkap" type="text" class="form-control"
                                value="{{ isset($data['Judul']) ? $data['Judul'] : '' }}" readonly />
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label>Desa: <span class="text-danger">*</span></label>
                            <input id="desa" type="text" class="form-control"
                                value="{{ isset($data['Judul']) ? $data['Judul'] : '' }}" readonly />
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label>Kabupaten: <span class="text-danger">*</span></label>
                            <input id="kabupaten" type="text" class="form-control"
                                value="{{ isset($data['Judul']) ? $data['Judul'] : '' }}" readonly />
                        </div>
                        <div class="col-lg-4 mt-3">
                            <label>Kecamatan: <span class="text-danger">*</span></label>
                            <input id="kecamatan" type="text" class="form-control"
                                value="{{ isset($data['Judul']) ? $data['Judul'] : '' }}" readonly />
                        </div>
                        <div class="col-lg-4 mt-3">
                            <label>Luas Pertanaman: <span class="text-danger">*</span></label>
                            <input id="luas_pertanaman" type="text" class="form-control"
                                value="{{ isset($data['Judul']) ? $data['Judul'] : '' }}" readonly />
                        </div>
                        <div class="col-lg-4 mt-3">
                            <label for="s1_musim_tanam">Musim Tanam Pangan :</label>
                            <select class="form-control {{ $errors->has('s1_musim_tanam') ? 'is-invalid' : '' }}" id="s1_musim_tanam"
                                name="s1_musim_tanam"
                                value="{{ @old('s1_musim_tanam') ? @old('s1_musim_tanam') : (isset($data->s1_musim_tanam) ? $data->s1_musim_tanam : @old('s1_musim_tanam')) }}">
                                <option value="">-- Pilih Musim Tanam --</option>
                                <option value="oktmar"
                                    {{ isset($data->s1_musim_tanam) ? ($data->s1_musim_tanam == 'oktmar' ? 'selected' : '') : '' }}>
                                    Oktober - Maret</option>
                                <option value="asep" {{ isset($data->s1_musim_tanam) ? ($data->s1_musim_tanam == 'asep' ? 'selected' : '') : '' }}>
                                    April - September</option>
                            </select>
                            @error('s1_musim_tanam')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 mt-3">
                            <label for="s2_tgl_tebar">Tanggal Tebar: </label>
                            <input type="date" class="form-control" id="s2_tgl_tebar" name="s2_tgl_tebar"
                                value="{{ isset($data['s2_tgl_tebar']) ? $data['s2_tgl_tebar'] : old('s2_tgl_tebar') }}" />
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="s2_tgl_tanam">Tanggal Tanam: </label>
                            <input type="date" class="form-control" id="s2_tgl_tanam" name="s2_tgl_tanam"
                                value="{{ isset($data['s2_tgl_tanam']) ? $data['s2_tgl_tanam'] : old('s2_tgl_tanam') }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Tanaman Sebelumnya</h4>
                        </div>
                        <div class="col-lg-4">
                            <label for="s2_varietas_id">Varietas :</label>
                            <select class="form-control {{ $errors->has('s2_varietas_id') ? 'is-invalid' : '' }} varietas" id="s2_varietas_id"
                                name="s2_varietas_id"
                                value="{{ @old('s2_varietas_id') ? @old('s2_varietas_id') : (isset($data->s2_varietas_id) ? $data->s2_varietas_id : @old('s2_varietas_id')) }}">
                                <option value="">-- Pilih Varietas --</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="s2_jenis_tanaman">Jenis Tanaman :</label>
                            <div class="input-group">
                                <input name="s2_jenis_tanaman" id="s2_jenis_tanaman" type="text" class="form-control"
                                    value="{{ isset($data['s2_jenis_tanaman']) ? $data['s2_jenis_tanaman'] : old('s2_jenis_tanaman') }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="s2_tgl_panen">Tanggal Panen :</label>
                            <input type="date" class="form-control" id="s2_tgl_panen" name="s2_tgl_panen"
                                value="{{ isset($data['s2_tgl_panen']) ? $data['s2_tgl_panen'] : old('s2_tgl_panen') }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Asal Benih</h4>
                        </div>
                        <div class="col-lg-4">
                            <label for="s3_produsen_id">Produsen: </label>
                            <select class="form-control {{ $errors->has('s3_produsen_id') ? 'is-invalid' : '' }}" id="s3_produsen_id"
                                name="s3_produsen_id"
                                value="{{ @old('s3_produsen_id') ? @old('s3_produsen_id') : (isset($data->s3_produsen_id) ? $data->s3_produsen_id : @old('s3_produsen_id')) }}">
                                <option value="">-- Pilih Perusahaan --</option>
                                @foreach ($produsens as $prod)
                                    <option value="{{ $prod->id }}"
                                        {{ option_selected(@old('s3_produsen_id'), $data->s3_produsen_id ?? null, $prod->id) }}
                                        >{{ $prod->nama_pt }}</option>
                                @endforeach
                            </select>
                            @error('s1_produsen_id')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label for="s3_kelas_benih_id">Kelas Benih Asal: </label>
                            <select class="form-control {{ $errors->has('s3_kelas_benih_id') ? 'is-invalid' : '' }}" id="s3_kelas_benih_id"
                                name="s3_kelas_benih_id"
                                value="{{ @old('s3_kelas_benih_id') ? @old('s3_kelas_benih_id') : (isset($data->s3_kelas_benih_id) ? $data->s3_kelas_benih_id : @old('s3_kelas_benih_id')) }}">
                                <option value="">-- Pilih Kelas Benih --</option>
                                @foreach ($kelas_benih as $item)
                                    <option value="{{ $item->id }}"
                                        {{ option_selected(@old('s3_kelas_benih_id'), $data->s3_kelas_benih_id ?? null, $item->id) }}
                                        >{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="s3_no_kel_benih">No Kelas Benih: </label>
                            <div class="input-group">
                                <input name="s3_no_kel_benih" id="s3_no_kel_benih" type="text" class="form-control"
                                    value="{{ isset($data['s3_no_kel_benih']) ? $data['s3_no_kel_benih'] : old('s3_no_kel_benih') }}" />
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <label for="s3_no_label_sumber">No. Seri Label Benih: </label>
                            <div class="input-group">
                                <input name="s3_no_label_sumber" id="s3_no_label_sumber" type="text" class="form-control"
                                    value="{{ isset($data['s3_no_label_sumber']) ? $data['s3_no_label_sumber'] : old('s3_no_label_sumber') }}" />
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <label for="s3_jml_benih">Jumlah Benih (KG): </label>
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
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Kelas Benih Yang Dihasilkan: </h4>
                        </div>
                        <div class="col-lg-4">
                            <label for="s2_kelas_benih_id">Kelas Benih: </label>
                            <select class="form-control {{ $errors->has('s2_kelas_benih_id') ? 'is-invalid' : '' }}" id="s2_kelas_benih_id"
                                name="s2_kelas_benih_id"
                                value="{{ @old('s2_kelas_benih_id') ? @old('s2_kelas_benih_id') : (isset($data->s2_kelas_benih_id) ? $data->s2_kelas_benih_id : @old('s2_kelas_benih_id')) }}">
                                <option value="">-- Pilih Kelas Benih --</option>
                                @foreach ($kelas_benih as $item)
                                    <option value="{{ $item->id }}"
                                        {{ option_selected(@old('s2_kelas_benih_id'), $data->s2_kelas_benih_id ?? null, $item->id) }}
                                        >{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="row mb-3 d-none">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Tanggal Pemeriksaan: </h4>
                        </div>
                        <div class="col-lg-3">
                            <label for="s2_tgl_pendhl">Tanggal Pendahulu: </label>
                            <input type="date" class="form-control" id="s2_tgl_pendhl" name="s2_tgl_pendhl"
                                value="{{ isset($data['s2_tgl_pendhl']) ? \Carbon\Carbon::parse($data['s2_tgl_pendhl'])->format('m/d/Y') : old('s2_tgl_pendhl') }}" />
                        </div>
                        <div class="col-lg-3">
                            <label for="s2_tgl_vegetatif">Tanggal Vegetatif: </label>
                            <input type="date" class="form-control" id="s2_tgl_vegetatif" name="s2_tgl_vegetatif"
                                value="{{ isset($data['s2_tgl_vegetatif']) ? \Carbon\Carbon::parse($data['s2_tgl_vegetatif'])->format('m/d/Y') : old('s2_tgl_vegetatif') }}" />
                        </div>
                        <div class="col-lg-3">
                            <label for="s2_tgl_primordia">Tanggal Primordia: </label>
                            <input type="date" class="form-control" id="s2_tgl_primordia" name="s2_tgl_primordia"
                                value="{{ isset($data['s2_tgl_primordia']) ? \Carbon\Carbon::parse($data['s2_tgl_primordia'])->format('m/d/Y') : old('s2_tgl_primordia') }}" />
                        </div>
                        <div class="col-lg-3">
                            <label for="s2_tgl_masak">Tanggal Masak: </label>
                            <input type="date" class="form-control" id="s2_tgl_masak" name="s2_tgl_masak"
                                value="{{ isset($data['s2_tgl_masak']) ? \Carbon\Carbon::parse($data['s2_tgl_masak'])->format('m/d/Y') : old('s2_tgl_masak') }}" />
                        </div>
                    </div>
                    <div class="row mb-3 d-none">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Lampiran: </h4>
                        </div>
                        <div class="col-lg-4">
                            <label>Tanda Tangan : </label>
                            <img class="imgPreview img-fluid col-sm-5 d-block mb-3" @if (isset($data->s6_ttd)) src="{{ $data->s6_ttd }}" @endif>
                            <input type="file" class="form-control" id="imageFile" onchange="tampilImage()" name="s6_ttd">
                        </div>
                        <div class="col-lg-4">
                            <label>Label Benih : </label>
                            <img class="imgPreview2 img-fluid col-sm-5 d-block mb-3" @if (isset($data->s6_label_benih))
                            src="{{ $data->s6_label_benih }}" @endif>
                            <input type="file" class="form-control" id="imageFile2" onchange="tampilImage2()" name="s6_label_benih">
                        </div>
                        <div class="col-lg-4">
                            <label>Lokasi : </label>
                            <img class="imgPreview3 img-fluid col-sm-5 d-block mb-3" @if (isset($data->s6_dena_lokasi))
                            src="{{ $data->s6_dena_lokasi }}" @endif>
                            <input type="file" class="form-control" id="imageFile3" onchange="tampilImage3() " name="s6_dena_lokasi">
                        </div>
                        <div class="col-lg-4 mt-5">
                            <label>Surat Rekomendasi : </label>
                            <img class="imgPreview4 img-fluid col-sm-5 d-block mb-3" @if (isset($data->s6_surat_rekom))
                            src="{{ $data->s6_surat_rekom }}" @endif>
                            <input type="file" class="form-control" id="imageFile4" onchange="tampilImage4()" name="s6_surat_rekom">
                        </div>
                        <div class="col-lg-4 mt-5">
                            <label>Surat Pengantar : </label>
                            <img class="imgPreview5 img-fluid col-sm-5 d-block mb-3" @if (isset($data->s6_surat_pengantar))
                            src="{{ $data->s6_surat_pengantar }}" @endif />
                            <input type="file" class="form-control" id="imageFile5" onchange="tampilImage5()" name="s6_surat_pengantar">
                        </div>
                    </div> --}}
                    <div class="row mb-3">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Keterangan: </h4>
                        </div>
                        <div class="col-lg-5">
                            <h5>Pemeriksaan Lapangan (Tidak Lulus / Lulus)</h5>
                            <label class="p-switch p-switch-xl">
                                <input type="checkbox" name="s7_pemeriksaan_lapangan" value="1" id="s7_pemeriksaan_lapangan"
                                    {{ radio_selected(@old('s7_pemeriksaan_lapangan'), $data->s7_pemeriksaan_lapangan ?? null, '1') }} />
                                <span class="p-switch-style"></span>
                            </label>
                        </div>
                        <div class="col-lg-5">
                            <h5>Disertifikasi (Tidak / Ya)</h5>
                            <label class="p-switch p-switch-xl">
                                <input type="checkbox" name="s7_disertifikasi" value="1" id="s7_disertifikasi"
                                    {{ radio_selected(@old('s7_disertifikasi'), $data->s7_disertifikasi ?? null, '1') }} />
                                <span class="p-switch-style"></span>
                            </label>
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
    <script src="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
    <script>
        const isUpdate = {{ isset($id) ? 'true' : 'false' }};

        function produsenHelper(value) {
            const nama_pimpinan = $('#nama_pimpinan');
            $.ajax({
                url: "{{ route('produsen.get_data') }}?datatable=false&id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    nama_pimpinan.val(data[0].nama_pimpinan);
                }
            })
        }

        function produsenAlmHelper(value) {
            const inp = $('#s1_produsen_alamat_id');
            inp.prop("disabled", true);
            $.ajax({
                url: "{{ route('produsen_alamat.get_produsen') }}?id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    let targetValue = {{ isset($data->s1_produsen_alamat_id) ? $data->s1_produsen_alamat_id : @old('s1_produsen_alamat_id') ?? 'null' }}
                    inp.empty();
                    inp.append(new Option('-- Pilih Alamat Produsen --', ''))
                    if (isUpdate) {
                        data.forEach((el) => {
                            if (el.id === targetValue) {
                                inp.append(new Option(el.s1_alamat_lengkap, el.id, true, true))
                            } else {
                                inp.append(new Option(el.s1_alamat_lengkap, el.id))
                            }
                        });
                    } else {
                        data.forEach(el => inp.append(new Option(el.s1_alamat_lengkap, el.id)))
                    }
                    inp.prop("disabled", false);
                    alamatProdusenHelper(data[0].id)
                }
            })
        }

        function alamatProdusenHelper(value) {
            const alamat_lengkap = $('#alamat_lengkap');
            const desa = $('#desa');
            const kabupaten = $('#kabupaten');
            const kecamatan = $('#kecamatan');
            const luas_pertanaman = $('#luas_pertanaman');
            $.ajax({
                url: "/produsen_alamat/data_alamat?id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    alamat_lengkap.val(data.s1_alamat_lengkap);
                    desa.val(data.s2_desa);
                    kabupaten.val(data.kabupaten);
                    kecamatan.val(data.kecamatan);
                    luas_pertanaman.val(data.s2_luas_tanah);
                    console.log(data);
                }
            });
        }

        $('#s1_produsen_id').on('change', function(e) {
            produsenHelper(e.target.value)
            produsenAlmHelper(e.target.value)
        });

        $('#s1_produsen_alamat_id').on('change', function(e) {
            alamatProdusenHelper(e.target.value)
        });

        function komoditasHelper(value) {
            const inp = $('#s2_varietas_id')
            inp.prop("disabled", true);
            $.ajax({
                url: "{{ route('varietas.get_data') }}?komoditas=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    let targetValue =
                        {{ isset($data->s2_varietas_id) ? $data->s2_varietas_id : @old('s2_varietas_id') ?? 'null' }}
                    inp.empty()
                    inp.append(new Option('-- Pilih Varietas --', ''))
                    if (isUpdate) {
                        data.forEach((el) => {
                            if (el.id === targetValue) {
                                inp.append(new Option(el.nama, el.id, true, true))
                            } else {
                                inp.append(new Option(el.nama, el.id))
                            }
                        });
                    } else {
                        data.forEach(el => inp.append(new Option(el.nama, el.id)))
                    }

                    inp.prop("disabled", false);
                }
            })
        }

        $('#s1_komoditas_id').on('change', function(e) {
            komoditasHelper(e.target.value)
        });

        const inp = $('#s2_varietas_id')
        inp.prop("disabled", true);
        $.ajax({
            url: "{{ route('varietas.get_data') }}?komoditas={{ isset($data->s1_komoditas_id) }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                inp.empty()
                inp.append(new Option('-- Pilih Varietas --', ''))
                data.forEach((el) => {
                    if (el.id === {{ isset($data->s2_varietas_id) ? $data->s2_varietas_id : @old('s2_varietas_id') ?? 'null' }}) 
                    {
                        inp.append(new Option(el.nama, el.id, true, true))
                    } else {
                        inp.append(new Option(el.nama, el.id))
                    }
                })
                inp.prop("disabled", false);
            }
        });

        function initEdit() {
            const produsenValue = $('#s1_produsen_id').val()
            const komValue = $('#s1_komoditas_id').val()
            const almValue = $('#s1_produsen_alamat_id').val()
            produsenHelper(produsenValue)
            produsenAlmHelper(produsenValue)
            komoditasHelper(komValue)
            alamatProdusenHelper(almValue)
        }

        if (isUpdate) {
            initEdit()
        }

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
