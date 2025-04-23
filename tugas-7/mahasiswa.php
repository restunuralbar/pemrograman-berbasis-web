<?php
$koneksi = new mysqli("localhost", "root", "", "krs_db");
$tabel = 'mahasiswa';
$data = $koneksi->query("SELECT * FROM $tabel");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
<h2>Data Mahasiswa</h2>
<table border='1' cellpadding='5'>
    <tr>
        <th>NPM</th><th>Nama</th><th>Jurusan</th><th>Alamat</th>
    </tr>
    <?php while($row = $data->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['npm'] ?></td><td><?= $row['nama'] ?></td><td><?= $row['jurusan'] ?></td><td><?= $row['alamat'] ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
