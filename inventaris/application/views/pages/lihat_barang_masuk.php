<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
<form class="user" action="<?php echo base_url('barang_masuk_c/input_data');?>" method="post" enctype="multipart/form-data">

    <div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5><a class="far fa-arrow-alt-circle-left text-dark" href="<?php echo base_url('barang_masuk_c')?>">
            </a>&nbsp&nbsp Detail Barang Masuk</h5>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Kode Barang</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['kode_bm']?>" id="nik_ortu" name="nik_ortu" required="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama Barang</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['nama_bm']?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama Brand</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['merk_barang']?>" id="merk_barang" name="merk_barang" required="" placeholder="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Kategori</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['nama_kategori']?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                             </div>
                         </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Jumlah</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['jumlah_bm']?>" id="alamat_ortu" name="alamat_ortu" required="" disabled="">
                            </div>
                        </div>

                       <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Lokasi</label>
                                 <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['lokasi']?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                             </div>
                         </div>
 

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Sub Lokasi</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['sublokasi']?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Tgl Masuk</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['tanggal_bm']?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                             </div>
                         </div>

                        <!--<div class="form-group row py-1">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Autor</label>
                             <div class="col-sm-7">
                                <input class="form-control bg-light" type="text" value="<?= $user['autor']?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                             </div>
                         </div>-->
                     </div>

                     <div class="col-auto">
                        <figure class="img-fluid">
                            <img src="<?php echo base_url('assets/upload/gambar_stok/') . $user['foto'] ?>" class="preview-foto" alt="" height="130" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'">
                        </figure>
                        </div> 
                    </div>

                     </div>

                 <?php endif ?>
