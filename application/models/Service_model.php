<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

    public function read(){

        $this->db->select('service.*');
        $this->db->select('kategori.service AS nama_kategori');
        $this->db->from('service');
        $this->db->join('kategori', 'service.kategori_id = kategori.id');
        $this->db->order_by('kategori.service');
        $query = $this->db->get();

        //mengirim data ke controler dalam bentuk semua data
        return $query->result_array();
    }

    public function insert_entry($data)
    {
        return $this->db->insert('service', $data);
    }

    public function delete_entry($id)
    {
        return $this->db->delete('service', array('id' => $id));
    }
}