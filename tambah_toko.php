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

$title = "TAMBAH TOKO";

include 'layout/header.php';

// proses tombol tambah 
if (isset($_POST['tambah'])) {
    if (create_toko($_POST) > 0) {
        echo    "<script>
                    alert ('Data Telah Ditambahkan');
                    document.location.href = 'data_toko.php';
                </script>";
    } else {
        echo    "<script>
                    alert ('Data Gagal Ditambahkan');
                    document.location.href = 'data_toko.php';
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
                    <a class="nav-link active" href="data_toko.php">TOKO</a>
                </li>
            </ul>
        </div>
        <!-- ========== CARD BODY ========== -->
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <h4><b>TAMBAH TOKO</b></h4>
                </div>
                <div class="col">
                    <a href="data_toko.php" class="btn btn-primary" style="float : right;"><i class="bi bi-box-arrow-in-left"></i></a>
                </div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="mb-3 mt-2">
                    <label for="nama_toko" class="form-label">Nama Toko</label>
                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" required>
                </div>
                <div class="mb-3">
                    <label for="alamat_toko" class="form-label">Alamat Toko</label>
                    <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" required>
                </div>
                <div class="mb-3 mt-2">
                    <label for="pemilik_toko" class="form-label">Pemilik Toko</label>
                    <input type="text" class="form-control" id="pemilik_toko" name="pemilik_toko" required>
                </div>
                <div class="mb-3 mt-2">
                    <label for="status_toko" class="form-label">Status Toko</label>
                    <select class="form-select" id="status_toko" name="status_toko" required>
                        <option selected>Pilih Status Toko</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Non Aktif">Non Aktif</option>
                    </select>
                </div>
                <div class="mb-3 mt-2">
                    <label for="foto_toko" class="form-label">Foto Toko</label>
                    <input type="file" class="form-control" id="foto_toko" name="foto_toko">
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