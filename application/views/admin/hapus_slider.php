<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    // Lakukan proses penghapusan slider berdasarkan ID
    $query = "DELETE FROM slider WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<h1>Data Slider berhasil di hapus!</h1>";
        echo "<meta http-equiv=refresh content=2;URL='slider'>";
    } else {
        echo "Terjadi kesalahan saat menghapus slider.";
    }
}
