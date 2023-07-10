<?php
include "koneksi.php";

$sql = mysqli_query($koneksi, "select * from stokbarang where id='$_GET[id]'");
$data = mysqli_fetch_array($sql)

?>

<div class="container-fluid">
    <form method="post" action="dataubahstokbarang">
        <input type="hidden" name="id" placeholder="Nama Barang" value="<?php echo $data['id'] ?>">
        <input type="text" name="nama_barang" placeholder="Nama Barang" value="<?php echo $data['nama_barang'] ?>">
        <input type="number" name="jumlah_stok" placeholder="Jumlah Stok" value="<?php echo $data['jumlah_stok'] ?>">
        <button value="simpan" name="prosses" type="submit">Ubah Nama Barang / Stok</button>
    </form>
</div>