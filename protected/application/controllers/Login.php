<?php

defined('BASEPATH') or exit('No Direct Access Allowed ! ');

class Login extends CI_Controller{

 	public function __construct()
       {
            parent::__construct();
            $this->load->model('logmodel');
            
       }

    public function index(){
    	$this->load->view('loginform');
    }   


    public function authenticate(){

    	$inputs = array('username'=>$this->input->post('username', true),'password'=>$this->input->post('password', true));
      
		$result = $this->validate($inputs); 
       
        if(!$result){
            $this->session->set_userdata('noti','Username/Password Invalid ! ');
            redirect("login");
        }else{
			//echo $this->session->userdata('userid');
            redirect("dashboard");
        }
		
		
    }

    function validate($inputs){        

        
        $result = $this->logmodel->getUserInfo($inputs);
      
	   
     
        if($result == null){
             return false;
           
        }else{
            $sessionData = array(
                'userid'=>$result->id,
                'username'=>$result->username,                
                'type'=>$result->type
                );
            $this->session->set_userdata($sessionData);
            return true;
        }

    }


}





?>