<?php
	class LoginControl extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('loginModel');
			$this->load->library(array('form_validation','session'));
			$this->load->database();
			$this->load->helper('url');
			$this->load->library('encrypt');
		}
		public function index(){
			$session = $this->session->userdata('isLogin');
			if($session == FALSE){
				redirect('loginControl/login',$data);
			}else{
				redirect('dashboard');
		}
	}
		public function login(){	
			$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
			$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
			
			if($this->form_validation->run()==FALSE){
				$this->load->model('loginModel');
				$data["level_user"] = $this->loginModel->get_level();
				$this->load->view('main/login',$data);
			}else{
				$level_user = $this->input->post('level_user');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$status	= 1;
				$level  = $level_user;
				$cek = $this->loginModel->getUser($username,$password,$status,$level);
				if($cek <> 0 ){
					$this->session->set_userdata('isLogin', TRUE);
					$this->session->set_userdata('username',$username);
					$this->session->set_userdata('level',$level);
					redirect('dashboard');
				}else{
					$status = 0;
					$level  = $level_user;
					$cek = $this->loginModel->getUser($username,$password,$status,$level);
					if($cek <> 0){
						$this->session->set_userdata('isLogin', TRUE);
						$this->session->set_userdata('username',$username);
						$this->session->set_userdata('level',$level);
						redirect('dashboardAdmin');
					}else{
					?>
					<script>
					alert('Gagal Login cek username');
					history.go(-1);
					</script>	
			<?php
				}}
				
		}
	}
		public function logout(){
			$this->session->sess_destroy();
			redirect('loginControl/index');
		}
	}
?>