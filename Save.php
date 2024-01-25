<?php
 //Disini akan digunakan kode PHP untuk memproses data
//Ambil koneksi ke basisdata, karena data ini akan disimpan didalam basisdata.
require_once "KoneksiDB.php";
//cek 

// ...
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $bank = $_POST['bank'];
    $motor = $_POST['motor'];
    $jmlh_hari = $_POST['jmlh_hari'];

    // Perhitungan biaya_total
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
        // Tambahkan case untuk motor lain jika diperlukan
    }

    $biaya_total = $biaya_per_hari * $jmlh_hari;

    // Gunakan prepared statement untuk mencegah SQL injection
    $sqlsave = "INSERT INTO uas (email, nama, no_hp, bank, motor, jmlh_hari, biaya_total) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sqlsave);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssi", $email, $nama, $no_hp, $bank, $motor, $jmlh_hari, $biaya_total);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Data sudah disimpan'); window.location.assign('TampilData.php');</script>";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error in preparing statement: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>
