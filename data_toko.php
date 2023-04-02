<?php

$title = "DATA TOKO";

include 'layout/header.php';

$data_toko = select("SELECT * FROM tb_toko");
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
                    <h4><b>DATA TOKO</b></h4>
                </div>
                <div class="col">
                    <a href="tambah_toko.php" class="btn btn-primary" style="float : right;"><i class="bi bi-plus-square"></i></i></a>
                </div>
            </div>

            <table class="table table-bordered table-striped" id="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Toko</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data_toko as $toko) : ?>
                        <tr>
                            <td> <?= $nomor++; ?> </td>
                            <td> <?= $toko['nama_toko']; ?> </td>
                            <td> <?= $toko['alamat_toko']; ?> </td>
                            <td> <?= $toko['status_toko']; ?> </td>
                            <td>
                                <a href="detail_toko.php?id_toko=<?= $toko['id_toko']; ?>" class="btn btn-secondary"><i class="bi bi-eye"></i></a>
                                <a href="ubah_toko.php?id_toko=<?= $toko['id_toko']; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="hapus_toko.php?id_toko=<?= $toko['id_toko']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data ?');"><i class="bi bi-trash3-fill"></i></a>
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