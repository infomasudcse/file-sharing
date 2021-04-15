<?php

defined('BASEPATH') OR exit("No Direct access allowed ! ");

class Sharefiles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('share', 'um', true);
    }

    function index() {
        $data['title'] = "Share File";
        
        $data['categories'] = $this->um->getAllCategories();
        $this->form_validation->set_rules('path', 'Path', 'required');
        $this->form_validation->set_rules('file_name', 'File Name', 'required');        
        $this->form_validation->set_rules('size', 'File Size', 'required');
       
        

        if ($this->form_validation->run() == FALSE) {

            $data['error'] = validation_errors();
            $data['content'] = $this->load->view('share/add_form', $data, true);
        } else {
            $config['upload_path'] = './cover/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('cover')) {
                $error =  $this->upload->display_errors();
                if ($error == "You did not select a file to upload.") {
                    $cover = "default.png";
                } else {
                    $data['error'] = $error;
                    $cover = '';
                }
            } else {
                $upload_data = $this->upload->data();
                $cover = $upload_data['file_name'];
            }
            if ($cover != '') {
               // $upload_data = array('upload_data' => $this->upload->data());
                $sdata['file_name'] = $this->input->post('file_name', true);
                $sdata['display_name'] = $this->input->post('display_name', true);
                $sdata['file_path'] =  $this->input->post('path', true);
              
                $sdata['file_size'] = $this->input->post('size', true);
                $sdata['file_release'] = $this->input->post('year', true);
                $sdata['file_category'] = $this->input->post('category', true);
                $sdata['file_cover'] = $cover;
                $sdata['file_info'] = $this->input->post('info', true);
                if ($this->um->saveUpload($sdata)) {
                    $data['message'] = 'File Shared Successfully !';
                } else {
                    $data['message'] = 'Unknown Errors !';
                }
            }
            $data['content'] = $this->load->view('share/add_form', $data, true);
        }

        $this->load->view('dashboard_main', $data);
    }

    function showAll() {
        $data['title'] = "Share File";
        $config = array();
        $config["base_url"] = base_url() . "index.php/sharefiles/showAll";
        $config["total_rows"] = $this->um->count_all();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["files"] = $this->um->fetch_all($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['total'] = $config["total_rows"];
        $data['content'] = $this->load->view('share/view_all', $data, true);

        $this->load->view('dashboard_main', $data);
    }

    function delete($id = '') {
        if ($id != '') {
            $info = $this->um->getInfo($id);
            $cover = "./cover/" . $info->file_cover;
            if (file_exists($cover)) {
                unlink($cover);
            }
            $file = "./".$info->file_path;
             if (file_exists($file)) {
                unlink($file);
            }
            if ($this->um->delete($info->id)) {
                $this->session->set_userdata('message', "<div class='alert alert-success'>Deleted ! </div>");
            } else {
                $this->session->set_userdata('message', "<div class='alert alert-danger'>Can not Deleted ! </div>");
            }
        }
        redirect('sharefiles/showAll', 'refresh');
    }

}
