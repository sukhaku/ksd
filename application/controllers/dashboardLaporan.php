<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashboardLaporan extends CI_Controller {

	function __construct(){
 	parent::__construct();
 	$this->load->library(array('session'));
 	$this->load->database();
 	$this->load->helper('url'); 
 	$this->load->model(array('kasirmodel'));
 	$this->load->model('loginModel');

 	}

 	public function login(){
 		$this->load->view('main/login');
 	}	

 	public function index($id=NULL)
 	{
 		if($this->session->userdata('isLogin')==FALSE){
 			//balik hal login
 			redirect('loginControl/index');
 		}else{
 		$this->load->model('loginModel');
 		$user  = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		$data['level']    = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);

 		$this->load->model('menuModel');
 		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();

 		$this->load->model('transaksiModel');
 		$data['daerah_pemesan'] = $this->transaksiModel->daerah_pemesan();
 		$data['transaksi_ditempat'] = $this->transaksiModel->transaksi_ksd();
 		$data['transaksi_sementara_tampilmenu'] = $this->transaksiModel->transaksi_ditempat();

 		$data['semuaMenu'] = $this->menuModel->ambilMenuShift();
 		$data["pemesan"]= $this->session->flashdata('destinationNumber');
 		$data["flashsend"]= $this->session->flashdata("sukses");

		$this->load->model('laporanModel');
		$data['transaksibulanan'] = $this->laporanModel->ambilBulanan();

		$this->load->view('main/header',$data);
		$this->load->view('laporan/shift');
 		} 
 		
 	}

 	public function laporan_harian($id=NULL)
 	{
 		if($this->session->userdata('isLogin')==FALSE){
 			//balik hal login
 			redirect('loginControl/index');
 		}else{
 		$this->load->model('loginModel');
 		$user  = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		$data['level']    = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);

 		$this->load->model('menuModel');
 		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();

 		$this->load->model('transaksiModel');
 		$data['daerah_pemesan'] = $this->transaksiModel->daerah_pemesan();
 		$data['transaksi_ditempat'] = $this->transaksiModel->transaksi_ksd();
 		$data['transaksi_sementara_tampilmenu'] = $this->transaksiModel->transaksi_ditempat();

 		$data['semuaMenu'] = $this->menuModel->ambilMenuShift();
 		$data["pemesan"]= $this->session->flashdata('destinationNumber');
 		$data["flashsend"]= $this->session->flashdata("sukses");


 		$this->load->model('laporanModel');
 		date_default_timezone_set("Asia/Jakarta");
 		$tanggal = date('Y-m-d');

 		$data['sekarang'] = date("Y-m-d");
 		$data['ditempat'] = $this->laporanModel->pendapatanHari($tanggal,'4');
 		$data['totaltempat'] = $this->laporanModel->pendapatantotalHari($tanggal,'4');
 		
 		$data['delivery'] = $this->laporanModel->pendapatanHari($tanggal,'5');
 		$data['totaldelivery'] = $this->laporanModel->pendapatantotalHari($tanggal,'5');

 		$this->load->view('main/header',$data);
		$this->load->view('laporan/harian',$data);
 		} 
 		
 	}

 	function cari_laporan_harian(){
 		if($this->session->userdata('isLogin')==FALSE){
 			//balik hal login
 			redirect('loginControl/index');
 		}else{
 		$this->load->model('loginModel');
 		$user  = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		$data['level']    = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);

 		$this->load->model('menuModel');
 		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();

 		$this->load->model('transaksiModel');
 		$data['daerah_pemesan'] = $this->transaksiModel->daerah_pemesan();
 		$data['transaksi_ditempat'] = $this->transaksiModel->transaksi_ksd();
 		$data['transaksi_sementara_tampilmenu'] = $this->transaksiModel->transaksi_ditempat();

 		$data['semuaMenu'] = $this->menuModel->ambilMenuShift();
 		$data["pemesan"]= $this->session->flashdata('destinationNumber');
 		$data["flashsend"]= $this->session->flashdata("sukses");

 		$this->load->model('laporanModel');
		$tgl[] = $this->input->post('tahun');
		$tgl[] = $this->input->post('bulan');
		$tgl[] = $this->input->post('tanggal');
		$tanggal = implode('-', $tgl);
		$shift = $this->input->post('shift');

		$data['tahune'] = $tgl[0];
		$data['bulane'] = $tgl[1];
		$data['tanggale'] = $tgl[2];

 		if($shift=='shift1'){
			$waktu1 = '09:00:00';
			$waktu2 = '13:00:00';
			
			$data['ditempat'] = $this->laporanModel->caripendapatanHari($tanggal,'4',$waktu1,$waktu2);
	 		$data['totaltempat'] = $this->laporanModel->caripendapatantotalHari($tanggal,'4',$waktu1,$waktu2);
	 		
	 		$data['delivery'] = $this->laporanModel->caripendapatanHari($tanggal,'5',$waktu1,$waktu2);
	 		$data['totaldelivery'] = $this->laporanModel->caripendapatantotalHari($tanggal,'5',$waktu1,$waktu2);

		}else if($shift=='shift2'){
			$waktu1 = '13:00:01';
			$waktu2 = '21:00:00';
			$data['ditempat'] = $this->laporanModel->caripendapatanHari($tanggal,'4',$waktu1,$waktu2);
	 		$data['totaltempat'] = $this->laporanModel->caripendapatantotalHari($tanggal,'4',$waktu1,$waktu2);
	 		
	 		$data['delivery'] = $this->laporanModel->caripendapatanHari($tanggal,'5',$waktu1,$waktu2);
	 		$data['totaldelivery'] = $this->laporanModel->caripendapatantotalHari($tanggal,'5',$waktu1,$waktu2);
		}else{
			$waktu1 = '';
			$waktu2 = '';
			$data['ditempat'] = $this->laporanModel->pendapatanHari($tanggal,'4');
 			$data['totaltempat'] = $this->laporanModel->pendapatantotalHari($tanggal,'4');
 		
 			$data['delivery'] = $this->laporanModel->pendapatanHari($tanggal,'5');
 			$data['totaldelivery'] = $this->laporanModel->pendapatantotalHari($tanggal,'5');
		}
		
		$data['sekarang'] = implode('-', $tgl);
		$data['shiftnya'] = $shift;
		$this->load->view('main/header',$data);
		$this->load->view('laporan/cari_laporan_harian',$data);		
 		} 	
 					
 	}


 	public function laporan_bulanan($id=NULL)
 	{
 		if($this->session->userdata('isLogin')==FALSE){
 			//balik hal login
 			redirect('loginControl/index');
 		}else{
 		$this->load->model('loginModel');
 		$user  = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		$data['level']    = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);

 		$this->load->model('menuModel');
 		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();


 		$this->load->model('transaksiModel');
 		$data['daerah_pemesan'] = $this->transaksiModel->daerah_pemesan();
 		$data['transaksi_ditempat'] = $this->transaksiModel->transaksi_ksd();
 		$data['transaksi_sementara_tampilmenu'] = $this->transaksiModel->transaksi_ditempat();

 		$data['semuaMenu'] = $this->menuModel->ambilMenuShift();
 		$data["pemesan"]= $this->session->flashdata('destinationNumber');
 		$data["flashsend"]= $this->session->flashdata("sukses");
 		$this->load->model('laporanModel');
 		date_default_timezone_set("Asia/Jakarta");

 		$bulan =date("m");
 		$tahun=date("Y");
		//$data['transaksibulanan'] = $this->laporanModel->ambilBulanan($bulan,$tahun);

 		$data['ditempat'] = $this->laporanModel->pendapatanBulan($bulan,$tahun,'4');
 		$data['totaltempat'] = $this->laporanModel->pendapatantotalBulan($bulan,$tahun,'4');
 		
 		$data['delivery'] = $this->laporanModel->pendapatanBulan($bulan,$tahun,'5');
 		$data['totaldelivery'] = $this->laporanModel->pendapatantotalBulan($bulan,$tahun,'5');

		$this->load->view('main/header',$data);
		$this->load->view('laporan/bulanan',$data);
 		} 

 	}	
	
	public function cari_laporan_bulanan($id=NULL)
 	{
 		if($this->session->userdata('isLogin')==FALSE){
 			//balik hal login
 			redirect('loginControl/index');
 		}else{
 		$this->load->model('loginModel');
 		$user  = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		$data['level']    = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);

 		$this->load->model('menuModel');
 		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();


 		$this->load->model('transaksiModel');
 		$data['daerah_pemesan'] = $this->transaksiModel->daerah_pemesan();
 		$data['transaksi_ditempat'] = $this->transaksiModel->transaksi_ksd();
 		$data['transaksi_sementara_tampilmenu'] = $this->transaksiModel->transaksi_ditempat();

 		$data['semuaMenu'] = $this->menuModel->ambilMenuShift();
 		$data["pemesan"]= $this->session->flashdata('destinationNumber');
 		$data["flashsend"]= $this->session->flashdata("sukses");
 		$this->load->model('laporanModel');
 		date_default_timezone_set("Asia/Jakarta");

 		$month = $this->input->post('bulan');
 		$year=$this->input->post('tahun');
 		$shift = $this->input->post('shift');

		if($shift=='shift1'){
			$waktu1 = '09:00:00';
			$waktu2 = '13:00:00';
			$data['ditempat'] = $this->laporanModel->caripendapatanBulan($month,$year,$waktu1,$waktu2,'4');
	 		$data['totaltempat'] = $this->laporanModel->caripendapatantotalBulan($month,$year,$waktu1,$waktu2,'4');
	 		
	 		$data['delivery'] = $this->laporanModel->caripendapatanBulan($month,$year,$waktu1,$waktu2,'5');
	 		$data['totaldelivery'] = $this->laporanModel->caripendapatantotalBulan($month,$year,$waktu1,$waktu2,'5');

		}else if($shift=='shift2'){
			$waktu1 = '13:00:01';
			$waktu2 = '21:00:00';
			$data['ditempat'] = $this->laporanModel->caripendapatanBulan($month,$year,$waktu1,$waktu2,'4');
	 		$data['totaltempat'] = $this->laporanModel->caripendapatantotalBulan($month,$year,$waktu1,$waktu2,'4');
	 		
	 		$data['delivery'] = $this->laporanModel->caripendapatanBulan($month,$year,$waktu1,$waktu2,'5');
	 		$data['totaldelivery'] = $this->laporanModel->caripendapatantotalBulan($month,$year,$waktu1,$waktu2,'5');
		}else{
			$waktu1 = '';
			$waktu2 = '';
			$data['ditempat'] = $this->laporanModel->pendapatanBulan($month,$year,'4');
	 		$data['totaltempat'] = $this->laporanModel->pendapatantotalBulan($month,$year,'4');
	 		
	 		$data['delivery'] = $this->laporanModel->pendapatanBulan($month,$year,'5');
	 		$data['totaldelivery'] = $this->laporanModel->pendapatantotalBulan($month,$year,'5');

		}
		
 		$data['tahune'] = $year;
 		$data['bul'] = $month;
 		$data['shiftnya'] = $shift;
		$this->load->view('main/header',$data);
		$this->load->view('laporan/cari_bulanan',$data);
 		
 		} 
 		
 	}

 	function pendapatan_pershift(){
 		if($this->session->userdata('isLogin')==FALSE){
 			//balik hal login
 			redirect('loginControl/index');
 		}else{
 		$this->load->model('loginModel');
 		$user  = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		$data['level']    = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);

 		$this->load->model('menuModel');
 		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();


 		$this->load->model('transaksiModel');
 		$data['daerah_pemesan'] = $this->transaksiModel->daerah_pemesan();
 		$data['transaksi_ditempat'] = $this->transaksiModel->transaksi_ksd();
 		$data['transaksi_sementara_tampilmenu'] = $this->transaksiModel->transaksi_ditempat();

 		$data['semuaMenu'] = $this->menuModel->ambilMenuShift();
 		$data["pemesan"]= $this->session->flashdata('destinationNumber');
 		$data["flashsend"]= $this->session->flashdata("sukses");
 		$this->load->model('laporanModel');
 		$this->load->view('main/header',$data);
 		$this->load->view('laporan/pendapatan_pershift',$data);

 		}
 	}





}
?>