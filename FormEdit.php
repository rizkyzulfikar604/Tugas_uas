<?php
// FormEdit.php
include "KoneksiDB.php";

// Mengambil data yang akan diedit, berdasarkan email yang dipilih dan dikirim melalui link (GET)
$email = $_GET['email'];

// Membuat SQL untuk menampilkan data
$sqldata = "SELECT * FROM uas WHERE email='$email'";

// Ambil koneksi data
require_once "KoneksiDB.php";

// Proses SQL
$query = mysqli_query($koneksi, $sqldata);

// Mengubah data ke array asosiatif, tidak menggunakan perulangan karena datanya hanya 1.
$data = mysqli_fetch_assoc($query);

// Hitung ulang biaya berdasarkan motr dan jumlah hari
$biaya_per_hari = 0;
switch ($data['motor']) {
    case 'Pcx':
        $biaya_per_hari = 200000;
        break;
    case 'Nmax':
        $biaya_per_hari = 200000;
        break;
    case 'Vario':
        $biaya_per_hari = 150000;
        break;
}
$biaya_total = $biaya_per_hari * $data['jmlh_hari'];
?>

<!-- Form untuk mengedit data -->
<form action="Update.php" method="POST">
    <link rel="stylesheet" href="payment.css"> 

    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= $data['email'] ?>" required readonly>
    </div>
    <div>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" required>
    </div>
    <div>
        <label for="no_hp">Phone Number:</label>
        <input type="text" id="no_hp" name="no_hp" value="<?= $data['no_hp'] ?>" required>
    </div>
    <div>
        <label for="bank">Select Your BANK:</label>
        <select id="bank" name="bank" required>
            <option value="BRI" <?= ($data['bank'] == 'BRI') ? 'selected' : '' ?>>BRI</option>
            <option value="BCA" <?= ($data['bank'] == 'BCA') ? 'selected' : '' ?>>BCA</option>
            <option value="MANDIRI" <?= ($data['bank'] == 'MANDIRI') ? 'selected' : '' ?>>MANDIRI</option>
        </select>
    </div>
    <div>
        <label for="motor">Select Your Car:</label>
        <select id="motor" name="motor" required>
            <option value="Pcx" <?= ($data['motor'] == 'Pcx') ? 'selected' : '' ?>>Pcx</option>
            <option value="Nmax" <?= ($data['motor'] == 'Nmax') ? 'selected' : '' ?>>Nmax</option>
            <option value="Vario" <?= ($data['motor'] == 'Vario') ? 'selected' : '' ?>>Vario</option>
        </select>
    </div>
    <div>
        <label for="jmlh_hari">Jumlah Hari:</label>
        <input type="number" id="jmlh_hari" name="jmlh_hari" min="1" max="10" value="<?= $data['jmlh_hari'] ?>" required>
    </div>
    <div>
        <label for="biaya">Biaya:</label>
        <input type="text" id="biaya" name="biaya" value="<?= $biaya_total ?>" readonly>
    </div>
    <button type="submit" name="kirim" value="kirim">Update Data</button>
</form>
