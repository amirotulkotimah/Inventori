    <?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2) : ?>
    <div class="container-fluid">

    <?php if ($save_sukses) : ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="alert alert-info mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Success !</strong>
                <a href="#" class="alert-link"></a> <?php echo $this->session->flashdata('save');?>
            </div>
        </div>
    </div>
    <?php endif ?>

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

    <?php if ($update_sukses) : ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="alert alert-info mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Success !</strong>
                <a href="#" class="alert-link"></a> <?php echo $this->session->flashdata('update');?>
            </div>
        </div>
    </div>
    <?php endif ?>

    <?php if ($del_sukses) : ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="alert alert-info mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Success !</strong>
                <a href="#" class="alert-link"></a> <?php echo $this->session->flashdata('sukses');?>
            </div>
        </div>
    </div>
    <?php endif ?>

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group float-right">
                            </div>
                            <h4 class="page-title">Data Pengguna</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                        <p>
                            <a href="<?php echo base_url('data_pengguna_c/tambah_data')?>">
                                <button type="button" class="btn btn-primary btn-sm">Tambah Data</button>
                            </a>
                            </p>
                            <form method="post" action="<?php echo base_url('data_pengguna_c/delete/');?>" id="form-delete">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No.HP</th>
                                            <th>Email</th>
                                            <th>Autor</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" id="check-all">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <?php
                                            $no = 1; //no default 1
                                            foreach ($user as $baris) { //
                                            ?>

                                            <?php
                                            if($getGrup == 2 && $baris->id_master_user >= 3 || $getGrup ==1 ) :?>

                                            <td><?php echo $no++; ?></td>
                                            <!-- nomor user otomatis bertambah pada saatn menambah data -->
                                            <td><?php echo $baris->nama; ?></td>
                                            <td><?php echo $baris->hp; ?></td>
                                            <td><?php echo $baris->email; ?></td>
                                            <td><?php echo $baris->autor; ?></td>
                                            <td><img src="<?php echo base_url('assets/upload/gambar_user/') . $baris->foto; ?>" alt="" width="50" height="50" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'"></td>
                                            <td>
                                            <?php
                                            if($getGrup == 2 && $baris->id_master_user >=3 || $getGrup ==1 ) {
                                                echo '<a href="'.base_url('data_pengguna_c/detail_data/'.$baris->id_user).'"><button type="button" class="far fa-eye bg-info"></button></a>';
                                            
                                            echo " ";
                                            echo '<a href="'.base_url('data_pengguna_c/edit_data/'.$baris->id_user).'"><button type="button" class="far fa-edit bg-warning"></button></a>';
                                            
                                            echo " ";
                                            //echo '<button type="button" class="far fa-trash-alt bg-danger" data-toggle="modal" data-target="#deleteModal" data-id-data-user="' . $baris->id_user . '"></button>';
                                                }?>
                                                    <button type="button" class="far fa-trash-alt bg-danger" data-toggle="modal" data-target="#hapus<?php echo $baris->id_user; ?>" ></button>
                                            </td>
                                            <td><input type='checkbox' class='check-item' name='id_user[]' value='<?php echo $baris->id_user; ?>'>
                                            </td>
                                        </tr>
                                        
                                        <?php endif ?>

                                        <?php
                                        }?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="7" ></th>
                                        <th><?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                        <button type="button" class="btn btn-danger btn-sm" type="button" id="btn-hapus" >Hapus</button>
                                     </div>
                                        <?php endif ?> </th>
                                    </tr>
                                </tfoot>
                                </table>
                            </form>
                            </div>

<?php foreach($user as $baris): ?>
<div class="modal fade" id="hapus<?php echo $baris->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="hidden" name="id_user" value="<?php echo $baris->id_user;?>">
                            <div class="modal-body">Yakin ingin menghapus? Tindakan ini tidak dapat dibatalkan.</div>
                            <div class="text-center m-t-15">
                                <a href="<?php echo base_url('data_pengguna_c/hapus_data/'.$baris->id_user);?>">
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

<script>  $(document).ready(function(){    
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

<?php endif ?>