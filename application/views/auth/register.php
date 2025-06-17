<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h2>Form Pendaftaran</h2>

                <?php if ($this->session->flashdata('success')): ?>
                    <p style="color:green;"><?= $this->session->flashdata('success'); ?></p>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <p style="color:red;"><?= $this->session->flashdata('error'); ?></p>
                <?php endif; ?>

                <?= validation_errors('<p style="color:red;">', '</p>'); ?>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form action="<?= base_url('auth/process_register'); ?>" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" name="role" id="role" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="Manajer">Manajer</option>
                                <option value="sales">Sales</option>
                            </select>
                        </div>

                        <!-- Field nama_sales muncul kalau role == sales -->
                        <div class="form-group" id="sales_name_field" style="display: none;">
                            <label for="nama_sales">Nama Sales</label>
                            <input type="text" class="form-control" name="nama_sales" id="nama_sales" placeholder="Masukkan nama sales">
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </section>
</div>

<!-- Script untuk tampilkan input nama_sales saat pilih role sales -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role');
        const salesField = document.getElementById('sales_name_field');

        roleSelect.addEventListener('change', function () {
            if (roleSelect.value === 'sales') {
                salesField.style.display = 'block';
                document.getElementById('nama_sales').setAttribute('required', 'required');
            } else {
                salesField.style.display = 'none';
                document.getElementById('nama_sales').removeAttribute('required');
            }
        });
    });
</script>
