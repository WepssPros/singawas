@extends('layouts.admin')

@section('admin-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan Inspeksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Inspeksi Page </li>
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
                        <h3 class="card-title">Database Inspeksi Singawas Tanjabtim</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nomor </th>

                                    <th>(BH) Nopol</th>
                                    <th>Nomor Inpskesi</th>
                                    <th>Type Kendaraan</th>
                                    <th>Tanggal Inspeksi</th>
                                    <th>Hasil Inspeksi</th>
                                    <th>Bukti Foto inspeksi</th>
                                    <th>Bukti Foto inspeksi </th>
                                    <th>Bukti Foto inspeksi</th>
                                    <th>Verifikasi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inspeksis as $index=>$inspeksi)
                                <tr>
                                    <td>{{$index+1}}</td>

                                    <td>{{$inspeksi->kendaraan->nopol}}</td>
                                    <td>{{$inspeksi->nomor_inspeksi}}</td>
                                    <td>{{$inspeksi->kendaraan->type}}</td>
                                    <td>{{$inspeksi->tanggal_inspeksi}}</td>
                                    <td>{!! $inspeksi->hasil_inspeksi !!}</td>
                                    <td>
                                        @if($inspeksi->buktiFoto1Url)
                                        <a href="{{ $inspeksi->buktiFoto1Url }}" target="_blank">
                                            <img src="{{ $inspeksi->buktiFoto1Url }}" alt="Foto 1"
                                                style="max-width: 100px;">
                                        </a>
                                        @else
                                        No Image
                                        @endif
                                    </td>
                                    <td>
                                        @if($inspeksi->buktiFoto2Url)
                                        <a href="{{ $inspeksi->buktiFoto2Url }}" target="_blank">
                                            <img src="{{ $inspeksi->buktiFoto2Url }}" alt="Foto 2"
                                                style="max-width: 100px;">
                                        </a>
                                        @else
                                        No Image
                                        @endif
                                    </td>
                                    <td>
                                        @if($inspeksi->buktiFoto3Url)
                                        <a href="{{ $inspeksi->buktiFoto3Url }}" target="_blank">
                                            <img src="{{ $inspeksi->buktiFoto3Url }}" alt="Foto 3"
                                                style="max-width: 100px;">
                                        </a>
                                        @else
                                        No Image
                                        @endif
                                    </td>
                                    <td>
                                        @if($inspeksi->verified)
                                        <span class="badge bg-success">
                                            <i class="fas fa-check"></i> Verified
                                        </span>
                                        @else
                                        <span class="badge bg-danger">
                                            <i class="fas fa-times"></i> Belum Verified
                                        </span>
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