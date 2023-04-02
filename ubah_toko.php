<?php

$title = "UBAH TOKO";

include 'layout/header.php';

// proses tombol ubah 
if (isset($_POST['ubah'])) {
    if (update_toko($_POST) > 0) {
        echo    "<script>
                    alert ('Data Telah Diubahkan');
                    document.location.href = 'data_toko.php';
                </script>";
    } else {
        echo    "<script>
                    alert ('Data Gagal Diubahkan');
                    document.location.href = 'data_toko.php';
                </script>";
    }
}

// ambil id yang dipilih
$id_toko = (int)$_GET['id_toko'];

// query ambil dan tampilkan data 
$data_toko = select("SELECT * FROM tb_toko WHERE id_toko = $id_toko")[0];

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
                    <h4><b>UBAH TOKO</b></h4>
                </div>
                <div class="col">
                    <a href="index.php" class="btn btn-primary" style="float : right;"><i class="bi bi-box-arrow-in-left"></i></a>
                </div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id_toko" value="<?= $data_toko['id_toko']; ?>">
                <input type="hidden" name="fotolama" value="<?= $data_toko['foto_toko']; ?>">

                <div class="mb-3 mt-2">
                    <label for="nama_toko" class="form-label">Nama Toko</label>
                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" required value="<?= $data_toko['nama_toko']; ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat_toko" class="form-label">Alamat Toko</label>
                    <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" required value="<?= $data_toko['alamat_toko']; ?>">
                </div>
                <div class="mb-3 mt-2">
                    <label for="pemilik_toko" class="form-label">Pemilik Toko</label>
                    <input type="text" class="form-control" id="pemilik_toko" name="pemilik_toko" required value="<?= $data_toko['pemilik_toko']; ?>">
                </div>
                <div class="mb-3 mt-2">
                    <label for="status_toko" class="form-label">Status Toko</label>
                    <select class="form-select" id="status_toko" name="status_toko" required>
                        <?php $data_toko['status_toko']; ?>
                        <option value="Aktif" <?= $data_toko == 'Aktif' ? 'selected' : null ?>>Aktif</option>
                        <option value="Non Aktif" <?= $data_toko == 'Non Aktif' ? 'selected' : null ?>>Non Aktif</option>
                    </select>
                </div>
                <div class="mb-3 mt-2">
                    <label for="foto_toko" class="form-label">Foto Toko</label>
                    <input type="file" class="form-control" id="foto_toko" name="foto_toko">
                    <p><small>Gambar Sebelumnya</small></p>
                    <img src="assets/foto-toko/<?= $data_toko['foto_toko']; ?>" alt="" width="200px">
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