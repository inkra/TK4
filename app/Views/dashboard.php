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
  <style>
  table {
    border-collapse: collapse;
  }

  table,
  th,
  td {
    border: 1px solid;
    text-align: center;
    padding: 4px;
  }
  </style>
</head>

<body style="padding: 24px;">

  <header>
    <h1>Dashboard</h1>
    <p>Selamat datang, <?php echo $namaPengguna; ?>! Hak Akses: <?php echo $namaAkses; ?></p>
    <!-- Tambahkan elemen header lainnya sesuai kebutuhan -->
  </header>

  <section>
    <h2>Laporan Rugi Laba</h2>
    <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px;">
      <div style="border: 1px solid gray; padding: 16px;">
        <h3 style="margin: 0px;">Pengeluaran</h3>
        <p style="margin: 0px; margin-top: 16px;">Total Pengeluaran:
          <?php echo number_format($totalPembelian, 2); ?>
        </p>
        <p style="margin: 0px;">Total Transaksi:
          <?php echo $pembelianData->rowCount(); ?>
        </p>
      </div>

      <div style="border: 1px solid gray; padding: 16px;">
        <h3 style="margin: 0px;">Pemasukan</h3>
        <p style="margin: 0px; margin-top: 16px;">Total Pemasukan:
          <?php echo number_format($totalPenjualan, 2); ?>
        </p>
        <p style="margin: 0px;">Total Transaksi:
          <?php echo $pembelianData->rowCount(); ?>
        </p>
      </div>

      <div style="border: 1px solid gray; padding: 16px;">
        <h3 style="margin: 0px;">Profit & Loss</h3>
        <h2 style="margin: 0px; margin-top: 16px;">
          <?php echo number_format($totalPenjualan - $totalPembelian, 2); ?>
        </h2>
      </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); margin-top: 24px; gap: 24px;">
      <div>
        <h3>Transkasi Pengeluaran</h3>
        <table style="width: 100%;">
          <thead>
            <tr>
              <th>No</th>
              <th>Id Transaksi</th>
              <th>Nama Barang</th>
              <th>Jumlah Barang</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pembelianData as $index => $data): ?>
            <tr>
              <td><?= $index+1 ?></td>
              <td><?= $data['IdPembelian'] ?></td>
              <td><?= $data['NamaBarang'] ?></td>
              <td><?= $data['JumlahPembelian'] ?></td>
              <td><?= number_format($data['HargaBeli'],2) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div>
        <h3>Transkasi Pemasukan</h3>
        <table style="width: 100%;">
          <thead>
            <tr>
              <th>No</th>
              <th>Id Transaksi</th>
              <th>Nama Barang</th>
              <th>Jumlah Barang</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($penjualanData as $index => $data): ?>
            <tr>
              <td><?= $index+1 ?></td>
              <td><?= $data['IdPenjualan'] ?></td>
              <td><?= $data['NamaBarang'] ?></td>
              <td><?= $data['JumlahPenjualan'] ?></td>
              <td><?= number_format($data['HargaJual'],2) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div>
  </section>

  <footer>
    <p>&copy; 2024 Your Company</p>
  </footer>

</body>

</html>