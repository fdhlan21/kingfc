<!-- Begin Page Content -->
<div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('dashboard'); ?>" style="color: black;">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= base_url('slider'); ?>" style="color: black;">Slider</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('slider'); ?>" class="btn bg-secondary"><i class="fas fa-arrow-left" style="color: #ffffff;"></i><span style="color: #ffffff; padding-left: 10px;">Kembali</span></a>
            </div>
            <div class="card-body">
                <?php
                include "koneksi.php";

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id'];
                    $nama = $_POST['nama'];
                    $keterangan = $_POST['keterangan'];

                    // Lakukan proses update data slider berdasarkan ID
                    $query = "UPDATE slider SET nama = '$nama', keterangan = '$keterangan' WHERE id = '$id'";
                    $result = mysqli_query($koneksi, $query);

                    if ($result) {
                        echo "<h3 style='font-family: 'Poppins', sans-serif;'>Data slider berhasil diupdate.</h3>";
                        echo "<meta http-equiv=refresh content=2;URL='slider?id=$id'>";
                    } else {
                        echo "Terjadi kesalahan saat mengupdate data slider.";
                    }
                } else {
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        // Ambil data slider berdasarkan ID
                        $query = "SELECT * FROM slider WHERE id = '$id'";
                        $result = mysqli_query($koneksi, $query);

                        if ($result) {
                            $slider = mysqli_fetch_assoc($result);
                            $nama = $slider['nama'];
                            $keterangan = $slider['keterangan'];
                        } else {
                            echo "Slider tidak ditemukan.";
                        }
                    } else {
                        echo "ID slider tidak valid.";
                    }
                }
                ?>

                <?php if (isset($id)) : ?>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="file" class="form-control" id="nama" name="nama" value="<?= $nama; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $keterangan; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>