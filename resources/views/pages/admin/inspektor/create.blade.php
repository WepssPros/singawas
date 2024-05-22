@extends('layouts.admin')

@section('admin-header')

@endsection

@section('admin-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Data Inspektor</h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.inspektor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                    id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Inpekstor Terdata</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                                    id="information-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Data Lengkap</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label for="user_id"> Pilih User Terdata</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">Pilih User Terdata</option>
                                        @foreach ($users as $user)

                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_inspektor">Nama Inspektor</label>
                                    <input type="text" class="form-control" name="nama_inspektor" id="nama_inspektor"
                                        placeholder="Nama Inspektor" required>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>
                            <div id="information-part" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <label for="foto_inspektor">Foto Inspektor</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto_inspektor"
                                                id="foto_inspektor" required>
                                            <label class="custom-file-label" for="foto_inspektor">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No HP</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No HP"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="posisi_jabatan">Posisi Jabatan</label>
                                    <select name="posisi_jabatan" id="posisi_jabatan" class="form-control">
                                        <option value="">Pilih Posisi Jabatan Inspektor</option>
                                        <option value="Kepala Inspektor">Kepala Inspektor</option>
                                        <option value="Staff Ahli">Staff Ahli</option>
                                        <option value="Staff Biasa">Staff Biasa</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>


@section('js-script')
<script>
    // Update the label of the custom file input with the selected file name
document.querySelector('.custom-file-input').addEventListener('change', function(e) {
var fileName = document.getElementById("foto_inspektor").files[0].name;
var nextSibling = e.target.nextElementSibling
nextSibling.innerText = fileName
});

document.addEventListener('DOMContentLoaded', function () {
window.stepper = new Stepper(document.querySelector('.bs-stepper'))
})
</script>

@endsection

@endsection