<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2) : ?>
<form class="user" action="<?php echo base_url('brand_c/input_data');?>" method="post" enctype="multipart/form-data">

<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Tambah Data Brand</h5>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body px-5">

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-2 col-form-label">Nama Brand</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="merk_barang" name="merk_barang" required="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-2 col-form-label">Kategori Brand</label>
                             <div class="col-sm-6">
                                 <select class="form-control bg-light" id="id_kategori" name="id_kategori" required="">
                                     <option value="" hidden disabled selected>-Pilih kategori-</option>
                                     <?php foreach ($role as $item) : ?>
                                         <option value="<?= $item->id_kategori ?>"><?= $item->nama_kategori ?></option>
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
                                        <a class="small" href="<?php echo base_url('brand_c')?>"><button class="btn btn-danger btn-sm" type="button">Batal</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>