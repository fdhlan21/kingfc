<!-- Begin Page Content -->
<div style="padding:10px;" class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard'); ?>" style="color: black;">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= base_url('transaksi'); ?>" style="color: black;">Transaksi</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Transaksi</li>
        </ol>
    </nav>

    <div style="padding:10px">
        <h2 style="font-family:'Poppins', sans-serif">Tambah Transaksi</h2>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('transaksi'); ?>">
                <button type="button" class="btn btn-outline-secondary" style="text-decoration: none; font-family: 'Poppins', sans-serif; font-size: 20px; font-weight: 500;">
                    Kembali
                </button> </a>
        </div>
        <div class="card-body">


            <?php
            // Mengambil konfigurasi koneksi ke database dari file database.php di folder config CodeIgniter
            include(APPPATH . 'config/database.php');

            $host = $db['default']['hostname'];
            $dbname = $db['default']['database'];
            $username = $db['default']['username'];
            $password = $db['default']['password'];

            $koneksi = mysqli_connect($host, $username, $password, $dbname);
            if (!$koneksi) {
                die("Koneksi ke database gagal: " . mysqli_connect_error());
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nis = $_POST["nis"];
                $keterangan = $_POST["keterangan"];
                $jumlah = $_POST["jumlah"]; // Ambil jumlah dari textarea

                // Periksa apakah nis sudah ada dalam database
                $queryCheckNIS = "SELECT * FROM transaksi WHERE nis = '$nis'";
                $resultCheckNIS = mysqli_query($koneksi, $queryCheckNIS);

                if (mysqli_num_rows($resultCheckNIS) > 0) {
                    // NIS sudah ada dalam database, perbarui keterangan dan jumlah yang ada
                    $queryUpdateData = "UPDATE transaksi SET keterangan = CONCAT(keterangan, '\n', '$keterangan'), jumlah = CONCAT(jumlah, '\n', '$jumlah') WHERE nis = '$nis'";
                    $resultUpdateData = mysqli_query($koneksi, $queryUpdateData);

                    if ($resultUpdateData) {
                        echo "<h3 style='font-family: 'Poppins', sans-serif;'>Keterangan dan jumlah berhasil diperbarui ✅</h3>";
                        echo "<meta http-equiv=refresh content=1;URL='/sekolah/transaksi'>";
                    } else {
                        echo "Gagal memperbarui keterangan dan jumlah.";
                    }
                } else {
                    // NIS belum ada dalam database, tambahkan data baru
                    $tanggal = isset($_POST['tanggal']) ? strtotime($_POST['tanggal']) : time();
                    $status = $_POST["status"];

                    $queryInsertData = "INSERT INTO transaksi (nis, keterangan, jumlah, tanggal, status) VALUES ('$nis', '$keterangan', '$jumlah', '$tanggal', '$status')";
                    $resultInsertData = mysqli_query($koneksi, $queryInsertData);

                    if ($resultInsertData) {
                        echo "<h3 style='font-family: 'Poppins', sans-serif;'>Transaksi baru berhasil ditambahkan ✅</h3>";
                        echo "<meta http-equiv=refresh content=1;URL='/sekolah/transaksi'>";
                    } else {
                        echo "Gagal menambahkan transaksi.";
                    }
                }
            }



            // Menutup koneksi
            mysqli_close($koneksi);
            ?>

            <form method="POST" action="">

                <div class="form-group">
                    <label for="nis">NIS</label>
                    <select class="form-control" name="nis">
                        <?php foreach ($options as $option) { ?>
                            <option value="<?php echo $option['nis']; ?>"><?php echo $option['nis']; ?></option>
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>




                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>

                </div>




                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <!-- Elemen input keterangan sebelumnya -->
                    <input type="number" name="jumlah" class="form-control" required>

                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="lunas" id="status">Lunas</option>
                        <option value="belum lunas" id="status">Belum Lunas</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-outline-success" style="font-family: 'Poppins', sans-serif; font-weight: 500;" onclick="showSuccessAnimation(this);">Simpan</button>
            </form>
        </div>
    </div>
</div>


