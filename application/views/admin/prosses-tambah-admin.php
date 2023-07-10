<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $role_id = $_POST["role_id"];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO admin (username, password, nama_lengkap, role_id) VALUES ('$username', '$hashed_password', '$nama_lengkap', '$role_id')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Admin berhasil ditambahkan.";
        echo "<meta http-equiv=refresh content=1;URL='useradmin'>";
    } else {
        echo "Gagal menambahkan admin.";
    }
}

mysqli_close($koneksi);
