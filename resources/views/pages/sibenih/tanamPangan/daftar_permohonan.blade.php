@extends('layouts.main')
@section('style')
@endsection
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">

@section('content')
    <section id="page-title" class="text-light" data-bg-parallax="/assets/images/info-perbenihan/ketersediaan-benih/6.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Daftar Permohonan</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">
                        <a href="#">Daftar Permohonan</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="row no-sidebar" id="page-content">
        <div class="container">
            <div class="row justify-content-between mb-3">
                <div class="col-lg-6">
                    <h4>DAFTAR PERMOHONAN</h4>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('tanampangan.create') }}" class="btn btn-primary d-block"><i class="fas fa-fw fa-plus"></i> Tambah</a>
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
                                <th>Nomor Antrian</th>
                                <th>Nomor Lapangan</th>
                                <th>Nama Perusahaan</th>
                                <th>Blok</th>
                                <th>Nama Pimpinan</th>
                                <th>Luas Tanah</th>
                                <th>Varietas</th>
                                {{-- <th>Status</th> --}}
                                <th>Tanggal Input</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($tanamPangan as $item)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $item->s1_nomor_antrian }}</td>
                                <td>{{ $item->s1_nomor_lapangan }}</td>
                                <td>{{ $item->pro_nama_pt }}</td>
                                <td>{{ $item->s1_block }}</td>
                                <td>{{ $item->pro_nama_pimpinan }}</td>
                                <td>{{ $item->s1_luas_tanah }}</td>
                                <td>{{ $item->var_nama_varietas }}</td>
                                {{-- <td>
                                    @if ($item->status == 'draft')
                                        <span class="badge badge-primary">{{ $item->status }}</span>
                                    @elseif($item->status == 'revision')
                                        <span class="badge badge-warning">{{ $item->status }}</span>
                                    @elseif($item->status == 'reject')
                                        <span class="badge badge-danger">{{ $item->status }}</span>
                                    @else
                                        <span class="badge badge-success">{{ $item->status }}</span>
                                    @endif
                                </td> --}}
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @if($item->status == 'draft')
                                        <a href="{{ route('tanampangan.edit', $item->id) }}" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                        <form action="{{ route('tanampangan.destroy', $item->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                        </form>
                                    @elseif($item->status == 'revision')
                                        <a href="{{ route('tanampangan.edit', $item->id) }}" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                    @endif
                                    <a href="{{ route('tanampangan.daftar_permohonan.print', $item->id) }}" class="btn btn-info">
                                        <i class="fas fa-fw fa-file-export"></i>
                                    </a>
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
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection
