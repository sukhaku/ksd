<?php
class LaporanModel extends CI_Model{

	function ambilMenu($table,$parameter,$nilai_parameter){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($parameter,$nilai_parameter);
		return $this->db->get()->result();
	}

	function ambilHarian($tanggal){
		return $this->db->query("Select menu_transaksi,date_transaksi,SUM(jumlah_menu) as jumlah from transaksi_menu_ksd where date_transaksi like '$tanggal%' group by menu_transaksi")->result();
		
	}

	function cariHarian($tanggal,$waktu1,$waktu2){
	return $this->db->query("select menu_transaksi,date_transaksi,SUM(jumlah_menu) as jumlah from transaksi_menu_ksd where date_transaksi between '$tanggal $waktu1' and '$tanggal $waktu2' group by menu_transaksi")->result();
				
	}

	function ambilBulanan($bulan,$tahun){
		return $this->db->query("select menu_transaksi,SUM(jumlah_menu) as jumlah from transaksi_menu_ksd where date_transaksi like '$tahun-$bulan-%' group by menu_transaksi")->result();
	}

	function cariBulanan($bulan,$tahun,$waktu1,$waktu2){
		return $this->db->query("select menu_transaksi,SUM(jumlah_menu) as jumlah from transaksi_menu_ksd where date(date_transaksi) like '$tahun-$bulan-%' and time(date_transaksi) between '$waktu1' and '$waktu2'  group by menu_transaksi")->result();
	}

	function pendapatanHari($tanggal,$status_transaksi){
		return $this->db->query("select id_transaksi,date_transaksi,jumlah_transaksi,tujuan_transaksi from transaksi_ksd where status_transaksi='$status_transaksi' and date(date_transaksi)='$tanggal'")->result();
	}

	function pendapatantotalHari($tanggal,$status_transaksi){
		return $this->db->query("select SUM(jumlah_transaksi) as total from transaksi_ksd where status_transaksi='$status_transaksi' and date(date_transaksi)='$tanggal'")->row();
	}

	function caripendapatanHari($tanggal,$status_transaksi,$waktu1,$waktu2){
		return $this->db->query("select id_transaksi,date_transaksi,jumlah_transaksi,tujuan_transaksi from transaksi_ksd where status_transaksi='$status_transaksi' and date(date_transaksi)='$tanggal' and time(date_transaksi) between '$waktu1' and '$waktu2'")->result();
	}

	function caripendapatantotalHari($tanggal,$status_transaksi,$waktu1,$waktu2){
		return $this->db->query("select SUM(jumlah_transaksi) as total from transaksi_ksd where status_transaksi='$status_transaksi' and date(date_transaksi)='$tanggal' and time(date_transaksi) between '$waktu1' and '$waktu2'")->row();
	}

	function pendapatanBulan($bulan,$tahun,$status_transaksi){
		return $this->db->query("select id_transaksi,date_transaksi,jumlah_transaksi,tujuan_transaksi from transaksi_ksd where status_transaksi='$status_transaksi' and date(date_transaksi) like '$tahun-$bulan-%'")->result();
	}

	function pendapatantotalBulan($bulan,$tahun,$status_transaksi){
		return $this->db->query("select SUM(jumlah_transaksi) as total from transaksi_ksd where status_transaksi='$status_transaksi' and date(date_transaksi) like '$tahun-$bulan-%'")->row();
	}

	function caripendapatanBulan($bulan,$tahun,$waktu1,$waktu2,$status_transaksi){
		return $this->db->query("select id_transaksi,date_transaksi,jumlah_transaksi,tujuan_transaksi from transaksi_ksd where status_transaksi='$status_transaksi' and date(date_transaksi) like '$tahun-$bulan-%' and time(date_transaksi) between '$waktu1' and '$waktu2'")->result();
	}
	function caripendapatantotalBulan($bulan,$tahun,$waktu1,$waktu2,$status_transaksi){
		return $this->db->query("select SUM(jumlah_transaksi) as total from transaksi_ksd where status_transaksi='$status_transaksi' and date(date_transaksi) like '$tahun-$bulan-%' and time(date_transaksi) between '$waktu1' and '$waktu2'")->row();
	}


}
?>