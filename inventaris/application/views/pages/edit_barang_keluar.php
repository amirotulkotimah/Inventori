<?php
 //$getJenis = $this->session->userdata('session_jenis_bk');
 $getUser = $this->session->userdata('session_user');
 $getGrup = $this->session->userdata('session_grup');
 
 ?>
<?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
<form class="user" method="post" action="<?php echo base_url('barang_keluar_c/update/'. $jenis_bk); ?>" enctype="multipart/form-data">

<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Edit Barang Keluar</h5>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body px-5">
                        <div class="row">
                        <div class="col-8">

                        <?php foreach($user as $baris){ ?>

                        <input type="hidden" name="id_barang_keluar" value="<?php echo $baris->id_barang_keluar;?>">
                        <input type="hidden" name="fotolama" value="<?php echo $baris->foto; ?>">
                        <input type="hidden" name="id_kurir" value="<?php echo $baris->id_kurir;?>">
                        <input type="hidden" name="lokasi" value="<?php echo $baris->lokasi;?>">
                        <input type="hidden" name="lokasi2" value="<?php echo $baris->lokasi_tujuan;?>">

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Kode Barang</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->kode_bk;?>" id="kode_bk" name="kode_bk" required="" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama Barang</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->nama_bk;?>" id="nama_bk" name="nama_bk" required="" placeholder="" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama Brand</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->merk_barang;?>" id="merk_barang" name="merk_barang" required="" placeholder="" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Kategori</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->nama_kategori;?>" id="nama_kategori" name="nama_kategori" required="" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Jumlah</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->jumlah_bk;?>" id="jumlah_bk" name="jumlah_bk" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Lokasi Awal</label>
                             <div class="col-sm-7">
                                 <select class="form-control bg-light" id="id_lokasi" name="lokasi">
                                     <option value="" hidden disabled selected><?php echo $baris->lokasi;?></option>
                                     <?php foreach ($role_lokasi as $item) : ?>
                                         <option value="<?= $item->lokasi ?>"><?= $item->lokasi ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>

                        <?php if ($jenis_bk == 2) : ?>
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Dikirim Ke Siapa</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->tujuan;?>" id="tujuan" name="tujuan" required="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">No. HP</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->hp;?>" id="hp" name="hp" required="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Alamat</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->alamat;?>" id="alamat" name="alamat" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Keterangan Keluar</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->ket_keluar;?>" id="ket_keluar" name="ket_keluar" required="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Kurir</label>
                             <div class="col-sm-7">
                                 <select class="form-control" id="id_kurir" name="id_kurir">
                                     <option value="" hidden disabled selected><?php echo $baris->kurir;?></option>
                                     <?php foreach ($role_kurir as $item) : ?>
                                         <option value="<?= $item->id_kurir ?>"><?= $item->kurir ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>
                        
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">No. Resi</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->no_resi;?>" id="no_resi" name="no_resi" required="">
                            </div>
                        </div>
                        <?php endif ?>

                        <?php if ($jenis_bk == 1) : ?>
                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Lokasi Tujuan</label>
                             <div class="col-sm-7">
                                 <select class="form-control bg-light" id="id_lokasi" name="lokasi2">
                                     <option value="" hidden disabled selected><?php echo $baris->lokasi_tujuan;?></option>
                                     <?php foreach ($role_lokasi as $item) : ?>
                                         <option value="<?= $item->lokasi ?>"><?= $item->lokasi ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>
                        <?php endif?>
 
                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Tgl Keluar</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="" value="<?php echo $baris->tanggal_bk;?>" id="tanggal_bk" name="tanggal_bk" required="" placeholder="" >
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
                                        <a class="small" href="<?php echo base_url('barang_keluar_c/data_barang_keluar/' . $jenis_bk)?>"><button class="btn btn-danger btn-sm " type="button">Batal</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <?php } ?>

                <?php endif ?>


