<?php
// mengambil program koneksidb, dengan menggunakan fungsi include
include "KoneksiDB.php";
// Membuat SQL untuk menampilkan data
$sqltampil = "SELECT * FROM uas";
// Melakukan proses query ke basis data
$query = mysqli_query($koneksi, $sqltampil) or die("SQL Error");
if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

$nomor = 1; // untuk membuat nomor untuk di tabel hasil query
?>
<h2>Data Pelanggan</h2>
<!-- Disini kita buat link untuk menambahkan data, dimana link ini
nantinya akan memanggil form tambah data. -->
<a href="payment.php">Tambah Data</a>
<link rel="stylesheet" href="TampilData.css">

<table width="100%" border="1">

    <thead>
        <tr>
            <th>No</th>
            <th>Email</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>BANK</th>
            <th>Motor</th>
            <th>Jumlah Hari</th>
            <th>Biaya</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php

        // Jika data lebih dari 1, maka kita bisa menampilkan dengan menggunakan perintah perulangan seperti (for,while, do-while,foreach)
        // mysqli_fetch_assoc merupakan fungsi yang digunakan untuk mengkonversi data menjadi data array asosiatif.
        while ($data = mysqli_fetch_assoc($query)) {
            // Menambahkan logika untuk menghitung biaya berdasarkan jenis motor dan jumlah hari
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
                // Tambahkan case untuk motor lain jika diperlukan
            }

            $jumlah_hari = $data['jmlh_hari'];
            $biaya_total = $biaya_per_hari * $jumlah_hari;
        ?>
            <tr>
                <!-- untuk menampilkan data, kita gunakan tag pandek php yaitu spt
                dibawah -->
                <td><?= $nomor ?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['no_hp'] ?></td>
                <td><?= $data['bank'] ?></td>
                <td><?= $data['motor'] ?></td>
                <td><?= $jumlah_hari ?></td>
                <td><?= $biaya_total ?></td>
                <td>

                <a href="FormEdit.php?email=<?= $data['email'] ?>" class="edit-btn">Edit</a>
                <a href="Delete.php?email=<?= $data['email'] ?>" class="delete-btn">Delete</a>
                </td>
            </tr>
        <?php $nomor++;
        } //akhir dari perulangan ?>
    </tbody>
</table>
