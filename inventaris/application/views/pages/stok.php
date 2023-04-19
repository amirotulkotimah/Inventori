<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');

    ?>
<?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>

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

    <?php if ($update_gagal) : ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="alert alert-info mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Success !</strong>
                <a href="#" class="alert-link"></a> <?php echo $this->session->flashdata('update_ggl');?>
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
                            <h4 class="page-title">Data Stok</h4>
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
                                <a href="<?php echo base_url('stok_c/tambah_data/' . '?id_kategori=' . $id_kategori)?>">
                                <button type="button" class="btn btn-primary btn-sm">Tambah Data</button>
                                </a>&nbsp&nbsp

                                <a href="<?php echo base_url('stok_c/import_file/'. '?id_kategori=' . $id_kategori)?>">
                                <button type="button" class="btn btn-primary btn-sm">Import</button>
                                </a>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    
                                    <div class="form-group">
                                        <form class="user" action="<?php echo base_url('stok_c/cari_data/'. $id_kategori);?>" method="get" enctype="multipart/form-data">
                                        
                                    <input type="text" id="kode_barang" name="kode_barang" class="form-control" placeholder="masukkan kode barang...">
                                    </div>
                                    <input type="hidden" name="" value="">
                                    <div class="col-sm-1 form-group">
                                        
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-secondary bt-sm">Cari</button>
                                            <a href="<?php echo base_url('stok_c/stok/'. $id_kategori) ?>" class="btn btn-outline-secondary bt-sm ml-2">Reset</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>

                            </p>

                            <!--<div class="row">
                                <div class="col-sm-12">
                                    
                                </div>
                                </div>-->
                                <form method="post" action="<?php echo base_url('stok_c/delete/'. '?id_kategori=' . $id_kategori);?>" id="form-delete">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Nama Brand</th>
                                            <th>Lokasi</th>
                                            <th>Sub Lokasi</th>
                                            <th>Jumlah</th>
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
                                            <td><?php echo $baris->kode_barang; ?></td>
                                            <td><?php echo $baris->nama_barang; ?></td>
                                            <td><?php echo $baris->nama_kategori; ?></td>
                                            <td><?php echo $baris->merk_barang; ?></td>
                                            <td><?php echo $baris->lokasi; ?></td>
                                            <td><?php echo $baris->sublokasi; ?></td>
                                            <td><?php echo $baris->jumlah_barang; ?></td>
                                            <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                            <td>
                                                <?php endif ?>
                                            <?php
                                            if($getGrup == 1 || $getGrup == 2) {
                                                echo '<a href="'.base_url('stok_c/detail_data/'.$baris->kode_barang. '?id_kategori=' . $id_kategori).'"><button type="button" class="far fa-eye bg-info"></button></a>';
                                            
                                            echo " ";
                                            echo '<a href="'.base_url('stok_c/edit_data/'.$baris->kode_barang. '?id_kategori=' . $id_kategori).'"><button type="button" class="far fa-edit bg-warning"></button></a>';
                                            
                                            echo " ";
                                            //echo '<button type="button" class="far fa-trash-alt bg-danger" data-toggle="modal" data-target="#deleteModal" data-id-data-stok="' . $baris->kode_barang . '?id_kategori=' . $baris->id_kategori.'"></button>';
                                                }?>
                                                <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                                <button type="button" class="far fa-trash-alt bg-danger" data-toggle="modal" data-target="#hapus<?php echo $baris->kode_barang; ?>" ></button>
                                                
                                            </td>
                                            <td><input type='checkbox' class='check-item' name='kode_barang[]' value='<?php echo $baris->kode_barang; ?>'>
                                            </td>
                                            <?php endif ?>
                                        </tr>

                                        <?php
                                        }?>
                                    </tbody>
                                    <?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                    <tfoot>
                                    <tr>
                                        <th colspan="9" ></th>
                                        <th>
                                        <button type="button" class="btn btn-danger btn-sm" type="button" id="btn-hapus">Hapus</button>
                                     </div>
                                     </th>
                                        </div>
                                    </tr>
                                </tfoot>
                                <?php endif ?>
                                </table>
                            </form>
                                
                            </div>

<?php foreach($user as $baris): ?>
<div class="modal fade" id="hapus<?php echo $baris->kode_barang; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="hidden" name="kode_barang" value="<?php echo $baris->kode_barang;?>">
                            <input type="hidden" name="id_kategori" value="<?php echo $baris->id_kategori;?>">
                            <div class="modal-body">Yakin ingin menghapus? Tindakan ini tidak dapat dibatalkan.</div>
                            <div class="text-center m-t-15">
                                <a href="<?php echo base_url('stok_c/hapus_data/'.$baris->kode_barang. '?id_kategori=' . $id_kategori);?>">
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

<?php endif ?>