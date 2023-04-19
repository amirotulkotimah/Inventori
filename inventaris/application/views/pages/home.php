
<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3) : ?>
    <div class="container-fluid pt-4 px-3">
        <div class="text-left mx-auto mb-4">
            <h5></h5>
        </div>
<div class="row">

                <div class="col-lg-3">
                        <div class="card mini-stat">
                            <div class="mini-stat-icon text-right">
                                <i class="far fa-folder"></i>
                            </div>
                            <div class="p-4">
                                <h6 class="text-uppercase mb-3">Stok</h6>
                                <div class="float-right">
                                    <h4 class="mb-0"><?php echo $total_stok;?><small class="ml-2"><i class=""></i></small></h4>
                                </div>
                                <p class="mb-0">Total</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card mini-stat">
                            <div class="mini-stat-icon text-right">
                                <i class="fas fa-sign-in-alt"></i>
                            </div>
                            <div class="p-4">
                                <h6 class="text-uppercase mb-3">Barang Masuk</h6>
                                <div class="float-right">
                                    <h4 class="mb-0"><?php echo $total_data_bm;?><small class="ml-2"><i class=""></i></small></h4>
                                </div>
                                <p class="mb-0">Total</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card mini-stat">
                            <div class="mini-stat-icon text-right">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <div class="p-4">
                                <h6 class="text-uppercase mb-3">Barang Keluar Inter</h6>
                                <div class="float-right">
                                    <h4 class="mb-0"><?php echo $total_data_bk_inter;?><small class="ml-2"><i class=""></i></small></h4>
                                </div>
                                <p class="mb-0">Total</p>
                            </div>
                        </div>
                    </div> 

                    <div class="col-lg-3">
                        <div class="card mini-stat">
                            <div class="mini-stat-icon text-right">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <div class="p-4">
                                <h6 class="text-uppercase mb-3">Barang Keluar Ekster</h6>
                                <div class="float-right">
                                    <h4 class="mb-0"><?php echo $total_data_bk_ekter;?><small class="ml-2"><i class=""></i></small></h4>
                                </div>
                                <p class="mb-0">Total</p>
                            </div>
                        </div>
                    </div>                                            
                </div><!-- end row -->

        <div class="row">
        <div class="col-xl-7">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="mb-0">Stok Terbaru</h6>
                </div>
                <div class="col text-right">
                  <!--<a href="<?php echo base_url('stok_c')?>" class="btn btn-sm btn-primary">Lihat semua</a>-->
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Brand</th>

                  </tr>
                </thead>
                <tbody>
                <?php foreach ($baru as $baris) : ?>
                  <tr>
                    <th scope="col">
                      <?php echo $baris->kode_barang; ?>
                    </th>
                    <td>
                      <?php echo $baris->nama_barang; ?> 
                    </td>
                    <td>
                      <?php echo $baris->nama_kategori; ?> 
                    </td>
                    <td>
                      <?php echo $baris->merk_barang; ?> 
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-5">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="mb-0">Barang Masuk Terbaru</h6>
                </div>
                <div class="col text-right">
                  <!--<a href="<?php echo base_url('Data_Penimbangan/lihat_semua_data_penimbangan')?>" class="btn btn-sm btn-primary">Lihat semua</a>-->
                </div>
              </div>
            </div>
            <div class="table-responsive">
             
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($bm_baru as $baris) : ?>
                  <tr>
                    <th scope="col">
                      <?php echo $baris->kode_bm; ?>
                    </th>
                    <td>
                      <?php echo $baris->nama_bm; ?> 
                    </td>
                    <td>
                      <?php echo $baris->nama_kategori; ?> 
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-data">
                                <h6 class="d-inline-block">Barang Keluar Ekternal Terbaru</h6>
                                <div class="float-right ml-2">
                                    
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Kode Barang</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Tgl Keluar</th>
                                                <th scope="col">Kurir</th>
                                                <th scope="col">Status Resi</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($bk_baru as $baris) : ?>
                                            <tr>
                                                <td><?php echo $baris->kode_bk;?></td>
                                                <td><?php echo $baris->nama_bk;?></td>
                                                <td><?php echo $baris->nama_kategori;?></td>
                                                <td><?php echo $baris->tanggal_bk;?></td>
                                                <td><?php echo $baris->kurir;?></td>
                                                <td><span class="badge badge-boxed badge-danger"><?php echo strtolower($baris->status) ;?></span></td>  
                                            </tr>
                                                                                              
                                        </tbody>
                                            <?php endforeach; ?>
                                    </table>
                                </div>
                                
                            </div>
                        </div>                                    
                    </div> 
                </div>

    <?php endif ?>
