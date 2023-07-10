<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    // Query penghapusan pengguna berdasarkan ID
    $query = "DELETE FROM pengguna WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    // Periksa apakah penghapusan berhasil
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "Data berhasil dihapus";
    } else {
        echo "Gagal menghapus data";
    }
} else {
    echo "Permintaan tidak valid";
}
