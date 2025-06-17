<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Input Sales Order</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Input Sales Order</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Tambah Sales Order</h3>
      </div>

      <div class="card-body">
        <form action="<?= base_url('Salesorder/insert'); ?>" method="POST">
          
          <!-- Pelanggan -->
          <div class="form-group">
            <label for="id_pelanggan">Nama Pelanggan</label>
            <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
              <option value="">-- Pilih Pelanggan --</option>
              <?php foreach ($pelanggan as $p): ?>
                <option value="<?= $p['id_pelanggan']; ?>"><?= $p['nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Produk -->
          <div class="form-group">
            <label for="id_produk">Produk</label>
            <select name="id_produk" id="id_produk" class="form-control" required onchange="updateHarga()">
              <option value="">-- Pilih Produk --</option>
              <?php foreach ($produk as $pr): ?>
                <option value="<?= $pr['id_produk']; ?>" data-harga="<?= $pr['harga_produk']; ?>">
                  <?= $pr['nama_produk']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Jumlah -->
          <div class="form-group">
            <label for="jumlah">Jumlah (pcs)</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Produk" min="1" required oninput="hitungTotal()">
          </div>

          <!-- Total Harga -->
          <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="text" class="form-control" name="total_harga" id="total_harga" readonly>
          </div>

          <!-- Hidden Harga -->
          <input type="hidden" name="harga_produk" id="harga_produk">

          <!-- Created At -->
          <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s'); ?>">

          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>

      <div class="card-footer"></div>
    </div>
  </section>
</div>

<script>
  function updateHarga() {
    const select = document.getElementById('id_produk');
    const selected = select.options[select.selectedIndex];
    const harga = selected.getAttribute('data-harga') || 0;
    document.getElementById('harga_produk').value = harga;
    hitungTotal();
  }

  function hitungTotal() {
    const harga = parseFloat(document.getElementById('harga_produk').value) || 0;
    const jumlah = parseInt(document.getElementById('jumlah').value) || 0;
    const total = harga * jumlah;
    document.getElementById('total_harga').value = total.toLocaleString('id-ID');
  }
</script>
