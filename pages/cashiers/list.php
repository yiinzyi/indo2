<?php
// KONEKSI DATABASE
define('ROOTPATH', $_SERVER['DOCUMENT_ROOT'] . '/indo');
require_once ROOTPATH . '/config/config.php';

// MENGAMBIL DATA KASIR
$query = "SELECT * FROM tabel_kasir ORDER BY id_kasir DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Gagal mengambil data kasir: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kasir | Indomaret</title>
    <link rel="stylesheet" href="/indo/assets/css/style.css">
</head>

<body>
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
        <!-- DEKORASI BINTANG -->
        <div class="dream-star star-one">✦</div>
        <div class="dream-star star-two">✧</div>
        <div class="dream-star star-three">✦</div>
        <div class="dream-star star-four">✧</div>
        <div class="dream-star star-five">✦</div>
        <div class="dream-star star-six">✧</div>



        <!-- CONTAINER 2: TABEL -->
        <section class="list-table-card">
            <div class="list-table-header">
                <h2>Data Kasir</h2>
                <a href="/indo/pages/cashiers/add.php" class="btn-add">+ Add</a>
            </div>

            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kasir</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (mysqli_num_rows($result) > 0):
                            while ($row = mysqli_fetch_assoc($result)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['nama_kasir']) ?></td>
                            <td><?= htmlspecialchars($row['no_telp']) ?></td>
                            <td><?= htmlspecialchars($row['alamat']) ?></td>
                            <td>
                                <a href="/indo/pages/cashiers/edit.php?id_kasir=<?= $row['id_kasir'] ?>"
                                    class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                        <?php
                            endwhile;
                        else:
                        ?>
                        <tr>
                            <td colspan="5">Belum ada data kasir.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="dream-divider bottom-divider">
                <span></span> ✦ <span></span>
            </div>

        </section>
    </main>

    <?php mysqli_free_result($result); ?>
</body>

</html>