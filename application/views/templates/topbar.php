<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white shadow">
            <ul class="navbar-nav navbar-menu">
                <li><a href="<?= base_url('dashboard'); ?>"><img src="path/assets/img/icon/puskesmas.png" height="55px"></a></li>
                <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'dashboard') !== false) ? 'active' : ''; ?>" href="<?= base_url('dashboard'); ?>"> <button type="button" class="btn btn-outline-primary <?= (strpos($_SERVER['PHP_SELF'], 'dashboard') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">Dashboard</button></a></li>
                <li> <a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'pengguna') !== false) ? 'active' : ''; ?>" href="<?= base_url('pengguna'); ?>"> <button type="button" class="btn btn-outline-primary <?= (strpos($_SERVER['PHP_SELF'], 'pengguna') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">Data Pengguna</button></a></li>
                <li> <a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'konselingremaja') !== false) ? 'active' : ''; ?>" href="<?= base_url('konselingremaja'); ?>"> <button type="button" class="btn btn-outline-primary <?= (strpos($_SERVER['PHP_SELF'], 'konselingremaja') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">Data Konseling</button></a></li>
                <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'slider') !== false) ? 'active' : ''; ?>" href="<?= base_url('slider'); ?>"> <button type="button" class="btn btn-outline-primary <?= (strpos($_SERVER['PHP_SELF'], 'slider') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">Data Slider</button></a></li>
                <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'pengaturan') !== false) ? 'active' : ''; ?>" href="<?= base_url('pengaturan'); ?>"> <button type="button" class="btn btn-outline-primary <?= (strpos($_SERVER['PHP_SELF'], 'pengaturan') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">Pengaturan</button></a></li>
                <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'useradmin') !== false) ? 'active' : ''; ?>" href="<?= base_url('useradmin'); ?>"> <button type="button" class="btn btn-outline-primary <?= (strpos($_SERVER['PHP_SELF'], 'useradmin') !== false) ? 'active' : ''; ?>" style="font-family: 'Alata',sans-serif;">User Admin</button></a></li>
            </ul>

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

            .btn-outline-primary:hover,
            .btn-outline-primary:focus,
            .btn-outline-primary.active {
                background-color: #007BFF;
                color: white;
            }
        </style>