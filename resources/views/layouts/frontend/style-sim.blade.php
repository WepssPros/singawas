<style>
    .sim-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 35px;
        position: relative;
        /* Menjadikan posisi relatif untuk sim-container */
    }

    .sim-card {
        flex-basis: calc(35% - 20px);
        /* Lebar setengah dari container, dikurangi jarak antar sim card */
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .header-sim h2 {
        margin: 0;
        font-size: 18px;
    }

    .photo-sim {
        text-align: center;
    }

    .photo-sim img {
        width: 60px;
        /* Ukuran foto sim yang lebih kecil */
        border-radius: 50%;
    }

    .info-sim p {
        margin: 5px 0;
    }

    .footer-sim {
        margin-top: 20px;
        text-align: center;
        color: #6c757d;
    }

    .sertifikat-card {
        flex-basis: calc(65% - 20px);
        /* Lebar setengah dari container, dikurangi jarak antar sim card */
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .sertifikat-card .photo-sim img {
        width: 100px;
        /* Ukuran foto sertifikat yang lebih besar */
    }

    .background-image {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: -1;
        /* Mendeklarasikan gambar latar belakang di belakang */
        pointer-events: none;
        /* Memastikan gambar latar belakang tidak mempengaruhi interaksi */
    }

    .verification-icon {
        color: green;
        /* Warna hijau */
        margin-left: 10px;
        /* Jarak antara ikon dan teks */
        font-size: 24px;
        /* Ukuran ikon diperbesar */
        vertical-align: middle;
        /* Menyamakan vertikal dengan teks */
    }

    .verification-text {
        vertical-align: middle;
        /* Menyamakan vertikal dengan ikon */
        margin-left: 5px;
        /* Jarak antara teks dan ikon */
    }

</style>