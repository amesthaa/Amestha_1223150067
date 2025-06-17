<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Produk</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Produk</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <a href="<?= base_url('product/tambah'); ?>" class="btn btn-primary mb-3">Tambah Produk</a>

        <?php if (!empty($tbl_produk)): ?>
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tbl_produk as $p): ?>
              <tr>
                <td><?= $p['kode_produk']; ?></td>
                <td><?= $p['nama_produk']; ?></td>
                <td><?= number_format($p['harga_produk'], 0, ',', '.'); ?></td>
                <td><?= $p['stok_produk']; ?></td>
                <td>
                  <a href="<?= base_url('product/edit/' . $p['id_produk']); ?>" class="btn btn-sm btn-info">Edit</a>
                  <a href="<?= base_url('product/delete/' . $p['id_produk']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php else: ?>
          <p>Data produk belum tersedia.</p>
        <?php endif; ?>
      </div>

      <div class="card-footer">
        Footer
      </div>
    </div>
  </section>
</div>
