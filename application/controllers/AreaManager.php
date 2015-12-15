<?php

class AreaManager extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        } else {
            redirect("index.php/Welcome/index");
        }
    }

    public function index() {
        echo "Test";
    }

    public function addManager() {
        $this->load->model('Area_m');
        $data = $this->input->post();
        $this->Area_m->addManager($data);
        redirect("index.php/AreaManager/showManager");
    }

    public function deleteManager($id = null) {
        $this->load->model('Area_m');
        $data['id'] = $id;
        $data['flag'] = '-1';
        $this->Area_m->upManager($data);
        redirect("index.php/AreaManager/showManager");
    }

    public function updateManager($id = null) {
        $this->load->model('Area_m');
        $data = $this->input->post();
        $uData['name'] = $data['updateName'];
        $uData['id'] = $data['updateId'];
        $this->Area_m->upManager($uData);
        redirect("index.php/AreaManager/showManager");
    }

    /*  show view section */

    public function showManager() {
        //print_r("Test");
        $this->load->model('Area_m');
        // $this->Area_m->Test();
        $allmanager = $this->Area_m->getManager();
        $data["allmanager"] = $allmanager;
        // print_r($data);
        $this->load->view("newTemp/head");
        $this->load->view('AreaManager_view.php', $data);
    }

}
