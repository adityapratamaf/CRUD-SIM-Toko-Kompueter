<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION['login'])) {
    echo    "<script>
                alert('Login');
                document.location.href = 'login.php';
            </script>";
    exit();
}

$title = "TAMBAH LAPORAN";

include 'layout/header.php';

// proses tombol tambah 
if (isset($_POST['tambah'])) {
    if (create_laporan($_POST) > 0) {
        echo    "<script>
                    alert ('Data Telah Ditambahkan');
                    document.location.href = 'data_laporan.php';
                </script>";
    } else {
        echo    "<script>
                    alert ('Data Gagal Ditambahkan');
                    document.location.href = 'data_laporan.php';
                </script>";
    }
}

?>


<!-- ========== CARD ========== -->
<div class="container">
    <div class="card mt-5 mb-5">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">LAPORAN</a>
                </li>
            </ul>
        </div>
        <!-- ========== CARD BODY ========== -->
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <h4><b>TAMBAH LAPORAN</b></h4>
                </div>
                <div class="col">
                    <a href="index.php" class="btn btn-primary" style="float : right;"><i class="bi bi-box-arrow-in-left"></i></a>
                </div>
            </div>

            <form action="" method="POST">

                <div class="mb-3 mt-2">
                    <label for="nama_laporan" class="form-label">Nama Laporan</label>
                    <input type="text" class="form-control" id="nama_laporan" name="nama_laporan" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_laporan" class="form-label">Jenis Laporan</label>
                    <select class="js-example-basic-single form-control" name="jenis_laporan" id="jenis_laporan">
                        <option value="">Silahkan Pilih</option>
                        <option value="Harian">Harian</option>
                        <option value="Mingguan">Mingguan</option>
                        <option value="Bulanan">Bulanan</option>
                        <option value="Triwulan">Triwulan</option>
                        <option value="Semester">Semester</option>
                        <option value="Tahunan">Tahunan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="isi_laporan" class="form-label">Isi Laporan</label>
                    <select class="js-example-basic-multiple form-control" name="isi_laporan[]" id="isi_laporan" multiple="multiple">
                        <option value=""></option>
                        <option value="Baik">Baik</option>
                        <option value="Senang">Senang</option>
                        <option value="Gembira">Gembira</option>
                    </select>
                </div>

                <button type="submit" name="tambah" class="btn btn-primary" style="float : right;"><i class="bi bi-plus-square"></i></button>

            </form>

        </div>
        <!-- ========== CARD BODY ========== -->
    </div>
</div>
<!-- ========== CARD ========== -->


<?php
include 'layout/footer.php';
?>

<script>
    $(document).ready(function() {
        $("#isi_laporan").select2({
            placeholder: "Silahkan Pilih"
        })
    })

    $(document).ready(function() {
        $('.jenis_laporan').select2();
    });
</script>