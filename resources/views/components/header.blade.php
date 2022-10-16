 <!-- Header -->
 <header id="header" data-transparent="true" data-fullwidth="true">
     <div class="header-inner">
         <div class="container">
             <!--Logo-->
             <div id="logo">
                 <a href="{{ route('root') }}">
                     <img src="{{ asset('assets/images/logo/logo.png') }}" class="logo-default">
                     <img src="{{ asset('assets/images/logo/logo.png') }}" class="logo-sticky">
                 </a>
             </div>
             <!--End: Logo-->
             <!--Navigation-->
             <div id="mainMenu">
                 <div class="container">
                     <nav>
                         <ul>
                             <li><a href="{{ route('root') }}">Beranda</a></li>
                             <li class="dropdown"><a href="#">Titik Lokasi</a>
                                 <ul class="dropdown-menu">
                                    <li><a href="{{ route('titik-lokasi-alsintan') }}">Titik Lokasi Alsintan</a></li>
                                    <li><a href="{{ route('titik-lokasi-lahan-baku-sawah') }}">Titik Lokasi Lahan Baku Sawah</a></li>
                                 </ul>
                             </li>
                             <li class="dropdown"><a href="#">Berita</a>
                                 <ul class="dropdown-menu">
                                    <li><a href="{{ route('alsintan') }}">Info Alsintan</a></li>
                                    <li><a href="{{ route('lbs') }}">Info Lahan Baku Sawah</a></li>
                                    <li><a href="{{ route('pupuk') }}">Info Pupuk</a></li>
                                    <li><a href="{{ route('air') }}">Info Air</a></li>
                                 </ul>
                             </li>
                             
                             <li class="dropdown"><a href="#">Laporan</a>
                                 <ul class="dropdown-menu">
                                    <li><a href="{{ route('alat.kegiatan') }}">Kegiatan Alat Berat</a></li>
                                    <li><a href="{{ route('alat.servis') }}">Servis Alat</a></li>
                                    <li><a href="{{ route('alat.hasil') }}">Hasil Menggunakan Alat</a></li>
                                 </ul>
                             </li>
                             <li><a href="{{ route('contact') }}">Kontak</a></li>
                         </ul>
                     </nav>
                 </div>
             </div>
             <!--end: Navigation-->
         </div>
     </div>
 </header>
 <!-- end: Header -->