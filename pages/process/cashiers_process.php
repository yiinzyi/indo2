<?php

require_once '../../config/config.php';

$action = $_POST['action'] ?? '';

if ($action == 'add') {

    $nama_kasir = $_POST['nama_kasir'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO tabel_kasir
              (nama_kasir, no_telp, alamat)
              VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Query gagal: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sss", $nama_kasir, $no_telp, $alamat);
    $hasil = mysqli_stmt_execute($stmt);

    if ($hasil) {
    mysqli_stmt_close($stmt);

    header("Location: /indo/pages/cashiers/list.php");
    exit;

} else {
    die("Gagal menambahkan data: " . mysqli_stmt_error($stmt));
}


} elseif ($action == 'edit') {

    $id_kasir = $_POST['id_kasir'];
    $nama_kasir = $_POST['nama_kasir'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE tabel_kasir
              SET nama_kasir=?, no_telp=?, alamat=?
              WHERE id_kasir=?";

    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Query gagal: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sssi", $nama_kasir, $no_telp, $alamat, $id_kasir);
    $hasil = mysqli_stmt_execute($stmt);

    if ($hasil) {
        mysqli_stmt_close($stmt);

        echo "<script>
            alert('Data kasir berhasil diupdate!');
            window.location.href='/indo/pages/cashiers/list.php';
        </script>";
        exit;

    } else {
        die("Gagal mengupdate data: " . mysqli_stmt_error($stmt));
    }


} elseif ($action == 'delete') {

    $id_kasir = $_POST['id_kasir'];

    $query = "DELETE FROM tabel_kasir WHERE id_kasir=?";

    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Query gagal: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "i", $id_kasir);
    $hasil = mysqli_stmt_execute($stmt);

    if ($hasil) {
        mysqli_stmt_close($stmt);

        echo "<script>
            alert('Data kasir berhasil dihapus!');
            window.location.href='/indo/pages/cashiers/list.php';
        </script>";
        exit;

    } else {
        die("Gagal menghapus data: " . mysqli_stmt_error($stmt));
    }

} else {
    header("Location: /indo/pages/cashiers/list.php");
    exit;
}

?>