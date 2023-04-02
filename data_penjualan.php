<?php

$title = "DATA PENJUALAN";

include 'layout/header.php';

$data_penjualan = select("SELECT * FROM tb_toko JOIN tb_penjualan ON tb_toko.id_toko = tb_penjualan.id_toko");
?>

<!-- ========== CARD ========== -->
<div class="container">
    <div class="card mt-5 mb-5">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active">PENJUALAN</a>
                </li>
            </ul>
        </div>
        <!-- ========== CARD BODY ========== -->
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <h4><b>DATA PENJUALAN</b></h4>
                </div>
                <div class="col">
                    <a href="tambah_penjualan.php" class="btn btn-primary" style="float : right;"><i class="bi bi-plus-square"></i></i></a>
                </div>
            </div>

            <table class="table table-bordered table-striped" id="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Toko</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data_penjualan as $penjualan) : ?>
                        <tr>
                            <td> <?= $nomor++; ?> </td>
                            <td> <?= $penjualan['nama_toko']; ?> </td>
                            <td> Rp. <?= number_format($penjualan['jumlah'], 0, ',', '.'); ?> </td>
                            <td> <?= date('d-M-Y', strtotime($penjualan['tanggal'])); ?> </td>
                            <td>
                                <a href="ubah_penjualan.php?id_penjualan=<?= $penjualan['id_penjualan']; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="hapus_penjualan.php?id_penjualan=<?= $penjualan['id_penjualan']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data ?');"><i class="bi bi-trash3-fill"></i></a>
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