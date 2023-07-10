<?php

//panggil koneksi database
include "koneksi.php";

//enkripsi inputan password lama
$password_lama = password_hash($_POST['password_lama'], PASSWORD_DEFAULT);

//panggil username
$username = $_POST['username'];

//uji jika password lama sesuai
$tampil = mysqli_query($koneksi, "SELECT * FROM admin WHERE 
                                username = '$username' and password = '$password_lama'");
$data = mysqli_fetch_array($tampil);
//jika data ditemukan, maka password sesuai
if ($data) {
    //uji jika password baru dan konfirmasi password sama
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password = $_POST[''];

    if ($password_baru == $konfirmasi_password) {
        //proses ganti password
        //enkripsi password baru
        $pass_ok = md5($konfirmasi_password);
        $ubah = mysqli_query($koneksi, "UPDATE admin set password = '$pass_ok'  
                                        WHERE id = '$data[id]' ");
        if ($ubah) {
            echo "<script>alert('Password anda berhasil diubah, silahkan logout untuk menguji password baru anda.!');document.location='ubahpassword.php'</script>";
        }
    } else {
        echo "<script>alert('Maaf, Password Baru & Konfirmasi password yang anda inputkan tidak sama!');document.location='ubahpassword.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Password lama anda tidak sesuai/tidak terdaftar!');document.location='ubahpassword.php'</script>";
}
