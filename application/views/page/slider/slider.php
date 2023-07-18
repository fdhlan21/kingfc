<!-- Begin Page Content -->


<?php
// Mengambil konfigurasi koneksi ke database dari file database.php di folder config CodeIgniter
include(APPPATH . 'config/database.php');

$host = $db['default']['hostname'];
$dbname   = $db['default']['database'];
$username = $db['default']['username'];
$password = $db['default']['password'];

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}

// Query SQL untuk mengambil data dari tabel
$query = "SELECT * FROM app_data";
$stmt = $pdo->query($query);

// Fetch data baris per baris
while ($row = $stmt->fetch()) {
    // Ambil nilai kolom yang diinginkan
    $color = $row['color3'];

    // Lakukan sesuatu dengan nilai yang diambil
    // ...
}

// Menutup koneksi ke database
$pdo = null;
?>


<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard'); ?>" style="color: black;">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Slider</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('dashboard'); ?>" class="btn bg-secondary"><i class="fas fa-fw fa-arrow-left" style="color: #ffffff;"></i><span style="color: #ffffff; padding-left: 10px;">Kembali</span></a>
            <a href="<?= base_url('addslider'); ?>" class="btn bg-primary" style=""><i class="fas  fa-fw fa-plus-square" style="color: #ffffff;"></i><span style="color: #ffffff; padding-left: 10px;">Tambah Slider</span></a>
        </div>

        <div class="card-body">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="post" action="" enctype="multipart/form-data">
                            <table class="table table-bordered table-striped table-hover tabza dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr class="" style="color:white; background-color: <?= $color ?>;" role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 21.3281px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Image</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending">Keterangan</th>
                                        <?php if ($admin['role_id'] == 1) : ?>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Mengambil konfigurasi koneksi ke database dari file database.php di folder config CodeIgniter
                                    include(APPPATH . 'config/database.php');

                                    $host = $db['default']['hostname'];
                                    $dbname   = $db['default']['database'];
                                    $username = $db['default']['username'];
                                    $password = $db['default']['password'];

                                    $koneksi = mysqli_connect($host, $username, $password, $dbname);

                                    if (mysqli_connect_errno()) {
                                        die("Koneksi ke database gagal: " . mysqli_connect_error());
                                    }

                                    $no = 1;
                                    $query = "SELECT * FROM slider";
                                    $result = mysqli_query($koneksi, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $keterangan = $row['keterangan'];
                                        $nama = $row['nama'];

                                        echo "<tr>";
                                        echo "<td>$no</td>";
                                        echo "<td><img src='path/assets/img/slider/$nama' alt='Slider Image' width='100'></td>";
                                        echo "<td>$keterangan</td>";

                                        // Ambil role_id dari tabel admin
                                        $admin = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
                                        $role_id = $admin['role_id'];

                                        // Cek peran pengguna
                                        if ($role_id == 1) {
                                            echo "<td>
                <a class='btn btn-danger' href='?hapus=$id'><i class='fas fa-fw fa-trash'></i></a>
                <a style='margin-left: 10px;' class='btn btn-success' href='editslider?id=$id'><i class='fas fa-user-edit '></i></a>
            </td>";
                                        } elseif ($role_id == 2) {
                                            echo "";
                                        }

                                        echo "</tr>";
                                        $no++;
                                    }

                                 
                                    ?>

                                </tbody>
                            </table>
                            <?php
                            if (isset($_GET['hapus']) && $admin['role_id'] == 1) {
                                mysqli_query($koneksi, "delete from slider where id='$_GET[hapus]'");
                                echo "Data Terhapus";
                                echo "<meta http-equiv=refresh content=2;URL='slider'>";
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>