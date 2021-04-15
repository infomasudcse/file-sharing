<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function __construct()
       {
            parent::__construct();
            if($this->session->userdata('userid') === ''){ redirect('login');}
            $this->load->model('servermodel', 'sm',true);
       }

	public function index()
	{
		
		$data['title']=" Admin Dashboard : File Share ";
		$data['category'] = $this->sm->getCategory();
		$data['content'] = $this->load->view('dashboard_content',$data,true);
		$this->load->view('dashboard_main', $data);
	}

	function logout(){
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('type');
		$this->session->set_userdata('noti','Logout Done !');
		redirect('login');
	}



}














?>