 <!-- Header -->
 <header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light">
     <div class="header-inner">
         <div class="container">

             <a href="#" id="logo">
                 <img src="http://localhost:8000/assets/images/logo/logo.png" alt="" style="height: 65px" />
             </a>


             <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                 <form class="search-form" action="search-results-page.html" method="get">
                     <input class="form-control" name="q" type="text" placeholder="Apa yang ingin anda cari?" style="width: 480px"/>
                     <span class="text-muted">Mulai mengetik & tekan "Enter" atau "ESC" untuk menutup</span>
                 </form>
             </div>


             <div class="header-extras">
                 <ul>
                     <li>
                         <a id="btn-search" href="#"> <i class="icon-search"></i></a>
                     </li>
                     <li class="d-none">
                         <div class="p-dropdown">
                             <a href="#"><i class="icon-globe"></i><span>EN</span></a>
                             <ul class="p-dropdown-content">
                                 <li><a href="#">French</a></li>
                                 <li><a href="#">Spanish</a></li>
                                 <li><a href="#">English</a></li>
                             </ul>
                         </div>
                     </li>
                 </ul>
             </div>


             <div id="mainMenu-trigger">
                 <a class="lines-button x"><span class="lines"></span></a>
             </div>


             <div id="mainMenu">
                 <div class="container">
                     <nav>
                         <ul>
                             <li><a href="{{ route('root') }}">Home</a></li>
                             <li class="dropdown"><a href="#">BPSBTPH SUMSEL</a>
                                 <ul class="dropdown-menu">
                                     <li><a href="{{ route('BpsbtphSumsel.ProsedurPelayanan') }}">Prosedur Pelayanan</a></li>
                                     <li><a href="#">Info Umum</a></li>
                                     <li><a href="#">Roadmap UPTD BPSB TPH</a></li>
                                     <li><a href="#">Informasi Layanan</a></li>
                                 </ul>
                             </li>
                             <li class="dropdown"><a href="#">INFO UPDATE</a>
                                 <ul class="dropdown-menu">
                                     <li><a href="#">Berita Pertanian Nasional</a></li>
                                     <li><a href="#">Berita Pertanian Sumsel</a></li>
                                     <li><a href="#">Opini Pertanian</a></li>
                                     <li><a href="#">Esai Pertanian</a></li>
                                     <li><a href="#">Berita Pertanian Sumsel</a></li>
                                     <li><a href="#">Artikel</a></li>
                                     <li><a href="#">Berita Foto</a></li>
                                     <li><a href="#">Profile Petani</a></li>
                                     <li><a href="#">Banner Info</a></li>
                                 </ul>
                             </li>
                             <li class="dropdown"><a href="#">INFO PERBENIHAN</a>
                                 <ul class="dropdown-menu">
                                     <li><a href="{{ route('InfoPerbenihan.KetersediaanBenih') }}">Ketersediaan Benih</a></li>
                                     <li><a href="{{ route('InfoPerbenihan.LapPenyaluranBenih') }}">Laporan Penyaluran Benih</a></li>
                                     <li><a href="{{ route('InfoPerbenihan.LapProduksiBenih') }}">Laporan Produksi Benih</a></li>
                                 </ul>
                             </li>
                             <li class="dropdown"><a href="#">GALERI</a>
                                 <ul class="dropdown-menu">
                                     <li><a href="#">Foto Kegiatan</a></li>
                                     <li><a href="#">Video Kegiatan</a></li>
                                 </ul>
                             </li>
                             <li><a href="#">LINK</a></li>
                             <li><a href="#">DOWNLOAD</a></li>
                             <li><a href="#">DATABASE</a></li>
                         </ul>
                     </nav>
                 </div>
             </div>

         </div>
     </div>
 </header>
 <!-- end: Header -->
