<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
    public function __construct() {
        parent::__construct();
		if(!$this->session->userdata('role_id')){
            redirect('auth');
        }

        if($this->session->userdata('role_id') == '1'){
			redirect('user/index');
		}
        //memanggil model
        $this->load->model(array('Service_model','Booking_model'));
    }

    public function index(){
        $user = $this->db->get_where('actor', ['email' => $this->session->userdata('email')])->row_array();
        $booking = $this->Booking_model->read();
        $output = array(
            'user' => $user,
            'booking' => $booking,
            'template_page' => 'service',
            'judul' => 'Daftar Service',
        );
        $this->load->view('templates/index', $output);
    }

    public function booking(){
        $user = $this->db->get_where('actor', ['email' => $this->session->userdata('email')])->row_array();
        $booking = $this->Booking_model->read();
        $service = $this->Service_model->read();
        $output = array(
            'user' => $user,
            'booking' => $booking,
            'service' => $service,
            'template_page' => 'booking',
            'judul' => 'Daftar Service',
        );
        $this->load->view('templates/index', $output);
    }

    public function insert(){
        $invoice = rand(6,1000);
        $service = $this->input->post('service');
        $customer = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $wa = $this->input->post('no_wa');
        $tgl = $this->input->post('tgl');
        $input_paid = array(
            'serviceid' => $service,
            'invoice' => $invoice,
            'nama' => $customer,
            'alamat' => $alamat,
            'no_wa' => $wa,
            'tgl' => $tgl,
            'is_paid' => 1,
        );
        $this->db->where('invoice', null);
        $this->db->update('booking' , $input_paid);
        redirect('service');
    }

    public function insert_submit(){
        $check = $this->input->post('check_list');
        foreach($check as $object){
            $this->Booking_model->insert(array(
                'serviceid' => $object
            ));
            redirect('service/booking');
        }
    }
}