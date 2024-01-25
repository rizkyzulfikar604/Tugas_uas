<?php
// Update.php
require_once "KoneksiDB.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $bank = mysqli_real_escape_string($koneksi, $_POST['bank']);
    $motor = mysqli_real_escape_string($koneksi, $_POST['motor']);
    $jmlh_hari = mysqli_real_escape_string($koneksi, $_POST['jmlh_hari']);

    // Hitung ulang biaya berdasarkan motor dan jumlah hari
    $biaya_per_hari = 0;
    switch ($motor) {
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
    $biaya_total = $biaya_per_hari * $jmlh_hari;

    $sqlupdate = "UPDATE uas SET nama='$nama', no_hp='$no_hp', bank='$bank', motor='$motor', jmlh_hari='$jmlh_hari', biaya_total='$biaya_total' WHERE email='$email'";

    if (mysqli_query($koneksi, $sqlupdate)) {
        echo "<script>alert('Data sudah diupdate'); window.location.assign('TampilData.php');</script>";
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
} else {
    // Jika tidak ada data POST, redirect atau tampilkan pesan kesalahan sesuai kebutuhan
    // Contoh: header("Location: TampilData.php");
    echo "Invalid request.";
}
?>
