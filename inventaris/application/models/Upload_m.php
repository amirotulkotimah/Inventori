<?php
class Upload_m extends CI_Model {

    var $tabel = 'tb_stok';

    function __construct() {
        parent::__construct();
    }

    //fungsi insert ke database
    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }

}

?>