<?php
    //$getJenis = $this->session->userdata('session_jenis_bk');
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
<form class="user" action="" method="post" enctype="multipart/form-data">

    <div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5><a class="far fa-arrow-alt-circle-left text-dark" href="<?php echo base_url('barang_keluar_c/data_barang_keluar/' . $jenis_bk)?>"> &nbsp
            </a>Detail Barang Keluar</h5>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">

                        <?php foreach($user as $baris){ ?>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Kode Barang</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->kode_bk; ?>" id="" name="" required="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama Barang</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->nama_bk; ?>" id="" name="" required="" placeholder="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama Brand</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->merk_barang; ?>" id="" name="" required="" placeholder="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Kategori</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->nama_kategori;?>" id="" name="" required="" placeholder="" disabled="">
                             </div>
                         </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Jumlah</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->jumlah_bk;?>" id="" name="" required="" disabled="">
                            </div>
                        </div>

                       <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Lokasi Awal</label>
                                 <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->lokasi;?>" id="" name="" required="" placeholder="" disabled="">
                             </div>
                         </div>

                         <?php if ($jenis_bk == 2) : ?>
                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Dikirim Ke Siapa</label>
                                 <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->tujuan;?>" id="" name="" required="" placeholder="" disabled="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">No. HP</label>
                                 <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->hp;?>" id="" name="" required="" placeholder="" disabled="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Alamat</label>
                                 <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->alamat;?>" id="" name="" required="" placeholder="" disabled="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Keterangan Keluar</label>
                                 <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->ket_keluar;?>" id="" name="" required="" placeholder="" disabled="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Kurir</label>
                                 <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->kurir;?>" id="" name="" required="" placeholder="" disabled="">
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">No. Resi</label>
                                 <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->no_resi;?>" id="" name="" required="" placeholder="" disabled="">
                             </div>
                         </div>

                         <?php endif ?>

                        <?php if ($jenis_bk == 1) : ?>
                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Lokasi Tujuan</label>
                                 <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->lokasi_tujuan;?>" id="" name="" required="" placeholder="" disabled="">
                             </div>
                         </div>
                         <?php endif ?>
 
                         <div class="form-group row ">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Tgl Keluar</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?php echo $baris->tanggal_bk;?>" id="" name="" required="" placeholder="" disabled="">
                             </div>
                         </div>

                     </div>

                     <div class="col-auto">
                        <figure class="img-fluid">
                            <img src="<?php echo base_url('assets/upload/gambar_stok/') . $baris->foto ?>" class="preview-foto" alt="" height="180" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'">
                        </figure>
                        </div> 
                    </div>
                </div>
                <?php } ?>

            <?php endif ?>

            