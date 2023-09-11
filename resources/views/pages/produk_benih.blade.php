@extends('layouts.main')
@section('style')
@endsection
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
@section('content')
<section id="page-title" class="text-light" data-bg-parallax="/assets/images/info-perbenihan/ketersediaan-benih/6.jpg">
    <div class="container">
        <div class="page-title">
            <h1>Daftar Stok Benih</h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li class="active">
                    <a href="#">Daftar Stok Benih</a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="row no-sidebar" id="page-content">
    <div class="container">
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
                        <th>Nama Perusahaan</th>
                        <th>Komoditas</th>
                        <th>Varietas</th>
                        <th>Kelas</th>
                        <th>Jumlah Stok</th>
                        <th>Jumlah Penyaluran</th>
                        <th>Sisa Bulan Ini</th>
                        <th>Tgl Input</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no = 1; @endphp
                    @if(isset($data_produk))
                        @foreach ($data_produk as $dtp)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $dtp->nama_prod }}</td>
                            <td>{{ $dtp->komoditas }}</td>
                            <td>{{ $dtp->varietas }}</td>
                            <td>{{ $dtp->kelas }}</td>
                            <td>{{ $dtp->jml_stok_benih }}</td>
                            <td>{{ $dtp->jml_penyaluran_benih }}</td>
                            <td>{{ $dtp->sisa_bulan_ini }}</td>
                            <td>{{ $dtp->tgl }}</td>
                        </tr>
                        @endforeach
                    @endif
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
    // const cek = {{$data_produk}}
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
@endsection
