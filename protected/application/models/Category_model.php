<?php

defined('BASEPATH') or exit('No Direct Access Allowed ! ');

class Category_Model extends CI_Model{


    
    public function save($data){
        if($this->db->insert('category',$data))
            return true;
        else {
            return false;
        }
    }

    
function countCategory(){
    
	$query = $this->db->get('category');
	return $query->num_rows();

}

function allCategory($limit, $start) {
       
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function delete($id){
        $this->db->where('id', $id);
        if($this->db->delete('category'))
        return true;
        else
            return false;
        
    }
    
    
    
    
}