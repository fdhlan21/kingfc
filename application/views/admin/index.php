    <!-- Begin Page Content -->


    <?php
    include "koneksi.php";


    $sql = "SELECT COUNT(*) as total_users FROM pengguna";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $row = $hasil->fetch_assoc();
        $totalUsers = $row["total_users"];

        // echo "JUMLAH USERS TERDAFTAR DI DATABASE MYSQL:". $totalUsers;
    } else {
        echo "TIDAK ADA USER TERDAFTAR.";
    }


    // $query = "SELECT * FROM pengguna";
    // $hasil = mysqli_query($koneksi,$query);


    // if(mysqli_num_rows($hasil) > 0) {
    //     while ($row = mysqli_fetch_assoc($hasil)) {
    //         echo $row['email']. "<br>";
    //     }
    // } else {
    //     echo "TIDAK DAPAT MENAMPILKAN DATA";
    // }
    $koneksi->close();
    ?>


    <?php
    include "koneksi.php";


    $sql = "SELECT COUNT(*) as total_konseling FROM konselingremaja";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $row = $hasil->fetch_assoc();
        $totalKonseling = $row["total_konseling"];

        // echo "JUMLAH USERS TERDAFTAR DI DATABASE MYSQL:". $totalUsers;
    } else {
        echo "TIDAK ADA DAFTAR YANG KONSELING.";
    }

    $koneksi->close();
    ?>

    <?php
    include "koneksi.php";


    $sql = "SELECT COUNT(*) as total_admin FROM admin";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $row = $hasil->fetch_assoc();
        $totalAdmin = $row["total_admin"];

        // echo "JUMLAH USERS TERDAFTAR DI DATABASE MYSQL:". $totalUsers;
    } else {
        echo "TIDAK ADA DAFTAR YANG KONSELING.";
    }

    $koneksi->close();
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