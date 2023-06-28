@extends('layouts.main')
@section('style')
@endsection

@section('content')
    <section id="page-title" class="text-light" data-bg-parallax="/assets/images/info-perbenihan/ketersediaan-benih/6.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Semua Berita</h1>
            </div>
        </div>
    </section>

    <section class="row no-sidebar justify-content-center" id="page-content">
        <div class="container">
            <div class="row">
                @foreach ($news as $new)
                    <div class="col-lg-4">
                        <div class="card p-0">
                            @if (isset($new->photo))
                                <img class="card-img-top" src="{{ $new->photo }}">
                            @else
                                <img class="card-img-top"
                                    src="https://png.pngtree.com/png-vector/20190115/ourlarge/pngtree-cartoon-character-hand-drawn-farmers-farmer-holding-rice-xiaoman-png-image_348097.jpg">
                            @endif
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $new->created_at)->format('d-m-Y') }}
                                    |
                                    {{ $new->views }} Views</h6>
                                <h5 class="card-title">{{ $new->title }}</h5>
                                <p class="card-text">{!! \Illuminate\Support\Str::words($new->content, 10, '...') !!}</p>
                                <div class="w-100 d-flex justify-content-end mt-5">
                                    <a href="/detail-news/{{ $new->id }}" class="btn btn-primary">Baca
                                        Selengkapnya...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-100 d-flex justify-content-center mt-4">
                {{ $news->links() }}
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
