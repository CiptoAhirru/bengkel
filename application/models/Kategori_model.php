<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function read(){

        $this->db->select('*');
        $this->db->from('kategori');
        $query = $this->db->get();

        //mengirim data ke controler dalam bentuk semua data
        return $query->result_array();
    }
}