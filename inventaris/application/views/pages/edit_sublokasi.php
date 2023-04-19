<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2) : ?>
<form class="user" method="post" action="<?php echo base_url('sublokasi_c/update'); ?>" enctype="multipart/form-data">

<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Edit Sub Lokasi</h5>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body px-5">

                        <input type="hidden" name="id_sublokasi" value="<?= $user['id_sublokasi'] ?>">
                        <input type="hidden" name="id_lokasi" value="<?= $user['sublokasi_lokasi_id']?>">

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-2 col-form-label">Nama</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="<?= $user['sublokasi'] ?>" id="sublokasi" name="sublokasi" required="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-2 col-form-label">Lokasi</label>
                             <div class="col-sm-6">
                                 <select class="form-control bg-light" id="id_lokasi" name="id_lokasi" >
                                     <option value="" hidden disabled selected><?= $user['lokasi']?></option>
                                     <?php foreach ($role as $item) : ?>
                                         <option value="<?= $item->id_lokasi ?>"><?= $item->lokasi ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-2 col-form-label"></label> 
                            <div class="col-sm-6">
                                <div class="input-group mt-2">
                                    <div class="custom"> 
                                        <div class="input-group-append"> 
                                            <a><input type="submit" class="btn btn-primary btn-sm" name="submit" value="Simpan"></a> 
                                        </div> 
                                    </div> &nbsp &nbsp
                                    <div class="input-group-append">
                                        <a class="small" href="<?php echo base_url('sublokasi_c')?>"><button class="btn btn-danger btn-sm " type="button">Batal</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif ?>
