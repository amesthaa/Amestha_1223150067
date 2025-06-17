<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Laporan Penjualan per Periode</h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <label>Dari Tanggal</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Sampai Tanggal</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
          </div>
          <button type="submit" name="filter" class="btn btn-primary">Tampilkan</button>
        </form>

        <?php if (!empty($laporan)): ?>
        <hr>
        <a href="<?= base_url("salesorder/print_laporan_periode/{$tanggal_mulai}/{$tanggal_selesai}") ?>" target="_blank" class="btn btn-success mb-3">
          <i class="fas fa-print"></i> Cetak Laporan
        </a>

        <table class="table table-bordered">
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
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
