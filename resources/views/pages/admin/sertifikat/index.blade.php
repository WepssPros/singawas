@extends('layouts.admin')

@section('admin-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Master Sertifikat Kendaraan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Sertifikat Kendaraan Page </li>
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
                        <h3 class="card-title">Database Sertifikat Kendaraan Singawas Tanjabtim</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nomor </th>
                                    <th>Inspektor</th>
                                    <th>Nomor Inspeksi</th>
                                    <th>Kendaraan Nopol</th>
                                    <th>Sertifikat Number</th>
                                    <th>Validasi Tanggal From</th>
                                    <th>Validasi Tanggal End</th>
                                    <th>Issued Dinas</th>
                                    <th>Verifikasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sertifikats as $index=>$sertifikat)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$sertifikat->inspektor->nama_inspektor}}</td>
                                    <td>{{$sertifikat->inspeksi->nomor_inspeksi}}</td>
                                    <td>{{$sertifikat->kendaraan->nopol}}</td>
                                    <td>{{$sertifikat->sertifikat_number}}</td>
                                    <td>{{$sertifikat->valid_from_date}}</td>
                                    <td>{{$sertifikat->valid_until_date}}</td>

                                    <td>{{$sertifikat->issued_by}}</td>
                                    <td>
                                        @if($sertifikat->verified)
                                        <span class="badge bg-success">
                                            <i class="fas fa-check"></i> Verified
                                        </span>
                                        @else
                                        <span class="badge bg-danger">
                                            <i class="fas fa-times"></i> Belum Verified
                                        </span>
                                        @endif
                                    </td>
                                    <th>
                                        <a href="{{ route('dashboard.sertifikat.edit', $sertifikat->id) }}"
                                            class="text-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('dashboard.sertifikat.show', $sertifikat->id) }}"
                                            class="text-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('dashboard.sertifikat.destroy', $sertifikat->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger" style="padding: 0;">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </th>
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