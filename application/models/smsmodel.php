<?php

class smsmodel extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
 
	public function getInbox($num,$offset){

		$this->db->order_by("ID","DESC");
		$data = $this->db->get('inbox',$num,$offset);
		return $data->result();
	}

	public function get_jenis_balasan(){
		//$q = $this->db->query("select * from menu_ksd where stok_menu>0 ");
		//return $q;
		$result = $this->db->get("jenis_balasan_ksd");
		$options = array();
		foreach ($result->result_array() as $row) {
			$options[$row["id_jenis"]] = $row["isi_balasan_ksd"];
			# code...
		}
		return $options;
	}

	public function insertToOutbox() {
        $insertIntoDb = date('Y-m-d H:i:s');
        $sendingDateTime  = date('Y-m-d H:i:s');
        $destinationNumber = $this->input->post('destinationNumber');
        $textDecoded = $this->input->post('textDecoded');
        $coding = 'Default_No_Compression';
        $creatorId = '';
        $data= array(
            'InsertIntoDB' => $insertIntoDb,
            'SendingDateTime'  => $sendingDateTime,
            'DestinationNumber'=> $destinationNumber,
            'Coding' => $coding,
            'TextDecoded' => $textDecoded,
            'CreatorID' => $creatorId 
        ); 
        $this->db->insert('outbox',$data);
    }
}

?>