<!--<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>-->

    <!--<?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>-->
<form class="user" action="<?php echo base_url('profil_c/edit'); ?>" method="post" enctype="multipart/form-data">

    <div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Profil Saya</h5>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">

                            <input type="hidden" name="fotolama" value="<?= $user['foto'] ?>">
                            <input type="hidden" name="email" value="<?= $user['email'] ?>">

                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Nama</label> 
                            <div class="col-sm-5">
                                <input class="form-control" type="text" value="<?= $user['nama'];?>" id="nama" name="nama" required="" disabled="">
                            </div>
                        </div>

                       <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Username</label>
                                 <div class="col-sm-5">
                                <input class="form-control" type="text" value="<?= $user['username'];?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" disabled="">
                             </div>
                         </div>
 

                        <div class="form-group row">
                             <label for="example-date-input" class="col-sm-4 col-form-label">Password</label>
                             <div class="col-sm-5">
                                <input class="form-control" type="text" value="<?= $user['password'];?>" id="nama_ortu" name="nama_ortu" required="" placeholder="" >
                             </div>
                         </div>

                         <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label"></label> 
                            <div class="col-sm-7">                                
                                <div class="input-group mt-2">
                                    <div class="custom"> 
                                        <div class="input-group-append"> 
                                            <a><input type="submit" class="btn btn-primary btn-sm" name="submit" value="Ganti password"></a> 
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>

                     <div class="col-auto">
                        <figure class="img-fluid">
                            <img src="<?php echo base_url('assets/upload/gambar_user/') . $user['foto']; ?>"  alt="" height="140" class="rounded-circle" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'">
                        </figure>
                        <div class="mt-3">
                            <a class="small" href="<?php echo base_url('profil_c/edit_foto')?>"><button class="btn btn-block btn-danger " type="button">Ganti Foto</button>
                            </a>
                            </div>
                        </div> 
                    </div>

                     </div>

                      <script src="<?= base_url('assets/js/previewfoto.js') ?>"></script>
                  <!--<?php endif ?>-->
