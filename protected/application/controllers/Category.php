<?php 
defined('BASEPATH') OR exit("No Direct Access !! ");

class Category extends CI_Controller{


	public function __construct()
       {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('pagination');
            $this->load->model('category_model','cat',true);
           
       }


    function index(){
    	$pdata['title']= "Category";
    	$this->load->library('pagination');
		$config['base_url'] = base_url()."category/index";
		$config['total_rows'] = $this->cat->countCategory();
		$config['per_page'] = 20;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$this->pagination->initialize($config);		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $pdata["categories"] = $this->cat->allCategory($config["per_page"], $page);
		$pdata['links']= $this->pagination->create_links();
                $pdata['total'] = $config['total_rows'];
		$data['content'] = $this->load->view('category/list',$pdata,true);
		$this->load->view('dashboard_main', $data);
    } 


function addCategory(){
	$data['title']=" Category ";
         $this->form_validation->set_rules('name', 'Category Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
            $data['content'] = $this->load->view('category/add_form', $data, true);
        } else {
            $catdata['category'] = $this->input->post('name', true);
            if($this->cat->save($catdata))
            $data['message'] = "Category Name Saved ! ";
            else
              $data['error'] = "Can not save !";  
            $data['content'] = $this->load->view('category/add_form',$data,true);
            
        }
	$this->load->view('dashboard_main', $data);

}

function delete($id){

	if($this->cat->delete($id))
	$this->session->set_userdata('message','Category Name Deleted !');
        else
         $this->session->set_userdata('message','Can not Delete !');   
	redirect('category');
}







}




?>