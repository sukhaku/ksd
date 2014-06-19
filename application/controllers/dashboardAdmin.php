<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller {

	function __construct(){
 	parent::__construct();
 	$this->load->library(array('session'));
 	$this->load->model('loginModel');
 	$this->load->database();
 	$this->load->helper('url'); 
 	$this->load->model('smsmodel');
 	$this->load->model(array('kasirmodel'));
 	$this->load->model('transaksiModel');
 	$q1=$this->session->userdata('isLogin')==true;
    $q2=($this->session->userdata('level')==1);
         if(!$q1||!$q2){
             redirect('dashboard');
         }
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
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
 		//tampil dropdown menu
 		$data["menu_ksd_options"]  = $this->kasirmodel->get_menu_exist();
 		//tampil dropdown opsi pilih alamat pengirim
 		$data["alamat_kirim"] = $this->kasirmodel->get_alamat();
 		////tampil dropdown opsi pilih jenis balasan
 		$data["jenis_balasan"] = $this->smsmodel->get_jenis_balasan();
 		///tampil pemesan , pake session flashdata, dari controller sms
 		$data["pemesan"]= $this->session->flashdata('destinationNumber');
 		//Mulai pagination bro . .
 		$this->load->model('crudModel');
 		$this->load->model('menuModel');
 		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
 		$data['semuaMenu'] = $this->menuModel->ambilMenu();
 		$data['alamatPemesan'] = $this->crudModel->ambilData('alamat_pemesan_ksd','id_alamat','asc');
 		$data['balasan'] = $this->crudModel->ambilData('jenis_balasan_ksd','id_jenis','asc');
 		$data['popup'] = $this->crudModel->ambilData('popup_set','id','asc');
 		$data['transaksi'] = $this->crudModel->ambilData('transaksi_ksd','date_transaksi','desc');
		$data['detailtransaksi'] = $this->crudModel->ambilData('transaksi_menu_ksd','date_transaksi','desc');


 		$data['user'] = $this->crudModel->ambilUser();

 		$jml = $this->db->get('inbox');
 		//pengaturan pagination
 		$config['base_url'] = base_url().'dashboard/index';
 		$config['total_rows'] = $jml->num_rows();
 		$config['per_page'] = '5';
 		$config['first_page'] = 'Awal';
 		$config['last_page'] = 'Akhir';
 		$config['next_page'] = '&laquo;';
 		$config['prev_page'] = '&raquo;';

 		//inisialisasi config
 		$this->pagination->initialize($config);

 		//buat pagination
 		$data['halaman'] = $this->pagination->create_links();

 		//tampilan data
 		$data['query'] = $this->smsmodel->getInbox($config['per_page'],$id);
		$this->load->view('main/header',$data);
		$this->load->view('admin/menu_ksd',$data);
 		//$this->load->view('sms/sms_pemesanan',$data);
 		//End Mulai pagination bro . .
 	  	}	
 	}

 	function input_kasir(){

 		$input_menu = $this->input->post('select_menu');
 		$input_jumlah = $this->input->post('jumlah');
 		
 		for ($i=0; $i <count($input_menu) ; $i++) { 
 			$data[$i]['select_menu'] = $input_menu[$i]; 		
 			$data[$i]['jumlah'] = $input_jumlah[$i];
 			$data[$i]['total'] = $input_jumlah[$i] * $input_menu[$i];	
 			//$total_transaksi = array_sum($data[$i]['total']);
 			//$data[$i]['total']+=$data[$i]['total'];	
 			//foreach ($data[$i]['select_menu'] as $key) {
 			//	$data[$i]['total'] = $data[$i]['select_menu'] * $data[$i]['jumlah'];
 			//}
 			}

		$this->kasirmodel->tambah_data($data);
		$dataafter = $this->kasirmodel->ambil_data($data);
		
		$input_total = $this->input->post('total');
	
	}

	function tampil_sms(){

		$data["menu_ksd_options"]  = $this->kasirmodel->get_menu_exist();
 		//tampil dropdown opsi pilih alamat pengirim
 		$data["alamat_kirim"] = $this->kasirmodel->get_alamat();

 		//Mulai pagination bro . .
 		$jml = $this->db->get('inbox');
 		//pengaturan pagination
 		$config['base_url'] = base_url().'dashboard/index';
 		$config['total_rows'] = $jml->num_rows();
 		$config['per_page'] = '5';
 		$config['first_page'] = 'Akhir';
 		$config['last_page'] = 'Awal';
 		$config['next_page'] = '&laquo;';
 		$config['prev_page'] = '&raquo;';

 		//inisialisasi config
 		$this->pagination->initialize($config);

 		//buat pagination
 		$data['halaman'] = $this->pagination->create_links();

 		//tampilan data
 		$data['query'] = $this->smsmodel->getInbox($config['per_page'],$id);

		$this->load->view('dashboard/tampil_sms1',$data);
	}

	function hapus_menu($kode){
		$this->load->model('menuModel');
		$this->menuModel->hapusMenu($kode);
		redirect('dashboardAdmin');
	}
	function tambah_stok(){
		$this->load->model('menuModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		//$data['pengguna'] = $this->loginModel->dataUser($user);
 		$this->load->model('menuModel');
 		$data['jenis_menu'] = $this->menuModel->jenisMenu();
		$this->load->view('main/header',$data);
		$this->load->view('admin/tambah_stok',$data);
	}

	function proses_tambah_stok(){
		$nama_menu = $this->input->post('nama_menu');		
		$harga_menu = $this->input->post('harga_menu');
		$jenis_menu = $this->input->post('jenis_menu');
		$stok = $this->input->post('stok');
		$data = array(
			'nama_menu' => $nama_menu,
			'harga_menu' =>$harga_menu,
			'kode_jenis' =>$jenis_menu,
			'stok_menu' => $stok,
			);
		$this->load->model('menuModel');
		$this->menuModel->tambahMenu($data);
		redirect('dashboardAdmin');
	}

	function ubah_stok($kode){
		$this->load->model('menuModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');

 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
		$data['menu'] = $this->menuModel->editMenu($kode);
		$data['jenis_menu'] = $this->menuModel->jenisMenu();
		$this->load->view('main/header',$data);
		$this->load->view('admin/ubah_stok',$data);
	}

	function proses_ubah_stok(){
		$kode_menu = $this->input->post('kode_menu');
		$nama_menu = $this->input->post('nama_menu');
		$stok = $this->input->post('stok');
		$data = array(
			'stok_menu' => $stok,
			'nama_menu' =>$nama_menu,
			);

		$this->load->model('menuModel');
		$this->menuModel->prosesEdit($kode_menu,$data);
		redirect('dashboardAdmin');		
	}

	function ubah_menu($kode){
		$this->load->model('menuModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
		$data['menu'] = $this->menuModel->editMenu($kode);
		$data['jenis_menu'] = $this->menuModel->jenisMenu();
		$this->load->view('main/header',$data);
		$this->load->view('admin/ubah_menu',$data);
	}

	function proses_ubah_menu(){
		$kode_menu = $this->input->post('kode_menu');
		$nama_menu = $this->input->post('nama_menu');		
		$harga_menu = $this->input->post('harga_menu');
		$jenis_menu = $this->input->post('jenis_menu');
		$data = array(
			'nama_menu' => $nama_menu,
			'harga_menu' =>$harga_menu,
			'kode_jenis' =>$jenis_menu,
			);

		$this->load->model('menuModel');
		$this->menuModel->prosesEdit($kode_menu,$data);
		redirect('dashboardAdmin');		
	}

	function tambah_menu(){
		$this->load->model('menuModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
 		$this->load->model('menuModel');
 		$data['jenis_menu'] = $this->menuModel->jenisMenu();
		$this->load->view('main/header',$data);
		$this->load->view('admin/tambah_menu',$data);
	}

	function proses_tambah_menu(){
		$nama_menu = $this->input->post('nama_menu');		
		$harga_menu = $this->input->post('harga_menu');
		$jenis_menu = $this->input->post('jenis_menu');
		$data = array(
			'nama_menu' => $nama_menu,
			'harga_menu' =>$harga_menu,
			'kode_jenis' =>$jenis_menu,
			);
		$this->load->model('menuModel');
		$this->menuModel->tambahMenu($data);
		redirect('dashboardAdmin');
	}

	function hapus_alamat_pemesan($id_alamat){
		$this->load->model('crudModel');
		$this->crudModel->hapusData('alamat_pemesan_ksd','id_alamat',$id_alamat);
		redirect('dashboardAdmin');
	}
	function ubah_alamat_pemesan($id_alamat){
		$this->load->model('menuModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
		$this->load->model('crudModel');

		$data['alamat'] = $this->crudModel->selectData('alamat_pemesan_ksd','id_alamat',$id_alamat);
		
		$this->load->view('main/header',$data);
		$this->load->view('admin/ubah_alamat_pemesan',$data);
	}
	function proses_ubah_alamat(){
		$id_alamat = $this->input->post('id_alamat');		
		$nama_alamat = $this->input->post('nama_alamat');
		$jarak_alamat = $this->input->post('jarak_alamat');
		$data = array(
			'nama_alamat' => $nama_alamat,
			'jarak_alamat' =>$jarak_alamat,
			
			);
		$this->load->model('crudModel');
		$this->crudModel->editData('alamat_pemesan_ksd','id_alamat',$id_alamat,$data);
		redirect('dashboardAdmin');
	}
	function tambah_alamat_pemesan(){
		$this->load->model('menuModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
 		$this->load->view('main/header',$data);
		$this->load->view('admin/tambah_alamat',$data);
	}
	function proses_tambah_alamat(){
		$nama_alamat = $this->input->post('nama_alamat');		
		$jarak_alamat = $this->input->post('jarak_alamat');
		$data = array(
			'nama_alamat' => $nama_alamat,
			'jarak_alamat' =>$jarak_alamat,
			);
		$this->load->model('crudModel');
		$this->crudModel->inputData('alamat_pemesan_ksd',$data);
		redirect('dashboardAdmin');
	}


	function tambah_balasan(){
		$this->load->model('menuModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
 		$this->load->view('main/header',$data);
		$this->load->view('admin/tambah_balasan',$data);
	}
	function proses_tambah_balasan(){

		$isi = $this->input->post('isi_balasan');		
		$jenis = $this->input->post('jenis_balasan');
		$data = array(
			'isi_balasan_ksd' => $isi,
			'jenis_balasan_ksd' =>$jenis,
			);
		$this->load->model('crudModel');
		$this->crudModel->inputData('jenis_balasan_ksd',$data);
		redirect('dashboardAdmin/');
	}


	function hapus_balasan($id_jenis){
		$this->load->model('crudModel');
		$this->crudModel->hapusData('jenis_balasan_ksd','id_jenis',$id_jenis);
		redirect('dashboardAdmin/');
	}
	function ubah_balasan($id_jenis){
		$this->load->model('menuModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
		$this->load->model('crudModel');

		$data['balasan'] = $this->crudModel->selectData('jenis_balasan_ksd','id_jenis',$id_jenis);
		
		$this->load->view('main/header',$data);
		$this->load->view('admin/ubah_balasan',$data);
	}
	function proses_ubah_balasan(){
		$id_jenis = $this->input->post('id_jenis');		
		$isi_balasan = $this->input->post('isi_balasan');
		$jenis_balasan = $this->input->post('jenis_balasan');
		$data = array(
			'isi_balasan_ksd' => $isi_balasan,
			'jenis_balasan_ksd' =>$jenis_balasan,
			
			);
		$this->load->model('crudModel');
		$this->crudModel->editData('jenis_balasan_ksd','id_jenis',$id_jenis,$data);
		redirect('dashboardAdmin/');
	}

	

	function tambah_popup(){
		$this->load->model('menuModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
 		$this->load->view('main/header',$data);
		$this->load->view('admin/tambah_popup',$data);
	}
	function proses_tambah_popup(){
		$waktu = $this->input->post('waktu');		
		$keterangan = $this->input->post('keterangan');
		$data = array(
			'waktu' => $waktu,
			'keterangan' =>$keterangan,
			);
		$this->load->model('crudModel');
		$this->crudModel->inputData('popup_set',$data);
		redirect('dashboardAdmin/');
	}


	function hapus_popup($id){
		$this->load->model('crudModel');
		$this->crudModel->hapusData('popup_set','id',$id);
		redirect('dashboardAdmin/');
	}

	function ubah_popup($id){
		$this->load->model('menuModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
		$this->load->model('crudModel');

		$data['popup'] = $this->crudModel->selectData('popup_set','id',$id);
		
		$this->load->view('main/header',$data);
		$this->load->view('admin/ubah_popup',$data);
	}
	function proses_ubah_popup(){
		$id = $this->input->post('id');	
		$waktu = $this->input->post('waktu');
		$keterangan = $this->input->post('keterangan');
		$data = array(
			'waktu' => $waktu,
			'keterangan' =>$keterangan,
			
			);
		$this->load->model('crudModel');
		$this->crudModel->editData('popup_set','id',$id,$data);
		redirect('dashboardAdmin/');
	}

	function transaksi_ksd(){
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		
		$this->load->model('crudModel');
		$data['transaksi'] = $this->crudModel->ambilData('transaksi_ksd','date_transaksi','desc');
		$level = $this->session->userdata('level');
		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
 		$data['pengguna'] = $this->loginModel->dataUser($user);
		$this->load->view('main/header',$data);
		$this->load->view('admin/transaksi');
	}

	function hapus_transaksi($id_transaksi){
		$this->load->model('crudModel');
		$this->crudModel->hapusData('transaksi_ksd','id_transaksi',$id_transaksi);
		$this->crudModel->hapusData('transaksi_menu_ksd','id_transaksi',$id_transaksi);
		redirect('dashboardAdmin');	
	}

	function hapus_menu_transaksi($id_transaksi){
		$this->load->model('crudModel');
		$this->crudModel->hapusData('transaksi_menu_ksd','id',$id_transaksi);
		redirect('dashboardAdmin');	
	}
	

	function hapus_user($id){
		$this->load->model('crudModel');
		$this->crudModel->hapusData('user','id',$id);
		redirect('dashboardAdmin');
	} 
	function tambah_user(){
		$this->load->model('menuModel');
		$this->load->model('crudModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
 		$data['levele'] = $this->crudModel->ambilData('level_user','id_level','asc');
		
 		$this->load->view('main/header',$data);
		$this->load->view('admin/tambah_user',$data);
	}
	function proses_tambah_user(){
		$username = $this->input->post('username');		
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');
		
		$data = array(
			'username' => $username,
			'password' =>$password,
			'level' =>$level,
			'nama' => $nama,
			);
		$this->load->model('crudModel');
		$this->crudModel->inputData('user',$data);
		redirect('dashboardAdmin/');
	}

	function ubah_user($id){
		$this->load->model('menuModel');
		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
		$this->load->model('loginModel');
 		$user = $this->session->userdata('username');
 		$level = $this->session->userdata('level');
 		//ambil level
 		$data['level'] = $this->session->userdata('level');
 		$data['pengguna'] = $this->loginModel->dataUser($user,$level);
 		$data['pengguna'] = $this->loginModel->dataUser($user);
		$this->load->model('crudModel');
		$data['levele'] = $this->crudModel->ambilData('level_user','id_level','asc');
		$data['user'] = $this->crudModel->selectData('user','id',$id);
		
		$this->load->view('main/header',$data);
		$this->load->view('admin/ubah_user',$data);
	}
	function proses_ubah_user(){
		$id = $this->input->post('id');		
		$username = $this->input->post('username');		
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');
		
		$data = array(
			'username' => $username,
			'password' =>$password,
			'level' =>$level,
			'nama' => $nama,
			);
		$this->load->model('crudModel');
		$this->crudModel->editData('user','id',$id,$data);
		redirect('dashboardAdmin/');
	}

}
?>