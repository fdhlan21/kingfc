<?php
// Mengambil konfigurasi koneksi ke database dari file database.php di folder config CodeIgniter
include(APPPATH . 'config/database.php');

$host = $db['default']['hostname'];
$dbname = $db['default']['database'];
$username = $db['default']['username'];
$password = $db['default']['password'];

$koneksi = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

$sql = mysqli_query($koneksi, "select * from transaksi where id='$_GET[id]'");
$data = mysqli_fetch_array($sql);
                // var_dump($data['tanggal']);
                $tanggal = date('Y-m-d',($data['tanggal']));

// Mendapatkan informasi keterangan dan jumlah dari database
$keteranganArray = explode("\n", $data['keterangan']);
$jumlahArray = explode("\n", $data['jumlah']);

mysqli_close($koneksi);
?>

<!-- Begin Page Content -->

<div style="padding: 10px;" class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard'); ?>" style="color: black;">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= base_url('transaksi'); ?>" style="color: black;">Transaksi</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Transaksi</li>
        </ol>
    </nav>

    <div style="padding:10px">
        <h2 style="font-family:'Poppins', sans-serif">Edit Transaksi</h2>
    </div>

    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('transaksi'); ?>">
                <button type="button" class="btn btn-outline-secondary" style="text-decoration: none; font-family: 'Poppins', sans-serif; font-size: 20px; font-weight: 500;">
                    Kembali
                </button>
            </a>
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

            if (mysqli_connect_errno()) {
                die("Koneksi ke database gagal: " . mysqli_connect_error());
            }

            if (isset($_POST['submit'])) {
                // Mendapatkan data dari form
                $id = $_POST['id'];
                $nis = $_POST["nis"];
                $tanggal = time();
                $status = $_POST["status"];

                // Menginisialisasi array kosong untuk keterangan dan jumlah
                $keteranganArray = [];
                $jumlahArray = [];

                // Loop untuk mengumpulkan data dari input dan memasukkannya ke dalam array
                foreach ($_POST["keterangan"] as $key => $keterangan) {
                    $jumlah = $_POST["jumlah"][$key];

                    $keteranganArray[] = $keterangan;
                    $jumlahArray[] = $jumlah;
                }

                // Menggabungkan array keterangan dan jumlah menjadi string dengan "\n" sebagai pemisah
                $keterangan = implode("\n", $keteranganArray);
                $jumlah = implode("\n", $jumlahArray);

                // Query update data
                $query = "UPDATE transaksi SET nis='$nis', keterangan='$keterangan', tanggal='$tanggal', jumlah='$jumlah', status='$status' WHERE id=$id";
                $result = mysqli_query($koneksi, $query);

                // Cek hasil query
                if ($result) {
                    echo "<h2> Data berhasil diubah ✅</h2>";
                    echo "<meta http-equiv=refresh content=1;URL='/sekolah/transaksi'>";
                    echo "<br>";
                } else {
                    echo '<div class="alert alert-danger">Terjadi kesalahan saat memperbarui data.</div>';
                }
            }

            // Tutup koneksi
            mysqli_close($koneksi);
            ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input class="form-control form-control-user" type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $data['nis']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>" required>
                </div>

                <!-- Loop untuk membuat input keterangan dan jumlah sesuai dengan jumlah kolom yang ada -->
                <?php foreach ($keteranganArray as $key => $keteranganItem) { ?>
                    <div class="form-group">
                        <label for="keterangan<?php echo $key; ?>">Keterangan <?php echo ($key + 1); ?></label>
                        <input type="text" class="form-control" id="keterangan<?php echo $key; ?>" name="keterangan[]" value="<?php echo $keteranganItem; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah<?php echo $key; ?>">Jumlah <?php echo ($key + 1); ?></label>
                        <input class="form-control" type="number" name="jumlah[]" id="jumlah<?php echo $key; ?>" value="<?php echo $jumlahArray[$key]; ?>" required>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Lunas" id="status">Lunas</option>
                        <option value="Belum Lunas" id="status">Belum Lunas</option>
                    </select>
                </div>

                <button style="font-family: 'Poppins', sans-serif; font-size: 15px; font-weight:500" type="submit" name="submit" class="btn btn-outline-success">Simpan Perubahan</button>
                <div class="checkmark"></div>
            </form>
        </div>
    </div>
</div>