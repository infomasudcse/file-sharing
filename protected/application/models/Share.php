<?php

defined('BASEPATH') or exit('No Direct Access Allowed ! ');

class Share extends CI_Model{


function count_all(){
    
	$query = $this->db->get('shared_files');
	return $query->num_rows();

}

function fetch_all($limit, $start) {
       
       $this->db->select('category.category,shared_files.id, shared_files.file_name, shared_files.display_name,shared_files.file_size,shared_files.file_release,shared_files.file_cover,shared_files.file_created,shared_files.hits');
     $this->db->from('shared_files');
      $this->db->limit($limit, $start);
        $this->db->order_by('shared_files.id', 'desc');
        $this->db->join('category', 'shared_files.file_category = category.id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

 function saveUpload($data){
    if($this->db->insert('shared_files', $data))
        return true;
    else
        return false;

 }   

function delete($id){
   
    $this->db->where('id', $id);
    if($this->db->delete('shared_files')){
        return true;
    }else{
        return false;
    }
}

function getInfo($id){
    $this->db->where('id', $id);    
    $query = $this->db->get('shared_files');
    return $query->row();
	
}

function getAllCategories(){
    $query = $this->db->get('category');
    if($query->num_rows() > 0)
    return $query->result();
else {
    return false;
}
    
}

function getDataRowByUploadId($uid){
    $this->db->where('id', $uid);   
    $query = $this->db->get('upload_files');
    if($query->num_rows() == 1){
        return $query->row();
    }else{
        return false;
    }

}






}



?>