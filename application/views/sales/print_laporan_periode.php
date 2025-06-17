<!DOCTYPE html>
<html>
<head>
  <title>Cetak Laporan Penjualan per Periode</title>
  <style>
    body { font-family: Arial; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 6px; }
    h3 { text-align: center; }
    @media print { .no-print { display: none; } }
  </style>
</head>
<body>
  <h3>Laporan Penjualan<br>Periode <?= date('d-m-Y', strtotime($tanggal_mulai)); ?> s/d <?= date('d-m-Y', strtotime($tanggal_selesai)); ?></h3>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Produk</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Status</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($laporan as $row): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_pelanggan']; ?></td>
        <td><?= $row['nama_produk']; ?></td>
        <td><?= $row['jumlah']; ?> pcs</td>
        <td>Rp<?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
        <td><?= $row['status']; ?></td>
        <td><?= date('d-m-Y', strtotime($row['created_at'])); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <br><br>
  <button onclick="window.print()" class="no-print">Cetak</button>
</body>
</html>
