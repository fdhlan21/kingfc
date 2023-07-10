<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard'); ?>" style="color: black;">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('useradmin'); ?>" class="btn bg-secondary">
                <i class="fas fa-fw fa-arrow-left" style="color: #ffffff;"></i>
                <span style="color: #ffffff; padding-left: 10px;">Kembali</span>
            </a>
            <a href="<?= base_url('settingwebsite'); ?>" class="btn bg-info">
                <i class="fas fa-wrench" style="color: #ffffff;"></i>
                <span style="color: #ffffff; padding-left: 10px;">Pengaturan</span>
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= base_url('settingwebsite/save'); ?>">
                <div class="form-group">
                    <label for="username">Nama Aplikasi</label>
                    <br>
                    <?php include 'string.php'; ?>
                    <p style="font-family: 'Poppins', sans-serif;"><strong><?php echo $string['app_name']; ?></strong></p>
                    <hr>
                </div>
                <div class="form-group">
                    <label for="password">Deskripsi Aplikasi</label>
                    <p style="font-family: 'Poppins', sans-serif;"><strong>Aplikasi Puskesmas Degangan</strong></p>
                    <hr>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Telepon</label>
                    <p style="font-family: 'Poppins', sans-serif;"><strong>08819571011</strong></p>
                </div>
                <div class="form-group">
                    <label for="role_id">Warna Tabel</label>
                    <div class="color-palette">
                        <div class="color-item" style="background-color: #4E73DF;"></div>
                        <div class="color-item" style="background-color: #1CC88A;"></div>
                        <div class="color-item" style="background-color: #4E73DF;"></div>
                        <div class="color-item" style="background-color: #36B9CC;"></div>
                    </div>
                    <style>
                        .color-palette {
                            display: flex;
                            flex-wrap: wrap;
                            gap: 10px;
                        }

                        .color-item {
                            width: 30px;
                            height: 30px;
                            border-radius: 20px;
                        }
                    </style>

                    <hr>

                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>