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

$title = "UBAH PENJUALAN";

include 'layout/header.php';

// proses tombol tambah 
if (isset($_POST['ubah'])) {
    if (update_penjualan($_POST) > 0) {
        echo    "<script>
                    alert ('Data Telah Diubah');
                    document.location.href = 'data_penjualan.php';
                </script>";
    } else {
        echo    "<script>
                    alert ('Data Gagal Diubah');
                    document.location.href = 'data_penjualan.php';
                </script>";
    }
}

// ambil id yang dipilih
$id_penjualan = (int)$_GET['id_penjualan'];

// tampilkan data sesuai id yang dipilih
$data_penjualan = select("SELECT * FROM tb_toko JOIN tb_penjualan ON tb_toko.id_toko = tb_penjualan.id_toko")[0];

?>


<!-- ========== CARD ========== -->
<div class="container">
    <div class="card mt-5 mb-5">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="data_penjualan.php">PENJUALAN</a>
                </li>
            </ul>
        </div>
        <!-- ========== CARD BODY ========== -->
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <h4><b>UBAH PENJUALAN</b></h4>
                </div>
                <div class="col">
                    <a href="data_penjualan.php" class="btn btn-primary" style="float : right;"><i class="bi bi-box-arrow-in-left"></i></a>
                </div>
            </div>

            <form action="" method="POST">

                <input type="hidden" name="id_penjualan" id="id_penjualan" value="<?= $data_penjualan['id_penjualan']; ?>">

                <div class="mb-3 mt-2">
                    <label for="id_toko" class="form-label">Toko</label>
                    <select class="form-select" id="id_toko" name="id_toko" required>

                        <?php $data_toko = select("SELECT * FROM tb_toko"); ?>
                        <?php foreach ($data_toko as $toko) : ?>
                            <option value="<?= $toko['id_toko']; ?>"><?= $toko['nama_toko']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required value="<?= $data_penjualan['jumlah']; ?>">
                </div>
                <div class="mb-3 mt-2">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?= $data_penjualan['tanggal']; ?>">
                </div>
                <button type="submit" name="ubah" class="btn btn-primary" style="float : right;"><i class="bi bi-plus-square"></i></button>

            </form>

        </div>
        <!-- ========== CARD BODY ========== -->
    </div>
</div>
<!-- ========== CARD ========== -->


<?php
include 'layout/footer.php';
?>