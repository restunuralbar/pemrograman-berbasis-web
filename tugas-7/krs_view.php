<?php
$koneksi = new mysqli("localhost", "root", "", "krs_db");

$query = "SELECT
    m.nama AS nama_mahasiswa,
    mk.nama AS nama_matakuliah,
    mk.jumlah_sks,
    CONCAT(m.nama, ' Mengambil Mata Kuliah ', mk.nama, ' (', mk.jumlah_sks, ' SKS)') AS keterangan
FROM
    krs k
JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk";

$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data KRS Mahasiswa</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #aaa; padding: 8px; text-align: left; }
        th { background-color: #eee; }
        span { color: #d63384; font-weight: bold; }
    </style>
</head>
<body>
    <h2 align="center">Data KRS Mahasiswa</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Mata Kuliah</th>
            <th>Keterangan</th>
        </tr>
        <?php $no = 1; while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_mahasiswa'] ?></td>
                <td><?= $row['nama_matakuliah'] ?></td>
                <td>
                    <span style="color:deeppink; font-weight:bold;">
                            <?= $row['nama_mahasiswa'] ?>
                    </span> Mengambil Mata Kuliah 
                    <span style="color:deeppink; font-weight:bold;">
                           <?= $row['nama_matakuliah'] ?>
                    </span> 
                           (<?= $row['jumlah_sks'] ?> SKS)
                </td>
             </tr>
        <?php } ?>
    </table>
</body>
</html>
