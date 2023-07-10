<?php

include "koneksi.php";


$nama_barang = $_POST["nama_barang"];
$jumlah_stok = $_POST["jumlah_stok"];
$gambar = $_FILES['gambar']['tmp_name'];
$nama_gambar = $_FILES['gambar']['name'];
$path_gambar = file_get_contents($_FILES["gambar"]["tmp_name"]);

$sql = $koneksi->prepare("insert into stokbarang (nama_gambar, data_gambar, nama_barang,jumlah_stok, path_gambar) values ('$nama_gambar','$data_gambar','$nama_barang', '$jumlah_stok', '$path_gambar'");
$sql->bind_param("sss", $gambar, $nama_gambar, $path_gambar);
$hasil = mysqli_query($koneksi, $sql);


if ($koneksi->query($sql) === TRUE ) {
    echo "Berhasil insert data";
    echo "<meta http-equiv=refresh content=1;URL='stok'>";
    exit;
} else {
    echo "Gagal insert data";
    exit;
}
$sql->close();
mysqli_close($koneksi);