<?php
echo "<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    table th, table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }
    table th {
        background-color: #4CAF50;
        color: white;
    }
    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    table tr:hover {
        background-color: #ddd;
    }
    h1 {
        color: #333;
    }
    .section {
        margin-bottom: 20px;
    }
</style>";

echo "<h1> Tgs PKL Hari Pertama</h1>";

//Variable
$nama = "Julian";
$umur = 20;
$tinggi = 160;
echo "<div class='section'><strong>1. Variable</strong><br>Nama: $nama, Umur: $umur tahun, Tinggi: $tinggi cm</div>";

//Konstanta
define("TIMEZONE", "Jakarta");
echo "<div class='section'><strong>2. Konstanta</strong><br>Zona waktu yang digunakan : " . TIMEZONE . "</div>";

//Tipe Data Integer
$angka1 = 10;
$angka2 = 20;
$hasil = $angka1 + $angka2;
echo "<div class='section'><strong>3. Tipe Data Integer</strong><br>Hasil penjumlahan : $hasil</div>";

//Tipe Data String
$greeting = "Hello, world!";
echo "<div class='section'><strong>4. Tipe Data String</strong><br>$greeting</div>";

//Tipe Data Float
$angka1 = 3.75;
$angka2 = 2.25;
$jumlah = $angka1 + $angka2;
echo "<div class='section'><strong>5. Tipe Data Float</strong><br>Jumlah : $jumlah</div>";

//Operator Aritmatika
$a = 15;
$b = 5;
echo "<div class='section'><strong>6. Operator Aritmatika</strong><br>Penjumlahan: " . ($a + $b) . "<br>Pengurangan: " . ($a - $b) . "</div>";

//Operator Logika
$a = true;
$b = false;
echo "<div class='section'><strong>7. Operator Logika</strong><br>a AND b: " . ($a && $b) . "<br>a OR b: " . ($a || $b) . "<br>NOT a: " . (!$a) . "</div>";

//Struktur Logika IF
$nilai = 75;
echo "<div class='section'><strong>8. Struktur Logika IF</strong><br>";
if ($nilai >= 80) {
    echo "Nilai A";
} elseif ($nilai >= 60) {
    echo "Nilai B";
} else {
    echo "Nilai C";
}
echo "</div>";

//Struktur Logika Switch
$hari = 2;
echo "<div class='section'><strong>9. Struktur Logika Switch</strong><br>";
switch ($hari) {
    case 1:
        echo "Senin";
        break;
    case 2:
        echo "Selasa";
        break;
    case 3:
        echo "Rabu";
        break;
    default:
        echo "Hari tidak valid";
}
echo "</div>";

//Perulangan For
echo "<div class='section'><strong>10. Perulangan For</strong><br>";
for ($i = 1; $i <= 3; $i++) {
    echo "Angka ke-" . $i . "<br>";
}
echo "</div>";

//Perulangan Foreach
$buah = array("Apel", "Jeruk", "Mangga");
echo "<div class='section'><strong>11. Perulangan Foreach</strong><br>";
foreach ($buah as $item) {
    echo $item . "<br>";
}
echo "</div>";

//Perulangan While
$i = 1;
echo "<div class='section'><strong>12. Perulangan While</strong><br>";
while ($i <= 3) {
    echo "Angka ke-" . $i . "<br>";
    $i++;
}
echo "</div>";

//Penulisan Function
function tambah($a, $b) {
    return $a + $b;
}
$hasil = tambah(10, 20);
echo "<div class='section'><strong>13. Penulisan Function</strong><br>Hasil penjumlahan 10 dan 20: " . $hasil . "</div>";
?>