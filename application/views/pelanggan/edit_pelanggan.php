<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Edit Pelanggan</h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Edit Pelanggan</h3>
      </div>

      <div class="card-body">
        <form action="<?= base_url('pelanggan/update'); ?>" method="POST">
          <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']; ?>">

          <div class="form-group">
            <label for="nama">Nama Pelanggan</label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= $pelanggan['nama']; ?>" required>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" required><?= $pelanggan['alamat']; ?></textarea>
          </div>

          <div class="form-group">
            <label for="no_hp">No. HP</label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $pelanggan['no_hp']; ?>" required>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </section>
</div>
