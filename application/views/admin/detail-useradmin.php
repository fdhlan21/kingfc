<?php

include "koneksi.php";

// Menyiapkan kueri dengan placeholder parameter
$query = "SELECT * FROM admin WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);

// Mengikat nilai parameter
mysqli_stmt_bind_param($stmt, "i", $_GET['id']);

// Menjalankan pernyataan
mysqli_stmt_execute($stmt);

// Mengambil hasil
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_array($result);

// Menutup pernyataan
mysqli_stmt_close($stmt);

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard'); ?>" style="color: black;">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= base_url('pengguna'); ?>" style="color: black;">User Admin</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Detail User Admin</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('useradmin'); ?>" class="btn bg-secondary">
                <i class="fas fa-fw fa-arrow-left" style="color: #ffffff;"></i>
                <span style="color: #ffffff; padding-left: 10px;">Kembali</span>
            </a>
        </div>
        <div class="card-body">

            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <p style="font-family: 'Poppins', sans-serif;"><?php echo $data['username'] ?></p>
                </div>
<hr>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <p style="font-family: 'Poppins', sans-serif;"><?php echo $data['nama_lengkap'] ?></p>
                </div>
                <hr>
                <div class="form-group">
                    <label for="role_id">Level</label>
                    <p style="font-family: 'Poppins', sans-serif;">
                        <?php
                        if ($data['role_id'] == 1) {
                            echo "Admin";
                        } elseif ($data['role_id'] == 2) {
                            echo "User";
                        } else {
                            echo "Unknown";
                        }
                        ?>
                    </p>

            </form>
        </div>
        <hr>
    </div>
</div>