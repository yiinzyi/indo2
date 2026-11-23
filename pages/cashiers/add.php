<?php
// ========================================
// KONEKSI DATABASE
// ========================================

define('ROOTPATH', $_SERVER['DOCUMENT_ROOT'] . '/indo');

require_once ROOTPATH . '/config/config.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Data Kasir | Indomaret</title>

    <link rel="stylesheet" href="/indo/assets/css/style.css">
</head>

<body class="add-cashier-page">

    <!-- HEADER -->
    <header class="dream-header">

        <a href="/indo/index.php" class="dream-logo">
            <span></span> Indomaret
        </a>

        <nav class="dream-nav">

            <a href="/indo/pages/dashboard.php">
                Dashboard
            </a>

            <a href="/indo/pages/products/list.php">
                Product
            </a>

            <a href="/indo/pages/cashiers/list.php" class="active">
                Cashier
            </a>

            <a href="/indo/pages/donations/list.php">
                Donation
            </a>

            <a href="/indo/pages/transactions/list.php">
                Transaction
            </a>
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


        <!-- FORM CARD -->
        <section class="dream-form-card">

            <div class="dream-emblem">🛒</div>

            <div class="dream-ornament top-ornament">
                ✧ ❀ ✧
            </div>

            <h1>Tambah Data Kasir</h1>

            <p class="dream-subtitle">
                Silakan isi informasi kasir di bawah ini
            </p>


            <!-- PEMBATAS -->
            <div class="dream-divider">
                <span></span> ✦ <span></span>
            </div>


            <!-- FORM TAMBAH KASIR -->
            <form action="/indo/pages/process/cashiers_process.php" method="POST" class="dream-form">

                <!-- MENENTUKAN AKSI TAMBAH -->
                <input type="hidden" name="action" value="add">


                <!-- NAMA KASIR -->
                <div class="dream-field">

                    <label for="nama_kasir">
                        ✦ Nama Kasir
                    </label>

                    <div class="dream-input">

                        <span class="input-icon">♙</span>

                        <input type="text" id="nama_kasir" name="nama_kasir" placeholder="Masukkan nama kasir..."
                            required>

                    </div>

                </div>


                <!-- NOMOR TELEPON -->
                <div class="dream-field">

                    <label for="no_telp">
                        ✦ Nomor Telepon
                    </label>

                    <div class="dream-input">

                        <span class="input-icon">♧</span>

                        <input type="text" id="no_telp" name="no_telp" placeholder="Masukkan nomor telepon kasir..."
                            required>

                    </div>

                </div>


                <!-- ALAMAT -->
                <div class="dream-field">

                    <label for="alamat">
                        ✦ Alamat
                    </label>

                    <div class="dream-input">

                        <span class="input-icon">♡</span>

                        <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat kasir..." required>

                    </div>

                </div>


                <!-- TOMBOL TAMBAH -->
                <button type="submit" class="dream-submit">

                    <span class="button-star">✦</span>

                    <span class="button-plus">＋</span>

                    Tambah Kasir

                    <span class="button-star">✦</span>

                </button>

            </form>


            <!-- PEMBATAS BAWAH -->
            <div class="dream-divider bottom-divider">
                <span></span> ✦ <span></span>
            </div>


            <div class="dream-ornament bottom-ornament">
                ❧ ✧ ❧
            </div>

        </section>

    </main>

</body>

</html>