<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pelanggan</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pelanggan</h3>
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
        <a href="<?= base_url('pelanggan/tambah'); ?>" class="btn btn-primary mb-3">Tambah Pelanggan</a>

        <?php if (!empty($pelanggan)): ?>
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>No HP</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pelanggan as $p): ?>
              <tr>
                <td><?= $p['id_pelanggan']; ?></td>
                <td><?= $p['nama']; ?></td>
                <td><?= $p['alamat']; ?></td>
                <td><?= $p['no_hp']; ?></td>
                <td>
                  <a href="<?= base_url('pelanggan/delete/' . $p['id_pelanggan']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</a>
                  <a href="<?= base_url('pelanggan/edit/' . $p['id_pelanggan']); ?>" class="btn btn-sm btn-info">Edit</a>

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php else: ?>
          <p>Data pelanggan belum tersedia.</p>
        <?php endif; ?>
      </div>

      <div class="card-footer">
        Footer
      </div>
    </div>
  </section>
</div>
