<?php

class Api_Rajaongkir_c extends CI_Controller {
	

	public function kurir(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://pro.rajaongkir.com/api/waybill",
			CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS => "waybill=J00164811942&courier=jnt",
		    CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: "
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
		}
	public function index() {
        $this->load->view('header');
        $this->load->view('pages/cek_ongkir');
        $this->load->view('footer');
    }

	function cek_resi() {
		$id_barang_keluar = $this->input->post('id_barang_keluar');
        $no_resi = $this->input->post('no_resi');
        $kurir = $this->input->post('kurir');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/waybill",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "waybill=".$no_resi. "&courier=".$kurir."",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
		    "key: "
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        echo json_encode($data);
        
        //$status=$data['rajaongkir']['result']['delivery_status']['status'] ;
        //echo 'STATUS = '. $status;
        //echo $status;
        }
}


?>