<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of image_m
 *
 * @author Boobee
 */
class image_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addImage($data) {
        //echo print_r($data);
        $this->db->insert('image_visit', $data);
        return $this->db->insert_id();
    }

    public function delete($data) {
        $this->db->where($data);
        $this->db->delete('image_visit');
    }

    public function getImageDetail($data) {
        $this->db->where($data);
        $query = $this->db->get('image_visit');
        return $query->result();
    }

    public function getImageNotIn($data,$id) {
        $this->db->where_not_in('img_id', $data);
        $this->db->where('vis_id',$id);
        $query = $this->db->get('image_visit');
        return $query->result();
    }

}
