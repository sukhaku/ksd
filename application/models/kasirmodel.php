<?php

class kasirmodel extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->library('encrypt');
	}

	//..Fungsi model untuk select option menu

	public function get_menu_exist(){
		//$q = $this->db->query("select * from menu_ksd where stok_menu>0 ");
		//return $q;
		$this->db->where('stok_menu >',0);
		$result = $this->db->get("menu_ksd");
		$options = array();
		foreach ($result->result_array() as $row) {
			$options[$row["harga_menu"].'|'.$row["nama_menu"].'|'.$row["kode_menu"]] = $row["nama_menu"] ;
			//$option harga_menu adalah nilai yg dimasukan db, nama_menu yg ditampilkan 
		}
		return $options;
	}
	public function get_menu_stok(){
		//$q = $this->db->query("select * from menu_ksd where stok_menu>0 ");
		//return $q;

		$this->db->order_by("kode_menu","DESC");
		$data_stok = $this->db->get('menu_ksd');
		return $data_stok->result();
	}
 
	//..Fungsi model untuk select option alamat

	public function get_alamat(){
		//$q = $this->db->query("select * from menu_ksd where stok_menu>0 ");
		//return $q;
		$result = $this->db->get("alamat_pemesan_ksd");
		$options = array();
		foreach ($result->result_array() as $row) {
			$options[$row["nama_alamat"].'|'.$row["id_alamat"]] = $row["nama_alamat"];
			# code...
		}
		return $options;
	}


	//..Fungsi model untuk insert data ke db, berisi data kasir

	function tambah_data($data){

		//unique kode untuk id_transaksi
		$uniqueId= time().'-'.mt_rand();
		for($i=0;$i<count($data);$i++){
			$select_menu  =  mysql_real_escape_string($data[$i]['select_menu']);
			$explode_menu =  explode('|',$select_menu);
			$nama_menu   =  mysql_real_escape_string($explode_menu[1]);
			$transaksi_mn_ksd = array(
			'menu_transaksi'=>$nama_menu,	
			'jumlah_menu'=>$data[$i]['jumlah'],
			'date_transaksi'=>date("Y-m-d H:i:s"),
			'id_transaksi'=>$uniqueId
		);
		$this->db->insert('transaksi_menu_ksd',$transaksi_mn_ksd);

		}

		$sum=0;
		$daerah_antar = $this->input->post('alamat_kirim');
		$select_daerah  =  mysql_real_escape_string($daerah_antar);
		$explode_menu =  explode('|',$select_daerah);
		$daerah_antar_alamat   =  mysql_real_escape_string($explode_menu[0]);
		$daerah_antar1   =  mysql_real_escape_string($explode_menu[1]);
		$alamat_kirim = $daerah_antar_alamat.' '.'gang'.' '. $this->input->post('alamat_kirim_gang');
		$pemesan_transaksi = $this->input->post('pemesan');
		$status_transaksi = $this->input->post('status');
		if($status_transaksi==4){
			$set_fee_antar=0;
		}else{
			$set_fee_antar=1000;
		}
		for($i=0;$i<count($data);$i++){
			$set_fee_data +=$data[$i]['jumlah'];
			$set_fee = $set_fee_antar*$set_fee_data;
			$sum+=$data[$i]['total'];
			$transaksi_ksde = array(
			'pemesan_transaksi' => $pemesan_transaksi,
			'id_transaksi' =>$uniqueId,
			'date_transaksi' => date("Y-m-d H:i:s"),
			'tujuan_transaksi' => $alamat_kirim,
			'daerah_antar_transaksi' => $daerah_antar1,
			'jumlah_transaksi' => $sum+$set_fee,
			'status_transaksi' => $status_transaksi
			);

		}
		for($i=0;$i<count($data);$i++){
			$select_menu  =  mysql_real_escape_string($data[$i]['select_menu']);
			$explode_menu =  explode('|',$select_menu);
			$kode_menu 	  =  mysql_real_escape_string($explode_menu[2]);
			$jumlah_menu  =  mysql_real_escape_string($data[$i]['jumlah']);
			$this->db->query("UPDATE menu_ksd SET stok_menu = stok_menu -'$jumlah_menu' WHERE kode_menu = '$kode_menu'" );
		}


		$this->db->insert('transaksi_ksd',$transaksi_ksde);
	redirect('dashboard');
	}


	function ambil_data(){
		return $this->db->get('transaksi_menu_ksd')->result_array();
	}
}

?>