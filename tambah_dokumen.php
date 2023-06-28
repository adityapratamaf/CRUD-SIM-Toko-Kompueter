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

$title = "TAMBAH DOKUMEN";

include 'layout/header.php';

// proses tombol tambah 
if (isset($_POST['tambah'])) {
    if (create_dokumen($_POST) > 0) {
        echo    "<script>
                    alert ('Data Telah Ditambahkan');
                    document.location.href = 'data_dokumen.php';
                </script>";
    } else {
        echo    "<script>
                    alert ('Data Gagal Ditambahkan');
                    document.location.href = 'data_dokumen.php';
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
                    <a class="nav-link active">DOKUMEN</a>
                </li>
            </ul>
        </div>
        <!-- ========== CARD BODY ========== -->
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <h4><b>TAMBAH DOKUMEN</b></h4>
                </div>
                <div class="col">
                    <a href="data_dokumen.php" class="btn btn-primary" style="float : right;"><i class="bi bi-box-arrow-in-left"></i></a>
                </div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="mb-3 mt-2">
                    <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                    <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen">
                </div>
                <div class="mb-3 mt-2">
                    <label for="surat_waralaba" class="form-label">Dokumen</label>
                    <input type="file" class="form-control" id="surat_waralaba" name="surat_waralaba">
                </div>

                <input type="hidden" class="form-control" id="status_dokumen" name="status_dokumen" value="Menunggu">

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