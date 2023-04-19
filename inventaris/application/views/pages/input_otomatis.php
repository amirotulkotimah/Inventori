<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title></title>
 <link rel="stylesheet" href="<?php echo base_url();?>ass/css/bootstrap.min.css">
 <!-- untuk mengakses file css bootstrap pada folder ass-->
</head>

<form class="form-horizontal">
	<div class="form-group">
		<label class="control-label col-xs-3" >Kode Barang</label>
		<div class="col-xs-9">
			<input name="kode_barang" id="kode_barang" class="form-control" type="text" placeholder="Kode Barang..." style="width:335px;">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-3" >Nama Barang</label>
		<div class="col-xs-9">
			<input name="nama_barang" class="form-control" type="text" placeholder="Nama Barang..." style="width:335px;" readonly>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-3" >Kategori</label>
		<div class="col-xs-9">
			<input name="nama_kategori" class="form-control" type="text" placeholder="Kategori..." style="width:335px;" readonly>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-3" >Lokasi</label>
		<div class="col-xs-9">
			<input name="lokasi" class="form-control" type="text" placeholder="Lokasi..." style="width:335px;" readonly>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-3" >Sublokasi</label>
		<div class="col-xs-9">
			<input name="sublokasi" class="form-control" type="text" placeholder="Sublokasi..." style="width:335px;" readonly>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-3" >Autor</label>
		<div class="col-xs-9">
			<input name="autor" class="form-control" type="text" placeholder="Autor..." style="width:335px;" readonly>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-3" >Foto</label>
		<div class="col-xs-9">
			<input name="foto" class="form-control" type="text" placeholder="Foto..." style="width:335px;" readonly>
		</div>
	</div>
</form>
</div>
</div>

		<script src="<?php echo base_url()?>ass/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>ass/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>ass/js/modernizr.min.js"></script>
        <script src="<?php echo base_url()?>ass/js/detect.js"></script>
        <script src="<?php echo base_url()?>ass/js/fastclick.js"></script>
        <script src="<?php echo base_url()?>ass/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url()?>ass/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url()?>ass/js/waves.js"></script>
        <script src="<?php echo base_url()?>ass/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url()?>ass/js/jquery.scrollTo.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
		$('#kode_barang').on('input',function(){
			var kode_barang=$(this).val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('index.php/Input_otomatis_c/get_barang')?>",
				dataType : "JSON",
				data : {kode_barang: kode_barang},
				cache:false,
				success: function(data){
					$.each(data,function(kode_barang, nama_barang, nama_kategori, lokasi, sublokasi, autor, foto){
						$('[name="nama_barang"]').val(data.nama_barang);
						$('[name="nama_kategori"]').val(data.nama_kategori);
						$('[name="lokasi"]').val(data.lokasi);
						$('[name="sublokasi"]').val(data.sublokasi);
						$('[name="autor"]').val(data.autor);
						$('[name="foto"]').val(data.foto);
					});
				}
			});
			return false;
		});
	});
</script>
</body>
</html>