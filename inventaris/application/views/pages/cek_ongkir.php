<?php foreach($user as $baris): ?>
<div class="row">
                    <div class="col-md-11 mx-3">
                        <div class="p-20">
                             
                            <div class="form-group">
                                <label>No. Resi:</label>
                                <input type="text" placeholder="" data-mask="" class="form-control" id="no_resi" name="no_resi" value="<?php echo $baris->no_resi;?>">
                                <span class="font-13 text-muted"> </span>
                            </div>
                            <div class="form-group">
                                <label id="debit1">Kurir:</label>
                                <input type="text" placeholder=""  class="form-control" id="kurir" name="kurir" value="<?php echo $baris->kurir;?>">
                                <span class="font-13 text-muted"> </span>
                            </div>
                            <div class="form-group">
                                <label id="debit1">Status:</label>
                                <input type="text" placeholder=""  class="form-control" id="status" name="status" value="">
                                <span class="font-13 text-muted"> </span>
                            </div>
                            
                            <div class="text-center m-t-15">
                                <button type="" id="cek"  class="btn btn-primary waves-effect waves-light">Cek</button>
                            </div>
                        </div>
                    </div>
                </div>
              <?php endforeach?>

        
