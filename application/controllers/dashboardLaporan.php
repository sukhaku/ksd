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
 		$tanggal = date('Y-m-d').' 00:00:00';
 		$waktu = date('Y-m-d').' 23:59:59';
 		
 		$data['sekarang'] = date("Y-m-d");
 		$data['transaksiharian'] = $this->laporanModel->ambilHarian($tanggal,$waktu);

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
		$tanggal = implode('-', $tgl)." 00:00:00";
		$waktu = implode('-', $tgl)." 23:59:59";

		$data['cariharian'] = $this->laporanModel->cariHarian($tanggal,$waktu);
		$data['date'] = implode('-', $tgl);
		

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
		$data['transaksibulanan'] = $this->laporanModel->ambilBulanan();

		$this->load->view('main/header',$data);
		$this->load->view('laporan/bulanan',$data);
 		} 
 		
 	}	



}
?>