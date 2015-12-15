<?php

class companyControl extends CI_Controller {

    //put your code here

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        } else {
            redirect("index.php/Welcome/index");
        }
    }

    public function addNewCompany() {
        $this->load->model('company_model');
        $data = $this->input->post();
        $this->company_model->addCompany($data);

        redirect("index.php/companyControl/showCompany");
    }

    public function test() {
        $this->load->view('test');
    }

    public function getdealer() {
        $data["id"] = "12";
        $data["value"] = "bbbb";
        $row[0] = array("value" => "11", "label" => "ActionScript");
        $row[1] = array("value" => "1", "label" => "AppleScript");
        $row[2] = array("value" => "99", "label" => "Asp");
        $row[3] = array("value" => "55", "label" => "Clojure");
        $row[4] = array("value" => "77", "label" => "BASIC");
        $row[5] = array("value" => "7", "label" => "C");
        $row[6] = array("value" => "55", "label" => "COBOL");
        $row[7] = array("value" => "77", "label" => "ColdFusion");
        $row[8] = array("value" => "7", "label" => "Erlang");
        $row[9] = array("value" => "55", "label" => "Fortran");
        $row[10] = array("value" => "77", "label" => "Groovy");
        $row[11] = array("value" => "7", "label" => "Haskell");
        $row[12] = array("value" => "55", "label" => "Java");
        $row[13] = array("value" => "77", "label" => "JavaScript");
        $row[14] = array("value" => "7", "label" => "Lisp");
        echo json_encode($row);
    }

    public function getManager() {
        $this->load->model('areamanager_model');
        $result = $this->areamanager_model->getManager();
        foreach ($result as $key => $value) {
            $row[$key] = array("value" => $value->id, "label" => $value->name);
        }
        echo json_encode($row);
    }

    /*  show view section */

    public function showCompany() {
        $this->load->model('company_model');
        $allCompany = $this->company_model->getCompany();
        $data["allCompany"] = $allCompany;
        $this->load->view('template/login_header.php');
        $this->load->view('Main.php', $data);
        $this->load->view('template/login_footer.php');
    }

    public function addCompanyForm() {
        $this->load->view('template/login_header.php');
        $this->load->view('AddCompany');
        $this->load->view('template/login_footer.php');
    }

}
