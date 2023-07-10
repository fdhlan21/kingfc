<div class="container-fluid">
    <form enctype="multipart/form-data" method="post" action="<?php echo site_url('simpanbarang'); ?>">
        <input type="file" name="gambar" placeholder="Gambar" required>
        <input type="text" name="nama_barang" placeholder="Nama Barang" required>
        <input type="number" name="jumlah_stok" placeholder="Jumlah Stok" required>
        <button type="submit">Tambah Barang</button>
    </form>
</div>