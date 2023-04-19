<?php
function helper_log($tipe = "", $str = ""){
    $CI =& get_instance();
 
    if (strtolower($tipe) == "login"){
        $log_tipe   = 0;
    }
    elseif(strtolower($tipe) == "tambah")
    {
        $log_tipe   = 1;
    }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe   = 2;
    }
    elseif(strtolower($tipe) == "hapus"){
        $log_tipe  = 3;
    }
    else{
        $log_tipe  = 4;
    }
 
    // paramter
    $param['nama_user']     = $CI->session->userdata('session_nama');
    $param['log_type']      = $log_tipe;
    $param['deskripsi']     = $str;
 
    //load model log
    $CI->load->model('M_log');
 
    //save to database
    $CI->M_log->save_log($param);
 
}
?>