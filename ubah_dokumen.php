<?php
$title = "UBAH DOKUMEN";
include 'layout/header.php';

// mengambil id dari url yang dipilih
$id_dokumen = (int)$_GET['id_dokumen'];

//menampilkan data dari url yang dipilih
$dokumen = select("SELECT * FROM tb_dokumen WHERE id_dokumen = '$id_dokumen'")[0];

// proses tombol ubah ke controller
if (isset($_POST['ubah'])) {
    if (update_dokumen($_POST) > 0) {
        echo    "<script>
                    alert ('Data Telah Diubah');
                    document.location.href = 'data_dokumen.php';
                </script>";
    } else {
        echo    "<script>
                    alert ('Data Gagal Diubah');
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
                    <h4><b>UBAH DOKUMEN</b></h4>
                </div>
                <div class="col">
                    <a href="data_dokumen.php" class="btn btn-primary" style="float : right;"><i class="bi bi-box-arrow-in-left"></i></a>
                </div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id_dokumen" value="<?= $dokumen['id_dokumen']; ?>">
                <input type="hidden" name="dokumenlama" value="<?= $dokumen['surat_waralaba']; ?>">

                <div class="mb-3 mt-2">
                    <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                    <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" value="<?= $dokumen['nama_dokumen']; ?>" required>
                </div>

                <div class="mb-3 mt-2">
                    <label for="surat_waralaba" class="form-label">Dokumen</label>
                    <input type="file" class="form-control" id="surat_waralaba" name="surat_waralaba">
                    <p><small>Gambar Sebelumnya</small></p>
                    <img src="assets/dokumen-toko/<?= $dokumen['surat_waralaba']; ?>" alt="Foto_Sebelumnya" width="200px">
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