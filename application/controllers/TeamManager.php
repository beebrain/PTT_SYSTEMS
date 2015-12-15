<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TeamManager
 *
 * @author Boobee
 */
class TeamManager extends CI_Controller {

    //put your code here

   function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        } else {
            redirect("index.php/Welcome/index");
        }
    }

    public function addTeam() {
        $this->load->model('Team_m');
        $data = $this->input->post();
        $this->Team_m->addTeam($data);
        redirect("index.php/TeamManager/showTeam");
    }

    public function deleteTeam($id = null) {
        $this->load->model('Team_m');
        $data['id'] = $id;
        $data['flag'] = '-1';
        $this->Team_m->upTeam($data);
        redirect("index.php/TeamManager/showTeam");
    }

    public function updateTeam($id = null) {
        $this->load->model('Team_m');
        $data = $this->input->post();
        $uData['name'] = $data['updateName'];
        $uData['id'] = $data['updateId'];
        $this->Team_m->upTeam($uData);
        redirect("index.php/TeamManager/showTeam");
    }

    /*  show view section */

    public function showTeam() {
        //print_r("Test");
        $this->load->model('Team_m');
        // $this->Area_m->Test();
        $allTeam = $this->Team_m->getTeam();
        $data["allTeam"] = $allTeam;
        // print_r($data);
        $this->load->view("newTemp/head");
        $this->load->view('TeamManager_view.php', $data);
    }

    public function getTeam() {
        $this->load->model('Team_m');
        $result = $this->Team_m->getTeam();
        foreach ($result as $key => $value) {
            $row[$key] = array("value" => $value->id, "label" => $value->name);
        }
        echo json_encode($row);
    }

}
