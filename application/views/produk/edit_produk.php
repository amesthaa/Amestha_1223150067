<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Produk</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Edit Produk</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>

      <div class="card-body">
        <form action="<?= base_url('product/edit/' . $produk['id_produk']); ?>" method="POST">
          <div class="box-body">
            <div class="form-group">
              <label for="kode_produk">Kode Produk</label>
              <input type="text" class="form-control" name="kode_produk" id="kode_produk" value="<?= $produk['kode_produk']; ?>" readonly>
            </div>

            <div class="form-group">
              <label for="nama_produk">Nama Produk</label>
              <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= $produk['nama_produk']; ?>" required>
            </div>

            <div class="form-group">
              <label for="harga_produk">Harga Produk</label>
              <input type="number" class="form-control" name="harga_produk" id="harga_produk" value="<?= $produk['harga_produk']; ?>" required>
            </div>

            <div class="form-group">
              <label for="stok_produk">Stok Produk</label>
              <input type="number" class="form-control" name="stok_produk" id="stok_produk" value="<?= $produk['stok_produk']; ?>" required>
            </div>
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('product'); ?>" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>

      <div class="card-footer">
      </div>
    </div>
  </section>
</div>
