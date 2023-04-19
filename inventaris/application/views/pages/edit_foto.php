<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
<form class="user" method="post" action="<?php echo base_url('profil_c/update_foto'); ?>" enctype="multipart/form-data">

<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Edit Foto</h5>
        </div>
        <div class="row">
            <div class="col-5 center">
                <div class="card m-b-30">
                    <div class="card-body px-5">
                        <div class="row">
                        <div class="col-8">

                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                        <input type="hidden" name="fotolama" value="<?= $user['foto'] ?>">
                        <input type="hidden" name="password" value="<?= $user['password'] ?>">

                        <div class="col mx-5">
                            <div class="mx-3"> 
                        <figure class="img-fluid"><img src="<?php echo base_url('assets/upload/gambar_user/') . $user['foto'] ?>" class="preview-foto" alt="" height="115" onerror="this.onerror = null; this.src = '<?= base_url('assets/images/avatar.png') ?>'">
                        </figure>
                        </div>
                        </div>

                        <div class="col">                                
                                <div class="input-group mt-2">
                                    
                                        <div class="input-group-append"> 
                                            <input type="file" id="fiefoto" name="filefoto" accept="image/jpeg, image/png">
                                            <button type="submit" class="btn btn-danger btn-sm" name="submit">Simpan</button>
                                            
                                        </div> 
                                    </div>
                                </div>
                            </div>
                    </div>

                    

<script src="<?= base_url('assets/js/previewfoto.js') ?>"></script>

<?php endif ?>