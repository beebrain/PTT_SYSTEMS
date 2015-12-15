<?php

class Area_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Test() {
        echo "Test";
    }

    public function addManager($data) {
        //echo print_r($data);
        $this->db->insert('areamanager', $data);
        return $this->db->affected_rows();
    }

    public function delManager($data) {
        //echo print_r($data); 
        $this->db->delete('areamanager', $data);
        return $this->db->affected_rows();
    }

    public function upManager($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('areamanager', $data);
        return $this->db->affected_rows();
    }

    public function getManager() {
        $this->db->where_not_in('flag', '-1');
        $query = $this->db->get('areamanager');
        return $query->result();
    }

    public function getWhereManager($data) {
        $this->db->where($data);
        $query = $this->db->get('areamanager');
        return $query->result();
    }

}
