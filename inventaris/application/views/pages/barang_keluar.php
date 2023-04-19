<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>
<?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
    <form method="get">
<div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5>Barang Keluar</h5>
        </div>
<div class="row">
    <?php
        foreach ($role1 as $item)
    {
    ?>
    
    <div class="col-lg-4">
        <div class="card m-b-30 card-body">
            <h4 class="card-title font-20 mt-0"><?= $item->jenis_bk ?></h4>
                <p class="card-text">Pencatatan data barang keluar secara <?= $item->jenis_bk ?></p>
                <a href="<?php echo base_url('barang_keluar_c/data_barang_keluar/'. $item->id_jenis_bk);?>" class="btn btn-primary waves-effect waves-light">Lihat detail </a>
        </div>
    </div>
    </form>

<?php } ?>

<?php endif ?>