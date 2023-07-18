<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6" style="padding-top: 50px; margin-top: 20px;">
            <div class="">
                <!-- Nested Row within Card Body -->
                <form class="user" method="POST" action="<?= base_url('login/register'); ?>">
                    <div class="card">
                        <center>
                            <?= $this->session->flashdata('message'); ?>
                        </center>
                        <di class="card-body">
                            <h6 class="card-title" style="color: black; font-size: 20px; font-family: 'Poppins', sans-serif; text-align: center;">Register Page</h6>
                            <div class="from-group">
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan Username" value="<?= set_value('username'); ?>" style="background-color: #dede; font-family: 'Poppins', sans-serif; font-size: 12px; height: 30px;">
                                <small style="font-weight: bold;" class="text-danger pl-3"><?= form_error('username'); ?></small>
                            </div>
                            <div class="form-group" style="margin-top: 12px;">
                                <input type="text" class="form-control form-control-user" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap" value="<?= set_value('nama_lengkap'); ?>" style="background-color: #dede; font-family: 'Poppins', sans-serif; font-size: 12px; height: 30px;">
                                <small style="font-weight: bold;" class="text-danger pl-3"><?= form_error('nama_lengkap'); ?></small>
                            </div>
                            <div class="form-group" style="margin-top: -5px;">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password" style="background-color: #dede; font-family: 'Poppins', sans-serif; font-size: 12px; height: 30px;">
                                <small style="font-weight: bold;" class="text-danger pl-3"><?= form_error('password'); ?></small>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-user btn-block" style="font-family: 'Poppins', sans-serif; font-size: 15px; border-radius: 10px;">Daftar Sekarang!</button>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('login'); ?>" style="font-family: 'Poppins', sans-serif; font-size: 12px; border-radius: 10px;">Sudah Punya Akun? Login!</a>
                            </div>
                    </div>
            </div>
            </form>

        </div>
    </div>
</div>
</div>