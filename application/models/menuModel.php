<?php
	class MenuModel extends CI_Model{	
		public function __construct(){
			parent::__construct();
	}

	public function stokMenuHabis(){

		$this->db->select('nama_menu');
   		$this->db->select('stok_menu');
   		$this->db->select('harga_menu');
   		$this->db->where('stok_menu <', 1);
   		$data = $this->db->get('menu_ksd');
   
   		return $data->result();
	}
	public function stokMenuMasih(){

		$this->db->select('nama_menu');
   		$this->db->select('stok_menu');
   		$this->db->select('harga_menu');
   		$this->db->where('stok_menu >=', 1);
   		$data = $this->db->get('menu_ksd');
   
   		return $data->result();
	}

	public function ambilMenu(){
		$this->db->select('*');
		$this->db->from('menu_ksd');
		$this->db->join('jenis_menu_ksd','jenis_menu_ksd.kode_jenis=menu_ksd.kode_jenis');
		$this->db->order_by('menu_ksd.kode_jenis','asc');
		//$this->db->where('jenis_menu_ksd.kode_jenis','menu_ksd.kode_jenis');
		return $this->db->get()->result();
	}

	public function ambilMenuShift(){
		$this->db->select('*');
		$this->db->from('menu_ksd');
		$this->db->join('jenis_menu_ksd','jenis_menu_ksd.kode_jenis=menu_ksd.kode_jenis');
		$this->db->order_by('menu_ksd.kode_jenis','asc');
		//$this->db->where('jenis_menu_ksd.kode_jenis','menu_ksd.kode_jenis');
		return $this->db->get()->result();
	}

	public function hapusMenu($kode){
		$this->db->where('kode_menu',$kode);
		$this->db->delete('menu_ksd');
	}

	public function editMenu($kode){
		$this->db->select('*');
		$this->db->from('menu_ksd');
		$this->db->join('jenis_menu_ksd','jenis_menu_ksd.kode_jenis=menu_ksd.kode_jenis');
		$this->db->where('kode_menu',$kode);
		return $this->db->get()->row();
	}

	public function prosesEdit($kode,$data){
		$this->db->where('kode_menu',$kode);
		$this->db->update('menu_ksd',$data);
	}
	public function jenisMenu(){
		$this->db->select('*');
		$this->db->from('jenis_menu_ksd');
		return $this->db->get()->result();
	}

	public function tambahMenu($data){
		$this->db->insert('menu_ksd',$data);	
	}
}
?>
