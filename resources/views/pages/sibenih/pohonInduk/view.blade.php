@extends('layouts.main')
@section('style')
@endsection
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">

@section('content')
    <section id="page-title" class="text-light" data-bg-parallax="/assets/images/info-perbenihan/ketersediaan-benih/6.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Pohon Induk</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">
                        <a href="#">Pohon Induk</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="row no-sidebar" id="page-content">
        <div class="container">
            <div class="row justify-content-between mb-3">
                <div class="col-lg-6">
                    <h4>POHON INDUK</h4>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                @if (session('flash_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('flash_success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif

                @if (session('flash_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('flash_success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered" id="datatable" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Identitas</th>
                                <th>Komoditas</th>
                                <th>Varietas</th>
                                <th>Tinggi Tanaman</th>
                                <th>Warna Buah</th>
                                <th>Petugas</th>
                                <th>Tgl Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($pohonInduks as $item)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $item->s1_identitas_pi }}</td>
                                    <td>{{ $item->komoditas_nama }}</td>
                                    <td>{{ $item->varietas_nama }}</td>
                                    <td>{{ $item->s2_tinggi_tanaman }}</td>
                                    <td>{{ $item->s5_warna_kulit_buah }}</td>
                                    <td>{{ $item->admin_name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src='{{ asset('assets/plugins/datatables/datatables.min.js') }}'></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
