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

$title = "DATA DOKUMEN";
include 'layout/header.php';

$data_dokumen = select("SELECT * FROM tb_dokumen");
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
                    <h4><b>DATA DOKUMEN</b></h4>
                </div>
                <div class="col">
                    <a href="tambah_dokumen.php" class="btn btn-primary" style="float : right;"><i class="bi bi-plus-square"></i></i></a>
                </div>
            </div>

            <table class="table table-bordered table-striped" id="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Dokumen</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data_dokumen as $dokumen) : ?>
                        <tr>
                            <td> <?= $nomor++; ?> </td>
                            <td> <?= $dokumen['nama_dokumen']; ?> </td>
                            <td>
                                <a href="assets/dokumen-toko/<?= $dokumen['surat_waralaba']; ?>" target="blank">
                                    <img src="assets/dokumen-toko/<?= $dokumen['surat_waralaba']; ?>" alt="dokumen" width="190px" height="250px">
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm"> <?= $dokumen['status_dokumen']; ?> </button>
                            </td>
                            <td>
                                <a href="ubah_dokumen.php?id_dokumen=<?= $dokumen['id_dokumen']; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="hapus_dokumen.php?id_dokumen=<?= $dokumen['id_dokumen']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data ?');"><i class="bi bi-trash3-fill"></i></a>
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