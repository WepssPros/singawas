@extends('layouts.frontend')

@section('title')

@endsection

@section('frontend-content')
<section class="hero" id="home">
    <div class="container">
        <h2 class="h1 hero-title">Sistem Informasi Pengawasan</h2>

        <p class="hero-text">
            MASA BERLAKU KENDARAAN LAIK JALAN SECARA ONLINE DI UPTD PENGUJIAN
            KENDARAAN BERMOTOR DINAS PERHUBUNGAN KABUPATEN TANJUNG JABUNG
            BARAT
        </p>

        <div class="btn-group">
            <a href="{{route('daftar-kendaraan')}}" class="btn btn-primary">Daftarkan Kendaraan</a>

            <a href="{{route('pengajuan-sertifikat')}}" class="btn btn-secondary">Ajukan Sertifikat</a>
        </div>
    </div>
</section>



<section class="tour-search">

    <div class="container">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <form action="{{ route('search.sertifikat') }}" method="POST" class="tour-search-form">
            @csrf
            <div class="input-wrapper">
                <label for="nopol" class="input-label">Cari Nomor Polisi*</label>
                <input type="text" name="nopol" id="nopol" required placeholder="Enter Nopol" class="input-field" />
            </div>

            <div class="input-wrapper">
                <label for="sertifikat_number" class="input-label">Nomor Sertifikat*</label>
                <input type="text" name="sertifikat_number" id="sertifikat_number" required
                    placeholder="Nomor Sertifikat" class="input-field" />
            </div>

            <div class="input-wrapper">
                <label for="valid_from_date" class="input-label">Masa Awal*</label>
                <input type="date" name="valid_from_date" id="valid_from_date" required placeholder="Nomor Sertifikat"
                    class="input-field" />
            </div>
            <div class="input-wrapper">
                <label for="valid_until_date" class="input-label">Masa Akhir*</label>
                <input type="date" name="valid_until_date" id="valid_until_date" required placeholder="Nomor Sertifikat"
                    class="input-field" />
            </div>

            <button type="submit" class="btn btn-secondary" id="">
                Check Sertifikat
            </button>



        </form>
    </div>
</section>

@isset($sertifikat)

<section class="certificate" id="certificate">
    <div class="printableArea">
        <div class="sim-container">
            <div class="sim-card">
                <!-- Isi dari div sim-card -->
                <div class="header-sim">
                    <h2>Lisensi Kendaraan</h2>
                </div>

                <div class="photo-sim">
                    <img src="{{ asset('../frontend/assets/images/logo.png') }}" alt="Photo" style="width: 100px;" />
                </div>

                <div class="info-sim">
                    <p><strong>No. Polisi:</strong> {{ $sertifikat->kendaraan->nopol }}</p>
                    <p><strong>No. Registrasi:</strong> {{ $sertifikat->kendaraan->nomor_registrasi }}</p>
                    <p><strong>Type :</strong> {{ $sertifikat->kendaraan->type }}</p>
                    <p><strong>Tahun Pembuatan:</strong> {{ $sertifikat->kendaraan->tahun_pembuatan }}</p>
                    <p><strong>Nama Pemilik :</strong> {{ $sertifikat->kendaraan->nama_owner }}</p>
                    <p>
                        <ion-icon class="verification-icon" name="checkmark-circle-outline"></ion-icon><span
                            class="verification-text">Terverifikasi</span>
                    </p>
                </div>

                <div class="footer-sim">
                    <p>© 2024 KANTOR UNIT PELAKSANA TEKNIS DINAS (UPTD)</p>
                </div>
            </div>
            <br><br>
            <div class="sertifikat-card">
                <div class="header-sim">
                    <h2>Sertifikat Laik Kendaraan</h2>
                </div>

                <div class="photo-sim">
                    <img src="{{ asset('../frontend/assets/images/logo.png') }}" alt="Photo" style="width: 100px;" />
                </div>

                <div class="info-sim">
                    <p><strong>Inspeksi Nomor:</strong> {{ $sertifikat->inspeksi->nomor_inspeksi }}</p>
                    <p><strong>Kendaraan PLAT / NOPOL:</strong> {{ $sertifikat->kendaraan->nopol }}</p>
                    <p><strong>No. Sertifikat:</strong> {{ $sertifikat->sertifikat_number }}</p>
                    <p><strong>Penerbit:</strong> {{ $sertifikat->issued_by }}</p>
                    <p><strong>Berlaku Sampai:</strong> {{ $sertifikat->valid_from_date }} -
                        {{ $sertifikat->valid_until_date }}
                    </p>
                    <p>
                        <ion-icon class="verification-icon" name="checkmark-circle-outline"></ion-icon><span
                            class="verification-text">Terverifikasi</span>
                    </p>
                </div>

                <div class="footer-sim">
                    <p>© 2024 KANTOR UNIT PELAKSANA TEKNIS DINAS (UPTD)</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="package">
    <button id="print" class="btn btn-primary btn-print" type="button">
        <span><i class="fa fa-print"></i> Print / CETAK </span>
    </button>
</div>


@else
<section class="popular" id="destination">
    <div class="container">
        <p class="section-subtitle">Kesalahan Dalam Penginputan</p>

        <h4 class="h2 section-title">Kendaraan Atau Sertifikat Belum Ada</h4>
        <button type="submit" class="btn btn-primary">Kembali</button>
    </div>
</section>
@endisset



{{--
<section class="popular" id="destination">
    <div class="container">
        <p class="section-subtitle">Uncover place</p>

        <h2 class="h2 section-title">Popular destination</h2>

        <p class="section-text">
            Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec
            nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia
            tenetur, aptent.
        </p>

        <ul class="popular-list">
            <li>
                <div class="popular-card">
                    <figure class="card-img">
                        <img src="{{asset('../frontend/assets/images/popular-1.jpg')}}" alt="San miguel, italy"
loading="lazy" />
</figure>

<div class="card-content">
    <div class="card-rating">
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
    </div>

    <p class="card-subtitle">
        <a href="#">Italy</a>
    </p>

    <h3 class="h3 card-title">
        <a href="#">San miguel</a>
    </h3>

    <p class="card-text">
        Fusce hic augue velit wisi ips quibusdam pariatur, iusto.
    </p>
</div>
</div>
</li>

<li>
    <div class="popular-card">
        <figure class="card-img">
            <img src="{{asset('../frontend/assets/images/popular-2.jpg')}}" alt="Burj khalifa, dubai" loading="lazy" />
        </figure>

        <div class="card-content">
            <div class="card-rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>

            <p class="card-subtitle">
                <a href="#">Dubai</a>
            </p>

            <h3 class="h3 card-title">
                <a href="#">Burj khalifa</a>
            </h3>

            <p class="card-text">
                Fusce hic augue velit wisi ips quibusdam pariatur, iusto.
            </p>
        </div>
    </div>
</li>

<li>
    <div class="popular-card">
        <figure class="card-img">
            <img src="{{asset('../frontend/assets/images/popular-3.jpg')}}" alt="Kyoto temple, japan" loading="lazy" />
        </figure>

        <div class="card-content">
            <div class="card-rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>

            <p class="card-subtitle">
                <a href="#">Japan</a>
            </p>

            <h3 class="h3 card-title">
                <a href="#">Kyoto temple</a>
            </h3>

            <p class="card-text">
                Fusce hic augue velit wisi ips quibusdam pariatur, iusto.
            </p>
        </div>
    </div>
</li>
</ul>

<button class="btn btn-primary">More destintion</button>
</div>
</section>


<section class="package" id="package">
    <div class="container">
        <p class="section-subtitle">Popular Packeges</p>

        <h2 class="h2 section-title">Checkout Our Packeges</h2>

        <p class="section-text">
            Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec
            nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia
            tenetur, aptent.
        </p>

        <ul class="package-list">
            <li>
                <div class="package-card">
                    <figure class="card-banner">
                        <img src="{{asset('../frontend/assets/images/packege-1.jpg')}}"
                            alt="Experience The Great Holiday On Beach" loading="lazy" />
                    </figure>

                    <div class="card-content">
                        <h3 class="h3 card-title">
                            Experience The Great Holiday On Beach
                        </h3>

                        <p class="card-text">
                            Laoreet, voluptatum nihil dolor esse quaerat mattis
                            explicabo maiores, est aliquet porttitor! Eaque, cras,
                            aspernatur.
                        </p>

                        <ul class="card-meta-list">
                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <ion-icon name="time"></ion-icon>

                                    <p class="text">7D/6N</p>
                                </div>
                            </li>

                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <ion-icon name="people"></ion-icon>

                                    <p class="text">pax: 10</p>
                                </div>
                            </li>

                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <ion-icon name="location"></ion-icon>

                                    <p class="text">Malaysia</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="card-price">
                        <div class="wrapper">
                            <p class="reviews">(25 reviews)</p>

                            <div class="card-rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>
                        </div>

                        <p class="price">
                            $750
                            <span>/ per person</span>
                        </p>

                        <button class="btn btn-secondary">Book Now</button>
                    </div>
                </div>
            </li>

            <li>
                <div class="package-card">
                    <figure class="card-banner">
                        <img src="{{asset('../frontend/assets/images/packege-2.jpg')}}"
                            alt="Summer Holiday To The Oxolotan River" loading="lazy" />
                    </figure>

                    <div class="card-content">
                        <h3 class="h3 card-title">
                            Summer Holiday To The Oxolotan River
                        </h3>

                        <p class="card-text">
                            Laoreet, voluptatum nihil dolor esse quaerat mattis
                            explicabo maiores, est aliquet porttitor! Eaque, cras,
                            aspernatur.
                        </p>

                        <ul class="card-meta-list">
                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <ion-icon name="time"></ion-icon>

                                    <p class="text">7D/6N</p>
                                </div>
                            </li>

                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <ion-icon name="people"></ion-icon>

                                    <p class="text">pax: 10</p>
                                </div>
                            </li>

                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <ion-icon name="location"></ion-icon>

                                    <p class="text">Malaysia</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="card-price">
                        <div class="wrapper">
                            <p class="reviews">(20 reviews)</p>

                            <div class="card-rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>
                        </div>

                        <p class="price">
                            $520
                            <span>/ per person</span>
                        </p>

                        <button class="btn btn-secondary">Book Now</button>
                    </div>
                </div>
            </li>

            <li>
                <div class="package-card">
                    <figure class="card-banner">
                        <img src="{{asset('../frontend/assets/images/packege-3.jpg')}}"
                            alt="Santorini Island's Weekend Vacation" loading="lazy" />
                    </figure>

                    <div class="card-content">
                        <h3 class="h3 card-title">
                            Santorini Island's Weekend Vacation
                        </h3>

                        <p class="card-text">
                            Laoreet, voluptatum nihil dolor esse quaerat mattis
                            explicabo maiores, est aliquet porttitor! Eaque, cras,
                            aspernatur.
                        </p>

                        <ul class="card-meta-list">
                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <ion-icon name="time"></ion-icon>

                                    <p class="text">7D/6N</p>
                                </div>
                            </li>

                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <ion-icon name="people"></ion-icon>

                                    <p class="text">pax: 10</p>
                                </div>
                            </li>

                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <ion-icon name="location"></ion-icon>

                                    <p class="text">Malaysia</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="card-price">
                        <div class="wrapper">
                            <p class="reviews">(40 reviews)</p>

                            <div class="card-rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>
                        </div>

                        <p class="price">
                            $660
                            <span>/ per person</span>
                        </p>

                        <button class="btn btn-secondary">Book Now</button>
                    </div>
                </div>
            </li>
        </ul>

        <button class="btn btn-primary">View All Packages</button>
    </div>
</section>


<section class="gallery" id="gallery">
    <div class="container">
        <p class="section-subtitle">Photo Gallery</p>

        <h2 class="h2 section-title">Photo's From Travellers</h2>

        <p class="section-text">
            Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec
            nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia
            tenetur, aptent.
        </p>

        <ul class="gallery-list">
            <li class="gallery-item">
                <figure class="gallery-image">
                    <img src="{{asset('../frontend/assets/images/gallery-1.jpg')}}" alt="Gallery image" />
                </figure>
            </li>

            <li class="gallery-item">
                <figure class="gallery-image">
                    <img src="{{asset('../frontend/assets/images/gallery-2.jpg')}}" alt="Gallery image" />
                </figure>
            </li>

            <li class="gallery-item">
                <figure class="gallery-image">
                    <img src="{{asset('../frontend/assets/images/gallery-3.jpg')}}" alt="Gallery image" />
                </figure>
            </li>

            <li class="gallery-item">
                <figure class="gallery-image">
                    <img src="{{asset('../frontend/assets/images/gallery-4.jpg')}}" alt="Gallery image" />
                </figure>
            </li>

            <li class="gallery-item">
                <figure class="gallery-image">
                    <img src="{{asset('../frontend/assets/images/gallery-5.jpg')}}" alt="Gallery image" />
                </figure>
            </li>
        </ul>
    </div>
</section> --}}



<section class="cta" id="contact">
    <div class="container">
        <div class="cta-content">
            <p class="section-subtitle">Call To Action</p>

            <h2 class="h2 section-title">
                Ready For Unforgatable Travel. Remember Us!
            </h2>

            <p class="section-text">
                Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec
                nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia
                tenetur, aptent.
            </p>
        </div>

        <button class="btn btn-secondary">Contact Us !</button>
    </div>
</section>


@endsection