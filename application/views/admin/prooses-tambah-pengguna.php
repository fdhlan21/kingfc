<?php
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


include "koneksi.php";


$username = $_POST["username"];
$email = $_POST["email"];
// $password = md5($this->input->post('password'));
$password = sha1($this->input->post('password'));

$sql = "insert into pengguna (username,email,password) values ('$username', '$email', '$password')";
$hasil = mysqli_query($koneksi, $sql);

if ($hasil) {
    echo "Berhasil insert data";
    echo "<meta http-equiv=refresh content=1;URL='pengguna'>";
    exit;
} else {
    echo "Gagal insert data";
    exit;
}
