<?php

include "koneksi.php";

$sql = mysqli_query($koneksi, "select * from admin where id='$_GET[id]'");
$data = mysqli_fetch_array($sql)

?>

<div class="container-fluid">


    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('useradmin'); ?>" class="btn bg-secondary"><i class="fas fa-fw  fa-arrow-left" style="color: #ffffff;"></i><span style="color: #ffffff; padding-left: 10px;">Kembali</span></a>
        </div>
        <div class="card-body">
            <form method="post" action="passwordprosses.php">
                <input type="hidden" name="username" value="<?php echo $data['username'] ?>" id=" username">
                <div class=" mb-3">
                    <label for="password_lama" class="form-label">Masukan Password Lama : </label>
                    <input type="text" class="form-control" name="password_lama" id="password_lama" required>
                </div>
                <div class="mb-3">
                    <label for="password_baru" class="form-label">Masukan Password Baru :</label>
                    <input type="text" class="form-control" name="password_baru" id="password_baru" required>
                </div>

                <div class="mb-3">
                    <label for="konfirmasi_password" class="form-label">Konfirmasi Password Baru :</label>
                    <input type="text" class="form-control" name="konfirmasi_password" id="konfirmasi_password" required>
                </div>
                <button type="submit" class="btn btn-primary">Prosses</button>
                <button type="reset" class="btn btn-danger">Batal</button>


                
            </form>
        </div>
    </div>



</div>