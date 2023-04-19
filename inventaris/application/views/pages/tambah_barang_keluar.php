<?php
    //$getJenis = $this->session->userdata('session_jenis_bk');
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>

<form class="user" action="<?php echo base_url('barang_keluar_c/input_data/' . $jenis_bk);?>" method="post" enctype="multipart/form-data">

<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Tambah Barang Keluar</h5>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body px-5">

                        <div class="row">
                        <div class="col-8">
                        <input type="hidden" id="id_user" name="id_user" value="<?= $user['id_user'] ?>">
                        <input type="hidden" id="autor" name="autor" value="<?= $user['autor'] ?>">
                        <input type="hidden" name="jenis_bk" value="<?= $jenis['id_jenis_bk'] ?>">

                        <div class="form-group row py-1">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Kode Barang</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="kode_barang" name="kode_barang" required="" placeholder="Masukkan kode barang...">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Nama Barang</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="nama_barang" name="nama_barang" required="" placeholder="" readonly="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Nama Brand</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="merk_barang" name="merk_barang" required="" placeholder="" readonly="">
                            </div>
                        </div>

                        <div class="form-group row py-1">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Kategori</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="nama_kategori" name="nama_kategori" readonly="">
                            </div>
                        </div>

                        <div class="form-group row py-1" hidden="">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Id Kategori</label> 
                            <div class="col-sm-6" hidden="">
                                <input class="form-control" type="text" value="" id="id_kategori" name="id_kategori" readonly="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Jumlah</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="jumlah_bk" name="jumlah_bk" required="">
                            </div>
                        </div>

                       <div class="form-group row">
                             <label for="example-date-input" class="col-sm-3 col-form-label">Lokasi Awal</label>
                             <div class="col-sm-6">
                                 <select class="form-control bg-light" id="id_lokasi" name="lokasi" required="">
                                     <option value="" hidden disabled selected>-Pilih lokasi-</option>
                                     <?php foreach ($role_lokasi as $item) : ?>
                                         <option value="<?= $item->lokasi ?>"><?= $item->lokasi ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>

                        <?php if ($jenis_bk == 2) : ?>
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Dikirim Ke Siapa</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="tujuan" name="tujuan" required="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">No. HP</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="hp" name="hp" required="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Alamat</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="alamat" name="alamat" required="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Keterangan Keluar</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="ket_keluar" name="ket_keluar" required="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-3 col-form-label">Kurir</label>
                             <div class="col-sm-6">
                                 <select class="form-control" id="id_kurir" name="id_kurir" required="">
                                     <option value="" hidden disabled selected>-Pilih kurir-</option>
                                     <?php foreach ($role_kurir as $item) : ?>
                                         <option value="<?= $item->id_kurir ?>"><?= $item->kurir ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>
                        
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">No. Resi</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="no_resi" name="no_resi" required="">
                            </div>
                        </div>
                        <?php endif ?>

                        <?php if ($jenis_bk == 1) : ?>
                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-3 col-form-label">Lokasi Tujuan</label>
                             <div class="col-sm-6">
                                 <select class="form-control bg-light" id="id_lokasi" name="lokasi2" required="">
                                     <option value="" hidden disabled selected>-Pilih lokasi-</option>
                                     <?php foreach ($role_lokasi as $item) : ?>
                                         <option value="<?= $item->lokasi ?>"><?= $item->lokasi ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>
                        <?php endif ?>
 
                         <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Tanggal Keluar</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="" value="<?php echo format_indo(date('Y-m-d'));?>" id="tanggal_bk" name="tanggal_bk" required="">
                            </div>
                        </div>

                        <!--<div class="form-group row" hidden="">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Autor</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="autor" name="autor" >
                            </div>
                        </div>-->

                        <div class="form-group row " hidden="">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Foto</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="foto" name="foto" >
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
                                        <a class="small" href="<?php echo base_url('barang_keluar_c')?>"><button class="btn btn-danger btn-sm" type="button">Batal</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row py-1" >
                            <label for="example-date-input" class="col-sm-3 col-form-label"></label> 
                            <div class="col-sm-6"> 
                                <figure class="img-fluid">
                            <img src="<?php echo base_url('assets/upload/gambar_stok/') . 'foto' ?>" class="preview-foto" id="previewfoto" name="foto" alt="" height="180" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'">
                        </figure>
                                <input class="form-control" value="" id="foto" name="foto" readonly="" hidden="">
                            </div>


                        </div>

        <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/detect.js"></script>
        <script src="<?php echo base_url()?>assets/js/fastclick.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url()?>assets/js/waves.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('#kode_barang').on('input',function(){
            var kode_barang=$(this).val();
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/Barang_keluar_c/get_barang')?>",
                dataType : "JSON",
                data : {kode_barang: kode_barang},
                cache:false,
                success: function(data){
                    $.each(data,function(kode_barang, id_kategori, nama_barang, merk_barang, nama_kategori, foto){
                        $('[name="nama_barang"]').val(data.nama_barang);
                        $('[name="merk_barang"]').val(data.merk_barang);
                        $('[name="nama_kategori"]').val(data.nama_kategori);
                        $('[name="id_kategori"]').val(data.id_kategori);
                        $('[name="foto"]').val(data.foto);
                        $('[id="previewfoto"]').attr("src", "<?=base_url ('assets/upload/gambar_stok')?>/"+data.foto);
                    });

                    console.log(data);
                },
                error: function (data){
                    console.log(data);
                    if( data.readyState == 4) {
                        $('[name="nama_barang"]').val('');
                        $('[name="merk_barang"]').val('');
                        $('[name="nama_kategori"]').val('');
                        $('[name="id_kategori"]').val('');
                        $('[name="foto"]').val('');
                        $('[id="previewfoto"]').attr("src", "");
                    }
                }
            });
            return false;
        });

        
    });

</script>

<?php endif ?>