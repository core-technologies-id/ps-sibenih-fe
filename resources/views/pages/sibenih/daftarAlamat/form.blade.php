@extends('layouts.main')
@section('style')
@endsection
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.css') }}">

@section('content')
    <section id="page-title" class="text-light" data-bg-parallax="/assets/images/info-perbenihan/ketersediaan-benih/6.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Daftar Alamat</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Daftar Alamat</a>
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
                            {{ isset($id) ? 'Ubah Data Produsen Alamat ' : 'Input Data Produsen Alamat' }}
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mt-5">
                            <label for="s1_produsen_id">Nama Perusahaan :</label>
                            <select class="form-control {{ $errors->has('s1_produsen_id') ? 'is-invalid' : '' }}"
                                id="s1_produsen_id" name="s1_produsen_id"
                                value="{{ @old('s1_produsen_id') ? @old('s1_produsen_id') : (isset($data->s1_produsen_id) ? $data->s1_produsen_id : @old('s1_produsen_id')) }}">
                                <option value="">-- Pilih Perusahaan --</option>
                                @foreach ($produsens as $produsen)
                                    <option value="{{ $produsen->id }}"
                                        {{ option_selected(@old('s1_produsen_id'), $data->s1_produsen_id ?? null, $produsen->id) }}>
                                        {{ $produsen->nama_pt }}
                                    </option>
                                @endforeach
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
                            <label for="s2_desa">Desa :</label>
                            <input type="text" class="form-control {{ $errors->has('s2_desa') ? 'is-invalid' : '' }}"
                                id="s2_desa" name="s2_desa" placeholder="Desa"
                                value="{{ isset($data['s2_desa']) ? $data['s2_desa'] : old('s2_desa') }}" />
                            @error('s2_desa')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-5">
                            <label for="s2_kabupaten_id">Kabupaten :</label>
                            <select class="form-control {{ $errors->has('s2_kabupaten_id') ? 'is-invalid' : '' }}"
                                id="s2_kabupaten_id" name="s2_kabupaten_id"
                                value="{{ @old('s2_kabupaten_id') ? @old('s2_kabupaten_id') : (isset($data->s2_kabupaten_id) ? $data->s2_kabupaten_id : @old('s2_kabupaten_id')) }}">
                                <option value="">-- Pilih Kabupaten --</option>
                                @foreach ($kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten->id }}"
                                        {{ option_selected(@old('s2_kabupaten_id'), $data->s2_kabupaten_id ?? null, $kabupaten->id) }}>
                                        {{ $kabupaten->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('s2_kabupaten_id')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-5">
                            <label for="s2_kecamatan_id">Kecamatan :</label>
                            <select class="form-control {{ $errors->has('s2_kecamatan_id') ? 'is-invalid' : '' }}"
                                id="s2_kecamatan_id" name="s2_kecamatan_id"
                                value="{{ @old('s2_kecamatan_id') ? @old('s2_kecamatan_id') : (isset($data->s2_kecamatan_id) ? $data->s2_kecamatan_id : @old('s2_kecamatan_id')) }}">
                                <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mt-5">
                            <label for="s2_luas_tanah">Luas Tanah :</label>
                            <input type="number" min="0"
                                class="form-control {{ $errors->has('s2_luas_tanah') ? 'is-invalid' : '' }}"
                                id="s2_luas_tanah" name="s2_luas_tanah" placeholder="Luas Tanah"
                                value="{{ isset($data['s2_luas_tanah']) ? $data['s2_luas_tanah'] : old('s2_luas_tanah') }}" />
                            @error('s2_luas_tanah')
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

        $('#s2_kabupaten_id').on('change', function(e) {
            const inp = $('#s2_kecamatan_id')
            inp.prop("disabled", true);
            $.ajax({
                url: "{{ route('master.kecamatan.get_data') }}?kabupaten=" + e.target.value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    inp.empty()
                    inp.append(new Option('-- Pilih Kecamatan --', ''))
                    data.forEach(el => inp.append(new Option(el.kecamatan, el.idkecamatan)))
                    inp.prop("disabled", false);
                }
            });
        });

        function kabupatenHelper(value) {
            const inp1 = $('#s2_kecamatan_id')
            inp1.prop("disabled", true);
            $.ajax({
                url: "{{ route('master.kecamatan.get_data') }}?kabupaten=" + value,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const kecamatan_id =
                        {{ isset($data->s2_kecamatan_id) ? $data->s2_kecamatan_id : @old('s2_kecamatan_id') ?? 'null' }};
                    inp1.empty()
                    inp1.append(new Option('-- Pilih Kecamatan --', ''))
                    data.forEach((el) => {
                        if (el.idkecamatan === kecamatan_id) {
                            inp1.append(new Option(el.kecamatan, el.idkecamatan, true, true))
                        } else {
                            inp1.append(new Option(el.kecamatan, el.idkecamatan))
                        }
                    })
                    inp1.prop("disabled", false);
                }
            });
        }

        $('#s1_produsen_id').select2({
            theme: "bootstrap",
            placeholder: 'Pilih Produsen',
            allowClear: true,
        })

        $('#s2_kabupaten_id').select2({
            theme: "bootstrap",
            placeholder: 'Pilih Produsen',
            allowClear: true,
        })

        $('#s2_kecamatan_id').select2({
            theme: "bootstrap",
            placeholder: 'Pilih Kecamatan',
            allowClear: true,
        })

        if (isUpdate) {
            const kabValue = $('#s2_kabupaten_id').val();
            kabupatenHelper(kabValue);
        }
    </script>
@endsection
