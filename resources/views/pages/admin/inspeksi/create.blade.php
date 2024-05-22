@extends('layouts.admin')

@section('admin-header')

@endsection

@section('admin-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Data Inspeksi</h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.inspeksi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                    id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Data Inspeksi Kendaraan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                                    id="information-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Bukti Inspeksi</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part-1">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part-1"
                                    id="information-part-1-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Verifikasi</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group">
                                    <label for="kendaraan_id"> Pilih Kendaraan Yang Ingin Di Inspeksi</label>
                                    <select name="kendaraan_id" id="kendaraan_id" class="form-control">
                                        <option value="">Pilih Kendaraan Yang Ingin Di Inspeksi</option>
                                        @foreach ($kendaraans as $kendaraan)

                                        <option value="{{$kendaraan->id}}">{{$kendaraan->nopol}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_inspeksi">Tanggal Inspeksi Kendaraan</label>
                                    <input type="date" class="form-control" name="tanggal_inspeksi"
                                        id="tanggal_inspeksi" placeholder="Tanggal Inspeksi" required>
                                </div>

                                <div class="form-group">
                                    <label for="hasil_inspeksi">Hasil Inspeksi</label>
                                    <textarea name="hasil_inspeksi" id="hasil_inspeksi" cols="30" rows="10"></textarea>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>
                            <div id="information-part" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <label for="bukti_foto1">Bukti Foto Pertama</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="bukti_foto1"
                                                id="bukti_foto1" required>
                                            <label class="custom-file-label" for="bukti_foto1">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bukti_foto2">Bukti Foto Kedua</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="bukti_foto2"
                                                id="bukti_foto2" required>
                                            <label class="custom-file-label" for="bukti_foto2">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bukti_foto3">Bukti Foto Ketiga</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="bukti_foto3"
                                                id="bukti_foto3" required>
                                            <label class="custom-file-label" for="bukti_foto3">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>
                            <div id="information-part-1" class="content" role="tabpanel"
                                aria-labelledby="information-part-1-trigger">
                                <div class="form-group">
                                    <input type="hidden" name="verified" value="0">
                                    <div class="custom-control custom-switch">
                                        <input name="verified" type="checkbox" class="custom-control-input"
                                            id="verifiedToggle" value="1" onchange="toggleVerification(this)">
                                        <label class="custom-control-label" for="verifiedToggle">Verifikasi</label>
                                    </div>
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
    function toggleVerification(checkbox) {
    // Ubah nilai verified berdasarkan status tombol switch
    var verifiedValue = checkbox.checked ? '1' : '0';
    // Update nilai input hidden atau kirim nilai ke server
    document.getElementById('verified').value = verifiedValue;
    
    // Opsional: tambahkan logika untuk menangani tindakan lainnya setelah toggle
}
    
    // Opsional: tambahkan logika untuk menangani tindakan lainnya setelah toggle
}
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the stepper
        window.stepper = new Stepper(document.querySelector('.bs-stepper'));

        // Update the custom file input label
        document.querySelectorAll('.custom-file-input').forEach(function(input) {
            input.addEventListener('change', function(e) {
                var fileName = e.target.files[0] ? e.target.files[0].name : "Choose file";
                var nextSibling = e.target.nextElementSibling;
                nextSibling.innerText = fileName;
            });
        });
    });
</script>
// Update the label of the custom file input with the selected file name
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    // Inisialisasi CKEditor pada textarea dengan ID 'hasil_inspeksi'
        CKEDITOR.replace('hasil_inspeksi');
</script>

@endsection

@endsection