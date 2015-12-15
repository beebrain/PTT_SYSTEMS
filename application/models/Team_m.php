<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Team_m
 *
 * @author Boobee
 */
class Team_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addTeam($data) {
        //echo print_r($data);
        $this->db->insert('team', $data);
        return $this->db->affected_rows();
    }


    public function upTeam($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('team', $data);
        return $this->db->affected_rows();
    }

    public function getTeam() {
        $this->db->where_not_in('flag', '-1');
        $query = $this->db->get('team');
        return $query->result();
    }

    public function getWhereTeam($data) {
        $this->db->where($data);
        $query = $this->db->get('team');
        return $query->result();
    }

}
