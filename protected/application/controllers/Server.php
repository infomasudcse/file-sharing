
<?php 

class Server extends CI_Controller{


public function __construct()
       {
            parent::__construct();
            $this->load->model('servermodel', 'sm',true);
            
       }


public function index(){

		$this->load->library('pagination');
		$config['base_url'] = base_url()."server/index";
		$config['total_rows'] = $this->sm->countFiles();
		$config['per_page'] = 18;
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
        $hdata["files"] = $this->sm->allFiles($config["per_page"], $page);
		$hdata['links']= $this->pagination->create_links();
        //set category quantity in session for not to load each time
        $set = $this->session->userdata('set');
        if(!$set){
        	$this->sm->setCategoryQuantity();
        	
    		}
		$data['title'] = 'Cite Net ';
		$data['category'] = $this->sm->getCategory();
		$data['last_shared'] = $this->sm->last_shared_file();
		$data['content'] = $this->load->view('website/home' , $hdata,true);
		$this->load->view('website/front', $data);
}       



	function details($id){

		$this->sm->updateHits($id);

		$data['title'] = 'Cite Net ';
		$data['category'] = $this->sm->getCategory();
		$data['last_shared'] = $this->sm->last_shared_file();

		$hdata["file"] = $this->sm->fileInfoById($id);

		$data['content'] = $this->load->view('website/details' , $hdata,true);
		$this->load->view('website/front', $data);
	}

	function category($cid){
	$data['title'] = 'Cite Net ';
		$data['category'] = $this->sm->getCategory();
		$data['last_shared'] = $this->sm->last_shared_file();

		$hdata["files"] = $this->sm->getFilesByCategoryId($cid);

		$data['content'] = $this->load->view('website/category' , $hdata,true);
		$this->load->view('website/front', $data);

	}



	function search(){
		$str = $this->input->post('search', true);
		$query = "SELECT category.category,shared_files.id, shared_files.file_name, shared_files.display_name,shared_files.file_size,shared_files.file_cover,shared_files.file_created,shared_files.file_release,shared_files.hits FROM  shared_files JOIN category ON category.id = shared_files.file_category WHERE shared_files.file_name LIKE '%" . $str . "%' OR shared_files.display_name LIKE  '%" . $str . "%' ";
		$hdata['files'] = $this->db->query($query);
		$data['title'] = 'Cite Net ';
		$data['category'] = $this->sm->getCategory();
		$data['last_shared'] = $this->sm->last_shared_file();

		$data['content'] = $this->load->view('website/search' , $hdata,true);
		$this->load->view('website/front', $data);


	}


}