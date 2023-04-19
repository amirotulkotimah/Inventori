<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
<form method="post" action="<?php echo base_url('stok_c/importExcel') ?>" enctype="multipart/form-data">


<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Import</h5>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body px-5">

                        <input type="hidden" id="id_user" name="id_user" value="<?= $user['id_user'] ?>">
                        <input type="hidden" id="autor" name="autor" value="<?= $user['autor'] ?>">

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-3 col-form-label">Kategori</label>
                             <div class="col-sm-6">
                                 <select class="form-control bg-light" id="id_kategori" name="id_kategori" required="">
                                     <option value="" hidden disabled selected>-Pilih kategori-</option>
                                     <?php foreach ($role1 as $item) : ?>
                                         <option value="<?= $item->id_kategori ?>"><?= $item->nama_kategori ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>

                       <div class="form-group row">
                             <label for="example-date-input" class="col-sm-3 col-form-label">Lokasi</label>
                             <div class="col-sm-6">
                                 <select class="form-control bg-light" id="lokasi" name="lokasi" required="">
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
                            <label for="example-date-input" class="col-sm-3 col-form-label">File</label> 
                            <div class="col-sm-6">
                                <input type="file" name="file">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-3 col-form-label"></label> 
                            <div class="col-sm-6">
                                <div class="input-group mt-2">                                    
                                <button type="submit" class="btn btn-primary">Submit</button>
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
</body>
</html>

<?php endif ?>

