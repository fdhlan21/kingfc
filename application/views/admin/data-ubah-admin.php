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
$email = $_POST['email'];
$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

// Query update data
$query = "UPDATE admin SET username='$username', email='$email', password='$password' WHERE id=$id";
$result = mysqli_query($koneksi, $query);

// Cek hasil query
if ($result) {
    echo "Data Berhasil Di Ubah!";
    echo "<meta http-equiv=refresh content=1;URL='login'>";
} else {
    echo "Terjadi kesalahan saat memperbarui data";
}

// Tutup koneksi
mysqli_close($koneksi);
