<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms extends CI_Controller {
	function __construct(){
 	parent::__construct();
 	$this->load->model('smsmodel');
}
 	function sendSms() {
            $this->smsmodel->insertToOutbox();
            $data1 = $this->input->post('destinationNumber');
            $this->session->set_flashdata('destinationNumber',$data1);
            redirect('dashboard');
    }


}

?>