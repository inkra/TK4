<?php
session_start();

// Langkah 1: Mendapatkan data dari formulir login
$namaPengguna = $_POST['nama_pengguna'];
$password = md5($_POST['password']); // Mengonversi kata sandi ke MD5

// Langkah 2: Membuat koneksi ke database
$server = "localhost";
$username = "root";
$passwordDB = "";
$database = "tokoelektronik";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $passwordDB);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Langkah 3: Query SQL dengan parameterized query
$query = "SELECT P.*, HA.NamaAkses
          FROM Pengguna P
          JOIN HakAkses HA ON P.IdAkses = HA.IdAkses
          WHERE NamaPengguna = :namaPengguna AND Password = :password";

// Langkah 4: Persiapan dan eksekusi query
$stmt = $conn->prepare($query);
$stmt->bindParam(':namaPengguna', $namaPengguna);
$stmt->bindParam(':password', $password);
$stmt->execute();

// Langkah 5: Mendapatkan hasil query
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

// Langkah 6: Menyiapkan pesan login dan menetapkan session
if ($userData) {
    // Set session data
    $_SESSION['nama_pengguna'] = $userData['NamaPengguna'];
    $_SESSION['NamaAkses'] = $userData['NamaAkses'];

    // Login berhasil
    $pesan = "Login berhasil. Hak Akses: " . $userData['NamaAkses'];
    echo "<script>alert('{$pesan}'); window.location.href = '../Views/dashboard.php';</script>";
    exit(); // pastikan untuk keluar setelah mengarahkan pengguna
} else {
    // Login gagal
    $pesan = "Login gagal. Nama pengguna atau kata sandi salah.";
    echo "<script>alert('{$pesan}'); window.location.href = 'app/Libraries/login.html';</script>";
    exit(); // pastikan untuk keluar setelah mengarahkan pengguna
}
?>
