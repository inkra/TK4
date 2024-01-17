<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['nama_pengguna']) || !isset($_SESSION['NamaAkses'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: ../Libraries/login.html");
    exit();
}

// Ambil data nama_pengguna dan NamaAkses dari session
$namaPengguna = $_SESSION['nama_pengguna'];
$namaAkses = $_SESSION['NamaAkses'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tambahkan link ke file CSS jika diperlukan -->
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>

    <header>
        <h1>Dashboard</h1>
        <p>Selamat datang, <?php echo $namaPengguna; ?>! Hak Akses: <?php echo $namaAkses; ?></p>
        <!-- Tambahkan elemen header lainnya sesuai kebutuhan -->
    </header>

    <nav>
        <ul>
            <li><a href="#">Menu 1</a></li>
            <li><a href="#">Menu 2</a></li>
            <li><a href="#">Menu 3</a></li>
            <!-- Tambahkan menu lainnya sesuai kebutuhan -->
        </ul>
    </nav>

    <section>
        <h2>Content Section</h2>
        <!-- Tambahkan konten utama dashboard di sini -->
    </section>

    <aside>
        <h2>Sidebar</h2>
        <!-- Tambahkan elemen sidebar atau widget sesuai kebutuhan -->
    </aside>

    <footer>
        <p>&copy; 2024 Your Company</p>
    </footer>

</body>
</html>
