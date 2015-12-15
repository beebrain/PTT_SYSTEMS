<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ObjectiveControl
 *
 * @author Boobee
 */
class ObjectiveControl extends CI_Controller {

    //put your code here

   function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        } else {
            redirect("index.php/Welcome/index");
        }
    }

    public function getObjective() {
        $this->load->model('Objective_m');
        $result = $this->Objective_m->getObjective();
        foreach ($result as $key => $value) {
            $row[$key] = array("value" => $value->code, "label" => $value->detail);
        }
        echo json_encode($row);
    }

}
