<?php
function generateCombinations($arr, $size, $start, $currCombination, &$result) {
    if ($size == 0) {
        $result[] = $currCombination;
        return;
    }

    for ($i = $start; $i < count($arr); $i++) {
        $currCombination[] = $arr[$i];
        generateCombinations($arr, $size - 1, $i + 1, $currCombination, $result);
        array_pop($currCombination);
    }
}

function handleSubmit(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form values
        $jumlahBarang = $_POST["jumlah_barang"];

        header("Location: /mvc-example/?actPaket=tampil-data&jumlahBarang=" . urlencode($jumlahBarang));
        exit();
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tokoelektronik";

$conn = new mysqli($servername, $username, $password, $dbname);

$combinations = array();

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM barang";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $barangList = array();
    while ($row = $result->fetch_assoc()) {
        $barangList[] = $row;
    }

    $jumlahBarangPaket = isset($_GET['jumlahBarang']) ? $_GET['jumlahBarang'] : 3;

    generateCombinations($barangList, $jumlahBarangPaket, 0, array(), $combinations);

} else {
    echo "<p>Tidak ada data barang.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kombinasi Paket Barang</title>
</head>

<body>
  <div style="padding: 16px;">

    <form method="post" action="<?php handleSubmit()?>">
      <label for="jumlah_barang">Jumlah Barang dalam Satu Paket:</label>
      <input type="number" name="jumlah_barang" id="jumlah_barang" required min="2" max="10">
      <button type="submit">Cari Kombinasi</button>
    </form>

    <h2>Hasil Kombinasi Paket</h2>

    <div style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 8px;">
      <?php foreach ($combinations as $index => $combi): ?>
      <div style="border: 1px solid #475569; padding: 16px; border-radius: 8px;">
        <p style="font-weight: 600; margin-top: 0px;">Paket <?= $index+1 ?> </p>
        <div style="display: grid; gap: 4px; font-size: 14px; color: #475569;">
          <?php foreach ($combi as $barang): ?>
          <span><?= $barang['NamaBarang'] ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>