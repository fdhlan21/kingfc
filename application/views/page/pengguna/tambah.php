<!-- Begin Page Content -->
<div style="padding:10px;" class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard'); ?>" style="color: black;">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= base_url('useradmin'); ?>" style="color: black;">Siswa</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Siswa</li>
        </ol>
    </nav>

    <div style="padding:10px">
        <h2 style="font-family:'Poppins', sans-serif">Menambah Siswa</h2>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('pengguna'); ?>">
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
                $nama = $_POST["nama"];
                $kelas = $_POST["kelas"];
                $keterangan = $_POST["keterangan"];



                $query = "INSERT INTO siswa (nis, nama, kelas, keterangan) VALUES ('$nis', '$nama', '$kelas', '$keterangan')";
                $result = mysqli_query($koneksi, $query);

                if ($result) {
                    echo "<h3 style='font-family: 'Poppins', sans-serif;'>Siswa berhasil ditambahkan ✅</h3>";
                    echo "<meta http-equiv=refresh content=1;URL='/sekolah/pengguna'>";
                } else {
                    echo "Gagal menambahkan Siswa ❌";
                }
            }

            // Menutup koneksi
            mysqli_close($koneksi);
            ?>


            <form method="POST" action="">
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" id="nis" name="nis" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Status</label>
                    <select class="form-control" name="keterangan" id="keterangan">
                        <option id="keterangan" value="lunas">Lunas</option>
                        <option id="keterangan">Belum Lunas</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-outline-success" style="font-family: 'Poppins', sans-serif; font-weight: 500;">Simpan</button>
            </form>
        </div>
    </div>
</div>