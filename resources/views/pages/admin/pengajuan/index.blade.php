@extends('layouts.admin')

@section('admin-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pengajuan Sertifikat Kendaran Terdata</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pengajuan Sertifikat Terdata Page </li>
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
                                    <th>Nomor Inspeksi</th>
                                    <th>(BH) Nopol</th>
                                    <th>Nomor Registrasi Kendaraan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuans as $index=>$pengajuan)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$pengajuan->nomor_inspeksi}}</td>
                                    <td>{{$pengajuan->nopol_terdaftar}}</td>
                                    <td>{{$pengajuan->nomor_registrasi_kendaraan}}</td>

                                    <td>
                                        @if($pengajuan->status == "Di Terima")
                                        <span class="badge bg-success">
                                            <i class="fas fa-check"></i> Di Terima
                                        </span>
                                        @elseif($pengajuan->status == "Sedang Di Tinjau")
                                        <span class="badge bg-info">
                                            <i class="fas fa-check"></i> Sedang Di Tinjau
                                        </span>
                                        @else
                                        <span class="badge bg-danger">
                                            <i class="fas fa-times"></i> Belum Di Tinjau
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($pengajuan->status == "Sedang Di Tinjau")
                                        <form action="{{ route('dashboard.pengajuan.accept', $pengajuan->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success" title="Di Terima">
                                                <i class="fas fa-check-circle"></i> Di Terima
                                            </button>
                                        </form>
                                        @else

                                        <form action="{{ route('dashboard.pengajuan.unaccept', $pengajuan->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-info" title="Sedang Di Tinjau">
                                                <i class="fas fa-times-circle"></i> Sedang Di Tinjau
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