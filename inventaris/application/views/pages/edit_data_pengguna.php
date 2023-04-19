<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2) : ?>
<form class="user" method="post" action="<?php echo base_url('data_pengguna_c/update'); ?>" enctype="multipart/form-data">

<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Edit Data Pengguna</h5>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body px-5">
                        <div class="row">
                        <div class="col-8">

                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                        <input type="hidden" name="fotolama" value="<?= $user['foto'] ?>">
                        <input type="hidden" name="id_master_user" value="<?= $user['id_master_user']?>">

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['nama']?>" id="nama" name="nama" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">No. HP</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['hp']?>" id="hp" name="hp" required="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Email</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['email']?>" id="email" name="email" required="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Autor</label>
                            <div class="col-sm-7"> <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                <select class="form-control" id="id_master_user" name="id_master_user" >
                                    <?php endif ?>
                                    
                                    <option value="" hidden disabled selected><?= $user['autor']?></option>
                                    

                                    <?php if ($getGrup == 1) : ?>
                                    <option value="1"> Admin </option>
                                    <?php endif ?>

                                    <?php if ($getGrup == 1) : ?>
                                    <option value="2"> Supervisor </option>
                                    <?php endif ?>

                                    <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                    <option value="3"> Staff </option>
                                    <?php endif ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Username</label> 
                            <div class="col-sm-7">
                                <input class="form-control " type="text" value="<?= $user['username']?>" id="username" name="username" required="">
                            </div>
                        </div>

                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Password</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="" value="<?= $user['password']?>" id="password" name="password" required="" placeholder="" >
                             </div>
                         </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label"></label> 
                            <div class="col-sm-7">                                
                                <div class="input-group mt-2">
                                    <div class="custom"> 
                                        <div class="input-group-append"> 
                                            <a><input type="submit" class="btn btn-primary btn-sm" name="submit" value="Simpan"></a> 
                                        </div> 
                                    </div> &nbsp &nbsp
                                    <div class="input-group-append">
                                        <a class="small" href="<?php echo base_url('data_pengguna_c')?>"><button class="btn btn-danger btn-sm " type="button">Batal</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <figure class="img-fluid">
                            <img src="<?php echo base_url('assets/upload/gambar_user/') . $user['foto']; ?>" class="preview-foto text-white" alt="" height="140" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'">
                        </figure>
                        <div class="mt-3">
                                        <input type="file" id="filefoto" name="filefoto" accept="image/jpeg, image/png">
                                        <!--<label class="btn btn-block btn-primary" for="foto">Pilih foto</label>-->
                                    </div>
                        </div>

<script src="<?= base_url('assets/js/previewfoto.js') ?>"></script>
<?php endif ?>