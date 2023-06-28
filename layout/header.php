<?php

include 'config/app.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Plugin Datatables For Bootstrap -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title> <?= $title; ?> </title>
</head>

<body>
    <!-- ========== NAVBAR ========== -->
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><b>SISTEM INFORMASI MANAJEMEN TOKO KOMPUTER</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">DASHBOARD</a>
                        </li>

                        <?php if ($_SESSION['level'] == 1) : ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">BARANG</a>
                            </li>
                        <?php endif; ?>

                        <!-- Fungsi Menampilkan Menu Untuk User = Admin -->
                        <?php if ($_SESSION['level'] == 1) : ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="data_toko.php">TOKO</a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="data_penjualan.php">PENJUALAN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="data_dokumen.php">DOKUMEN TOKO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="data_laporan.php">LAPORAN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="data_akun.php">AKUN</a>
                        </li>

                    </ul>
                </div>

                <div>
                    <a class="navbar-brand" href="#"> <?= $_SESSION['nama_akun']; ?> </a>
                </div>
                <div>
                    <a class="btn btn-primary" aria-current="page" href="logout.php" onclick="return confirm('Keluar Akun ?')"> <i class="bi bi-box-arrow-in-left"></i> </a>
                </div>


            </div>
        </nav>
    </div>
    <!-- ========== NAVBAR ========== -->