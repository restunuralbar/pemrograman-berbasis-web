<?php
$koneksi = new mysqli("localhost", "root", "", "krs_db");
$tabel = 'matakuliah';
$data = $koneksi->query("SELECT * FROM $tabel");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Matakuliah</title>
</head>
<body>
<h2>Data Matakuliah</h2>
<table border='1' cellpadding='5'>
    <tr>
        <th>Kode MK</th><th>Nama</th><th>SKS</th>
    </tr>
    <?php while($row = $data->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['kodemk'] ?></td><td><?= $row['nama'] ?></td><td><?= $row['jumlah_sks'] ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
