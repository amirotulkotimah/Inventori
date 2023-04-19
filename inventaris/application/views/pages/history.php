<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

    <?php if ($getGrup == 1 || $getGrup == 2) : ?>
    <form method="post" action="<?php echo base_url('history_c/delete') ?>" id="form-delete">      
    <div class="row">
    <div class="container-fluid px-4">
        <div class="text-left mx-auto mb-4">
        </div>

    <div class="row">
                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="card-body table-responsive">
                                <h5 class="text-primary">Daftar Aktivitas</h5>
                                <br>

                                <table id="datatable2" class="table border-0 dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            
                                            <th>No</th>
                                            <th>Deskripsi</th>
                                            <th>Nama User</th>
                                            <th>Tanggal</th>
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
                                            <td><?php echo $no++; ?></td>
                                            <!-- nomor user otomatis bertambah pada saatn menambah data -->
                                            <td><?php echo $baris->deskripsi; ?></td>
                                            <td><?php echo $baris->nama_user; ?></td>
                                            <td><?php echo $baris->tanggal; ?></td>
                                            <td><input type='checkbox' class='check-item' name='id_history[]' value='<?php echo $baris->id_history; ?>'></td>
                                        </tr>
                                        <?php
                                        }?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="4" ></th>
                                        <th><?php if ($getGrup == 1 || $getGrup == 2) : ?>
                                        <button type="button" class="btn btn-danger btn-sm" type="button" id="btn-hapus" >Hapus</button>
                                     </div>
                                        <?php endif ?> </th>
                                    </tr>
                                </tfoot>
                                </table>    
                                       
                            </form>
                            </div>


<script>    
    $(document).ready(function () {
        $("#check-all").click(function(){
        $('#datatable2').dataTable();    
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