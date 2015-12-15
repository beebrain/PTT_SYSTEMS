<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of History_m
 *
 * @author Boobee
 */
class Visit_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addVisit($data) {
//echo print_r($data);
        $this->db->insert('visit', $data);
        return $this->db->insert_id();
    }

    public function upVisit($data) {
        $this->db->where('vis_id', $data['vis_id']);
        $this->db->update('visit', $data);
        return $this->db->affected_rows();
    }

    public function getVisitDetail($data) {
        $this->db->where_not_in('flag', '-1');
        $this->db->where($data);
        $this->db->order_by("vis_id", "desc");
        $query = $this->db->get('visit');

        return $query->result();
    }

    public function getVisit() {
        $this->db->where_not_in('flag', '-1');
        $query = $this->db->get('visit');
        return $query->result();
    }

    public function getAppDate($data) {
        $this->db->where('company_id', $data['company_id']);
        $this->db->where('flag', '0');
        $this->db->where('app_date >=', date("Y-m-d"));
        $this->db->order_by("app_date", "asc");
        $query = $this->db->get('visit');
        return $query->first_row();
    }

    public function getVisitInWhere($data = null) {

        $sqlcom = "select * from  visit where visit.vis_id in (";
        foreach ($data as $key => $value) {
            $sqlcom .= $value . ",";
        }
        $sqlcom .= "0 )";
//echo $sqlcom;
        $query = $this->db->query($sqlcom);
        return $query->result();
    }

    public function getVisitRec_Pro($company_id) {
        $sqlcom = " select rec_pro from visit ";
        $sqlcom .= " where visit.company_id = '$company_id' ";
        $sqlcom .="    GROUP by visit.rec_pro ";

        $query = $this->db->query($sqlcom);
        return $query->result();
    }

}
