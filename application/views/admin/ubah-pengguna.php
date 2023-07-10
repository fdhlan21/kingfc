<?php

include "koneksi.php";

$sql = mysqli_query($koneksi, "select * from pengguna where id='$_GET[id]'");
$data = mysqli_fetch_array($sql)

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard'); ?>" style="color: black;">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= base_url('pengguna'); ?>" style="color: black;">Pengguna</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Pengguna</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('pengguna'); ?>" class="btn bg-secondary">
                <i class="fas fa-fw fa-arrow-left" style="color: #ffffff;"></i>
                <span style="color: #ffffff; padding-left: 10px;">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <?php
            if (isset($_POST['submit'])) {
                include "koneksi.php";

                // Mendapatkan data dari form
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $tempat = $_POST['tempat'];
                $tanggallahir = $_POST['tanggallahir'];

                // Query update data
                $query = "UPDATE pengguna SET nama='$nama',  tempat='$tempat', tanggallahir='$tanggallahir' WHERE id=$id";
                $result = mysqli_query($koneksi, $query);

                // Cek hasil query
                if ($result) {

                    echo "<h3>Berhasil di ubah!</h3>";
                    echo "<meta http-equiv=refresh content=1;URL='pengguna'>";
                } else {
                    echo '<div class="alert alert-danger">Terjadi kesalahan saat memperbarui data.</div>';
                }

                // Tutup koneksi
                mysqli_close($koneksi);
            }
            ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nama">nama</label>
                    <input class=" form-control form-control-user" type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="tempat">Alamat</label>
                    <input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $data['tempat'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="tanggallahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="<?php echo $data['tanggallahir'] ?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                <div class="checkmark"></div>
            </form>
        </div>
    </div>
</div>