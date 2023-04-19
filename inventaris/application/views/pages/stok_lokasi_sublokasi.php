<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title></title>
 <link rel="stylesheet" href="<?php echo base_url();?>ass/css/bootstrap.min.css">
 <!-- untuk mengakses file css bootstrap pada folder ass-->
</head>

<body>
	<br/>
	<div class="col-md-6 col-md-offset-3">
		<div class="thumbnail">
			<h4><center>Membuat Select berhubungan dengan codeigiter</center></h4><hr/>
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-md-3">Lokasi</label>
					<div class="col-md-8">
						<select name="lokasi" id="lokasi" class="form-control">
							<option value="0">-PILIH-</option>
							<?php foreach($data->result() as $row):?>
							<option value="<?php echo $row->id_lokasi;?>"><?php echo $row->lokasi;?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Sub Lokasi</label>
					<div class="col-md-8">
						<select name="sublokasi" class="sublokasi form-control">
							<option value="0">-PILIH-</option>
						</select>
					</div>
				</div>
			</form>
			<hr/>
			<p style="text-align: center;">Powered by <a href="">mfikri.com</a></p>
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
					url : "<?php echo base_url();?>index.php/Lokasi_sublokasi_c/get_sublokasi",
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