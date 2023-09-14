<?php
// Koneksi ke database (gunakan kode koneksi yang sama seperti di halaman Anda)
// ...

// Mengambil konfigurasi koneksi ke database dari file database.php di folder config CodeIgniter
include(APPPATH . 'config/database.php');

$host = $db['default']['hostname'];
$dbname   = $db['default']['database'];
$username = $db['default']['username'];
$password = $db['default']['password'];

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}


if (isset($_GET['id'])) {
    $transaksi_id = $_GET['id'];

    // Periksa apakah parameter 'action' adalah 'cetak'
    if (isset($_GET['action']) && $_GET['action'] === 'cetak') {
        // Query SQL untuk mengambil data transaksi berdasarkan ID
        // Sesuaikan query ini dengan data yang ingin Anda tampilkan
        $query = "SELECT * FROM transaksi WHERE id = :transaksi_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':transaksi_id', $transaksi_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($row = $stmt->fetch()) {
            // Inisialisasi variabel-variabel seperti $nis, $tanggal, dll.
            $nis = $row['nis'];
            $timestamp = $row['tanggal']; // Mengambil timestamp Unix dari database
            $tanggal = date("d/M/Y", $timestamp); // Mengonversi ke format yang sesuai
            $keterangan = $row['keterangan'];
            $jumlah = $row['jumlah'];
            $status = $row['status'];

            // Mengonversi keterangan dan jumlah ke dalam array
            $keteranganArray = explode("\n", $keterangan);
            $jumlahArray = explode("\n", $jumlah);

            // Kemudian, gunakan JavaScript untuk memicu pencetakan
            echo "<script>window.print();</script>";
        } else {
            // Handle kasus ketika ID transaksi tidak ditemukan dalam database
            echo "Transaksi dengan ID $transaksi_id tidak ditemukan.";
        }
    } else {
        // Tampilkan halaman informasi transaksi biasa
        // ...
    }
}

// ...



?>
<?php
// Set zona waktu yang sesuai
date_default_timezone_set('Asia/Jakarta');

// Mendapatkan waktu saat ini
$jamCetak = date("H:i:s");
?>

<div style="border: 1px solid #ccc; padding: 10px;">
    <div style="display: flex; margin: 10px; gap: 10px;  justify-content: space-between;">
        <div style="display: flex; gap: 10px;">
            <div>
                <img src="../../assets/img/icon/logosd.png" style="width: 100px; height: 100px;">
            </div>
            <div style="margin-top:-10px">
                <p style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size: 20px;">SD 1 AL-ISLAM SONDAKAN-SKA</p>
                <p style="font-family: 'Poppins', sans-serif; font-size: 15px; font-style: normal; font-weight: 400;line-height: normal; margin-top: -10px;">Jl. Agus Salim No.7,Sondakan,<br>Kec. Laweyan, Kota Surakarta,<br>Jawa Tengah 57147</p>
            </div>
        </div>

        <div style="justify-self: flex-end; align-self: flex-end; margin-top:-50px;">
            <p style="font-family: 'Poppins', sans-serif; font-size: 64px; font-style: normal; font-weight: 400; line-height: normal;">KWITANSI</p>
        </div>
    </div>
    <div style="padding: 1px; background-color: #ccc;"></div>
    <div style="margin: 10px; ">
        <div>
            <p style="font-family: 'Poppins', sans-serif; font-size:15px;  font-style: normal; font-weight: 400; line-height: normal;">NIS: <?= $nis ?></p>
            <p style="font-family: 'Poppins', sans-serif; font-size:15px;  font-style: normal; font-weight: 400; line-height: normal; margin-top: -5px">Tanggal: <?= $tanggal ?> </p>
            <p style="font-family: 'Poppins', sans-serif; font-size:15px;  font-style: normal; font-weight: 400; line-height: normal; margin-top: -5px">Jam Cetak: <?= $jamCetak ?></p>
        </div>
    </div>
    <div style="padding: 1px; background-color: #ccc;"></div>
    <div style="display: flex; justify-content: space-between; margin: 10px; margin-top: -10px">

        <div style="margin-left: 0px;  width: 100px;">
            <p style="font-family:'Poppins', sans-serif; font-size: 20px; font-weight: bold; text-align: right;">NO</p>
        </div>

        <div style=" width: 200px;">
            <p style="font-family:'Poppins', sans-serif; font-size: 20px; font-weight: bold; text-align: left;">Jenis Pembayaran</p>
        </div>

        <div style=" width: 200px;">
            <p style="font-family:'Poppins', sans-serif; font-size: 20px; font-weight: bold;">Jumlah</p>
        </div>
    </div>
    <div style="padding: 1px; background-color: #ccc; margin-top: -20px;"></div>



    <?php
    $total = 0; // Inisialisasi total

    // Loop melalui keterangan dan jumlah yang terpisah
    foreach ($keteranganArray as $key => $keteranganItem) {
        $jumlahItem = isset($jumlahArray[$key]) ? $jumlahArray[$key] : '';

        echo "<div style='display:flex; justify-content: space-between; margin: 10px; margin-top: -10px'>";

        echo "<div style='margin-left: 0px;  width: 100px; text-align: right;'>";
        echo "<p  style='font-family:'Poppins', sans-serif; font-size: 12px;>".($key + 1 )."</p>";
        echo "</div>";

        echo "<div style='margin-left: 0px;  width: 200px; text-align: left;'>";
        echo "<p style='font-family:'Poppins', sans-serif; font-size: 12px; '>$keteranganItem</p>";
        echo "</div>";

        echo "<div style='margin-left: 0px;  width: 200px; text-align: left'>";
        echo "<p  style='font-family:'Poppins', sans-serif; font-size: 12px;>Rp $jumlahItem</p>";
        echo "</div>";


        echo "</div>";
        // Tambahkan jumlahItem ke total
        $total += floatval(str_replace(',', '', $jumlahItem)); // Menghilangkan koma jika ada
    }
        echo "<div style='padding: 1px; background-color: #ccc; '></div>";
    // Cetak total
    
        echo "<div style='display: flex; margin: 10px;   justify-content: space-between;'>";
        
        echo "<div style=' width: 100px'>";
        echo "<p style='font-family: Poppins, sans-serif; font-weight: bold; font-size: 15px'>Terbilang : </p>";
        echo "</div>";

        echo "<div style=' width: 800px; text-align: right;'>";
        echo "<p style='font-family: Poppins, sans-serif; font-weight: bold; font-size: 15px'>Grand Total</p>";
        echo "</div>";


        echo "<div style=' width: 200px'>";
        echo "<p style='font-family: Poppins, sans-serif; font-weight: bold; font-size: 15px'>Rp ". number_format($total, 2) ."</p>";
        echo "</div>";


        echo "</div>";


        
    // Cetak total

    echo "<div style='display: flex; margin: 10px;   justify-content: space-between; margin-top: -20px'>";

    echo "<div style='background-color: transparent; width: 100px; padding: 1px'>";
    echo "</div>";

    echo "<div style='background-color: black; width: 370px; text-align: right; padding: 2px;'>";
    echo "</div>";

    echo "</div>";


    echo "<div style='display: flex; margin: 10px;   justify-content: space-between;  margin-top: -10px'>";

    echo "<div style=' width: 100px'>";
    echo "<p style='font-family: Poppins, sans-serif; font-weight: bold; font-size: 15px; color: transparent'>Terbilang : </p>";
    echo "</div>";

    echo "<div style=' width: 800px; text-align: right;'>";
    echo "<p style='font-family: Poppins, sans-serif; font-weight: normal; font-size: 15px'>Surakarta</p>";
    echo "</div>";


    echo "<div style=' width: 200px'>";
    echo "<p style='font-family: Poppins, sans-serif; font-weight: normal; font-size: 15px'>" . date('d F Y') . "</p>";
    echo "</div>";


    echo "</div>";


    echo "<div style='display: flex; margin: 10px;   justify-content: space-between;  margin-top: -10px'>";

    echo "<div style=' width: 100px'>";
    echo "<p style='font-family: Poppins, sans-serif; font-weight: bold; font-size: 15px; color: transparent'>Terbilang : </p>";
    echo "</div>";

    echo "<div style=' width: 300px; text-align: right; text-align: left;'>";
    echo "<p style='font-family: Poppins, sans-serif; font-weight: normal; font-size: 15px;'>Yang Menerima</p>";
    echo "</div>";



    echo "</div>";


    echo "<div style='display: flex; margin: 10px;   justify-content: space-between;  margin-top: 10px'>";

    echo "<div style=' width: 100px'>";
    echo "<p style='font-family: Poppins, sans-serif; font-weight: bold; font-size: 15px; color: transparent'>Terbilang : </p>";
    echo "</div>";

    echo "<div style=' width: 290px; text-align: right; text-align: left; '>";
    echo "<p style='font-family: Poppins, sans-serif; font-weight: normal; font-size: 15px;'>Nama Admin</p>";
    echo "</div>";



    echo "</div>";


    echo "<div style='display: flex; margin: 10px;   justify-content: space-between;  margin-top: -10px'>";

    echo "<div style=' width: 500px; '>";
    echo "<p style='font-family: Poppins, sans-serif; font-weight: bold; font-size: 15px;'>Catatan : </p>";
    echo "<p style='font-family: Poppins, sans-serif; font-size: 12px;'> ▪ Disimpan sebagai bukti pembayaran yang sah</p>";
    echo "<p style='font-family: Poppins, sans-serif; font-size: 12px;'> ▪ Uang yang sudah dibayarkan tidak dapat diminta kembali</p>";
    echo "</div>";

    echo "<div style=' width: 330px; text-align: right; text-align: left; '>";
    echo "<p style='font-family: Poppins, sans-serif; font-weight: normal; font-size: 15px;'>NIP:.........................................</p>";
    echo "</div>";



    echo "</div>";
    
    ?>


</div>