@extends('layouts.main')
@section('style')
@endsection

@section('content')
    <section id="page-title" class="text-light" data-bg-parallax="/assets/images/info-perbenihan/ketersediaan-benih/6.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Detail News</h1>
            </div>
        </div>
    </section>

    <section class="row no-sidebar" id="page-content">
        <div class="container">
            <a href="/" class="btn btn-danger mb-2">Back</a>
            @if (isset($data->photo))
                <img style="height: 450px; margin-bottom: 20px; width: 100%; background-position-y: center; background-position: center; object-fit: cover"
                    src="{{ $data->photo }}">
            @else
                <img style="height: 450px; margin-bottom: 20px; width: 100%; background-position-y: center; background-position: center; object-fit: cover"
                    src="https://png.pngtree.com/png-vector/20190115/ourlarge/pngtree-cartoon-character-hand-drawn-farmers-farmer-holding-rice-xiaoman-png-image_348097.jpg">
            @endif

            <span class="text-sm text-secondary"><i
                    class="fa fa-calendar-o"></i>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y') }}</span>
            <span class="text-sm text-secondary">| {{ $data->views }} Views</span>
            <br>
            <span class="text-sm text-secondary">Module : {{ $data->module }}</span>
            <h2>{{ $data->title }}</h2>
            {!! $data->content !!}
        </div>
    </section>
@endsection
@section('script')
@endsection
