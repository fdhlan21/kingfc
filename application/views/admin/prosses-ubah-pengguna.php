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
$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$tanggallahir = $_POST['tanggallahir'];

// Query update data
$query = "UPDATE pengguna SET nama='$nama', tempat='$tempat', tanggallahir='$tanggallahir'   WHERE id=$id";
$result = mysqli_query($koneksi, $query);

// Cek hasil query
if ($result) {
    echo "Data Berhasil Di Ubah!";
    echo "<meta http-equiv=refresh content=1;URL='pengguna'>";
} else {
    echo "Terjadi kesalahan saat memperbarui data";
}

// if (empty($password)) {
//     $sql = "UPDATE pengguna SET username='$username, email='$email' WHERE id='$id'";
//     $result = mysqli_query($koneksi, $sql);
//     echo "BERHASIL DI UBAH KECUALI PASSWORD";
//     echo "<meta http-equiv=refresh content=1;URL='pengguna'>";
// } else {
//     $hashedPassword = sha1($this->input->post('password'));
//     $SQL = "UPDATE pengguna SET username='$username', email='$email', password='$hashedPassword' WHERE id='$id'";
//     $result = mysqli_query($koneksi, $SQL);
//     echo "BERHASIL DI UBAH DENGAN PASSWORD / CUMAN PASSWORD";
//     echo "<meta http-equiv=refresh content=1;URL='pengguna'>";
// }

// Tutup koneksi
mysqli_close($koneksi);
?>