@extends('layouts.main')
@section('style')
@endsection
{{-- @dd($news) --}}
@section('content')
    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-fade="true">


        <div class="slide kenburns" data-bg-image="/assets/images/home/main-banner/ramadhani-rafid-XMSUfFloaHU-unsplash.webp">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-left text-light">

                    <h1>Si-Benih</h1>
                    <p class="text-small">
                        Sistem Informasi Sarana & Prasarana Perbenihan
                    </p>
                    <div><a href="#welcome" class="btn btn-light scroll-to">Kontak Kami</a></div>

                </div>
            </div>
        </div>

        <div class="slide kenburns"
            data-bg-image="/assets/images/home/main-banner/afif-ramdhasuma-pG-Ajs3q0Co-unsplash.webp">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">

                    <h1>Si-Benih</h1>
                    <p>
                        Sistem Informasi Sarana & Prasarana Perbenihan
                    </p>
                    <div><a href="#welcome" class="btn btn-light scroll-to">Kontak Kami</a></div>
                    </span>

                </div>
            </div>
        </div>

    </div>

    <section id="welcome" class="p-b-0">
        <div class="container">
            <div class="heading-text heading-section text-center m-b-40" data-animate="fadeInUp">
                <h2>Selamat Datang di Halaman Si-Benih</h2>
                <!-- <span class="lead">Create amam ipsum dolor sit amet, Beautiful nature, and rare feathers!.</span> -->
            </div>
            <div class="row" data-animate="fadeInUp">
                <div class="col-lg-12">
                    <img class="img-fluid" src="/assets/images/home/responsive-1.png" alt="Welcome to POLO">
                </div>
            </div>
        </div>
    </section>

    <section class="background-grey">
        <div class="container">
            <div class="heading-text heading-section text-center">
                <h2>LAYANAN KAMI</h2>
                <!-- <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p> -->
            </div>
            <div class="row">
                <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="0">
                    <div class="icon-box effect medium border small d-flex align-items-center">
                        <div class="icon">
                            <a href="#"><i class="fa fa-landmark"></i></a>
                        </div>
                        <h3>BPSBTH SUMSEL</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p> -->
                    </div>
                </div>
                <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="200">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-info-circle"></i></a>
                        </div>
                        <h3>Informasi</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p> -->
                    </div>
                </div>
                <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="400">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                        <h3>Link Terkait</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p> -->
                    </div>
                </div>
                <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="600">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fas fa-download"></i></a>
                        </div>
                        <h3>Download</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p> -->
                    </div>
                </div>
                <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="800">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#"><i class="fa fa-database"></i></a>
                        </div>
                        <h3>Database</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p> -->
                    </div>
                </div>
                <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="1000">
                    <div class="icon-box effect medium border small">
                        <div class="icon">
                            <a href="#">
                                <i class="fa fa-images"></i>
                            </a>
                        </div>
                        <h3>Galeri</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="p-b-35">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>BERITA PERTANIAN SUMSEL</h2>
                <div class="carousel" data-items="3">

                    @foreach ($news as $new)
                        <div class="post-item border">
                            <div class="post-item-wrap">
                                <div class="post-image">
                                    <a href="/detail-news/{{ $new->id }}">
                                        @if (isset($new->photo))
                                            <img src="{{ $new->photo }}" style="height: 240px; object-fit: cover">
                                        @else
                                            <img src="https://png.pngtree.com/png-vector/20190115/ourlarge/pngtree-cartoon-character-hand-drawn-farmers-farmer-holding-rice-xiaoman-png-image_348097.jpg"
                                                style="height: 240px; object-fit: cover">
                                        @endif
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <span class="post-meta-date"><i
                                            class="fa fa-calendar-o"></i>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $new->created_at)->format('d-m-Y') }}</span>
                                    <span class="post-meta-comments"><a href=""><i
                                                class="fa fa-comments-o"></i>{{ $new->views }}
                                            Views</a></span>
                                    <h2 style="line-height: 14px; text-decoration: none">
                                        <a href="/detail-news/{{ $new->id }}">
                                            {{ $new->title }}
                                        </a>
                                    </h2>
                                    <a href="/detail-news/{{ $new->id }}" class="item-link">Selengkapnya <i
                                            class="icon-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>

    <section class="p-b-35 background-grey">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>OPINI</h2>
                <div class="carousel" data-items="3">

                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src="/assets/images/blog/c-001.jpeg"
                                        style="height: 240px; object-fit: cover">
                                </a>
                                {{--                                    <span class="post-meta-category"><a href="">Lifestyle</a></span> --}}
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>17 Agustus 2022</span>
                                <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33
                                        Views</a></span>
                                <h2 style="line-height: 14px; text-decoration: none">
                                    <a href="#">
                                        Alsintan Modern, Solusi Terkini Peningkatan Hasil Dan Mutu Panen
                                    </a>
                                </h2>
                                <a href="#" class="item-link">Selengkapnya <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src="/assets/images/blog/c-002.jpeg"
                                        style="height: 240px; object-fit: cover">
                                </a>
                                {{--                                    <span class="post-meta-category"><a href="">Science</a></span> --}}
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>17 Agustus 2022</span>
                                <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33
                                        Views</a></span>
                                <h2 style="line-height: 14px; text-decoration: none">
                                    <a href="#">
                                        Lahat Menjadi Kabupaten Pertama Yang Mengembangkan Perbenihan Kacang Tanah
                                    </a>
                                </h2>
                                <a href="#" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src="/assets/images/blog/c-003.jpeg"
                                        style="height: 240px; object-fit: cover">
                                </a>
                                {{--                                    <span class="post-meta-category"><a href="">Lifestyle</a></span> --}}
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>17 Agustus 2022</span>
                                <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33
                                        Views</a></span>
                                <h2 style="line-height: 14px; text-decoration: none">
                                    <a href="#">
                                        Direktorat Perbenihan Hortikultura Jajaki Kerjasama Produksi Benih Pisang Dengan
                                        Produsen
                                    </a>
                                </h2>
                                <a href="#" class="item-link">Selengkapnya <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section class="p-b-0">
        <div class="container">
            <div class="heading-text heading-section">
                <h2>GALERI FOTO KEGIATAN</h2>
                <!-- <span class="lead">Lorem ipsum dolor sit amet, coper suscipit lobortis nisl ut aliquip ex ea commodo
                                consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto.</span> -->
            </div>
        </div>
        <div class="portfolio">

            <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0">

                <div class="portfolio-item no-overlay ct-photography ct-media ct-branding ct-Media ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-slider">
                            <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true"
                                data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut"
                                data-autoplay="1500">
                                <a href="#"><img src="/assets/images/blog/d-001.jpg" alt=""></a>
                                <a href="#"><img src="/assets/images/blog/d-003.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="/assets/images/blog/d-002.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a title="Paper Pouch!" data-lightbox="image" href="/assets/images/blog/d-002.jpg"><i
                                    class="icon-maximize"></i></a>
                            <a href="portfolio-page-grid-gallery.html"><i class="icon-link"></i></a>
                        </div>
                    </div>
                </div>


                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="/assets/images/blog/d-003.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Let's Go Outside</h3>
                                <span>Illustrations / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="/assets/images/blog/d-004.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description" data-lightbox="gallery">
                            <a title="Photoshop Mock-up!" data-lightbox="gallery-image"
                                href="/assets/images/blog/d-001"><i class="icon-copy"></i></a>
                            <a title="Paper Pouch!" data-lightbox="gallery-image" href="/assets/images/blog/d-004"
                                class="hidden"></a>
                            <a title="Mock-up" data-lightbox="gallery-image" href="/assets/images/blog/d-008"
                                class="hidden"></a>
                            <a href="portfolio-page-grid-gallery.html"><i class="icon-link"></i></a>
                        </div>
                    </div>
                </div>


                <div class="portfolio-item img-zoom ct-marketing ct-media ct-branding ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="/assets/images/blog/d-005.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Last Iceland Sunshine</h3>
                                <span>Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="/assets/images/blog/d-006.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a title="Paper Pouch!" data-lightbox="iframe"
                                href="https://www.youtube.com/watch?v=k6Kly58LYzY"><i class="icon-play"></i></a>
                            <a href="portfolio-page-grid-gallery.html"><i class="icon-link"></i></a>
                        </div>
                    </div>
                </div>


                <div
                    class="portfolio-item no-overlay ct-photography ct-media ct-branding ct-Media ct-marketing ct-webdesign">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-slider">
                            <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true"
                                data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut"
                                data-autoplay="1500">
                                <a href="#"><img src="/assets/images/blog/d-007.jpg" alt=""></a>
                                <a href="#"><img src="/assets/images/blog/d-002.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="/assets/images/blog/d-008.jpg" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Luxury Wine</h3>
                                <span>Graphics / Branding</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
