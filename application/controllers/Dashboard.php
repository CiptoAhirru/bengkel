<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if(!$this->session->userdata('role_id')){
            redirect('auth');
        }
        if($this->session->userdata('role_id') == '2'){
			redirect('user/index');
		}
    }

    public function index(){
        $user = $this->db->get_where('actor', ['email' => $this->session->userdata('email')])->row_array();
        $output = array(
            'template_page' => 'dashboard',
            'user' => $user,
            'judul' => 'Daftar Barang',
        );
        $this->load->view('templates/index', $output);
    }
}