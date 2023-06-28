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

$title = "TAMBAH BARANG";

include 'layout/header.php';

// proses tombol tambah 
if (isset($_POST['tambah'])) {
    if (create_barang($_POST) > 0) {
        echo    "<script>
                    alert ('Data Telah Ditambahkan');
                    document.location.href = 'index.php';
                </script>";
    } else {
        echo    "<script>
                    alert ('Data Gagal Ditambahkan');
                    document.location.href = 'index.php';
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
                    <a class="nav-link active" href="index.php">BARANG</a>
                </li>
            </ul>
        </div>
        <!-- ========== CARD BODY ========== -->
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <h4><b>TAMBAH BARANG</b></h4>
                </div>
                <div class="col">
                    <a href="index.php" class="btn btn-primary" style="float : right;"><i class="bi bi-box-arrow-in-left"></i></a>
                </div>
            </div>

            <form action="" method="POST">

                <div class="mb-3 mt-2">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                </div>
                <div class="mb-3">
                    <label for="stok_barang" class="form-label">Stok Barang</label>
                    <input type="number" class="form-control" id="stok_barang" name="stok_barang" required>
                </div>
                <div class="mb-3 mt-2">
                    <label for="harga_barang" class="form-label">Harga Barang</label>
                    <input type="number" class="form-control" id="harga_barang" name="harga_barang" required>
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