<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
<form class="user" action="" method="post" enctype="multipart/form-data">

    <div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5><a class="far fa-arrow-alt-circle-left text-dark" href="<?php echo base_url('stok_c/stok/' .$id_kategori)?>">
            </a>&nbsp&nbsp Detail Stok Barang</h5>

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
                                <input class="form-control" type="text" value="<?= $user['kode_barang']?>" id="nik_ortu" name="nik_ortu" required="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama Barang</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['nama_barang']?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Kategori Barang</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['nama_kategori']?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                             </div>
                         </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama Brand</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['merk_barang']?>" id="merk_barang" name="merk_barang" required="" placeholder="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Jumlah</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['jumlah_barang']?>" id="alamat_ortu" name="alamat_ortu" required="" disabled="">
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
                             <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['tanggal_stok']?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                             </div>
                         </div>
                     </div>

                     <div class="col-auto">
                        <figure class="img-fluid">
                            <img src="<?php echo base_url('assets/upload/gambar_stok/') . $user['foto'] ?>" class="preview-foto" alt="" height="130" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'">
                        </figure>
                        </div> 
                    </div>

                     </div>

                     <?php endif ?>