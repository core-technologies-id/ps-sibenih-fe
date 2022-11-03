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
            <form action="{{ route('InfoPerbenihan.KetersediaanBenih.search') }}" class="row" method="post">
                @csrf
                <div class="col">
                    <div class="form-group">
                        <label for="komoditas_value">Komoditas</label>
                        <select class="form-control" id="komoditas_value" name="komoditas_value">
                            <option value="">Pilih salah satu</option>
                            @foreach($komoditas as $item)
                                <option value="{{ $item->nama }}" @if(isset($c_val) && $c_val['komoditas_value'] === $item->nama) selected @endif>
                                    {{$item->nama}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="varietas_value">Varietas</label>
                        <select class="form-control" id="varietas_value" name="varietas_value">
                            <option value="">Pilih salah satu</option>
                            @foreach($varietas as $item)
                                <option value="{{ $item->nama }}" @if(isset($c_val) && $c_val['varietas_value'] === $item->nama) selected @endif>
                                    {{$item->nama}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="kelas_value">Kelas</label>
                        <select class="form-control" id="kelas_value" name="kelas_value">
                            <option value="">Pilih salah satu</option>
                            @foreach($kelas as $item)
                                <option value="{{ $item->nama }}" @if(isset($c_val) && $c_val['kelas_value'] === $item->nama) selected @endif>
                                    {{$item->nama}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="kota_value">Kota/Kabupaten</label>
                        <select class="form-control" id="kota_value" name="kota_value">
                            <option value="">Pilih salah satu</option>
                            @foreach($kabupaten as $item)
                                <option value="{{ $item->nama }}" @if(isset($c_val) && $c_val['kota_value'] === $item->nama) selected @endif>
                                    {{$item->nama}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2" style="margin-top: 27px;">
                    <button type="submit" class="btn btn-primary btn-md">Cari</button>
                </div>
            </form>
            <div class="row mt-5 pt-3">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nama Usaha</th>
                                <th>Tanggal Update</th>
                                <th>Komoditas</th>
                                <th>Varietas</th>
                                <th>Kelas</th>
                                <th>Stok</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($sibenih))
                                    @if(count($sibenih))
                                        @foreach($sibenih as $item)
                                            <tr>
                                                <td>{{ $item->nama_pt }}</td>
                                                <td>{{ $item->tgl }}</td>
                                                <td>{{ $item->komoditas }}</td>
                                                <td>{{ $item->varietas }}</td>
                                                <td>{{ $item->kelas_benih }}</td>
                                                <td>{{ $item->stok_benih }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data ditemukan</td>
                                        </tr>
                                    @endif
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">Filter terlebih dahulu</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
