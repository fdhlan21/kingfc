<?php

include "koneksi.php";

$sql = mysqli_query($koneksi, "select * from pengguna where id='$_GET[id]'");
$data = mysqli_fetch_array($sql)

?>


<div class="container-fluid">


    <div class="card-header">
        <a href="<?= base_url('useradmin'); ?>" class="btn bg-secondary"><i class="fas fa-fw  fa-arrow-left" style="color: #ffffff;"></i><span style="color: #ffffff; padding-left: 10px;">Kembali</span></a>
    </div>

    <div class="card-body">

        <form action="dataubahadmin" method="post">

            <table>
                <tr>
                
                    <td><input class=" form-control form-control-user" type="hidden" name="id" value="<?php echo $data['id'] ?>"></td>
                </tr>

                <tr>
                    <td style="padding: 10px; color: black; font-family: 'Alata', sans-serif;">Nama : </td>
                    <td><input class=" form-control form-control-user" type="text" name="username" value="<?php echo $data['nama'] ?>"></td>
                </tr>

                <tr>
                    <td style="padding: 10px; color: black; font-family: 'Alata', sans-serif;">Alamat : </td>
                    <td><input class=" form-control form-control-user" type="email" name="email" value="<?php echo $data['tempat'] ?>"></td>
                </tr>




                <tr>

                    <td></td>
                    <td style="padding-top: 20px;"><input type="submit" value="simpan" name="diprosses"></td>
                </tr>



            </table>

        </form>




    </div>



</div>