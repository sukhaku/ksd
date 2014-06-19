<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
       $q2=($this->session->userdata('level')==1)||($this->session->userdata('level')==2);
         if(!$q1||!$q2){
             redirect('dashboard');
         }
 	}

 	public function login(){
 		$this->load->view('main/login');
 	}

 	public function index($id=NULL)
 	{
 		//buat session
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
 		//stok menu
 		$this->load->model('menuModel');
 		$data['dataHabis'] = $this->menuModel->stokMenuHabis();
 		$data['dataMasih'] = $this->menuModel->stokMenuMasih();
 		//info transaksi


 		$this->load->model('transaksiModel');
 		$data['daerah_pemesan'] = $this->transaksiModel->daerah_pemesan();

 		$data['transaksi_ditempat'] = $this->transaksiModel->transaksi_ksd();
 		//foreach($data['daerah_pemesan'] as $rowdaerah){
 		$data['transaksi_sementara_tampilmenu'] = $this->transaksiModel->transaksi_ditempat();
 		//$daerah[] = $rowdaerah->id_alamat;

 		$this->load->model('transaksiModel');
 		$data['transaksi_sementara'] = $this->transaksiModel->transaksi_sementara();
 		//}
 		//tampil dropdown menu
 		$data["menu_ksd_options"]  = $this->kasirmodel->get_menu_exist();
 		//tampil dropdown opsi pilih alamat pengirim
 		$data["alamat_kirim"] = $this->kasirmodel->get_alamat();
 		////tampil dropdown opsi pilih jenis balasan
 		$data["jenis_balasan"] = $this->smsmodel->get_jenis_balasan();
 		///tampil pemesan , pake session flashdata, dari controller sms
 		//$data["stok_menu"] = $this->kasirmodel->get_menu_stok();
 		$data["pemesan"]= $this->session->flashdata('destinationNumber');
 		$data["flashsend"]= $this->session->flashdata("sukses");
 		//Mulai pagination bro . .
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
 		//tampilan sms
 		$data['query'] = $this->smsmodel->getInbox($config['per_page'],$id);
 		//$data['query2'] = $this->smsmodel->getSentitem($config['per_page'],$id);
		$this->load->view('main/header',$data);
		$this->load->view('kasir/info_transaksi');
		$this->load->view('kasir/input_kasir',$data);
 		$this->load->view('sms/sms_pemesanan',$data);
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

 		//tampil info stok menu
 		
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

	function status_transaksi(){
		$status_transaksi = $this->input->post('transaksi_set_sukses');
		$id_transaksi = $this->input->post('id_transaksi');
		$data['status_transaksi'] = $status_transaksi;
		$data['id_transaksi'] = $id_transaksi;
 		$this->transaksiModel->transaksi_set_sukses($data);
 		redirect('dashboard');
	}

	function status_transaksi_dibuat(){
		$data['status_transaksi'] = $this->input->post('status_transaksi');
 		$this->transaksiModel->transaksi_set_all($data);
 		redirect('dashboard');
	}

	function status_transaksi_sukses(){
		$data['id_alamat'] = $this->input->post('id_alamat');
		$data['status_transaksi'] = $this->input->post('status_transaksi');
 		$this->transaksiModel->transaksi_set_sukses_dibuat($data);
 		redirect('dashboard');
	}
}
?>