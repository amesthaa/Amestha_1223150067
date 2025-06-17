<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Sales Order</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sales Order</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Sales Order Anda</h3>
        <div class="card-tools">
          <a href="<?= base_url('salesorder/tambah'); ?>" class="btn btn-primary btn-sm">Tambah Sales Order</a>
        </div>
      </div>

      <div class="card-body">
        <?php if (!empty($salesorder)): ?>
        <table class="table table-bordered table-striped" id="datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pelanggan</th>
              <th>Produk</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Total</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php  $no = 1; foreach ($salesorder as $so): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $so['nama_pelanggan']; ?></td>
                <td><?= $so['nama_produk']; ?></td>
                <td><?= $so['jumlah']; ?> pcs</td>
                <td>Rp<?= number_format($so['harga_produk'], 0, ',', '.'); ?></td>
                <td>Rp<?= number_format($so['total_harga'], 0, ',', '.'); ?></td>
                <td><?= $so['status']; ?></td>
                <td><?= date('d-m-Y H:i', strtotime($so['created_at'])); ?></td>
                <td>
  <form action="<?= base_url('salesorder/update_status/' . $so['id_so']); ?>" method="post" class="d-inline">
    <select name="status" onchange="this.form.submit()" class="form-control form-control-sm">
      <option <?= $so['status'] == 'draft' ? 'selected' : '' ?>>draft</option>
      <option <?= $so['status'] == 'dikirim' ? 'selected' : '' ?>>dikirim</option>
      <option <?= $so['status'] == 'selesai' ? 'selected' : '' ?>>selesai</option>
      <option <?= $so['status'] == 'dibatalkan' ? 'selected' : '' ?>>dibatalkan</option>
    </select>
  </form>
  <a href="<?= base_url('salesorder/delete/' . $so['id_so']); ?>" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
</td>

                
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php else: ?>
          <p>Belum ada data sales order.</p>
        <?php endif; ?>
      </div>

      <div class="card-footer">Sales Order</div>
    </div>
  </section>
</div>
