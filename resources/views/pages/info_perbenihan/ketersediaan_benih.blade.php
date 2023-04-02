@extends('layouts.main')
@section('style')
@endsection
@section('content')
    <section id="page-title" class="text-light" data-bg-parallax="/assets/images/info-perbenihan/ketersediaan-benih/6.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Ketersediaan Benih</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Info Perbenihan</a>
                    </li>
                    <li class="active">
                        <a href="#">Ketersediaan Benih</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>PENCARIAN PRODUK</h2>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="komoditas_id">Komoditas: <span
                                class="text-danger">*</span></label>
                        <select
                            class="form-control"
                            id="komoditas_id" name="komoditas_id"
                            value="">
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="varietas_id">Varietas: <span
                                class="text-danger">*</span></label>
                        <select
                            class="form-control varietas"
                            id="varietas_id" name="varietas_id"
                            value=""
                            disabled>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="kelas_benih_id">Kelas Benih: <span
                                class="text-danger">*</span></label>
                        <select
                            class="form-control"
                            id="kelas_benih_id" name="kelas_benih_id"
                            value="">
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="kota_value">Kota/Kabupaten</label>
                        <select class="form-control" id="city" name="city">
                            <option value="">Pilih salah satu</option>
                            @foreach($kabupaten as $item)
                                <option value="{{ $item->nama }}">
                                    {{$item->nama}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2" style="margin-top: 27px;">
                    <button
                        type="button"
                        class="btn btn-primary btn-md"
                        onclick="onSearch()"
                    >
                        Cari
                    </button>
                </div>
            </div>
            <div class="row mt-5 pt-3">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Produsen</th>
                                <th>Lokasi</th>
                                <th>Tanggal Update</th>
                                <th>Komoditas</th>
                                <th>Varietas</th>
                                <th>Kelas</th>
                                <th>Stok</th>
                            </tr>
                            </thead>
                            <tbody id="list-stokbenih">
                                <tr class="no-rows">
                                    <td colspan="7" class="text-center">Tidak ada data ditemukan</td>
                                </tr>
                                <tr class="d-none">
                                    <td colspan="7" class="text-center">-</td>
                                </tr>
                                <tr class="is-progress d-none">
                                    <td colspan="7" class="text-center"><i class="fas fa-spin fa-spinner"></i> Mohon tunggu sebentar... </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
    <script>
        let hasInit = false
        function onSearch() {
            let komoditas_id = $('#komoditas_id').val() || null
            let varietas_id = $('#varietas_id').val() || null
            let kelas_benih_id = $('#kelas_benih_id').val() || null
            let city = $('#city').val() || null
            let params = {}
            if (komoditas_id) {
                params.komoditas_id = komoditas_id
            }
            if (varietas_id) {
                params.varietas_id = varietas_id
            }
            if (kelas_benih_id) {
                params.kelas_benih_id = kelas_benih_id
            }
            if (city) {
                params.city = city
            }

            $('.no-rows').addClass('d-none')
            $('.is-progress').removeClass('d-none')
            $("table tbody").find('tr[class="avability-row"]').each(function(){
                $(this).remove()
            });

            $.ajax({
                method: 'GET',
                url: `/sibenih/stokbenih/get_data?` + new URLSearchParams(params),
                success: function (res) {
                    $('.is-progress').addClass('d-none')
                    if (res.data.length) {
                        $('.no-rows').addClass('d-none')
                    } else {
                        $('.no-rows').removeClass('d-none')
                    }
                    res.data.forEach((dt) => {
                        const markup = `<tr class="avability-row">` +
                            `<td>${dt.produsen}</td>` +
                            `<td>${dt.kota}</td>` +
                            `<td>${dt.tgl}</td>` +
                            `<td>${dt.komoditas}</td>` +
                            `<td>${dt.varietas}</td>` +
                            `<td>${dt.kelas}</td>` +
                            `<td>${dt.jml_stok_benih}</td>` +
                        `</tr>`
                        $("#list-stokbenih").append(markup);
                    })
                }
            })
        }

        $(document).ready(function() {
            let komoditas_id = null

            // GET KOMODITAS
            $('#komoditas_id').select2({
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
            $('#komoditas_id').on('select2:clear', function() {
                setTimeout(() => {
                    $('#varietas_id').prop("disabled", true);
                }, 100)
                $('#varietas_id').val('');
                $('#varietas_id').trigger('change');
            })
            $('#komoditas_id').on('change', function() {
                komoditas_id = $('#komoditas_id').val() * 1
                $('#varietas_id').val('');
                $('#varietas_id').trigger('change');
                if (komoditas_id) {
                    $('#varietas_id').prop("disabled", false);
                } else {
                    $('#varietas_id').prop("disabled", true);
                }
            })

            // GET VARIETAS
            $('#varietas_id').select2({
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
            $('#kelas_benih_id').select2({
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

            // GET KOTA/KABUPATEN
            $('#city').select2({
                theme: "bootstrap",
                placeholder: 'Pilih Kota/Kabupaten',
                allowClear: true,
            })
        })
    </script>
@endsection
