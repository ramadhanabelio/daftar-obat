<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'dayah';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM medicines ORDER BY name ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Obat - Dayah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eef2f5;
        }

        .card {
            border: none;
            border-radius: 1rem;
        }

        .card-header {
            background: linear-gradient(90deg, #0d6efd, #0dcaf0);
            color: white;
            padding: 1.2rem 1.5rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .table thead {
            background-color: #0d6efd;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .search-input {
            max-width: 300px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">📋 Daftar Obat</h4>
                <div>
                    <a href="export_pdf.php" class="btn btn-outline-light btn-sm me-2">📄 PDF</a>
                    <a href="export_excel.php" class="btn btn-outline-light btn-sm">📊 CSV</a>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <input type="text" class="form-control form-control-sm search-input" placeholder="🔍 Cari nama obat..." id="searchInput">
                    <small class="text-muted">Total: <?= $result->num_rows ?> obat</small>
                </div>

                <?php if ($result->num_rows > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle table-sm" id="medicineTable">
                            <thead class="text-center">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Obat</th>
                                    <th>Jenis</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Kadaluarsa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?>.</td>
                                        <td><?= htmlspecialchars($row['name']) ?></td>
                                        <td><?= htmlspecialchars($row['type']) ?></td>
                                        <td><?= htmlspecialchars($row['description']) ?></td>
                                        <td class="text-center"><?= $row['stock'] ?></td>
                                        <td>Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                                        <td><?= date('d M Y', strtotime($row['expiration_date'])) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning text-center">Tidak ada data obat yang tersedia.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let input = this.value.toLowerCase();
            let rows = document.querySelectorAll('#medicineTable tbody tr');
            rows.forEach(row => {
                const name = row.cells[1].textContent.toLowerCase();
                row.style.display = name.includes(input) ? '' : 'none';
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php $conn->close(); ?>