<?php

defined('BASEPATH') or exit('No Direct Access Allowed ! ');

class Uploadmodel extends CI_Model{


    
    public function save($data){
        if($this->db->insert('upload_files',$data))
            return true;
        else {
            return false;
        }
    }

function getAllCategories(){
    $query = $this->db->get('category');
    if($query->num_rows() > 0)
    return $query->result();
else {
    return false;
}
 
 }  


function countupload(){
    $query = $this->db->get('upload_files');
    return $query->num_rows();
}

function allUpload($limit, $start) {
       
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('upload_files');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

 
 function getUploadInfo($id){
    $this->db->where('id', $id);
     $query = $this->db->get('upload_files');
    if($query->num_rows() == 1){
        return $query->row();
    }else{
        return false;
    }
 }   
 

 function shareFileSave($data){
    if($this->db->insert('shared_files' , $data))
        return true;
    else
        return false;
 }

 function updateSharedFile($data, $id){

    $this->db->where('id', $id);
    $this->db->update('upload_files', $data);
 }

 function delete($id){
   
    $this->db->where('id', $id);
    if($this->db->delete('upload_files')){
        return true;
    }else{
        return false;
    }
}
 //end   
}