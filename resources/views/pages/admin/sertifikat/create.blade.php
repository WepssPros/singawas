@extends('layouts.admin')

@section('admin-header')

@endsection

@section('admin-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Buat Data Sertifikasi Kendaraan Laik Jalan</h3>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('dashboard.sertifikat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                    id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Data Tujuan Sertifikasi Kendaraan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                                    id="information-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Sertifikat Number Dan Validasi Tanggal Berlaku</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part-1">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part-1"
                                    id="information-part-1-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Verifikasi & Penerbit Sertifikasi</span>
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
                                        <option value="{{$kendaraan->id}}">NOPOL :{{$kendaraan->nopol}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inspektor_id"> Pilih Inspektor Inspeksi</label>
                                    <select name="inspektor_id" id="inspektor_id" class="form-control">
                                        <option value="">Pilih Inspektor Inspeksi</option>
                                        @foreach ($inspektors as $inspektor)
                                        <option value="{{$inspektor->id}}">Inspektor : {{$inspektor->nama_inspektor}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inspeksi_id"> Pilih Data Inspeksi</label>
                                    <select name="inspeksi_id" id="inspeksi_id" class="form-control">
                                        <option value="">Pilih Data Nomor Inspeksi</option>
                                        @foreach ($inspeksis as $inspeksi)
                                        <option value="{{$inspeksi->id}}">NOMOR INSPEKSI: {{$inspeksi->nomor_inspeksi}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>
                            <div id="information-part" class="content" role="tabpanel"
                                aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <label for="sertifikat_number">Nomor Sertifikat *Generate Dulu Number
                                        Sertifikatnya</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sertifikat_number"
                                            name="sertifikat_number" readonly>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary"
                                                onclick="generateNomorSertifikat()">Generate</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="valid_from_date">Validasi Tanggal Berlaku</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="date" class="form-control" name="valid_from_date"
                                                id="valid_from_date" required>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="valid_until_date">Validasi Tanggal Berakhir</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="date" class="form-control" name="valid_until_date"
                                                id="valid_until_date" required>
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
                                    <label for="issued_by">Issued By Dinas</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="text" class="form-control" name="issued_by" id="issued_by"
                                                value="KANTOR UNIT PELAKSANA TEKNIS DINAS (UPTD)" required>
                                        </div>

                                    </div>
                                </div>
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
    function generateNomorSertifikat() {
        // Fungsi untuk menghasilkan nomor sertifikat acak
        function getRandomPart() {
            return Math.floor(1000 + Math.random() * 9000).toString();
        }

        const part1 = getRandomPart();
        const part2 = getRandomPart();
        const part3 = getRandomPart();

        const nomorSertifikat = `${part1} - ${part2} - ${part3}`;

        // Set nilai ke input nomor sertifikat
        document.getElementById('sertifikat_number').value = nomorSertifikat;
    }
</script>
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