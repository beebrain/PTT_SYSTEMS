<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Objective_m
 *
 * @author Boobee
 */
class Objective_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getObjective($data = null) {
        if ($data <> null)
            $this->db->where($data);
        $query = $this->db->get('objective');
        return $query->result();
    }

}
