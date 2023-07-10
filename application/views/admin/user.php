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

<div class="container-fluid ">

    <div class="col col-sm-10">






        <!-- Content Row -->
        <div class="row">



            <!-- Data Pengguna -->
            <div class="col-xl-3 col-md-6 mb-4" style="padding-top: 20px;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 " style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                    Data Pengguna : </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Jumlah Pengguna : <?= $totalUsers ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-users fa-2x " style="color: #1D3E5F;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Pengguna -->
            <div class="col-xl-3 col-md-6 mb-4" style="padding-top: 20px;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                    Data Admin : </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Jumlah Admin : <?= $totalAdmin ?></div>
                            </div>
                            <div class="col-auto">
                                <i style="color: #1D3E5F;" class="fas fa-user-cog fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Data Admin -->
            <div class="col-xl-3 col-md-6 mb-4" style="padding-top: 20px;">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                    Data Konseling : </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Jumlah Konseling : <?= $totalKonseling ?></div>
                            </div>
                            <div class="col-auto">
                                <i style="color: #1D3E5F;" class="fab fa-whatsapp-square fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>