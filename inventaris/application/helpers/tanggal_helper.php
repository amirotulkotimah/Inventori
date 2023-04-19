<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('format_indo')) {
  function format_indo($date){
    date_default_timezone_set('Asia/Jakarta');
    // array hari dan bulan
    //$Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan = array("01","02","03","04","05","06","07","08","09","10","11","12");
    
    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w",strtotime($date));
    $result = " ".$tahun."-".$Bulan[(int)$bulan-1]."-".$tgl." ".$waktu;

    return $result;
  }
}