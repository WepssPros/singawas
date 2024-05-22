@extends('layouts.frontend')

@section('title')

@endsection

@section('frontend-content')
<section class="hero" id="home">
    <div class="container">
        <h2 class="h1 hero-title">Daftarkan Kendaraan Anda </h2>

        <p class="hero-text">
            DIBAWAH INI BERUPA FORM PENGISIAN DATA KENDARAAN ANDA & ADMIN AKAN MEMVERIFIKASI KENDARAAN ANDA
        </p>

        <div class="btn-group">
            <a href="{{route('index')}}" class="btn btn-primary">Kembali Kemenu Awal</a>


        </div>
    </div>
</section>

<section class="tour-search">
    <div class="container">
        <form action="{{route('store.kendaraan')}}" method="post" class="tour-search-form"
            enctype="multipart/form-data">
            @csrf
            <div class="input-wrapper">
                <label for="nopol" class="input-label">Masukan Nomor Polisi*</label>

                <input type="text" name="nopol" id="nopol" required placeholder="Enter Nopol" class="input-field" />
            </div>

            <div class="input-wrapper">
                <label for="brand_kendaraan" class="input-label">Masukan Brand Kendaraan*</label>

                <input type="text" name="brand_kendaraan" id="brand_kendaraan" required placeholder="Brand Kendaraan"
                    class="input-field" />
            </div>
            <div class="input-wrapper">
                <label for="type" class="input-label">Masukan Type Kendaraan*</label>

                <input type="text" name="type" id="type" required placeholder="Tipe Kendaraan" class="input-field" />
            </div>
            <div class="input-wrapper">
                <label for="tahun_pembuatan" class="input-label">Tahun Pembuatan*</label>

                <input type="date" name="tahun_pembuatan" id="tahun_pembuatan" required placeholder="Tahun Pembuatan"
                    class="input-field" />
            </div>

            <div class="input-wrapper">
                <label for="nama_owner" class="input-label">Tahun Pembuatan*</label>

                <input type="text" name="nama_owner" id="nama_owner" required placeholder="Nama Owner / Pemilik"
                    class="input-field" />
            </div>

            <div class="input-wrapper">
                <label for="alamat_owner" class="input-label">Tahun Pembuatan*</label>

                <input type="text" name="alamat_owner" id="alamat_owner" required placeholder="Alamat Owner / Pemilik"
                    class="input-field" />
            </div>
            <div class="input-wrapper">
                <label for="nomorhp_owner" class="input-label">Tahun Pembuatan*</label>

                <input type="number" name="nomorhp_owner" id="nomorhp_owner" required
                    placeholder="Nomor Hp Owner / Pemilik" class="input-field" />
            </div>




            <button type="submit" class="btn btn-secondary">
                Daftarkan Kendaraan Anda
            </button>
        </form>
    </div>
</section>


@endsection