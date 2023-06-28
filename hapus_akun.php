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

include 'config/app.php';

// menerima id barang yang di pilih
$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0) {
    echo    "<script>
                alert('Data Telah Dihapus');
                document.location.href = 'data_akun.php';
            </script>";
} else {
    echo    "<script>
                alert('Data Gagal Dihapus');
                document.location.href = 'data_akun.php';
            </script>";
}
