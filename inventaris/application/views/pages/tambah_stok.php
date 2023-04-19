<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
<form class="user" action="<?php echo base_url('stok_c/insert/' .$id_kategori);?>" method="post" enctype="multipart/form-data">

<div class="container-fluid pt-4 px-3">

    <?php if ($err_save) : ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="alert alert-danger mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Error !</strong>
                <a href="#" class="alert-link"></a> <?php echo $this->session->flashdata('error_save');?>
            </div>
        </div>
    </div>
    <?php endif ?>

        <div class="text-left mx-auto mb-4">
            <h5>Tambah Stok Barang</h5>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body px-5">

                        <input type="hidden" id="id_user" name="id_user" value="<?= $user['id_user'] ?>">
                        <input type="hidden" id="autor" name="autor" value="<?= $user['autor'] ?>">
                        <input type="hidden" name="jumlah" value="0">

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Kode Barang</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="kode_barang" name="kode_barang" required="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Nama Barang</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="nama_barang" name="nama_barang" required="" placeholder="">
                            </div>
                        </div>

                        <!--<div class="form-group row">
                             <label for="example-date-input" class="col-sm-3 col-form-label">Kategori Barang</label>
                             <div class="col-sm-6">
                                 <select class="form-control bg-light" id="id_kategori" name="id_kategori" required="">
                                     <option value="" hidden disabled selected>-Pilih kategori-</option>
                                     <?php foreach ($role1 as $item) : ?>
                                         <option value="<?= $item->id_kategori ?>"><?= $item->nama_kategori ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>-->

                         <div class="form-group row">
                             <label for="example-date-input" class="col-sm-3 col-form-label">Kategori Barang</label>
                             <div class="col-sm-6">
                                 <select class="form-control" id="kategori" name="id_kategori" required="">
                                     <option value="" hidden disabled selected>-Pilih kategori-</option>
                                     <?php foreach($brand->result() as $row):?>
                                    <option value="<?php echo $row->id_kategori;?>"><?php echo $row->nama_kategori;?></option>
                                    <?php endforeach;?>
                                 </select>
                             </div>
                         </div>
 

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-3 col-form-label">Nama Brand</label>
                             <div class="col-sm-6">
                                 <select name="merk_barang" class="merk_barang form-control" >
                                     <option value="0">-Pilih brand-</option>
                                 </select>
                             </div>
                         </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Jumlah</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="text" value="" id="jumlah_barang" name="jumlah_barang" required="">
                            </div>
                        </div>

                       <div class="form-group row">
                             <label for="example-date-input" class="col-sm-3 col-form-label">Lokasi</label>
                             <div class="col-sm-6">
                                 <select class="form-control" id="lokasi" name="lokasi" required="">
                                     <option value="" hidden disabled selected>-Pilih lokasi-</option>
                                     <?php foreach($data->result() as $row):?>
                                    <option value="<?php echo $row->id_lokasi;?>"><?php echo $row->lokasi;?></option>
                                    <?php endforeach;?>
                                 </select>
                             </div>
                         </div>
 

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-3 col-form-label">Sub Lokasi</label>
                             <div class="col-sm-6">
                                 <select name="sublokasi" class="sublokasi form-control" required="">
                                     <option value="0">-Pilih sub lokasi-</option>
                                 </select>
                             </div>
                         </div>
 
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Tanggal</label> 
                            <div class="col-sm-6">
                                <input class="form-control" type="" value="<?php echo date('Y-m-d');?>" id="tanggal_stok" name="tanggal_stok">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="filefoto" name="filefoto" accept="image/jpeg, image/png" required="">
                                            <label class="custom-file-label" for="foto">Pilih foto...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label"></label> 
                            <div class="col-sm-6">
                                <div class="input-group mt-2">
                                    <div class="custom"> 
                                        <div class="input-group-append"> 
                                            <a><input type="submit" class="btn btn-primary btn-sm" name="submit" value="Simpan"></a> 
                                        </div> 
                                    </div> &nbsp &nbsp
                                    <div class="input-group-append">
                                        <a class="small" href="<?php echo base_url('stok_c/stok/' .$id_kategori)?>"><button class="btn btn-danger btn-sm" type="button">Batal</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
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
            $('#lokasi').change(function(){
                var id_lokasi=$(this).val();
                $.ajax({
                    url : "<?php echo base_url();?>index.php/Stok_c/get_sublokasi",
                    method : "POST",
                    data : {id_lokasi: id_lokasi},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option>'+data[i].sublokasi+'</option>';
                        }
                        $('.sublokasi').html(html);
                    }
                });
            });
        });
</script>

<script type="text/javascript">

        $(document).ready(function(){
            $('#kategori').change(function(){
                var id_kategori=$(this).val();
                $.ajax({
                    url : "<?php echo base_url();?>index.php/Stok_c/get_brand",
                    method : "POST",
                    data : {id_kategori: id_kategori},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option>'+data[i].merk_barang+'</option>';
                        }
                        $('.merk_barang').html(html);
                    }
                });
            });
        });
</script>
</body>
</html>
<?php endif ?>