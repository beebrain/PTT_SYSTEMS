<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DealerController
 *
 * @author Boobee
 */
class DealerManager extends CI_Controller {

    //put your code here

  function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        } else {
            redirect("index.php/Welcome/index");
        }
    }

    public function addDealer() {
        $this->load->model('Dealer_m');
        $data = $this->input->post();
        $this->Dealer_m->addDealer($data);
        redirect("index.php/DealerManager/showDealer");
    }

    /*  show view section */

    public function showDealer() {
        $this->load->model('Dealer_m');
        $alldealer = $this->Dealer_m->getDealer();
        $data["alldealer"] = $alldealer;
        $this->load->view("newTemp/head");
        $this->load->view('DealerManager_view.php', $data);
    }
    
      public function deleteDealer($id = null) {
        $this->load->model('Dealer_m');
        $data['id'] = $id;
        $data['flag'] = '-1';
        $this->Dealer_m->upDealer($data);
        redirect("index.php/DealerManager/showDealer");
    }
    
     public function updateDealer($id = null) {
        $this->load->model('Dealer_m');
        $data = $this->input->post();
        $uData['name'] = $data['updateName'];
        $uData['id'] = $data['updateId'];
        $this->Dealer_m->upDealer($uData);
        redirect("index.php/DealerManager/showDealer");
    }

}
