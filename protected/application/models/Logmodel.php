<?php

defined('BASEPATH') or exit('No Direct Access Allowed ! ');

class Logmodel extends CI_Model{


public function getUserInfo($inputs){
	
	$user = $inputs['username'];
    $pass = $inputs['password'];
	$this->db->where('username',$user);
	$this->db->where('password', md5($pass));
	$this->db->where('deleted', 0);
	$query = $this->db->get('users');

	if($query->num_rows() == 1){
		return $query->row();
	}else{
		return null;
	}

}








}



?>