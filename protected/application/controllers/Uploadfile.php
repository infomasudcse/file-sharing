<?php 
defined('BASEPATH') OR exit("No Direct Access !! ");

class Uploadfile extends CI_Controller{


	public function __construct()
       {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('pagination');
            $this->load->model('uploadmodel');
           
       }


    function index(){
    	$pdata['title']= "Upload"; 
    $config['base_url'] = base_url()."uploadfile/index";
    $config['total_rows'] = $this->uploadmodel->countupload();
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
    $pdata["uploads"] = $this->uploadmodel->allUpload($config["per_page"], $page);
    $pdata['links']= $this->pagination->create_links();
		$data['content'] = $this->load->view('upload/view_all',$pdata,true);
		$this->load->view('dashboard_main', $data);
    } 


function uploadForm(){
	$data['title']=" Upload Form ";
     $data['categories'] = $this->uploadmodel->getAllCategories();    
    $data['content'] = $this->load->view('upload/add_form',$data,true);           
     
	$this->load->view('dashboard_main', $data);

}


 public function upload_file(){
        
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '8000120'; 
          
        $this->load->library('upload', $config);
        
        // uploading image
        if($this->upload->do_upload('file')){
            
            $filedata = $this->upload->data();
            
           $data['file_name'] = str_replace(' ', '_', $filedata['raw_name']);
           $data['file_size'] = round($filedata['file_size'] / 1000);
           $data['file_path'] = "upload/".str_replace(' ', '_', $filedata['orig_name']);
           $data['file_category'] = $this->input->post('category');

            
           if($this->uploadmodel->save($data)){
             echo json_encode(array('type'=>'success','text'=>'success'));
         }
           
        }else{

            echo json_encode(array('type'=>'error','text'=> $this->upload->display_errors()));
        }
    }


function shareUploadedFile(){
            $msg = '';
            $config['upload_path'] = './cover/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('cover')) {
                $msg .=  $this->upload->display_errors();
                goto A;
            }else{
                $upload_data = $this->upload->data();
                $cover = $upload_data['file_name'];
                $uid = $this->input->post('id', true);
                $urow = $this->uploadmodel->getUploadInfo($uid);
                if($urow){
                    
                //save shared info
                
                $sdata['file_name'] = $urow->file_name;
                $sdata['display_name'] = $this->input->post('display_name', true);
                $sdata['file_path'] =  $urow->file_path;              
                $sdata['file_size'] = $urow->file_size;
                $sdata['file_release'] = $this->input->post('year', true);
                $sdata['file_category'] = $urow->file_category;
                $sdata['file_cover'] = $cover;
                $sdata['file_info'] = $this->input->post('info', true);
                $sdata['auto'] = 1;
                if($this->uploadmodel->shareFileSave($sdata)){
                    //update upload file row shared value
                    $this->uploadmodel->delete($uid);
                    $msg .= "File Shared Successfully ! ";
                    goto A;
                }
                }else{
                    $msg = "Uploaded file Not Found !";
                    goto A;
                }
                
                //session message
            }
        A:
        $this->session->set_userdata(array('message'=>$msg));
        redirect('uploadfile/index', 'refresh');
        //session message 
        //redirect to uploaded file;


}




function delete($id){

	if ($id != '') {
            $info = $this->uploadmodel->getUploadInfo($id);
            
            $file = "./".$info->file_path.$info->file_name;
             if (file_exists($file)) {
                unlink($file);
            }
            if ($this->uploadmodel->delete($info->id)) {
                $this->session->set_userdata('message', "<div class='alert alert-success'>Deleted ! </div>");
            } else {
                $this->session->set_userdata('message', "<div class='alert alert-danger'>Can not Deleted ! </div>");
            }
        }
        redirect('uploadfile/index', 'refresh');
}







}




?>