<?php
if (isset($_GET['id'])) {
    $transaksi_id = $_GET['id'];

    // Query SQL untuk mengambil data transaksi berdasarkan ID
    $query = "SELECT * FROM transaksi WHERE id = :transaksi_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':transaksi_id', $transaksi_id, PDO::PARAM_INT);
    $stmt->execute();

    if ($row = $stmt->fetch()) {
        // Ambil data transaksi yang diperlukan
        $nis = $row['nis'];
        $tanggal = $row['tanggal'];
        $keterangan = $row['keterangan'];
        $jumlah = $row['jumlah'];
        $status = $row['status'];

        // Tampilkan informasi transaksi yang ingin dicetak
        echo "<p><strong>NIS:</strong> $nis</p>";
        echo "<p><strong>Tanggal:</strong> $tanggal</p>";
        echo "<p><strong>Keterangan:</strong> $keterangan</p>";
        echo "<p><strong>Jumlah:</strong> $jumlah</p>";
        echo "<p><strong>Status:</strong> $status</p>";

        // Tidak perlu menambahkan tombol cetak di halaman cetak_info_transaksi.php
    } else {
        // Handle kasus ketika ID transaksi tidak ditemukan dalam database
        echo "Transaksi dengan ID $transaksi_id tidak ditemukan.";
    }
} else {
    // Handle kasus ketika parameter 'id' tidak ditemukan dalam URL
    echo "ID Transaksi tidak ditemukan.";
}
