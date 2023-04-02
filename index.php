<?php

$title = "DATA BARANG";

include 'layout/header.php';

$data_barang = select("SELECT * FROM tb_barang");
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
                    <h4><b>DATA BARANG</b></h4>
                </div>
                <div class="col">
                    <a href="tambah_barang.php" class="btn btn-primary" style="float : right;"><i class="bi bi-plus-square"></i></i></a>
                </div>
            </div>

            <table class="table table-bordered table-striped" id="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data_barang as $barang) : ?>
                        <tr>
                            <td> <?= $nomor++; ?> </td>
                            <td> <?= $barang['nama_barang']; ?> </td>
                            <td> <?= $barang['stok_barang']; ?> </td>
                            <td> Rp. <?= number_format($barang['harga_barang'], 0, ',', '.'); ?> </td>
                            <td>
                                <a href="ubah_barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="hapus_barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data ?');"><i class="bi bi-trash3-fill"></i></a>
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