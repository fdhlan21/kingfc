<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard'); ?>" style="color: black;">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?= base_url('slider'); ?>" style="color: black;">Slider</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Slider</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('slider'); ?>" class="btn bg-secondary"><i class="fas fa-arrow-left" style="color: #ffffff;"></i><span style="color: #ffffff; padding-left: 10px;">Kembali</span></a>

        </div>


        <div class="card-body">
            <!-- Begin Page Content -->
            <?php

            include "koneksi.php";

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Kode pemrosesan gambar di sini

                $targetDir = 'path/assets/img/slider/';
                if (!file_exists($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }

                $namaFile = $_FILES['foto']['name'];
                $ukuranFile = $_FILES['foto']['size'];
                $lokasiSementara = $_FILES['foto']['tmp_name'];
                $error = $_FILES['foto']['error'];

                if ($error === 0) {
                    move_uploaded_file($lokasiSementara, $targetDir . $namaFile);

                    $keterangan = $_POST['keterangan'];

                    $query = "INSERT INTO slider (nama, keterangan) VALUES ('$namaFile', '$keterangan')";
                    $result = mysqli_query($koneksi, $query);

                    if ($result) {
                        echo "<h3>Gambar berhasil di simpan!</h3>";
                        echo "<meta http-equiv=refresh content=2;URL='slider'>";
                    } else {
                        echo "Terjadi kesalahan saat menyimpan data.";
                    }
                } else {
                    echo "Terjadi kesalahan saat mengunggah gambar.";
                }
            }

            ?>
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_filter">
                            <label style="padding-left: 100px;">

                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <form method="post" action="" enctype="multipart/form-data">
                            <!-- Konten form di sini -->
                            <div class="form-group col col-sm-6">
                                <label for="foto" class="A">Foto</label>
                                <br>
                                <input autocomplete="off" required="required" type="file" name="foto">
                            </div>
                            <div class="form-group col col-sm-6">
                                <i class="fas fa-sticky-note" style="color: rgb(27, 39, 85);"> </i>
                                <label for="keterangan" class="AppLabel" style="color: rgb(27, 39, 85);">Keterangan</label>
                                <br>
                                <input autocomplete="off" type="text" id="keterangan" name="keterangan" style="border-radius: 5px;">
                            </div>

                            <!-- Tombol submit atau aksi lainnya -->
                            <div class="card-footer" style="padding: 10px;">
                                <button class="btn btn-primary" type="submit" style="font-family: 'Poppins', sans-serif;">Simpan</button>
                            </div>




                        </form>

                    </div>
                </div>

            </div>


        </div>


    </div>