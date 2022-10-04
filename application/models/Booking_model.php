<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    public function read(){

        $this->db->select('booking.*');
        $this->db->select('service.name AS nama_service');
        $this->db->select('Count(booking.serviceid) AS total');
        $this->db->from('booking');
        $this->db->join('service', 'service.id = booking.serviceid', 'LEFT');
        $this->db->group_by('booking.invoice');
        $this->db->order_by('tgl');
        $query = $this->db->get();

        //mengirim data ke controler dalam bentuk semua data
        return $query->result_array();
    }
    public function insert($data){
        $this->db->insert('booking', $data);
    }

    public function update($invoice, $input){
        $this->db->where('invoice', $invoice);
        return $this->db->update('booking', $input);
    }
}