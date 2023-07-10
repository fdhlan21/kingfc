<?php
// Koneksi ke database
include "koneksi.php";

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Mendapatkan data dari form
$id = $_POST['id'];
$username = $_POST['username'];
$nama_lengkap = $_POST['nama_lengkap'];
$role_id = $_POST['role_id'];
$password = $_POST['password'];

// Cek apakah password diubah atau tidak
if (!empty($password)) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    // Query update data dengan mengganti password
    $query = "UPDATE admin SET username='$username', password='$password', nama_lengkap='$nama_lengkap', role_id='$role_id' WHERE id=$id";
} else {
    // Query update data tanpa mengubah password
    $query = "UPDATE admin SET username='$username', nama_lengkap='$nama_lengkap', role_id='$role_id' WHERE id=$id";
}

// Eksekusi query
$result = mysqli_query($koneksi, $query);

// Cek hasil query
if ($result) {
    echo "<meta http-equiv=refresh content=1;URL='useradmin'>";
} else {
    echo "Terjadi kesalahan saat memperbarui data";
}

// Tutup koneksi
mysqli_close($koneksi);

?>

<div class="container-fluid">
    <div id="loading" class="d-none">
        <div class="spinner-grow text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <span class="text-success">Data berhasil diubah!</span>
    </div>
    <div id="checkmark" class="d-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="none" d="M0 0h24v24H0z" />
            <path d="M9 16.17l-3.88-3.88a.996.996 0 1 1 1.41-1.41L9 13.34l7.59-7.59a.996.996 0 1 1 1.41 1.41L9 16.17z" fill="rgba(40, 167, 69, 1)" />
        </svg>
        <span class="text-success">Data berhasil diubah!</span>
    </div>
</div>

