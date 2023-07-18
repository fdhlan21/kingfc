<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-around">
        <div>
            <img src=" path/assets/img/icon/undraw.png" height="250px" style="margin-top: 50%;">
        </div>
        <div class="col-lg-6" style="padding-top: 50px; margin-top: -30px;">

            <div class="">

                <form class="user" method="post" action="<?= base_url('login'); ?>" style="padding-top: 50px;">
                    <div class="card">
                        <center>
                            <?= $this->session->flashdata('message'); ?>
                        </center>
                        <div class="card-body">
                         
                            <h6 class="card-title" style="color: black; font-size: 20px; font-family: 'Poppins', sans-serif; text-align: center;">Login Page</h6>
                            <div class="form-group" style="margin-top: 25px;">
                                <i style="margin-left: 15px;" class="fas fa-user fa-1x"></i>
                                <label for="username" style="padding-left: 10px; font-family: 'Poppins', sans-serif; margin-left: 0px;">Username</label>
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Silahkan Masukan username..." style="background-color: #dede; font-family: 'Poppins', sans-serif; font-size: 12px; height: 30px;">

                                <small style=" font-weight: bold;" class="text-danger pl-3 animate__animated animate__shakeX"><?= form_error('username'); ?></small>
                            </div>
                            <div class="form-group">
                                <i style="margin-left: 15px;" class="fas fa-key"></i>
                                <label for="password" style="padding-left: 10px; font-family: 'Poppins', sans-serif;">Password</label>
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="" style="background-color: #dede; font-family: 'Poppins', sans-serif; font-size: medium;">
                                <small style=" font-weight: bold;" class="text-danger pl-3 animate__animated animate__shakeX"><?= form_error('password'); ?></small>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-primary btn-user btn-block" type="submit" style="font-family: 'Poppins', sans-serif; font-size: 15px; border-radius: 10px;">Masuk Sekarang!</button>
                            </div>
                        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>