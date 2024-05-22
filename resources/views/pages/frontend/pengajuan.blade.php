@extends('layouts.frontend')

@section('title')

@endsection

@section('frontend-content')
<section class="hero" id="home">
    <div class="container">
        <h2 class="h1 hero-title">Pengajuan Sertifikat Kendaraan Anda </h2>

        <p class="hero-text">
            DIBAWAH INI BERUPA FORM PENGISIAN DATA PENGAJUAN SERTIFIKAT ANDA & ADMIN AKAN MEMVERIFIKASI SERTIFIKAT
        </p>

        <div class="btn-group">
            <a href="{{route('index')}}" class="btn btn-primary">Kembali Kemenu Awal</a>


        </div>
    </div>
</section>

<section class="tour-search">
    <div class="container">
        <form action="{{route('store.pengajuan')}}" method="post" class="tour-search-form"
            enctype="multipart/form-data">
            @csrf
            <div class="input-wrapper">
                <label for="nopol_terdaftar" class="input-label">Masukan Nomor Polisi Terdaftar*</label>

                <input type="text" name="nopol_terdaftar" id="nopol_terdaftar" required
                    placeholder="Enter Nopol Terdata" class="input-field" />
            </div>

            <div class="input-wrapper">
                <label for="nomor_inspeksi" class="input-label">Masukan Nomor Inspeksi Kendaraan*</label>

                <input type="text" name="nomor_inspeksi" id="nomor_inspeksi" required placeholder="Nomor Inspeksi"
                    class="input-field" />
            </div>

            <div class="input-wrapper">
                <label for="nomor_registrasi_kendaraan" class="input-label">Nomor Regesrasi Kendaraan*</label>

                <input type="text" name="nomor_registrasi_kendaraan" id="nomor_registrasi_kendaraan" required
                    placeholder="Nomor Registrasi Kendaraan" class="input-field" />
            </div>




            <button type="submit" class="btn btn-secondary">
                Ajukan Sertifikat
            </button>
        </form>
    </div>
</section>


@endsection