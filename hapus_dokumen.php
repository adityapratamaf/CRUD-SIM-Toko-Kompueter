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

// menerima id dari data yang dipilih
$id_dokumen = (int)$_GET['id_dokumen'];

if (delete_dokumen($id_dokumen) > 0) {
    echo    "<script>
            alert('Data Telah Dihapus');
            document.location.href = 'data_dokumen.php';
            </script>";
} else {
    echo    "<script>
            alert ('Data Gagal Dihapus');
            document.location.href = 'data_dokumen.php';
            </script>";
}
