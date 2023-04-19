<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
<form class="user" method="post" action="<?php echo base_url('stok_c/update/'.$id_kategori); ?>" enctype="multipart/form-data">

<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Edit Stok Barang</h5>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body px-5">
                        <div class="row">
                        <div class="col-8">

                        <input type="hidden" name="fotolama" value="<?= $user['foto'] ?>">
                        <input type="hidden" name="id_kategori" value="<?=$user['id_kategori']?>">
                        <input type="hidden" name="lokasi" value="<?= $user['id_lokasi']?>">
                        <input type="hidden" name="sublokasi" value="<?= $user['sublokasi']?>">
                        <input type="hidden" name="merk_barang" value="<?=$user['merk_barang']?>">

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Kode Barang</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['kode_barang']?>" id="kode_barang" name="kode_barang" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama Barang</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['nama_barang']?>" id="nama_barang" name="nama_barang" required="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Kategori Barang</label>
                             <div class="col-sm-7">
                                 <select class="form-control" id="kategori" name="id_kategori">
                                     <option value="" hidden disabled selected><?=$user['nama_kategori']?></option>
                                     <?php foreach($brand->result() as $row):?>
                                    <option value="<?php echo $row->id_kategori;?>"><?php echo $row->nama_kategori;?></option>
                                    <?php endforeach;?>
                                 </select>
                             </div>
                         </div>
 

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Nama Brand</label>
                             <div class="col-sm-7">
                                 <select name="merk_barang" class="merk_barang form-control" >
                                     <option value="" hidden disabled selected><?=$user['merk_barang']?></option>
                                 </select>
                             </div>
                         </div>

                        <!--<div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Kategori</label>
                             <div class="col-sm-7">
                                 <select class="form-control" id="id_kategori" name="id_kategori" >
                                     <option value="" hidden disabled selected ><?= $user['nama_kategori']?></option>
                                     <?php foreach ($role1 as $item) : ?>
                                         <option value="<?= $item->id_kategori ?>"><?= $item->nama_kategori ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>-->

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Jumlah</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['jumlah_barang']?>" id="jumlah_barang" name="jumlah_barang" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Lokasi</label>
                             <div class="col-sm-7">
                                 <select class="form-control" id="lokasi" name="lokasi">
                                     <option value="" hidden disabled selected><?= $user['lokasi']?></option>
                                     <?php foreach($data->result() as $row):?>
                                    <option value="<?php echo $row->id_lokasi;?>"><?php echo $row->lokasi;?></option>
                                    <?php endforeach;?>
                                 </select>
                             </div>
                         </div>
 

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Sub Lokasi</label>
                             <div class="col-sm-7">
                                 <select name="sublokasi" class="sublokasi form-control">
                                     <option value="" hidden disabled selected><?= $user['sublokasi']?></option>
                                 </select>
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
                                        <a class="small" href="<?php echo base_url('stok_c/stok/'.$id_kategori)?>"><button class="btn btn-danger btn-sm " type="button">Batal</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <figure class="img-fluid">
                            <img src="<?php echo base_url('assets/upload/gambar_stok/') . $user['foto']; ?>" class="preview-foto text-white" alt="" height="140" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'">
                        </figure>
                        <div class="mt-3">
                            <div class="input-group-append">
                                <input type="file" id="filefoto" name="filefoto" accept="image/jpeg, image/png">
                                <!--<label class="btn btn-block btn-primary " for="foto">Pilih foto</label>--> 
                                </div>
                            </div>
                        </div>

<script src="<?php echo base_url()?>assets/js/previewfoto.js"></script>

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