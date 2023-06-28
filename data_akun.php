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

$title = "DATA AKUN";

include 'layout/header.php';

// menampilkan seluruh data
$data_akun = select("SELECT * FROM tb_akun");

// menampilkan data data berdasarkan user login
$id_akun   = $_SESSION['id_akun'];
$data_by_login = select("SELECT * FROM tb_akun WHERE id_akun = $id_akun");

// fungsi tombol tambah jika ditekan
if (isset($_POST['tambah'])) {
    if (create_akun($_POST) > 0) {
        echo    "<script>
                    alert('Data Telah Ditambahkan');
                    document.location.href = 'data_akun.php';
                </script>";
    } else {
        echo    "<script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'data_akun.php'; 
                </script>";
    }
}

// fungsi tombol ubah jika ditekan
if (isset($_POST['ubah'])) {
    if (update_akun($_POST) > 0) {
        echo    "<script>
                    alert('Data Telah Diubah');
                    document.location.href = 'data_akun.php';
                </script>";
    } else {
        echo    "<script>
                    alert('Data Gagal Diubah');
                    document.location.href = 'data_akun.php';
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
                    <a class="nav-link active" href="data_penjualan.php">AKUN</a>
                </li>
            </ul>
        </div>
        <!-- ========== CARD BODY ========== -->
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <h4><b>DATA AKUN</b></h4>
                </div>

                <?php if ($_SESSION['level'] == 1) : ?>
                    <div class="col">
                        <a class="btn btn-primary" style="float : right;" data-bs-toggle="modal" data-bs-target="#modaltambah"><i class="bi bi-plus-square"></i></i></a>
                    </div>
                <?php endif; ?>

            </div>

            <table class="table table-bordered table-striped" id="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <!-- tampil seluruh data -->
                    <?php if ($_SESSION['level'] == 1) : ?>

                        <?php foreach ($data_akun as $akun) : ?>
                            <tr>
                                <td> <?= $nomor++; ?> </td>
                                <td> <?= $akun['nama_akun']; ?> </td>
                                <td> <?= $akun['username']; ?> </td>
                                <!-- <td> <?= $akun['password']; ?> </td> -->
                                <td> Password Ter-Enkripsi </td>
                                <td> <?= $akun['level']; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalubah<?= $akun['id_akun']; ?>"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $akun['id_akun']; ?>"><i class="bi bi-trash3-fill"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else : ?>
                        <!-- tampil data berdasarkan user login -->
                        <?php foreach ($data_by_login as $akun) : ?>
                            <tr>
                                <td> <?= $nomor++; ?> </td>
                                <td> <?= $akun['nama_akun']; ?> </td>
                                <td> <?= $akun['username']; ?> </td>
                                <!-- <td> <?= $akun['password']; ?> </td> -->
                                <td> Password Ter-Enskripsi </td>
                                <td> <?= $akun['level']; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalubah<?= $akun['id_akun']; ?>"><i class="bi bi-pencil-square"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- ========== CARD BODY ========== -->
    </div>
</div>
<!-- ========== CARD ========== -->

<!-- ========== MODAL = TAMBAH ========== -->
<div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">TAMBAH AKUN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="" method="POST">

                    <div class="mb-3 mt-2">
                        <label for="nama_akun" class="form-label">Nama Akun</label>
                        <input type="text" class="form-control" id="nama_akun" name="nama_akun" required>
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="level" class="form-label">Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">-- Pilih Level --</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-box-arrow-in-left"></i></button>
                <button type="submit" name="tambah" class="btn btn-primary" style="float : right;"><i class="bi bi-plus-square"></i></button>
            </div>

            </form>

        </div>
    </div>
</div>
<!-- ========== MODAL = TAMBAH ========== -->

<!-- ========== MODAL = UBAH ========== -->
<?php foreach ($data_akun as $akun) : ?>

    <div class="modal fade" id="modalubah<?= $akun['id_akun']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">UBAH AKUN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="" method="POST">

                        <input type="hidden" name="id_akun" id="id_akun" value="<?= $akun['id_akun']; ?>">

                        <div class="mb-3 mt-2">
                            <label for="nama_akun" class="form-label">Nama Akun</label>
                            <input type="text" class="form-control" id="nama_akun" name="nama_akun" value="<?= $akun['nama_akun']; ?>" required>
                        </div>
                        <div class="mb-3 mt-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $akun['username']; ?>" required>
                        </div>
                        <div class="mb-3 mt-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" <?= $akun['password']; ?> placeholder="Masukan Password Sebelumnya / Password Baru" required>
                        </div>

                        <!-- percabangan user login -->
                        <?php if ($_SESSION['level'] == 1) : ?>
                            <div class="mb-3 mt-2">
                                <label for="level" class="form-label">Level</label>
                                <select name="level" id="level" class="form-control" required>
                                    <?php $level = $akun['level']; ?>
                                    <option value="1" <?= $level == '1' ? 'selected' : null  ?>>Admin</option>
                                    <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator</option>
                                </select>
                            </div>
                        <?php else : ?>
                            <input type="hidden" name="level" value="<?= $akun['level']; ?>">
                        <?php endif; ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-box-arrow-in-left"></i></button>
                    <button type="submit" name="ubah" class="btn btn-primary" style="float : right;"><i class="bi bi-plus-square"></i></button>
                </div>

                </form>

            </div>
        </div>
    </div>

<?php endforeach; ?>
<!-- ========== MODAL = UBAH ========== -->

<!-- ========== MODAL = HAPUS ========== -->
<?php foreach ($data_akun as $akun) : ?>

    <div class="modal fade" id="modalhapus<?= $akun['id_akun']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">HAPUS AKUN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin Ingin Menghapus Data Akun : <?= $akun['nama_akun']; ?> </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-box-arrow-in-left"></i></button>
                    <a href="hapus_akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!-- ========== MODAL = HAPUS ========== -->

<?php
include 'layout/footer.php';
?>