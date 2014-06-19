<?php
class CrudModel extends CI_Model{
	function ambilData($table,$parameter,$nilai_parameter){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($parameter,$nilai_parameter);
		return $this->db->get()->result();
	}
	function inputData($table,$data){
		$this->db->insert($table,$data);
	}
	
	function hapusData($table,$parameter,$id_parameter){
		$this->db->where($parameter,$id_parameter);
		$this->db->delete($table);
	}

	function selectData($table,$parameter,$id_parameter){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($parameter,$id_parameter);
		return $this->db->get()->row();
	} 

	function editData($table,$parameter,$id_parameter,$data){
		$this->db->where($parameter,$id_parameter);
		$this->db->update($table,$data);
	}

	function ambilUser(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('level_user','user.level=level_user.kode_level');
		return $this->db->get()->result();
	}
	
}


?>