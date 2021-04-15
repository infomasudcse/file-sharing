<?php

class Servermodel extends CI_Model{

function __construct()
       {
            parent::__construct();
            $this->setCategoryQuantity();
            
       }


function getCategory(){
    
	$query = $this->db->get('category');
	return $query->result();

}

function countFiles(){
	$query = $this->db->get('shared_files');
	return $query->num_rows();

}

function setCategoryQuantity(){
      
        $data = array();    
        $query = $this->db->get('category');
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $this->db->where('file_category', $row->id);
                
                $sql = $this->db->get('shared_files');
                $data['c'.$row->id] = $sql->num_rows();

            }
            $this->session->set_userdata($data);
            $this->session->set_userdata(array('set'=>1));
        }

}



function allFiles($limit, $start){
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

	
function last_shared_file(){
	$this->db->limit(10);
	$this->db->order_by('id', 'DESC');
	$query = $this->db->get('shared_files');
	return $query;
}	



function fileInfoById($id){
    $this->db->select('category.category,shared_files.id, shared_files.file_name,shared_files.file_path, shared_files.display_name,shared_files.file_size,shared_files.file_release,shared_files.file_cover,shared_files.file_created,shared_files.hits,shared_files.file_info,shared_files.auto');
     $this->db->from('shared_files');     
    $this->db->where('shared_files.id', $id);
    $this->db->join('category', 'shared_files.file_category = category.id');
     
    $query = $this->db->get();
    if($query->num_rows() == 1){
        return $query->row();
    }else{ return false;}

}

function getFilesByCategoryId($cid){
     $this->db->select('category.category,shared_files.id, shared_files.file_name, shared_files.display_name,shared_files.file_size,shared_files.file_release,shared_files.file_cover,shared_files.file_created,shared_files.hits');
     $this->db->from('shared_files');
         $this->db->where('shared_files.file_category', $cid);
        $this->db->order_by('shared_files.id', 'desc');
        $this->db->join('category', 'shared_files.file_category = category.id');
        $query = $this->db->get();
        if($query->num_rows() > 0){
        return $query->result();
    }else{ return false;}
    
}


function updateHits($id){
    $this->db->where('id', $id);
    $query = $this->db->get('shared_files');
    if($query->num_rows() == 1){
        $hits = $query->row()->hits;
        
        $hits++;
        $this->db->where('id', $id);
        $this->db->update('shared_files', array('hits'=> $hits));
        
        
    }

}


}