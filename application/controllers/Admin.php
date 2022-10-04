<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if(!$this->session->userdata('role_id')){
            redirect('auth');
        }
        if($this->session->userdata('role_id') == '2'){
			redirect('user/index');
		}

        $this->load->model(array('Service_model','Booking_model'));
    }

    public function index(){
        $user = $this->db->get_where('actor', ['email' => $this->session->userdata('email')])->row_array();
        $booking = $this->Booking_model->read();
        $service = $this->Service_model->read();
        $output = array(
            'user' => $user,
            'booking' => $booking,
            'service' => $service,
            'template_page' => 'list_booking',
            'judul' => 'Daftar Booking Member',
        );
        $this->load->view('templates/index', $output);
    }

    public function acc(){
        $invoice = $this->uri->segment(3);
        $input = [
            'is_paid' => 2
        ];
        
        $this->Booking_model->update($invoice, $input);
        redirect('admin');
    }
}