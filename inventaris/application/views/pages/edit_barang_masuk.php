<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>
<?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
<form class="user" method="post" action="<?php echo base_url('barang_masuk_c/update'); ?>" enctype="multipart/form-data">

<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Edit Barang Masuk</h5>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body px-5">
                        <div class="row">
                        <div class="col-8">

                        <input type="hidden" name="id_barang_masuk" value="<?= $user['id_barang_masuk'] ?>">
                        <input type="hidden" name="fotolama" value="<?= $user['foto'] ?>">

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Kode Barang</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['kode_bm']?>" id="kode_bm" name="kode_bm" required="" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama Barang</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['nama_bm']?>" id="nama_bm" name="nama_bm" required="" placeholder="" disabled="">
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
                                <input class="form-control" type="text" value="<?= $user['nama_kategori']?>" id="nama_kategori" name="nama_kategori" required="" disabled="" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Jumlah</label> 
                            <div class="col-sm-7">
                                <input class="form-control " type="text" value="<?= $user['jumlah_bm']?>" id="jumlah_bm" name="jumlah_bm">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Lokasi</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['lokasi']?>" id="lokasi" name="lokasi" required="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Sub Lokasi</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['sublokasi']?>" id="sublokasi" name="sublokasi" required="" disabled="">
                            </div>
                        </div>
 
                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Tgl Masuk</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="" value="<?= $user['tanggal_bm']?>" id="tanggal_bm" name="tanggal_bm" required="" placeholder="" >
                             </div>
                         </div>

                        <div class="form-group row ">
                            <label for="example-date-input" class="col-sm-4 col-form-label"></label> 
                            <div class="col-sm-7">                                
                                <div class="input-group mt-2">
                                    <div class="custom"> 
                                        <div class="input-group-append"> 
                                            <a><input type="submit" class="btn btn-primary btn-sm" name="submit" value="Simpan"></a> 
                                        </div> 
                                    </div> &nbsp &nbsp
                                    <div class="input-group-append">
                                        <a class="small" href="<?php echo base_url('barang_masuk_c')?>"><button class="btn btn-danger btn-sm " type="button">Batal</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-auto">
                        <figure class="img-fluid">
                            <img src="<?php echo base_url('assets/upload/gambar_stok/') . $user['foto'] ?>" class="preview-foto" alt="" height="130" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'">
                        </figure>
                        </div>--> 
                    </div>

                     </div>
                    </div>
                <?php endif ?>

