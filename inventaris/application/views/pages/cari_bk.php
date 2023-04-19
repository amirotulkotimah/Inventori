<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
    <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group float-right">
                            </div>
                            <h4 class="page-title">Data Barang Keluar <?= $lihat['jenis_bk'] ?></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                        <p>
                            <!--<div class="container align-items-center">-->
                            
                                <div class="row mx-auto">
                            <a href="<?php echo base_url('barang_keluar_c/tambah_data?id_jenis_bk=' . $jenis_bk) ?>">
                                <button type="button" class="btn btn-primary btn-sm">Tambah Data</button>
                            </a> &nbsp&nbsp&nbsp
                            
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <div class="form-group">
                                        <form class="user" action="<?php echo base_url('barang_keluar_c/cari_data/' . $jenis_bk);?>" method="get" enctype="multipart/form-data">
                                    <input type="text" id="kode_bk" name="kode_bk" class="form-control" placeholder="masukkan kode barang...">
                                    </div>
                                    <input type="hidden" name="" value="">
                                    <div class="col-sm-1 form-group">
                                        
                                        
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-secondary bt-sm">Cari</button>
                                            <a href="<?php echo base_url('barang_keluar_c/data_barang_keluar/'. $jenis_bk) ?>" class="btn btn-outline-secondary bt-sm ml-2">Reset</a>
                                            
                                        </div>
                                    </div>
                                </form>
                                </div>
                            

                            </p>

                            <div class="row">
                                <div class="col-sm-12">
                                    
                                </div>
                                </div>
                                <form method="post" action="<?php echo base_url('barang_keluar_c/delete/'. '?jenis_bk=' . $jenis_bk);?>" id="form-delete">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Nama Brand</th>
                                            <th>Jumlah</th>
                                            <th>Tgal Keluar</th>
                                            <?php if ($jenis_bk == 2) : ?>
                                            <th>Kurir</th>
                                            <th>No. Resi</th>
                                            <?php endif?>
                                            <!--<th>Foto</th>-->
                                            <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                            <th>Aksi</th>
                                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" id="check-all">
                                            </th>
                                            <?php endif ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $no = 1; //no default 1
                                            foreach ($user as $baris) { //
                                            ?>
                                            <td><?php echo $no++; ?></td>
                                            <!-- nomor user otomatis bertambah pada saatn menambah data -->
                                            <td><?php echo $baris->kode_bk; ?></td>
                                            <td><?php echo $baris->nama_bk; ?></td>
                                            <td><?php echo $baris->nama_kategori; ?></td>
                                            <td><?php echo $baris->merk_barang; ?></td>
                                            <td><?php echo $baris->jumlah_bk; ?></td>
                                            <td><?php echo $baris->tanggal_bk; ?></td>
                                            <?php if ($jenis_bk == 2) : ?>
                                            <td><?php echo $baris->kurir;?></td>
                                            <td><?php echo $baris->no_resi;?>
                                                <button type="button" data-toggle="modal" data-target="#modalcek<?php echo $baris->id_barang_keluar; ?>" class="btn fas fa-check"></button>
                                                <br>
                                                Status : <span class="badge badge-boxed badge-danger"><?php echo strtolower($baris->status) ;?></span>
                                                
                                            </td>
                                            <?php endif ?>
                                            <!--<td><button type="button" class="btn" data-toggle="modal" data-target="#detail<?php echo $baris->id_barang_keluar; ?>"><img src="<?php echo base_url('assets/upload/gambar_stok/') . $baris->foto; ?>" alt="" width="50" height="50" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'"></button></td>-->
                                            <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                            <td>
                                                <?php endif ?>
                                            <?php
                                            if($getGrup == 1 || $getGrup == 2) {
                                                echo '<a href="'.base_url('barang_keluar_c/detail_data/' . $baris->id_barang_keluar . '?id_jenis_bk=' . $jenis_bk) . '"><button type="button" class="far fa-eye bg-info"></button></a>';
                                            
                                            echo " ";
                                            echo '<a href="'.base_url('barang_keluar_c/edit_data/' . $baris->id_barang_keluar . '?id_jenis_bk=' . $jenis_bk).'"><button type="button" class="far fa-edit bg-warning"></button></a>';
                                            
                                            echo " ";
                                            //echo '<button type="button" class="far fa-trash-alt bg-danger" data-toggle="modal" data-target="#deleteModal" data-id-data-barang-keluar="' . $baris->id_barang_keluar . '?jenis_bk=' . $baris->jenis_bk.'"></button>';
                                                }?>
                                                <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                                   <button type="button" class="far fa-trash-alt bg-danger" data-toggle="modal" data-target="#hapus<?php echo $baris->id_barang_keluar; ?>" ></button>
                                                   
                                                </td>
                                                <td><input type='checkbox' class='check-item' name='id_barang_keluar[]' value='<?php echo $baris->id_barang_keluar; ?>'></td>
                                                <?php endif ?> 
                                        </tr>
                                        <?php
                                        }?>
                                    </tbody>
                                    <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                    <tfoot>
                                    <tr>
                                        <?php if ($jenis_bk == 1) : ?>
                                        <th colspan="8" ></th>
                                        <?php endif?>
                                        <?php if ($jenis_bk == 2) : ?>
                                        <th colspan="10" ></th>
                                        <?php endif?>
                                        <th>
                                        <button type="button" class="btn btn-danger btn-sm" type="button" id="btn-hapus" >Hapus</button>
                                     </div>
                                         </th>
                                    </tr>
                                </tfoot>
                                <?php endif ?>
                                </table>
                            </form>
                            </div>

                    

<?php foreach($user as $baris): ?>
<div class="modal fade" id="hapus<?php echo $baris->id_barang_keluar; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body table">
                    <div class="row">
                    <div class="col-md-11 mx-3">
                        <div class="p-20">
                            <input type="hidden" name="id_barang_keluar" value="<?php echo $baris->id_barang_keluar;?>">
                            <input type="hidden" name="jenis_bk" value="<?php echo $baris->jenis_bk;?>">
                            <div class="modal-body">Yakin ingin menghapus? Tindakan ini tidak dapat dibatalkan.</div>
                            <div class="text-center m-t-15">
                                <a href="<?php echo base_url('barang_keluar_c/hapus_data/'.$baris->id_barang_keluar. '?jenis_bk=' . $jenis_bk);?>">
                                <button type="button" class="btn btn-danger waves-effect waves-light">Hapus</button></a>
                                <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal" aria-label="Close">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
            </div>
                
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo base_url('barang_keluar_c/input_status');?>" method="post" enctype="multipart/form-data">
<div class="modal fade" id="modalcek<?php echo $baris->id_barang_keluar; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Cek Resi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body table">
                    <div class="row">
                    <div class="col-md-11 mx-3">
                        <div class="p-20">

                            <input type="hidden" name="id_barang_keluar" value="<?php echo $baris->id_barang_keluar;?>">
                            <input type="hidden" name="jenis_bk" value="<?php echo $baris->jenis_bk;?>">

                            <div class="form-group">
                                <label>No. Resi:</label>
                                <input type="text" placeholder="" data-mask="" class="form-control" id="no_resi<?php echo $baris->id_barang_keluar;?>" name="no_resi" value="<?php echo $baris->no_resi;?>">
                                <span class="font-13 text-muted"> </span>
                            </div>
                            <div class="form-group">
                                <label>Kurir:</label>
                                <input type="text" placeholder=""  class="form-control" id="kurir<?php echo $baris->id_barang_keluar;?>" name="kurir" value="<?php echo $baris->kurir;?>">
                                <span class="font-13 text-muted"> </span>
                            </div>
                            <div class="form-group">
                                <label >Status:</label>
                                <input type="text" placeholder=""  class="form-control" id="status_kirim<?php echo $baris->id_barang_keluar;?>" name="status" value="">
                                <span class="font-13 text-muted"> </span>
                            </div>
                            
                            <div class="text-center m-t-15">
                                <button type="" id="buttoncek<?php echo $baris->id_barang_keluar;?>"  class="btn btn-primary btn-sm">&nbsp&nbsp&nbspCek&nbsp&nbsp&nbsp</button>
                                <button type="submit" class="btn btn-danger btn-sm" id="buttonsimpan">Simpan</button>

                                <script type="text/javascript">
                                $('#buttoncek<?php echo $baris->id_barang_keluar;?>').on('click',function(e){
                                    e.preventDefault();
                                    var no_resi=$('#no_resi<?php echo $baris->id_barang_keluar;?>').val();
                                    console.log ("no_resi :"+no_resi);
                                    var kurir=$('#kurir<?php echo $baris->id_barang_keluar;?>').val();
                                    console.log("kurir:"+kurir);
                                    $.ajax({
                                        type : "POST",
                                        url  : "<?php echo base_url('index.php/Api_Rajaongkir_c/cek_resi')?>",
                                        data: { no_resi: no_resi, kurir: kurir},
                                        dataType : "html",
                                        cache:false,
                                        success: function(data){
                                            
                                            var a=JSON.parse(data);
                                            console.log(a.rajaongkir.result.delivery_status.status);
                                            $('#status_kirim<?php echo $baris->id_barang_keluar;?>').val(a.rajaongkir.result.delivery_status.status);
                                            // $('.modal').modal('show');
                                            
                                        },error: function(data){
                                            console.log (data)
                                        }
                                    });

                                    $("#buttoncek<?php echo $baris->id_barang_keluar;?>").hide()
                                    if($(this).val() == "1"){
                                        $("#buttonsimpan").show();
                                    }
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
            </div>
                
            </div>
        </div>
    </div>
</div>
</form>
<?php endforeach;
    ?>


<script>  
    $(document).ready(function(){    
    $("#check-all").click(function(){      
    if($(this).is(":checked"))    
    $(".check-item").prop("checked", true);      
    else        
    $(".check-item").prop("checked", false);     
    });

    $("#btn-hapus").click(function(){      
         
    $("#form-delete").submit();  
    });  
    });  
</script>     

<script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/js/modernizr.min.js"></script>
<script src="<?php echo base_url()?>assets/js/detect.js"></script>
<script src="<?php echo base_url()?>assets/js/fastclick.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url()?>assets/js/waves.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>




<?php endif ?>