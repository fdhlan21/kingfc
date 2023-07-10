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
$nama_barang = $_POST['nama_barang'];
$jumlah_stok = $_POST['jumlah_stok'];

// Query update data
$query = "UPDATE stokbarang SET nama_barang='$nama_barang', jumlah_stok='$jumlah_stok' WHERE id=$id";
$result = mysqli_query($koneksi, $query);

// Cek hasil query
if ($result) {
    echo "Data Berhasil Di Ubah!";
    echo "<meta http-equiv=refresh content=1;URL='stok'>";
} else {
    echo "Terjadi kesalahan saat memperbarui data";
}

// Tutup koneksi
mysqli_close($koneksi);
