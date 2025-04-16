<?php

$bandara_asal = array(
    "Soekarno Hatta" => 60000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 45000,
    "Juanda" => 30000
);


$bandara_tujuan = array(
    "Ngurah Rai" => 80000,
    "Hasanuddin" => 75000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
);


$asal_sorted = array_keys($bandara_asal);
sort($asal_sorted);

$tujuan_sorted = array_keys($bandara_tujuan);
sort($tujuan_sorted);


$hasil = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maskapai = $_POST["maskapai"];
    $asal = $_POST["asal"];
    $tujuan = $_POST["tujuan"];
    $harga = intval($_POST["harga"]);


    $pajak_asal = 0;
    switch ($asal) {
        case "Soekarno Hatta": $pajak_asal = 65000; break;
        case "Husein Sastranegara": $pajak_asal = 50000; break;
        case "Abdul Rachman Saleh": $pajak_asal = 40000; break;
        case "Juanda": $pajak_asal = 30000; break;
    }


    $pajak_tujuan = 0;
    switch ($tujuan) {
        case "Ngurah Rai": $pajak_tujuan = 85000; break;
        case "Hasanuddin": $pajak_tujuan = 70000; break;
        case "Inanwatan": $pajak_tujuan = 90000; break;
        case "Sultan Iskandar Muda": $pajak_tujuan = 60000; break;
    }


    $pajak_total = $pajak_asal + $pajak_tujuan;
    $total_harga = $harga + $pajak_total;


    $hasil = [
        "Nomor" => rand(1000, 9999),
        "Tanggal" => date("Y-m-d"),
        "Maskapai" => $maskapai,
        "Asal" => $asal,
        "Tujuan" => $tujuan,
        "Harga" => $harga,
        "Pajak" => $pajak_total,
        "Total" => $total_harga
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Rute Penerbangan</title>
</head>
<body>
    <h2>Form Pendaftaran Rute Penerbangan</h2>
    <form method="POST">
        Nama Maskapai: <input type="text" name="maskapai" required><br><br>

        Bandara Asal:
        <select name="asal" required>
            <?php foreach ($asal_sorted as $asal) { ?>
                <option value="<?= $asal ?>"><?= $asal ?></option>
            <?php } ?>
        </select><br><br>

        Bandara Tujuan:
        <select name="tujuan" required>
            <?php foreach ($tujuan_sorted as $tujuan) { ?>
                <option value="<?= $tujuan ?>"><?= $tujuan ?></option>
            <?php } ?>
        </select><br><br>

        Harga Tiket: <input type="number" name="harga" required><br><br>

        <button type="submit">Proses</button>
    </form>

    <?php if (!empty($hasil)) { ?>
        <h3>Output Pendaftaran:</h3>
        <table border="1" cellpadding="5">
            <tr><td>Nomor</td><td><?= $hasil["Nomor"] ?></td></tr>
            <tr><td>Tanggal</td><td><?= $hasil["Tanggal"] ?></td></tr>
            <tr><td>Nama Maskapai</td><td><?= $hasil["Maskapai"] ?></td></tr>
            <tr><td>Asal Penerbangan</td><td><?= $hasil["Asal"] ?></td></tr>
            <tr><td>Tujuan Penerbangan</td><td><?= $hasil["Tujuan"] ?></td></tr>
            <tr><td>Harga Tiket</td><td>Rp <?= number_format($hasil["Harga"]) ?></td></tr>
            <tr><td>Pajak</td><td>Rp <?= number_format($hasil["Pajak"]) ?></td></tr>
            <tr><td>Total Harga Tiket</td><td>Rp <?= number_format($hasil["Total"]) ?></td></tr>
        </table>
    <?php } ?>
</body>
</html>
