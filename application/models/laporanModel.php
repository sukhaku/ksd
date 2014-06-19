<?php
class LaporanModel extends CI_Model{

	function ambilMenu($table,$parameter,$nilai_parameter){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($parameter,$nilai_parameter);
		return $this->db->get()->result();
	}

	function ambilHarian($tanggal,$waktu){
		return $this->db->query("Select menu_transaksi,date_transaksi,SUM(jumlah_menu) as jumlah from transaksi_menu_ksd where date_transaksi between '$tanggal'  and '$waktu'   group by menu_transaksi
		")->result();
		
	}

	function cariHarian($tanggal,$waktu){
	return $this->db->query("Select menu_transaksi,date_transaksi,SUM(jumlah_menu) as jumlah from transaksi_menu_ksd where date_transaksi between '$tanggal'  and '$waktu' group by menu_transaksi")->result();
				
	}

	function ambilBulanan(){
		return $this->db->query('select menu_transaksi,SUM(jumlah_menu) as jumlah from transaksi_menu_ksd group by menu_transaksi')->result();
	}

}
?>