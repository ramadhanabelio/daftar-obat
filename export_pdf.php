<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$conn = new mysqli("localhost", "root", "", "dayah");
$data = $conn->query("SELECT * FROM medicines");

$html = '<h3 style="text-align:center;">Daftar Obat</h3><table border="1" cellspacing="0" cellpadding="5" width="100%">
<tr>
<th>No</th><th>Nama Obat</th><th>Jenis</th><th>Deskripsi</th><th>Stok</th><th>Harga</th><th>Kadaluarsa</th>
</tr>';
$no = 1;
while ($row = $data->fetch_assoc()) {
    $html .= "<tr>
    <td>{$no}</td>
    <td>{$row['name']}</td>
    <td>{$row['type']}</td>
    <td>{$row['description']}</td>
    <td>{$row['stock']}</td>
    <td>Rp " . number_format($row['price'], 0, ',', '.') . "</td>
    <td>" . date('d-m-Y', strtotime($row['expiration_date'])) . "</td>
    </tr>";
    $no++;
}
$html .= '</table>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("daftar_obat.pdf", ["Attachment" => false]);
