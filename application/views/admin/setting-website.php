<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang diubah dari form
    $nama_aplikasi = $_POST["nama_aplikasi"];
    $deskripsi_aplikasi = $_POST["deskripsi_aplikasi"];
    $telepon = $_POST["telepon"];
    $warna_tabel = $_POST["warna_tabel"];

    // Menyimpan data ke pengaturan.php
    $pengaturan = "<?php\n\n";
    $pengaturan .= "\$string['app_name'] = '$nama_aplikasi';\n";
    $pengaturan .= "\$string['deskripsi_aplikasi'] = '$deskripsi_aplikasi';\n";
    $pengaturan .= "\$string['telepon'] = '$telepon';\n";
    $pengaturan .= "\$string['warna_tabel'] = '$warna_tabel';\n";
    $pengaturan .= "?>";

    file_put_contents("pengaturan", $pengaturan);

    // Redirect ke halaman pengaturan setelah penyimpanan berhasil
    header("Location: pengaturan");
    exit();
}

// Mengambil data pengaturan dari pengaturan.php
include "pengaturan.php";
?>

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
                    <label for="nama_aplikasi">Nama Aplikasi</label>
                    <br>
                    <input type="text" name="nama_aplikasi" value="<?= $string['app_name']; ?>">
                    <hr>
                </div>
                <div class="form-group">
                    <label for="deskripsi_aplikasi">Deskripsi Aplikasi</label>
                    <br>
                    <textarea name="deskripsi_aplikasi"><?= $string['deskripsi_aplikasi']; ?></textarea>
                    <hr>
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <br>
                    <input type="text" name="telepon" value="<?= $string['telepon']; ?>">
                </div>
                <div class="form-group">
                    <label for="warna_tabel">Warna Tabel</label>
                    <div class="color-palette">
                        <div class="color-item" style="background-color: <?= $string['warna_tabel']; ?>;"></div>
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
                    <input type="hidden" name="warna_tabel" value="<?= $string['warna_tabel']; ?>">

                    <hr>
                </div>
                <input type="submit" value="Simpan" style="display: none;">
            </form>
        </div>
    </div>
</div>