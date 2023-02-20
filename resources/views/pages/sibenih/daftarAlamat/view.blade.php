@extends('layouts.main')
@section('style')
@endsection
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">

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
                    <li class="active">
                        <a href="#">Daftar Alamat</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="row no-sidebar" id="page-content">
        <div class="container">
            <div class="row justify-content-between mb-3">
                <div class="col-lg-6">
                    <h4>DAFTAR ALAMAT</h4>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('daftaralamat.create') }}" class="btn btn-primary d-block"><i
                            class="fas fa-fw fa-plus"></i> Tambah</a>
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
                                <th>Nama Perusahaan</th>
                                <th>Desa</th>
                                <th>Kecamatan</th>
                                <th>Kabupaten</th>
                                <th>Petugas</th>
                                <th>Tgl Input</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($daftarAlamats as $item)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $item->produsen_nama_pt }}</td>
                                    <td>{{ $item->s2_desa }}</td>
                                    <td>{{ $item->kecamatan }}</td>
                                    <td>{{ $item->kabupaten }}</td>
                                    <td>{{ isset($item->admin_name) ? $item->admin_name : '-' }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('daftaralamat.edit', $item->id) }}" class="btn btn-warning"><i
                                                class="fas fa-fw fa-edit"></i></a>
                                        <form action="{{ route('daftaralamat.destroy', $item->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fas fa-fw fa-trash"></i></button>
                                        </form>
                                    </td>
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
