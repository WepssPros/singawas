@extends('layouts.admin')

@section('admin-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Master Verifikasi Kendaran Terdata</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Verifikasi Kendaran Terdata Page </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Database Verifikasi Kendaran Terdata Singawas Tanjabtim</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nomor </th>
                                    <th>Nomor Registrasi</th>
                                    <th>(BH) Nopol</th>
                                    <th>Brand Kendaraan</th>
                                    <th>Type Kendaraan</th>
                                    <th>Tahun Pembuatan</th>
                                    <th>Nama Owner / Pemilik</th>
                                    <th>Alamat Owner </th>
                                    <th>Nomor Telepon</th>
                                    <th>Verifikasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kendaraans as $index=>$kendaraan)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$kendaraan->nomor_registrasi}}</td>
                                    <td>{{$kendaraan->nopol}}</td>
                                    <td>{{$kendaraan->brand_kendaraan}}</td>
                                    <td>{{$kendaraan->type}}</td>
                                    <td>{{$kendaraan->tahun_pembuatan}}</td>
                                    <td>{{$kendaraan->nama_owner}}</td>
                                    <td>{{$kendaraan->alamat_owner}}</td>
                                    <td>{{$kendaraan->nomorhp_owner}}</td>
                                    <td>
                                        @if($kendaraan->verified)
                                        <span class="badge bg-success">
                                            <i class="fas fa-check"></i> Verified
                                        </span>
                                        @else
                                        <span class="badge bg-danger">
                                            <i class="fas fa-times"></i> Belum Verified
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($kendaraan->verified)
                                        <form action="{{ route('dashboard.kendaraan.unverify', $kendaraan->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger" title="Unverify">
                                                <i class="fas fa-times-circle"></i> Unverify
                                            </button>
                                        </form>
                                        @else
                                        <form action="{{ route('dashboard.kendaraan.verify', $kendaraan->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success" title="Verify">
                                                <i class="fas fa-check-circle"></i> Verify
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection