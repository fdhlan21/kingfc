<div class="container-fluid">


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('admin'); ?>" style="color: black;">Home</a>
            </li>

            <li class="breadcrumb-item">
                <a href="<?= base_url('pengguna') ?>" style="color: black;">Pengguna</a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('pengguna'); ?>" class="btn bg-secondary"><i class="fas fa-fw  fa-arrow-left" style="color: #ffffff;"></i><span style="color: #ffffff; padding-left: 10px;">Kembali</span></a>

        </div>
        <div class="card-body">

            <form action="prossestambahpengguna" method="post">

                <table>

                    <tr>
                       
                        <td style="padding: 10px; color: black; font-family: 'Alata', sans-serif;">Nama</td>
                        <td><input class=" form-control form-control-user" type="text" name="username"></td>
                    </tr>

                    <tr>
                        <td style="padding: 10px; color: black; font-family: 'Alata', sans-serif;">Tempat Tinggal</td>
                        <td><input class=" form-control form-control-user" type="email" name="email"></td>
                    </tr>


                    <tr>
                        <td style="padding: 10px; color: black; font-family: 'Alata', sans-serif;">Tanggal Lahir</td>
                        <td><input class=" form-control form-control-user" type="" name="password"></td>
                    </tr>


                    <tr>

                        <td></td>
                        <td style="padding-top: 20px;"><input type="submit" value="Tambah" name="diprosses"></td>
                    </tr>



                </table>

            </form>


        </div>
    </div>
</div>