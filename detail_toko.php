<?php

$title = "DETAIL TOKO";

include 'layout/header.php';

// menerima id toko yang di pilih
$id_toko = (int)$_GET['id_toko'];

// menampilkan data table toko dari database
$data_toko = select("SELECT * FROM tb_toko WHERE id_toko=$id_toko")[0];

//merubah jenis huruf uppercase
$nama_toko = $data_toko['nama_toko'];
$uppercase_namatoko = strtoupper($nama_toko);

?>


<!-- ========== CARD ========== -->
<div class="container">
    <div class="card mt-5 mb-5">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">BARANG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="data_toko.php">TOKO</a>
                </li>
            </ul>
        </div>
        <!-- ========== CARD BODY ========== -->
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <h4><b>DATA TOKO <?= $uppercase_namatoko; ?></b></h4>
                </div>
                <div class="col">
                    <a href="data_toko.php" class="btn btn-primary" style="float : right;"><i class="bi bi-box-arrow-in-left"></i></i></a>
                </div>
            </div>

            <table class="table table-bordered table-striped" id="tables">

                <div class="row justify-content-start">
                    <div class="col-5">
                        <img src="assets/foto-toko/<?= $data_toko['foto_toko']; ?>" width="80%">
                    </div>
                    <div class="col-7">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama Toko</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" value=": <?= $data_toko['nama_toko']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Alamat Toko</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" value=": <?= $data_toko['alamat_toko']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Pemilik Toko</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" value=": <?= $data_toko['pemilik_toko']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Status Toko</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" value=": <?= $data_toko['status_toko']; ?>">
                            </div>
                        </div>
                    </div>
                </div>

            </table>

        </div>
        <!-- ========== CARD BODY ========== -->
    </div>
</div>
<!-- ========== CARD ========== -->

<?php
include 'layout/footer.php';
?>