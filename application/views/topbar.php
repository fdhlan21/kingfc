<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="border-bottom: 5px solid #078718;"">
            <a href=" <?= base_url('Dashboard'); ?>"><img src="assets/img/icon/logosd.png" height="55px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class=" navbar-nav navbar-menu">
                    <li></li>
                    <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Dashboard') !== false) ? 'active' : ''; ?>" href="<?= base_url('Dashboard'); ?>"> <button type="button" class="btn btn-outline-success <?= (strpos($_SERVER['PHP_SELF'], 'Dashboard') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">Dashboard</button></a></li>
                    <li> <a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Pengguna') !== false) ? 'active' : ''; ?>" href="<?= base_url('Pengguna'); ?>"> <button type="button" class="btn btn-outline-success <?= (strpos($_SERVER['PHP_SELF'], 'Pengguna') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">Siswa</button></a></li>
                    <li> <a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Transaksi') !== false) ? 'active' : ''; ?>" href="<?= base_url('Transaksi'); ?>"> <button type="button" class="btn btn-outline-success <?= (strpos($_SERVER['PHP_SELF'], 'Transaksi') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">Transaksi</button></a></li>
                    <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Pembukaan') !== false) ? 'active' : ''; ?>" href="<?= base_url('Pembukaan'); ?>"> <button type="button" class="btn btn-outline-success <?= (strpos($_SERVER['PHP_SELF'], 'Pembukaan') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">Buku Besar</button></a></li>
                    <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Pengaturan') !== false) ? 'active' : ''; ?>" href="<?= base_url('Pengaturan'); ?>"> <button type="button" class="btn btn-outline-success <?= (strpos($_SERVER['PHP_SELF'], 'Pengaturan') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">Pengaturan</button></a></li>
                    <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'UserAdmin') !== false) ? 'active' : ''; ?>" href="<?= base_url('UserAdmin'); ?>"> <button type="button" class="btn btn-outline-success <?= (strpos($_SERVER['PHP_SELF'], 'UserAdmin') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">Admin</button></a></li>
                </ul>
            </div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <label>Hallo selamat datang,</label>
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="color: #183A1D; font-family: 'Alata',sans-serif;"><?= $admin['username']; ?></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

        <style>
            .navbar-menu {}

            .btn-outline-success:hover,
            .btn-outline-success:focus,
            .btn-outline-success.active {
                background-color: #1CC88A;
                color: white;
            }
        </style>