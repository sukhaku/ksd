<?php
class pegawaiModel extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->library('encrypt');
	}

	public function get_pegawai(){
		//$q = $this->db->query("select * from menu_ksd where stok_menu>0 ");
		//return $q;
		$result = $this->db->get("pegawai_ksd");
		$options = array();
		foreach ($result->result_array() as $row) {
			$options[$row["nama_pegawai"].'|'.$row["id_pegawai"]] = $row["nama_pegawai"];
			# code...
		}
		return $options;
	}
}