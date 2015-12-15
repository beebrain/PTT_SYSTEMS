<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VisitController
 *
 * @author Boobee
 */
class VisitController extends CI_Controller {

    //put your code here

   function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        } else {
            redirect("index.php/Welcome/index");
        }
    }
    
    public function getRecPro() {
        $data = $this->input->post();
        //$data['vis_id'] = '45';
        $this->load->model('Visit_m');

        $vis_detail = $this->Visit_m->getVisitDetail($data);
        echo json_encode($vis_detail);
    }
}
