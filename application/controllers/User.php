<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if(!$this->session->userdata('role_id')){
            redirect('auth');
        }
    }

    public function index(){
        $user = $this->db->get_where('actor', ['email' => $this->session->userdata('email')])->row_array();
       
        $output = array(
            'template_page' => 'user',
            'judul' => 'My profile',
            'user' => $user
            );

            $this->load->view('templates/index', $output);
    }
}