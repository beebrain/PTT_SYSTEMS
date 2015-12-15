<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_model
 *
 * @author Boobee
 */
class Dealer_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addDealer($data) {
        //echo print_r($data);
        $this->db->insert('dealer', $data);
        return $this->db->affected_rows();
    }

    public function upDealer($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('dealer', $data);
        return $this->db->affected_rows();
    }

    public function getDealer() {
        $this->db->where_not_in('flag', '-1');
        $query = $this->db->get('dealer');
        return $query->result();
    }

    public function getWhereDealer($data) {
        $this->db->where($data);
        $query = $this->db->get('dealer');
        return $query->result();
    }

}
