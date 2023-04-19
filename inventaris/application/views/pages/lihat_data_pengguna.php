<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2) : ?>
<form class="user" action="" method="post" enctype="multipart/form-data">

    <div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5><a class="far fa-arrow-alt-circle-left text-dark" href="<?php echo base_url('data_pengguna_c')?>">
            </a>&nbsp&nbsp Detail Data Pengguna</h5>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">

                        <div class="form-group row ">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['nama']?>" id="nama" name="nama" required="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">No. HP</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['hp']?>" id="hp" name="hp" required="" placeholder="" disabled="">
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Email</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['email']?>" id="email" name="email" required="" placeholder="" disabled="">
                             </div>
                         </div>

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Autor</label> 
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['autor']?>" id="autor" name="alamat_ortu" required="" disabled="">
                            </div>
                        </div>

                       <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Username</label>
                                 <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['username']?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                             </div>
                         </div>
 

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Password</label>
                             <div class="col-sm-7">
                                <input class="form-control" type="text" value="<?= $user['password']?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                             </div>
                         </div>
                     </div>

                     <div class="col-auto">
                        <figure class="img-fluid">
                            <img src="<?php echo base_url('assets/upload/gambar_user/') . $user['foto'] ?>" class="preview-foto" alt="" height="130" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'">
                        </figure>
                        </div> 
                    </div>

                     </div>

                 <?php endif ?>
