<?php

include 'config/app.php';

// menerima id toko yang di pilih
$id_toko = (int)$_GET['id_toko'];

if (delete_toko($id_toko) > 0) {
    echo    "<script>
                alert('Data Telah Dihapus');
                document.location.href = 'data_toko.php';
            </script>";
} else {
    echo    "<script>
                alert('Data Gagal Dihapus');
                document.location.href = 'data_toko.php';
            </script>";
}
