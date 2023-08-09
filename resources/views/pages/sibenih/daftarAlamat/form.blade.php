@extends('layouts.main')
@section('style')
@endsection
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.css') }}">

@section('content')
    <section id="page-title" class="text-light" data-bg-parallax="/assets/images/info-perbenihan/ketersediaan-benih/6.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Master Alamat Produksi</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Master Alamat Produksi</a>
                    </li>
                    <li class="active">
                        <a href="#">Create</a>
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
                action="{{ isset($id) ? route('daftaralamat.update', ['daftaralamat' => $id]) : route('daftaralamat.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($id))
                    @method('PUT')
                @endif
                <div class="card-header">
                    <div class="card-toolbar">
                        <a href="{{ route('daftaralamat.index') }}" class="btn btn-sm btn-danger font-weight-bold">
                            <i class="flaticon2-back"></i>Back</a>
                    </div>
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-avatar text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            {{ isset($id) ? 'Ubah Master Data Alamat ' : 'Input Master Data Alamat' }}
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mt-5">
                            <label for="s1_produsen_id">Nama Perusahaan :</label>
                            <select
                                value="{{ isset($data['s1_produsen_id']) ? $data['s1_produsen_id'] : old('s1_produsen_id') ?? $userId }}"
                                class="form-control select2-get-produsen {{ $errors->has('s1_produsen_id') ? 'is-invalid' : '' }}"
                                name="s1_produsen_id" id="s1_produsen_id">
                            </select>
                            @error('s1_produsen_id')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-5">
                            <label for="s1_alamat_lengkap">Alamat Lengkap :</label>
                            <input type="text"
                                class="form-control {{ $errors->has('s1_alamat_lengkap') ? 'is-invalid' : '' }}"
                                id="s1_alamat_lengkap" name="s1_alamat_lengkap" placeholder="Alamat Lengkap"
                                value="{{ isset($data['s1_alamat_lengkap']) ? $data['s1_alamat_lengkap'] : old('s1_alamat_lengkap') }}" />
                            @error('s1_alamat_lengkap')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-5">
                            <label for="s2_kabupaten_id">Kabupaten :</label>
                            <select
                                value="{{ isset($data['s2_kabupaten_id']) ? $data['s2_kabupaten_id'] : old('s2_kabupaten_id') }}"
                                class="form-control select2-get-regencies {{ $errors->has('s2_kabupaten_id') ? 'is-invalid' : '' }}"
                                name="s2_kabupaten_id" id="s2_kabupaten_id">

                            </select>
                            @error('s2_kabupaten_id')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-5">
                            <label for="s2_kecamatan_id">Kecamatan :</label>
                            <select
                                value="{{ isset($data['s2_kecamatan_id']) ? $data['s2_kecamatan_id'] : old('s2_kecamatan_id') }}"
                                class="form-control select2-get-districts {{ $errors->has('s2_kecamatan_id') ? 'is-invalid' : '' }}"
                                name="s2_kecamatan_id" id="s2_kecamatan_id" disabled>

                            </select>
                        </div>
                        <div class="col-lg-6 mt-5">
                            <label for="s2_desa">Desa :</label>
                            <select value="{{ isset($data['s2_desa_id']) ? $data['s2_desa_id'] : old('s2_desa_id') }}"
                                class="form-control select2-get-villages {{ $errors->has('s2_desa_id') ? 'is-invalid' : '' }}"
                                name="s2_desa_id" id="s2_desa_id" disabled>

                            </select>
                            @error('s2_desa')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
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
    <script type="text/javascript">
        const isUpdate = {{ isset($id) ? 'true' : 'false' }}
        const userId = {{ isset($data->s1_produsen_id) ? $data->s1_produsen_id : $userId }}

        $(document).ready(function() {
            let regency_id = null
            let district_id = null
            // GET KABUPATEN
            $('.select2-get-regencies').select2({
                theme: "bootstrap",
                allowClear: true,
                placeholder: 'Select Kabupaten',
                ajax: {
                    url: '/master/regencies',
                    data: function(params) {
                        const query = {
                            idField: 'id',
                            displayField: 'name'
                        }

                        if (params.term) {
                            query.where = `province_id=16 and name LIKE '%${params.term}%'`
                        } else {
                            query.where = 'province_id=16'
                        }

                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    }
                }
            });

            // GET PRODUSEN
            $('.select2-get-produsen').select2({
                theme: "bootstrap",
                allowClear: true,
                placeholder: 'Select Perusahaan',
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
                    },
                }
            });

            // $('.select2-get-produsen').val('{{ auth()->user()->nama_pt }}').trigger('change');

            $('.select2-get-regencies')
                .on('select2:clear', () => {
                    setTimeout(() => {
                        $('.select2-get-districts').prop("disabled", true);
                        $('.select2-get-villages').prop("disabled", true);
                    }, 100)
                    $('.select2-get-districts').val('');
                    $('.select2-get-districts').trigger('change');
                    $('.select2-get-villages').val('');
                    $('.select2-get-villages').trigger('change');
                })
                .on('change', function() {
                    $('.select2-get-districts').val('');
                    $('.select2-get-districts').trigger('change');
                    $('.select2-get-villages').val('');
                    $('.select2-get-villages').trigger('change');
                    $('.select2-get-districts').prop("disabled", false);
                    $('.select2-get-villages').prop("disabled", true);
                    regency_id = $('.select2-get-regencies').val() * 1
                })

            // GET KECAMATAN
            $('.select2-get-districts').select2({
                theme: "bootstrap",
                allowClear: true,
                placeholder: 'Select Kecamatan',
                ajax: {
                    url: '/master/districts',
                    data: function(params) {
                        const query = {
                            idField: 'id',
                            displayField: 'name'
                        }

                        if (params.term) {
                            query.where = `regency_id=${regency_id} and name LIKE '%${params.term}%'`
                        } else {
                            query.where = `regency_id=${regency_id}`
                        }

                        // Query parameters will be ?search=[term]&page=[page]
                        return query;
                    }
                }
            });

            $('.select2-get-districts')
                .on('select2:clear', () => {
                    setTimeout(() => {
                        $('.select2-get-villages').prop("disabled", true);
                    }, 100)
                    $('.select2-get-villages').val('');
                    $('.select2-get-villages').trigger('change');
                })
                .on('change', function() {
                    $('.select2-get-villages').val('');
                    $('.select2-get-villages').trigger('change');
                    $('.select2-get-villages').prop("disabled", false);
                    district_id = $('.select2-get-districts').val() * 1
                })

            // GET DESA
            $('.select2-get-villages').select2({
                theme: "bootstrap",
                allowClear: true,
                placeholder: 'Select Desa',
                ajax: {
                    url: '/master/villages',
                    data: function(params) {
                        const query = {
                            idField: 'id',
                            displayField: 'name'
                        }

                        if (params.term) {
                            query.where = `district_id=${district_id} and name LIKE '%${params.term}%'`
                        } else {
                            query.where = `district_id=${district_id}`
                        }
                        return query;
                    }
                }
            });
        });

        function companyHelper(value) {
            const inp1 = $('#s1_produsen_id')
            inp1.prop("disabled", true);
            $.ajax({
                url: "/master/produsen?where=id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.results.forEach((el) => {
                        if (el.id === value) {
                            inp1.append(new Option(el.text, el.id, true, true))
                        } else {
                            inp1.append(new Option(el.text, el.id))
                        }
                    })
                    inp1.prop("disabled", false);
                }
            });
        }

        function kabupatenHelper(value) {
            const inp1 = $('#s2_kabupaten_id')
            inp1.prop("disabled", true);
            $.ajax({
                url: "/master/regencies?where=id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const kabupaten_id = value;
                    data.results.forEach((el) => {
                        if (el.id === kabupaten_id) {
                            inp1.append(new Option(el.text, el.id, true, true))
                        } else {
                            inp1.append(new Option(el.text, el.id))
                        }
                    })
                    inp1.prop("disabled", false);

                    kecamatanHelper(kabupaten_id)
                }
            });
        }

        function kecamatanHelper(value) {
            const inp1 = $('#s2_kecamatan_id')
            inp1.prop("disabled", true);
            $.ajax({
                url: "/master/districts?where=regency_id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const kecamatan_id =
                        {{ isset($data->s2_kecamatan_id) ? $data->s2_kecamatan_id : @old('s2_kecamatan_id') ?? 'null' }};
                    data.results.forEach((el) => {
                        if (el.id === kecamatan_id) {
                            inp1.append(new Option(el.text, el.id, true, true))
                        } else {
                            inp1.append(new Option(el.text, el.id))
                        }
                    })
                    inp1.prop("disabled", false);

                    const kecValue = $('#s2_kecamatan_id').val();
                    desaHelper(kecValue)
                }
            });
        }

        function desaHelper(value) {
            const inp1 = $('#s2_desa_id')
            inp1.prop("disabled", true);
            $.ajax({
                url: "/master/villages?where=district_id=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const desa_id =
                        {{ isset($data->s2_desa_id) ? $data->s2_desa_id : @old('s2_desa_id') ?? 'null' }};
                    data.results.forEach((el) => {
                        if (el.id === desa_id) {
                            inp1.append(new Option(el.text, el.id, true, true))
                        } else {
                            inp1.append(new Option(el.text, el.id))
                        }
                    })
                    inp1.prop("disabled", false);
                }
            });
        }


        if (isUpdate) {
            const kabValue =
                {{ isset($data->s2_kabupaten_id) ? $data->s2_kabupaten_id : @old('s2_kabupaten_id') ?? 'null' }}
            companyHelper(userId)
            kabupatenHelper(kabValue);
        } else {
            companyHelper(userId)
        }
    </script>
@endsection
