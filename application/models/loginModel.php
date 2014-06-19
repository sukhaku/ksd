<?php
	class LoginModel extends CI_Model{	
		public function __construct(){
			parent::__construct();
	}
	public function getUser($username,$password,$status,$level){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('status',$status);
		$this->db->where('level',$level);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function dataUser($username,$level){

		$this->db->select('username');
   		$this->db->select('nama');
   		$this->db->select('level');
   		$this->db->where('username', $username);
   		$query = $this->db->get('user');
   
   		return $query->row();
	}
	public function get_level(){
		//$q = $this->db->query("select * from menu_ksd where stok_menu>0 ");
		//return $q;
		$result = $this->db->get("level_user");
		$options = array();
		foreach ($result->result_array() as $row) {
			$options[$row["kode_level"]] = $row["nama_level"];
			# code...
		}
		return $options;
	}
}
?>
