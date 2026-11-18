<?php
// KONEKSI DATABASE
define('ROOTPATH', $_SERVER['DOCUMENT_ROOT'] . '/indo');
require_once ROOTPATH . '/config/config.php';

$redirect_page = '/indo/pages/cashiers/list.php';
$error_message = '';

// MENGAMBIL ID KASIR
if (!isset($_GET['id_kasir']) || trim($_GET['id_kasir']) === '') {
    header("Location: " . $redirect_page);
    exit;
}

$id_kasir = (int) $_GET['id_kasir'];

if ($id_kasir <= 0) {
    header("Location: " . $redirect_page);
    exit;
}

// PROSES UPDATE DATA KASIR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kasir = trim($_POST['nama_kasir'] ?? '');
    $no_telp = trim($_POST['no_telp'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');

    if ($nama_kasir === '' || $no_telp === '' || $alamat === '') {
        $error_message = "Semua field wajib diisi.";
    } else {
        $query = "UPDATE tabel_kasir SET nama_kasir = ?, no_telp = ?, alamat = ? WHERE id_kasir = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssi", $nama_kasir, $no_telp, $alamat, $id_kasir);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                echo "<script>
                    alert('Data kasir berhasil diupdate!');
                    window.location.href='/indo/pages/cashiers/list.php';
                </script>";
                exit;
            } else {
                $error_message = "Gagal memperbarui data kasir.";
            }

            mysqli_stmt_close($stmt);
        } else {
            $error_message = "Query database gagal.";
        }
    }
}

// MENGAMBIL DATA KASIR BERDASARKAN ID
$query = "SELECT * FROM tabel_kasir WHERE id_kasir = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id_kasir);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$kasir = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$kasir) {
    die("Data kasir tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kasir | Indomaret</title>
    <link rel="stylesheet" href="/indo/assets/css/style.css">
</head>

<body class="add-cashier-page">

    <!-- HEADER -->
    <header class="dream-header">
        <a href="/indo/index.php" class="dream-logo">
            <span>🛒</span> Indomaret
        </a>

        <nav class="dream-nav">
            <a href="/indo/index.php">Beranda</a>
            <a href="/indo/pages/products/list.php">Produk</a>
            <a href="/indo/pages/cashiers/list.php" class="active">Kasir</a>
            <a href="/indo/pages/reports/index.php">Laporan</a>
        </nav>

        <a href="#" class="dream-login">
            <span>♙</span> Login
        </a>
    </header>

    <!-- MAIN CONTENT -->
    <main class="dream-main">
        <div class="dream-star star-one">✦</div>
        <div class="dream-star star-two">✧</div>
        <div class="dream-star star-three">✦</div>
        <div class="dream-star star-four">✧</div>
        <div class="dream-star star-five">✦</div>
        <div class="dream-star star-six">✧</div>

        <!-- FORM EDIT -->
        <section class="dream-form-card">
            <div class="dream-emblem">🛒</div>
            <div class="dream-ornament top-ornament">✧ ❀ ✧</div>

            <h1>Edit Data Kasir</h1>
            <p class="dream-subtitle">Perbarui informasi kasir di bawah ini</p>

            <div class="dream-divider">
                <span></span> ✦ <span></span>
            </div>

            <!-- PESAN ERROR -->
            <?php if ($error_message !== ''): ?>
            <p class="form-error">
                <?= htmlspecialchars($error_message) ?>
            </p>
            <?php endif; ?>

            <!-- FORM EDIT KASIR -->
            <form action="" method="POST" class="dream-form">
                <div class="dream-field">
                    <label for="nama_kasir">✦ Nama Kasir</label>
                    <div class="dream-input">
                        <span class="input-icon">♙</span>
                        <input type="text" id="nama_kasir" name="nama_kasir"
                            value="<?= htmlspecialchars($_POST['nama_kasir'] ?? $kasir['nama_kasir']) ?>"
                            placeholder="Masukkan nama kasir..." required>
                    </div>
                </div>

                <div class="dream-field">
                    <label for="no_telp">✦ Nomor Telepon</label>
                    <div class="dream-input">
                        <span class="input-icon">♧</span>
                        <input type="text" id="no_telp" name="no_telp"
                            value="<?= htmlspecialchars($_POST['no_telp'] ?? $kasir['no_telp']) ?>"
                            placeholder="Masukkan nomor telepon..." required>
                    </div>
                </div>

                <div class="dream-field">
                    <label for="alamat">✦ Alamat</label>
                    <div class="dream-input">
                        <span class="input-icon">♧</span>
                        <input type="text" id="alamat" name="alamat"
                            value="<?= htmlspecialchars($_POST['alamat'] ?? $kasir['alamat']) ?>"
                            placeholder="Masukkan alamat kasir..." required>
                    </div>
                </div>

                <button type="submit" class="dream-submit">
                    <span class="button-star">✦</span>
                    Simpan Perubahan
                    <span class="button-star">✦</span>
                </button>

                <a href="<?= htmlspecialchars($redirect_page) ?>" class="btn-add">
                    Kembali
                </a>
            </form>

            <div class="dream-divider bottom-divider">
                <span></span> ✦ <span></span>
            </div>

            <div class="dream-ornament bottom-ornament">❧ ✧ ❧</div>
        </section>
    </main>

</body>

</html>