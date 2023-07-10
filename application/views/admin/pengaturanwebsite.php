<!-- Begin Page Content -->

<?php
// Koneksi ke database
$host = 'localhost';
$db   = 'bestiedatabase';
$user = 'root';
$pass = '';

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}

// Fungsi untuk mengupdate pengaturan ke database
function updatePengaturan($pdo, $id, $nama_company, $telepon, $color1, $color2, $color3, $color4)
{
    $stmt = $pdo->prepare("UPDATE app_data SET nama_company = ?, telepon = ?, color1 = ?, color2 = ?, color3 = ?, color4 = ? WHERE id = ?");
    $stmt->execute([$nama_company, $telepon, $color1, $color2, $color3, $color4, $id]);
}

// Cek apakah form disubmit
if (isset($_POST['submit'])) {
    // Ambil nilai dari form
    $id = 1; // Ganti dengan ID yang sesuai
    $nama_company = $_POST['nama_company'];
    $telepon = $_POST['telepon'];
    $color1 = $_POST['color1'];
    $color2 = $_POST['color2'];
    $color3 = $_POST['color3'];
    $color4 = $_POST['color4'];

    // Panggil fungsi untuk mengupdate pengaturan ke database
    updatePengaturan($pdo, $id, $nama_company, $telepon, $color1, $color2, $color3, $color4);
}

// Query SQL untuk mengambil data pengaturan dari tabel
$query = "SELECT * FROM app_data WHERE id = 1"; // Ganti dengan ID yang sesuai
$stmt = $pdo->query($query);
$row = $stmt->fetch();

// Menutup koneksi ke database
$pdo = null;
?>

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard'); ?>" style="color: black;">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= base_url('pengaturan'); ?>" style="color: black;">Pengaturan</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('pengaturan'); ?>" class="btn bg-secondary"><i class="fas fa-fw fa-arrow-left" style="color: #ffffff;"></i><span style="color: #ffffff; padding-left: 10px;">Kembali</span></a>

        </div>

        <div class="card-body">
            <form method="post" action="">
                <div class="form-group">
                    <label for="nama_company">Nama Company</label>
                    <input type="text" name="nama_company" id="nama_company" class="form-control" value="<?= $row['nama_company']; ?>">
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" value="<?= $row['telepon']; ?>">
                </div>
                <div class="form-group">
                    <label for="color1">Color Tabel Data Pengguna</label>
                    <input type="color" name="color1" id="color1" class="form-control" value="<?= $row['color1']; ?>">
                </div>
                <div class="form-group">
                    <label for="color2">Color Tabel Data Konseling</label>
                    <input type="color" name="color2" id="color2" class="form-control" value="<?= $row['color2']; ?>">
                </div>
                <div class="form-group">
                    <label for="color3">Color Tabel Data Slider </label>
                    <input type="color" name="color3" id="color3" class="form-control" value="<?= $row['color3']; ?>">
                </div>
                <div class="form-group ">
                    <label for="color4">Color Tabel Data User Admin</label>
                    <input type="color" name="color4" id="color4" class="form-control" value="<?= $row['color4']; ?>">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
        <div class="card-footer"></div>
    </div>
</div>