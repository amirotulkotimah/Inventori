<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
<form class="user" method="post" action="<?php echo base_url('profil_c/update'); ?>" enctype="multipart/form-data">

<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Ganti Password</h5>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body px-5">

                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                       
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-2 col-form-label">Password</label> 
                            <div class="col-sm-4">
                                <input class="form-control" type="text" value="<?= $user['password'] ?>" id="password" name="password" required="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-2 col-form-label"></label> 
                            <div class="col-sm-4">
                                <div class="input-group mt-2">
                                    <div class="custom"> 
                                        <div class="input-group-append"> 
                                            <a><input type="submit" class="btn btn-primary btn-sm" name="submit" value="Simpan"></a> 
                                        </div> 
                                    </div> &nbsp &nbsp
                                    <div class="input-group-append">
                                        <a class="small" href="<?php echo base_url('profil_c')?>"><button class="btn btn-danger btn-sm " type="button">Batal</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif?>