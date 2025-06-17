<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Input Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Input Pelanggan</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Pelanggan</h3>
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
        <form action="<?= base_url('pelanggan/insert'); ?>" method="POST">
          <div class="form-group">
            <label for="nama">Nama Pelanggan</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pelanggan" required>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required></textarea>
          </div>
          <div class="form-group">
            <label for="no_hp">No. HP</label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor HP" required>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>

      <div class="card-footer"></div>
    </div>
  </section>
</div>
