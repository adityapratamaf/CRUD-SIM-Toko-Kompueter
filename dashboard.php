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

$title = "DASHBOARD";
include 'layout/header.php';
$data_akun = select("SELECT * FROM tb_akun");

$nama_user = $_SESSION['nama_akun'];

?>



<!-- ========== CARD ========== -->
<div class="container">
    <div class="card mt-5 mb-5">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active">DASHBOARD</a>
                </li>
            </ul>
        </div>
        <!-- ========== CARD BODY ========== -->
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <div class="alert alert-primary" role="alert">
                        <!-- <b>SELAMAT DATANG <?= $_SESSION['nama_akun']; ?> </b> -->
                        <b>SELAMAT DATANG <?= strtoupper($nama_user) ?> </b>
                    </div>
                </div>

            </div>
        </div>
        <!-- ========== CARD BODY ========== -->
    </div>
</div>
<!-- ========== CARD ========== -->

<?php
include 'layout/footer.php';
?>