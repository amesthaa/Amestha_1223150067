<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Laporan Penjualan per Produk</h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <!-- <a href="<?= base_url('salesorder/print_laporan_produk'); ?>" target="_blank" class="btn btn-success mb-3">
          <i class="fas fa-print"></i> Cetak Laporan Produk
        </a> -->

        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Jumlah Terjual</th>
              <th>Total Penjualan</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($laporan as $row): ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $row['nama_produk']; ?></td>
              <td><?= $row['jumlah_terjual']; ?> kali</td>
              <td>Rp<?= number_format($row['total_penjualan'], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
