{{-- @dd($kelas_benih) --}}
@extends('layouts.main')
@section('style')
@endsection
@section('content')
    <section id="page-title" class="text-light" data-bg-parallax="/assets/images/info-perbenihan/ketersediaan-benih/6.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Upload Stok Benih</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">
                        <a href="#">Stok Benih</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            @if (session('flash_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('flash_success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form class="form card card-custom" action="/stokBenih" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-avatar text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            Upload Stok Benih
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-6 mt-5">
                            <label for="produsen_id">Produsen: <span
                                    class="text-danger">*</span></label>
                            <select
                                class="form-control {{ $errors->has('produsen_id') ? 'is-invalid' : '' }}"
                                id="produsen_id" name="produsen_id"
                                value="{{ @old('produsen_id') ? @old('produsen_id') : (isset($data->produsen_id) ? $data->produsen_id : @old('produsen_id')) }}">

                            </select>
                            @error('produsen_id')
                            <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-5">
                            <label for="s2_komoditas_id">Komoditas: <span
                                    class="text-danger">*</span></label>
                            <select
                                class="form-control {{ $errors->has('s2_komoditas_id') ? 'is-invalid' : '' }}"
                                id="s2_komoditas_id" name="s2_komoditas_id"
                                value="{{ @old('komoditas') ? @old('komoditas') : (isset($data->s2_komoditas_id) ? $data->s2_komoditas_id : @old('s2_komoditas_id')) }}">

                            </select>
                        </div>
                        <div class="col-lg-6 mt-5">
                            <label for="s2_varietas_id">Varietas: <span
                                    class="text-danger">*</span></label>
                            <select
                                class="form-control {{ $errors->has('s2_varietas_id') ? 'is-invalid' : '' }} varietas"
                                id="s2_varietas_id" name="s2_varietas_id"
                                value="{{ @old('s2_varietas_id') ? @old('s2_varietas_id') : (isset($data->s2_varietas_id) ? $data->s2_varietas_id : @old('s2_varietas_id')) }}"
                                disabled>

                            </select>
                        </div>
                        <div class="col-lg-6 mt-5">
                            <label for="s2_kelas_benih_id">Kelas Benih: <span
                                    class="text-danger">*</span></label>
                            <select
                                class="form-control {{ $errors->has('s2_kelas_benih_id') ? 'is-invalid' : '' }}"
                                id="s2_kelas_benih_id" name="s2_kelas_benih_id"
                                value="{{ @old('s2_kelas_benih_id') ? @old('s2_kelas_benih_id') : (isset($data->s2_kelas_benih_id) ? $data->s2_kelas_benih_id : @old('s2_kelas_benih_id')) }}">

                            </select>
                            @error('s2_kelas_benih_id')
                            <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-3 mt-5">
                            <label for="alamat_lengkap_usaha">Alamat Lengkap Usaha:</label>
                            <input id="alamat_lengkap_usaha" type="text" class="form-control" placeholder="Alamat lengkap usaha"
                                   disabled />
                        </div>
                        <div class="col-lg-3 mt-5">
                            <label for="tlp">No. Telepon / HP Perusahaan:</label>
                            <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Nomor telepon / HP perusahaan" disabled />
                        </div>
                        <div class="col-lg-6 mt-5">
                            <label for="kota">Kabupaten/Kota Letak Tanah:</label>
                            <input disabled type="text" class="form-control" id="kota" name="kota" placeholder="Kota / Kabupaten" />
                            @error('kota')
                            <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Stok Benih</h4>
                        </div>
                        <div class="col-lg-3">
                            <label for="sisa_stok_benih">Sisa Stok Benih (Kg):</label>
                            <input type="number" min="0"
                                class="form-control {{ $errors->has('sisa_stok_benih') ? 'is-invalid' : '' }}"
                                id="sisa_stok_benih" name="sisa_stok_benih" placeholder="Sisa stok benih kg" />
                            @error('sisa_stok_benih')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-3">
                            <label for="produksi_benih">Produksi Benih (Kg):</label>
                            <input type="number" min="0"
                                class="form-control {{ $errors->has('produksi_benih') ? 'is-invalid' : '' }}"
                                id="produksi_benih" name="produksi_benih" placeholder="Produksi benih kg" />
                            @error('produksi_benih')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-3">
                            <label for="pengadaan_luar_provinsi">Pengadaan Dari Luar Provinsi (kg):</label>
                            <input type="number" min="0"
                                class="form-control {{ $errors->has('pengadaan_luar_provinsi') ? 'is-invalid' : '' }}"
                                id="pengadaan_luar_provinsi" name="pengadaan_luar_provinsi"
                                placeholder="Pengadaan luar provinsi kg" />
                            @error('pengadaan_luar_provinsi')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-3">
                            <label for="jml_stok_benih">Jumlah (Kg):</label>
                            <input type="number" readonly min="0"
                                class="form-control {{ $errors->has('jml_stok_benih') ? 'is-invalid' : '' }}"
                                id="jml_stok_benih" name="jml_stok_benih" placeholder="Jumlah stok benih kg" />
                            @error('jml_stok_benih')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Penyaluran Benih Bantuan</h4>
                        </div>
                        <div class="col-lg-3">
                            <label for="benih_bantuan">Benih Bantuan (Kg):</label>
                            <input type="number" min="0"
                                class="form-control {{ $errors->has('benih_bantuan') ? 'is-invalid' : '' }}"
                                id="benih_bantuan" name="benih_bantuan" placeholder="Benih bantuan kg" />
                            @error('benih_bantuan')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-3">
                            <label for="non_benih_bantuan">Non Benih Bantuan (Kg):</label>
                            <input type="number" min="0"
                                class="form-control {{ $errors->has('non_benih_bantuan') ? 'is-invalid' : '' }}"
                                id="non_benih_bantuan" name="non_benih_bantuan" placeholder="Non benih bantuan kg" />
                            @error('non_benih_bantuan')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-3">
                            <label for="penyaluran_luar_provinsi">Penyaluran ke Luar Provinsi (Kg):</label>
                            <input type="number" min="0"
                                class="form-control {{ $errors->has('penyaluran_luar_provinsi') ? 'is-invalid' : '' }}"
                                id="penyaluran_luar_provinsi" name="penyaluran_luar_provinsi"
                                placeholder="Penyaluran luar provinsi kg" />
                            @error('penyaluran_luar_provinsi')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-3">
                            <label for="jml_penyaluran_benih">Jumlah (Kg):</label>
                            <input type="number" readonly min="0"
                                class="form-control {{ $errors->has('jml_penyaluran_benih') ? 'is-invalid' : '' }}"
                                id="jml_penyaluran_benih" name="jml_penyaluran_benih"
                                placeholder="Jumlah penyaluran benih kg" />
                            @error('jml_penyaluran_benih')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 mb-3 mt-4">
                            <h4>Sisa Stok Bulan Ini (Kg)</h4>
                        </div>
                        <div class="col-lg-3">
                            <label for="sisa_bulan_ini">Sisa Stok Benih (Kg):</label>
                            <input type="number" readonly min="0"
                                class="form-control {{ $errors->has('sisa_bulan_ini') ? 'is-invalid' : '' }}"
                                id="sisa_bulan_ini" name="sisa_bulan_ini" placeholder="Sisa bulan ini kg" />
                            @error('sisa_bulan_ini')
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
@section('script')
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
    <script>
        let nilai1 = 0;
        let nilai2 = 0;
        let nilai3 = 0;
        let nilai4 = 0;
        let nilai5 = 0;
        let nilai6 = 0;
        let hasil1 = 0;
        let hasil2 = 0;

        $('#sisa_stok_benih').on('change', function() {
            nilai1 = $(this).val();
            hasil1 = parseInt(nilai1) + parseInt(nilai2) + parseInt(nilai3);
            $('#jml_stok_benih').val(hasil1);
            $('#sisa_bulan_ini').val(hasil1 - hasil2);
        });

        $('#produksi_benih').on('change', function() {
            nilai2 = $(this).val();
            hasil1 = parseInt(nilai1) + parseInt(nilai2) + parseInt(nilai3);
            $('#jml_stok_benih').val(hasil1);
            $('#sisa_bulan_ini').val(hasil1 - hasil2);
        });

        $('#pengadaan_luar_provinsi').on('change', function() {
            nilai3 = $(this).val();
            hasil1 = parseInt(nilai1) + parseInt(nilai2) + parseInt(nilai3);
            $('#jml_stok_benih').val(hasil1);
            $('#sisa_bulan_ini').val(hasil1 - hasil2);
        });

        $('#benih_bantuan').on('change', function() {
            nilai4 = $(this).val();
            hasil2 = parseInt(nilai4) + parseInt(nilai5) + parseInt(nilai6);
            $('#jml_penyaluran_benih').val(hasil2);
            $('#sisa_bulan_ini').val(hasil1 - hasil2);
        });

        $('#non_benih_bantuan').on('change', function() {
            nilai5 = $(this).val();
            hasil2 = parseInt(nilai4) + parseInt(nilai5) + parseInt(nilai6);
            $('#jml_penyaluran_benih').val(hasil2);
            $('#sisa_bulan_ini').val(hasil1 - hasil2);
        });

        $('#penyaluran_luar_provinsi').on('change', function() {
            nilai6 = $(this).val();
            hasil2 = parseInt(nilai4) + parseInt(nilai5) + parseInt(nilai6);
            $('#jml_penyaluran_benih').val(hasil2);
            $('#sisa_bulan_ini').val(hasil1 - hasil2);
        });


        function produsenGetDetail(value) {
            $.ajax({
                url: "{{ route('sibenih.produsen.get_data') }}?datatable=false&id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#alamat_lengkap_usaha').val(data[0].alamat_usaha);
                    $('#tlp').val(data[0].hp);
                    $('#kota').val(data[0].kota);
                }
            })
        }

        $(document).ready(function() {
            let komoditas_id = null
            let produsen_id = null

            // GET PRODUSEN
            $('#produsen_id').select2({
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
            $('#produsen_id').on('change', function() {
                produsen_id = $('#produsen_id').val() * 1
                produsenGetDetail(produsen_id)
            })

            // GET KOMODITAS
            $('#s2_komoditas_id').select2({
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
            $('#s2_komoditas_id').on('select2:clear', function() {
                setTimeout(() => {
                    $('#s2_varietas_id').prop("disabled", true);
                }, 100)
                $('#s2_varietas_id').val('');
                $('#s2_varietas_id').trigger('change');
            })
            $('#s2_komoditas_id').on('change', function() {
                komoditas_id = $('#s2_komoditas_id').val() * 1
                $('#s2_varietas_id').val('');
                $('#s2_varietas_id').trigger('change');
                if (komoditas_id) {
                    $('#s2_varietas_id').prop("disabled", false);
                } else {
                    $('#s2_varietas_id').prop("disabled", true);
                }
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

            // GET KELAS
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
        })
    </script>
@endsection
