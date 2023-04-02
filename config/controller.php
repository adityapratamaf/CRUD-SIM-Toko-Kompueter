<?php

// fungsi menampilkan data
function select($query)
{
    // panggil koneksi database 
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// ============================================================ BARANG ============================================================

// fungsi menambahkan data barang 
function create_barang($POST)
{
    global $db;

    $nama_barang = $POST['nama_barang'];
    $stok_barang = $POST['stok_barang'];
    $harga_barang = $POST['harga_barang'];

    // query tambah data ke database
    $query = "INSERT INTO tb_barang VALUES(null, '$nama_barang', '$stok_barang', '$harga_barang')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data barang 
function update_barang($POST)
{
    global $db;

    $id_barang = $POST['id_barang'];
    $nama_barang = $POST['nama_barang'];
    $stok_barang = $POST['stok_barang'];
    $harga_barang = $POST['harga_barang'];

    // query update data ke database
    $query = "UPDATE tb_barang SET nama_barang='$nama_barang', stok_barang='$stok_barang', harga_barang='$harga_barang' WHERE id_barang=$id_barang";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus data barang 
function delete_barang($id_barang)
{
    global $db;

    // query menghapus data di database
    $query = "DELETE FROM tb_barang WHERE id_barang=$id_barang";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// ============================================================ TOKO ============================================================

// fungsi menambahkan data toko
function create_toko($POST)
{
    global $db;

    $nama_toko      = $POST['nama_toko'];
    $alamat_toko    = $POST['alamat_toko'];
    $pemilik_toko   = $POST['pemilik_toko'];
    $status_toko    = $POST['status_toko'];
    $foto_toko      = upload_file();

    // cek upload file
    if (!$foto_toko) {
        return false;
    }

    //query tambah data ke database
    $query = "INSERT INTO tb_toko VALUES(null, '$nama_toko', '$alamat_toko', '$pemilik_toko', '$status_toko', '$foto_toko')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data toko
function update_toko($POST)
{
    global $db;

    $id_toko        = $POST['id_toko'];
    $nama_toko      = $POST['nama_toko'];
    $alamat_toko    = $POST['alamat_toko'];
    $pemilik_toko   = $POST['pemilik_toko'];
    $status_toko    = $POST['status_toko'];
    $fotolama       = $POST['fotolama'];

    // cek upload file baru atau tidak
    if ($_FILES['foto_toko']['error'] == 4) {
        $foto_toko = $fotolama;
    } else {
        $foto_toko = upload_file();
    }

    //query ubah data ke database
    $query = "UPDATE tb_toko SET nama_toko='$nama_toko', alamat_toko='$alamat_toko', pemilik_toko='$pemilik_toko', status_toko='$status_toko', foto_toko='$foto_toko' WHERE id_toko = $id_toko";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi upload file 
function upload_file()
{
    $namafile = $_FILES['foto_toko']['name'];
    $ukuranfile = $_FILES['foto_toko']['size'];
    $error = $_FILES['foto_toko']['error'];
    $tmpname = $_FILES['foto_toko']['tmp_name'];

    // cek file yang di upload 
    $ekstensifilevalid = ['jpg', 'jpeg,', 'png'];
    $ekstensifile = explode('.', $namafile);
    $ekstensifile = strtolower(end($ekstensifile));

    // cek ekstensi file
    if (!in_array($ekstensifile, $ekstensifilevalid)) {
        // pesan gagal
        echo    "<script>
                    alert('Format File Tidak Valid');
                    document.location.href = 'tambah_toko.php';
                </script>";
        die();
    }

    // cek ukuran file 
    if ($ukuranfile > 2048000) {
        // pesan gagal
        echo "<script>
                    alert('Ukuran File Max 2 MB');
                    document.location.href = 'tambah_toko.php';
                </script>";
        die();
    }

    // generate nama file baru 
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensifile;

    // pindahkan file ke folder local
    move_uploaded_file($tmpname, 'assets/foto-toko/' . $namafilebaru);
    return $namafilebaru;
}

// fungsi menghapus data toko 
function delete_toko($id_toko)
{
    global $db;

    // ambil file foto sesuai data yang dipilih
    $data_toko = select("SELECT * FROM tb_toko WHERE id_toko=$id_toko")[0];
    unlink("assets/foto-toko/" . $data_toko['foto_toko']);

    // query menghapus data di database
    $query = "DELETE FROM tb_toko WHERE id_toko=$id_toko";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// ============================================================ PENJUALAN ============================================================

// fungsi tambah data penjualan
function create_penjualan($POST)
{
    global $db;

    $id_toko = $POST['id_toko'];
    $jumlah = $POST['jumlah'];
    $tanggal = $POST['tanggal'];

    $query = "INSERT INTO tb_penjualan VALUES(null, '$id_toko', '$jumlah', '$tanggal')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data penjualan
function update_penjualan($POST)
{
    global $db;

    $id_penjualan = $POST['id_penjualan'];
    $id_toko = $POST['id_toko'];
    $jumlah = $POST['jumlah'];
    $tanggal = $POST['tanggal'];

    // query update data ke database
    $query = "UPDATE tb_penjualan SET id_toko='$id_toko', jumlah='$jumlah', tanggal='$tanggal' WHERE id_penjualan=$id_penjualan";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus data penjualan 
function delete_penjualan($id_penjualan)
{
    global $db;

    // query menghapus data di database
    $query = "DELETE FROM tb_penjualan WHERE id_penjualan=$id_penjualan";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// ============================================================ DOKUMEN ============================================================
// fungsi tambah data dokumen 
function create_dokumen($POST)
{
    global $db;

    $nama_dokumen = $POST['nama_dokumen'];
    $surat_waralaba = upload_dokumen();

    // cek upload file atau tidak
    if (!$surat_waralaba) {
        return false;
    }

    // query tambah data 
    $query = "INSERT INTO tb_dokumen VALUES(null, '$nama_dokumen', '$surat_waralaba')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi ubah data dokumen
function update_dokumen($POST)
{
    global $db;

    $id_dokumen     = $POST['id_dokumen'];
    $nama_dokumen   = $POST['nama_dokumen'];
    $dokumenlama    = $POST['dokumenlama'];

    // cek upload file yang baru atau tidak
    if ($_FILES['surat_waralaba']['error'] == 4) {
        $surat_waralaba = $dokumenlama;
    } else {
        $surat_waralaba = upload_dokumen();
    }

    // query ubah data ke database
    $query  = "UPDATE tb_dokumen SET nama_dokumen='$nama_dokumen', surat_waralaba='$surat_waralaba' WHERE id_dokumen=$id_dokumen";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi upload file
function upload_dokumen()
{
    $namaFile   = $_FILES['surat_waralaba']['name'];
    $ukuranFile = $_FILES['surat_waralaba']['size'];
    $error      = $_FILES['surat_waralaba']['error'];
    $tmpName    = $_FILES['surat_waralaba']['tmp_name'];

    // cek file yang di upload
    $ekstensifileValid = ['jpg', 'jpeg', 'png'];
    $ekstensifile      = explode('.', $namaFile);
    $ekstensifile      = strtolower(end($ekstensifile));

    // cek ekstensi file
    if (!in_array($ekstensifile, $ekstensifileValid)) {
        // pesan gagal
        echo    "<script>
                    alert('Format File Tidak Valid');
                    document.location.href = 'tambah_dokumen.php';
                </script>";
        die();
    }

    // cek ukuran file
    if ($ukuranFile > 204800) {
        echo    "<script>
                    alert('Ukuran File Max 2 MB');
                    document.location.href = 'tambah_dokumen.php';
                </script>";
        die();
    }

    // generate nama file 
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensifile;

    // pindahkan file ke folder local
    move_uploaded_file($tmpName, 'assets/dokumen-toko/' . $namaFileBaru);
    return $namaFileBaru;
}

// fungsi menghapus data 
function delete_dokumen($id_dokumen)
{
    global $db;

    // ambil dokumen sesuai data yang dipilih
    $dokumen = select("SELECT * FROM tb_dokumen WHERE id_dokumen=$id_dokumen")[0];
    unlink("assets/dokumen-toko/" . $dokumen['surat_waralaba']);

    //query menghapus data di database
    $query = "DELETE FROM tb_dokumen WHERE id_dokumen=$id_dokumen";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// ============================================================ AKUN ============================================================
// fungsi tambah data  
function create_akun($POST)
{
    global $db;

    $nama_akun  = $POST['nama_akun'];
    $username   = $POST['username'];
    $password   = $POST['password'];
    $level      = $POST['level'];

    // enkripsi password
    $password   = password_hash($password, PASSWORD_DEFAULT);

    // query tambah data 
    $query = "INSERT INTO tb_akun VALUES(null, '$nama_akun', '$username', '$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi hapus data 
function delete_akun($id_akun)
{
    global $db;

    //query menghapus data di database
    $query = "DELETE FROM tb_akun WHERE id_akun=$id_akun";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi ubah data 
// fungsi ubah data dokumen
function update_akun($POST)
{
    global $db;

    $id_akun     = $POST['id_akun'];
    $nama_akun   = $POST['nama_akun'];
    $username    = $POST['username'];
    $password    = $POST['password'];
    $level       = $POST['level'];

    // enkripsi password
    $password   = password_hash($password, PASSWORD_DEFAULT);

    // query ubah data ke database
    $query  = "UPDATE tb_akun SET nama_akun='$nama_akun', username='$username', password='$password', level='$level' WHERE id_akun=$id_akun";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
