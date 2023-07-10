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

// Query SQL untuk mengambil data dari tabel
$query = "SELECT * FROM app_data";
$stmt = $pdo->query($query);

// Fetch data baris per baris
while ($row = $stmt->fetch()) {
    // Ambil nilai kolom yang diinginkan
    $nama_company = $row['nama_company'];
    $telepon = $row['telepon'];
    $color = $row['color4'];

    // Lakukan sesuatu dengan nilai yang diambil
    // ...

    // Menutup koneksi ke database
    $pdo = null;
}
?>

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('admin'); ?>" style="color: black;">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">User Admin</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('dashboard'); ?>" class="btn bg-secondary">
                <i class="fas fa-fw fa-arrow-left" style="color: #ffffff;"></i>
                <span style="color: #ffffff; padding-left: 10px;">Kembali</span>
            </a>
            <?php if ($admin['role_id'] == 1) { ?>

                <a href="<?= base_url('tambahadmin'); ?>" class="btn bg-info">
                    <i class="fas fa-fw fa-plus-square" style="color: #ffffff;"></i>
                    <span style="color: #ffffff; padding-left: 10px;">Tambah Admin</span>
                </a>
            <?php } ?>
        </div>
        <div class="card-body">
            <!-- Tampilkan tabel admin -->
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-hover tabza dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr class="" style="color:white; background-color: <?= $color ?>;" role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 21.3281px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending">Username</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Alamat: activate to sort column ascending">Password</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tempat Tinggal: activate to sort column ascending">Nama Lengkap</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tempat Tinggal: activate to sort column ascending">Level</th>
                                    <?php if ($admin['role_id'] == 1) { ?>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";
                                $no = 1;
                                $ambildata = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY id ASC");
                                while ($tampil = mysqli_fetch_array($ambildata)) {
                                    $id = $tampil['id'];
                                    echo "<tr role='row' class='odd' data-id='$tampil[id]'>";
                                    echo "<td>$no</td>";
                                    echo "<td>$tampil[username]</td>";
                                    echo "<td>****</td>";
                                    echo "<td>$tampil[nama_lengkap]</td>";
                                    echo "<td>";
                                    if ($tampil['role_id'] == 1) {
                                        echo "Admin";
                                    } else {
                                        echo "User";
                                    }
                                    echo "</td>";
                                    if ($admin['role_id'] == 1) {
                                        echo "<td>
                                        <a  href='detailuseradmin?id=$id' class='btn btn-info'><i class='fas fa-info-circle'></i></a>
                    <a class='btn btn-danger' href='?hapus=$id' style='margin-left: 10px;'><i class='fas fa-fw fa-trash'></i></a>
                    <a href='ubahadmin?id=$id' class='btn btn-success' style='margin-left: 10px;'><i class='fas fa-user-edit'></i></a>
                </td>";
                                    }
                                    echo "</tr>";
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        if (isset($_GET['hapus']) && $admin['role_id'] == 1) {
                            mysqli_query($koneksi, "delete from admin where id='$_GET[hapus]'");
                            echo "Data Terhapus";
                            echo "<meta http-equiv=refresh content=2;URL='login'>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>