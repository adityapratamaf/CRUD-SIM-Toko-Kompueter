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

// membatasi halaman sesuai level user
if ($_SESSION['level'] != 1) {
    echo    "<script>
                alert('Tidak Ada Akses');
                document.location.href = 'dashboard.php';
            </script>";
    exit();
}

$title = "DATA LAPORAN";

include 'layout/header.php';

$data_laporan = select("SELECT * FROM tb_laporan");
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
                    <h4><b>DATA LAPORAN</b></h4>
                </div>
                <div class="col">
                    <a href="tambah_laporan.php" class="btn btn-primary" style="float : right;"><i class="bi bi-plus-square"></i></i></a>
                </div>
            </div>

            <table class="table table-bordered table-striped" id="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Laporan</th>
                        <th>Isi Laporan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data_laporan as $laporan) : ?>
                        <tr>
                            <td> <?= $nomor++; ?> </td>
                            <td> <?= $laporan['nama_laporan']; ?> </td>
                            <td> <?= $laporan['isi_laporan']; ?> </td>
                            <td>
                                <a href="ubah_laporan.php?id_laporan=<?= $laporan['id_laporan']; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="hapus_laporan.php?id_laporan=<?= $laporan['id_laporan']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data ?');"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- ========== CARD BODY ========== -->
    </div>
</div>
<!-- ========== CARD ========== -->


<?php
include 'layout/footer.php';
?>