<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2) : ?>

<form class="user" action="<?php echo base_url('data_pengguna_c/input_data');?>" method="post" enctype="multipart/form-data">

<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Tambah Data Pengguna</h5>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body px-5">
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Nama</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="nama" name="nama" required="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">No. HP</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="hp" name="hp" required="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Email</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="email" name="email" required="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Autor</label>
                            <div class="col-sm-6"> <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                <select class="form-control" id="id_master_user" name="id_master_user" required="">
                                    <?php endif ?>
                                    
                                    <option value="" hidden disabled selected>--Pilih autor--</option>
                                    

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

                        <!--<div class="form-group row">
                             <label for="example-date-input" class="col-sm-3 col-form-label">Autor</label>
                             <div class="col-sm-6">
                                 <select class="form-control bg-light" id="id_master_user" name="id_master_user" required="">
                                     <option value="" hidden disabled selected>Pilih autor</option>
                                     <?php foreach ($role as $item) : ?>
                                         <option value="<?= $item->id_master_user ?>"><?= $item->autor ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>-->

                         <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Username</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="username" name="username" required="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Password</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="password" name="password" required="" placeholder="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="filefoto" name="filefoto" accept="image/jpeg, image/png">
                                            <label class="custom-file-label" for="foto">Pilih foto...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row py-1">
                            <label for="example-date-input" class="col-sm-3 col-form-label"></label> 
                            <div class="col-sm-6">
                                <div class="input-group mt-2">
                                    <div class="custom"> 
                                        <div class="input-group-append"> 
                                            <a><input type="submit" class="btn btn-primary btn-sm" name="submit" value="Simpan"></a> 
                                        </div> 
                                    </div> &nbsp &nbsp
                                    <div class="input-group-append">
                                        <a class="small" href="<?php echo base_url('data_pengguna_c')?>"><button class="btn btn-danger btn-sm" type="button">Batal</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endif ?>