<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1) : ?>
    <div class="container-fluid pt-4 px-3">

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

        <div class="text-left mx-auto mb-4">
            <h5>Master User</h5>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <p>
                            <a href="<?php echo base_url('master_user_c/tambah_data')?>">
                                <button type="button" class="btn btn-primary btn-sm">Tambah Data</button>
                            </a>
                            </p>

                            <div class="row">
                                <div class="col-sm-12">
                                    
                                </div>
                                </div>
                                <table id="datatable" class="table table-bordered nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
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
                                            <td><?php echo $baris->autor; ?></td>
                                            <td>
                                            
                                            <?php
                                                echo '<a href="'.base_url('master_user_c/edit_data/'.$baris->id_master_user).'"><button type="button" class="far fa-edit bg-warning"></button></a>';
                                            
                                            echo " ";
                                            //echo '<button type="button" class="far fa-trash-alt bg-danger" data-toggle="modal" data-target="#deleteModal" data-id-data-master-user="' . $baris->id_master_user . '"></button>';
                                                ?>
                                                    <button type="button" class="far fa-trash-alt bg-danger" data-toggle="modal" data-target="#hapus<?php echo $baris->id_master_user; ?>" ></button>
                                                </td>
                                        </tr>
                                        <?php
                                        }?>
                                    </tbody>
                                </table>
                            </div>

<?php foreach($user as $baris): ?>
<div class="modal fade" id="hapus<?php echo $baris->id_master_user; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="hidden" name="id_master_user" value="<?php echo $baris->id_master_user;?>">
                            <div class="modal-body">Yakin ingin menghapus? Tindakan ini tidak dapat dibatalkan.</div>
                            <div class="text-center m-t-15">
                                <a href="<?php echo base_url('master_user_c/hapus_data/'.$baris->id_master_user);?>">
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

<?php endif ?>