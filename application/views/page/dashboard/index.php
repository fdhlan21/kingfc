    <!-- Begin Page Content -->

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

    $sql = "SELECT COUNT(*) as total_users FROM pengguna";
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        $row = mysqli_fetch_assoc($hasil);
        $totalUsers = $row["total_users"];

        // echo "JUMLAH USERS TERDAFTAR DI DATABASE MYSQL:". $totalUsers;
    } else {
        echo "TIDAK ADA USER TERDAFTAR.";
    }

    $sql = "SELECT COUNT(*) as total_konseling FROM konselingremaja";
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        $row = mysqli_fetch_assoc($hasil);
        $totalKonseling = $row["total_konseling"];

        // echo "JUMLAH USERS TERDAFTAR DI DATABASE MYSQL:". $totalUsers;
    } else {
        echo "TIDAK ADA DAFTAR YANG KONSELING.";
    }

    $sql = "SELECT COUNT(*) as total_admin FROM admin";
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        $row = mysqli_fetch_assoc($hasil);
        $totalAdmin = $row["total_admin"];

        // echo "JUMLAH USERS TERDAFTAR DI DATABASE MYSQL:". $totalUsers;
    } else {
        echo "TIDAK ADA DAFTAR YANG KONSELING.";
    }

    mysqli_close($koneksi);
    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col col-sm-10">
            <!-- Content Row -->
            <div class="row">
                <!-- Data Pengguna -->
                <div class="col-xl-4 col-md-6 mb-4" style="margin-top: 20px;">
                    <div class="card bg-primary text-white shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                                <div class="col mr-2">
                                    <div style="margin-left: 20px;" class="text-xs font-weight-bold text-uppercase">Data Pengguna</div>
                                    <div style="margin-left: 20px;" class="h5 mb-0 font-weight-bold"><?= $totalUsers ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Admin -->
                <div class="col-xl-4 col-md-6 mb-4" style="margin-top: 20px;">
                    <div class=" card bg-info text-white shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-user-cog fa-2x"></i>
                                </div>
                                <div class="col mr-2">
                                    <div style="margin-left: 20px;" class="text-xs font-weight-bold text-uppercase">Data Admin</div>
                                    <div style="margin-left: 20px;" class="h5 mb-0 font-weight-bold"><?= $totalAdmin ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Konseling -->
                <div class="col-xl-4 col-md-6 mb-4" style="margin-top: 20px;">
                    <div class="card bg-success text-white shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <i class="fab fa-whatsapp-square fa-3x"></i>
                                </div>
                                <div class="col mr-2">
                                    <div style="margin-left: 20px;" class="text-xs font-weight-bold text-uppercase">Data Konseling</div>
                                    <div style="margin-left: 20px;" class="h5 mb-0 font-weight-bold"><?= $totalKonseling ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>