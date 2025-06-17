<div class="content-wrapper">
  <section class="content-header">
    <h1>Laporan Penjualan per Sales</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Sales</th>
              <th>Jumlah Order</th>
              <th>Total Penjualan</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($laporan as $row): ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $row['nama_sales']; ?></td>
              <td><?= $row['jumlah_so']; ?></td>
              <td>Rp<?= number_format($row['total_penjualan'], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
