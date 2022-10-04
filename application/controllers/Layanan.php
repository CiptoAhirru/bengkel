<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if(!$this->session->userdata('role_id')){
            redirect('auth');
        }

		if($this->session->userdata('role_id') == '2'){
			redirect('user/index');
		}

        $this->load->model(array('Service_model','Kategori_model'));
    }

    public function index(){
        $user = $this->db->get_where('actor', ['email' => $this->session->userdata('email')])->row_array();
        $kategori = $this->Kategori_model->read();
        $service = $this->Service_model->read();
        
        $output = array(
            'user' => $user,
            'kategori' => $kategori,
            'service' => $service,
            'template_page' => 'Manage',
            'judul' => 'Daftar Booking Member',
        );
        $this->load->view('templates/index', $output);
    }

    public function fetch()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Service_model->read();
			echo json_encode($posts);
		} else {
			echo "'No direct script access allowed'";
		}
	}

    public function insert(){
        if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
            
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();

				if ($this->Service_model->insert_entry($ajax_data)) {
					$data = array('response' => "success", 'message' => "Data added successfully");
				} else {
					$data = array('response' => "error", 'message' => "failed");
				}
			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
    }

    public function delete()
	{
		if ($this->input->is_ajax_request()) {

			$del_id = $this->input->post('del_id');

			if ($this->Service_model->delete_entry($del_id)) {
				$data = array('response' => "success",);
			} else {
				$data = array('response' => "error");
			}

			echo json_encode($data);
		}
	}
}