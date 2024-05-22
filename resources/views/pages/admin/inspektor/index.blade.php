@extends('layouts.admin')

@section('admin-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Master Inspektor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Inspektor Page </li>
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
                        <h3 class="card-title">Database Inspektor Singawas Tanjabtim</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nomor </th>
                                    <th>Foto Inspektor</th>
                                    <th>Nama Inspektor</th>
                                    <th>Nomor Hp Inspektor</th>
                                    <th>Posisi Jabatan</th>
                                    <th>Verifikasi Dinas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inspektors as $index=>$inspektor)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>
                                        @if($inspektor->foto_inspektor)
                                        <a href="{{ $inspektor->foto_inspektor_url }}" target="_blank">
                                            <img src="{{ $inspektor->foto_inspektor_url }}" alt="Foto Inspektor"
                                                style="max-width: 100px;">
                                        </a>
                                        @else
                                        No Image
                                        @endif
                                    </td>
                                    <td>{{$inspektor->user->name}}</td>
                                    <td>{{$inspektor->no_hp}}</td>
                                    <td>{{$inspektor->posisi_jabatan}}</td>

                                    <td>

                                        <span class="badge bg-success">
                                            <i class="fas fa-check"></i> Verified
                                        </span>


                                    </td>
                                    <th>
                                        <a href="{{ route('dashboard.inspektor.edit', $inspektor->id) }}"
                                            class="text-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('dashboard.inspektor.show', $inspektor->id) }}"
                                            class="text-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('dashboard.inspektor.destroy', $inspektor->id) }}"
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