<?php
$koneksi = new mysqli("localhost", "root", "", "krs_db");
$tabel = 'krs';
$data = $koneksi->query("SELECT * FROM $tabel");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data KRS</title>
</head>
<body>
<h2>Data KRS</h2>
<table border='1' cellpadding='5'>
    <tr>
        <th>ID</th><th>NPM Mahasiswa</th><th>Kode MK</th>
    </tr>
    <?php while($row = $data->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td><td><?= $row['mahasiswa_npm'] ?></td><td><?= $row['matakuliah_kodemk'] ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
