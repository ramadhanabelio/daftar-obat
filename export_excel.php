<?php
$conn = new mysqli("localhost", "root", "", "daftar_obat");

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=daftar_obat.csv');

$output = fopen('php://output', 'w');

fputcsv($output, ['No', 'Nama Obat', 'Jenis', 'Deskripsi', 'Stok', 'Harga', 'Kadaluarsa']);

$sql = "SELECT * FROM medicines ORDER BY name ASC";
$result = $conn->query($sql);
$no = 1;

while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $no++,
        $row['name'],
        $row['type'],
        $row['description'],
        $row['stock'],
        $row['price'],
        $row['expiration_date']
    ]);
}

fclose($output);
exit;
