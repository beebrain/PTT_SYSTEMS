<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyManage
 *
 * @author Boobee
 */
class CompanyManage extends CI_Controller {

    //put your code here

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        } else {
            redirect("index.php/Welcome/index");
        }
    }

    public function getDealer() {
        $this->load->model('Dealer_m');
        $result = $this->Dealer_m->getDealer();
        foreach ($result as $key => $value) {
            $row[$key] = array("value" => $value->id, "label" => $value->name);
        }
        echo json_encode($row);
    }

    public function getManager() {
        $this->load->model('Area_m');
        $result = $this->Area_m->getManager();
        foreach ($result as $key => $value) {
            $row[$key] = array("value" => $value->id, "label" => $value->name);
        }
        echo json_encode($row);
    }

    /*  show view section */

    public function showCompany() {
        $this->load->model('Company_m');
        $data['company.flag'] = '0';
        $allCompany = $this->Company_m->getCompanyDetail($data);
        $data["allCompany"] = $allCompany;
        $this->load->view("newTemp/head");
        $this->load->view('Company_view.php', $data);
    }

    public function showNewFormCompany() {
        $this->load->view("newTemp/head");
        $this->load->view('AddNewCompany.php');
    }

    public function addNewCompany() {
        $this->load->model('Company_m');
        $data = $this->input->post();
        $data["type"] = implode(",", $data["type"]);
        $this->Company_m->addCompany($data);
        redirect("index.php/CompanyManage/Visitor");
    }

    public function deleteCompany($id = null) {
        $this->load->model('Company_m');
        $data['company_id'] = $id;
        $data['flag'] = '-1';
        $this->Company_m->updateCompany($data);
        redirect("index.php/CompanyManage/Visitor");
    }

    public function deleteVis($id = null) {
        $this->load->model('Visit_m');
        $data['vis_id'] = $id;
        $vis_data = $this->Visit_m->getVisitDetail($data);
        $data['flag'] = '-1';
        $this->Visit_m->upVisit($data);

        //print_r($vis_data);
        // Update App Date
        $condition['company_id'] = $vis_data[0]->company_id;
        $result_appDate = $this->Visit_m->getAppDate($condition);
        $this->load->model('Company_m');

        //echo $this->db->last_query();
        //echo $vis_data[0]->company_id;
        redirect("index.php/CompanyManage/showHistory/" . $vis_data[0]->company_id);
    }

    public function editCompany($id = null) {
        $this->load->model('Company_m');
        $data['company_id'] = $id;
        $data['company.flag'] = '0';
        $result = $this->Company_m->getCompanyDetail($data);
        $data["company"] = $result[0];
        $this->load->view("newTemp/head");
        $this->load->view('EditCompany.php', $data);
    }

    public function updateCompany() {
        $this->load->model('Company_m');
        $data = $this->input->post();
        $data["type"] = implode(",", $data["type"]);
        $this->Company_m->updateCompany($data);

        redirect("index.php/CompanyManage/Visitor");
    }

    public function showHistory($company_id) {
        $this->load->model('Company_m');
        $data['company_id'] = "'" . $company_id . "'";
        $data['company.flag'] = '0';
        $result = $this->Company_m->getCompanyDetail($data);
        $data['company'] = $result[0];

        $this->load->model('Visit_m');
        $vDate['company_id'] = $company_id;
        $result = $this->Visit_m->getVisitDetail($vDate);

        $this->load->model('Dealer_m');
        $dealer_da['id'] = $data['company']->dealer;
        $result_d = $this->Dealer_m->getWhereDealer($dealer_da);
        $data['dealer'] = $result_d[0];

        $this->load->model('Area_m');
        $dealer_ar['id'] = $data['company']->area_manager;
        $result_d = $this->Area_m->getWhereManager($dealer_ar);
        $data['area_ma'] = $result_d[0];

        //print_r($result);
        $data['visit'] = $result;

        $this->load->view("newTemp/head");
        $this->load->view('ShowHistory.php', $data);
    }

    public function showVisitDetail($vis_id) {
        $this->load->model('Visit_m');
        $vDate['vis_id'] = $vis_id;
        $result = $this->Visit_m->getVisitDetail($vDate);

        $this->load->model('Image_m');
        $images = $this->Image_m->getImageDetail($vDate);

        //print_r($result);
        $data['visit'] = $result[0];
        $data['image'] = $images;

        //print_r($data);
        /* $this->load->model('Objective_m');
          $oDate['code'] = $data['visit']->objective;
          $objective_data = $this->Objective_m->getObjective($oDate);

          $data['objective'] = $objective_data[0];
         */


        //  $this->load->view("newTemp/head");
        $this->load->view('DetailVisit.php', $data);
    }

    public function EditHistoryform($vis_id = null) {
        $this->load->model('Visit_m');
        $this->load->model('Image_m');
        $condition['vis_id'] = $vis_id;
        $condition['flag'] = '0';

        $result = $this->Visit_m->getVisitDetail($condition);
        $data['visit'] = $result[0];

        $condition2['vis_id'] = $vis_id;
        $result_img = $this->Image_m->getImageDetail($condition2);

        $data['image'] = $result_img;

        $this->load->view("newTemp/head");
        $this->load->view('EditHistory.php', $data);
    }

    public function addHistoryform($company_id = null) {
        $data['company_id'] = $company_id;
        $this->load->view("newTemp/head");
        $this->load->view('AddHistory_view.php', $data);
    }

    public function Visitor() {
        $this->load->model('Company_m');
        $cdate = date("Y-m-d");

        // Get company in nextDate
        $result_company1 = $this->Company_m->getCompanyCurrentDate($cdate);
        // echo $this->db->last_query();
        //  echo "---------------------------- <br>";
        

        // ListCompany in NetDate
        $companyNext = null;
        foreach ($result_company1 as $key => $value) {
            $companyNext[$key] = "'" . $value->company_id . "'";
        }

        // Get Company With Tentative and last App Date notin Company nextDate
        $result_comTan = $this->Company_m->getCompanyVisitNotin($cdate, $companyNext);
         //echo $this->db->last_query();
         //  echo "---------------------------- <br>";
        
        
        $companyexit = $companyNext;
        $nextindex = sizeof($companyNext);

        foreach ($result_comTan as $key => $value) {
            $companyexit[$key + $nextindex] = "'" . $value->company_id . "'";
        }

        $result_comEx = $this->Company_m->getCompanyNotin($companyexit);
        //echo $this->db->last_query();
        //  echo "---------------------------- <br>";


        $this->load->model('Visit_m');
        foreach ($result_company1 as $key => $value) {
            $result_recom = $this->Visit_m->getVisitRec_Pro($value->company_id);

            $result_company1[$key]->rec_pro = "";
            foreach ($result_recom as $key1 => $value1) {
                //echo  strip_tags($value1->rec_pro);
                $result_company1[$key]->rec_pro .= "<p>" . strip_tags($value1->rec_pro) . "</p>";
            }
        }

        foreach ($result_comTan as $key => $value) {
            $result_recom = $this->Visit_m->getVisitRec_Pro($value->company_id);

            $result_comTan[$key]->rec_pro = "";
            foreach ($result_recom as $key1 => $value1) {
                //echo  strip_tags($value1->rec_pro);
                $result_comTan[$key]->rec_pro .= "<p>" . strip_tags($value1->rec_pro) . "</p>";
            }
        }

        foreach ($result_comEx as $key => $value) {
            $result_recom = $this->Visit_m->getVisitRec_Pro($value->company_id);

            $result_comEx[$key]->rec_pro = "";
            foreach ($result_recom as $key1 => $value1) {
                //echo  strip_tags($value1->rec_pro);
                $result_comEx[$key]->rec_pro .= "<p>" . strip_tags($value1->rec_pro) . "</p>";
            }
        }


        $result['allCompany'] = $result_company1;
        $result['midCompany'] = $result_comTan;
        $result['exitCompany'] = $result_comEx;

        $this->load->view("newTemp/head");
        $this->load->view('Vistor.php', $result);
    }

    public function getimage() {
        $data = $this->input->post();
        //$data['vis_id'] = '75';
        $this->load->model('Image_m');

        $images = $this->Image_m->getImageDetail($data);
        echo json_encode($images);
    }

    // Add History With Image
    public function addHistoryWithFile() {

        $number_of_files = sizeof($_FILES['uploadedimages']['tmp_name']);

        //echo $number_of_files;
        $info_file = array();
        $files = $_FILES['uploadedimages'];
        $this->load->library('upload');

        $config['upload_path'] = "upload/";
        // also, we make sure we allow only certain type of images
        $config['allowed_types'] = 'gif|jpg|png|tiff';
        $config['max_size'] = '2048';
        $config['encrypt_name'] = true;
        // now, taking into account that there can be more than one file, for each file we will have to do the upload
        for ($i = 0; $i < $number_of_files; $i++) {
            $_FILES['uploadedimage']['name'] = $files['name'][$i];
            $_FILES['uploadedimage']['type'] = $files['type'][$i];
            $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['uploadedimage']['error'] = $files['error'][$i];
            $_FILES['uploadedimage']['size'] = $files['size'][$i];

            //now we initialize the upload library
            $this->upload->initialize($config);
            if ($this->upload->do_upload('uploadedimage')) {
                $info_file[$i] = $this->upload->data();
                // print_r($info_file);
            }
        }

        // Resize Image
        $this->load->library('image_lib');
        foreach ($info_file as $key => $value) {

            $config2['image_library'] = 'gd2';
            $config2['source_image'] = './upload/' . $value['file_name'];
            $config2['create_thumb'] = FALSE;
            $config2['maintain_ratio'] = TRUE;
            $config2['width'] = '800';
            $config2['height'] = '800';
            $config2['new_image'] = './upload/' . $value['file_name'];

            $this->image_lib->clear();
            $this->image_lib->initialize($config2);
            $this->image_lib->resize();
        }

        // Finish Upload Image
        // 
        // 
        // Start Add Data
        $data = $this->input->post();
        $date = $data['vis_date'];
        //$date = str_replace('/', '-', $date);
        $data['vis_date'] = date('Y-m-d', strtotime($date));

        if (isset($data['app_date']) && $data['app_date'] <> "") {
            $date = $data['app_date'];
            //$date = str_replace('/', '-', $date);
            $data['app_date'] = date('Y-m-d', strtotime($date));
            $data['tentative'] = '0';
        } else {
            $data['app_date'] = "";
            $data['tentative'] = '1';
        }
        //print_r($data);

        $this->load->model('Visit_m');
        $result_id = $this->Visit_m->addVisit($data);


        $this->load->model('Image_m');
        foreach ($info_file as $key => $value) {
            $dataImg['vis_id'] = $result_id;
            $dataImg['link_img'] = $value['file_name'];
            $dataImg['file_name'] = $value['orig_name'];
            $this->Image_m->addImage($dataImg);
        }

        redirect('index.php/CompanyManage/showHistory/' . $data['company_id']);
    }

    public function updateHistoryWithFile() {

        $number_of_files = sizeof($_FILES['uploadedimages']['tmp_name']);
        //echo $number_of_files;
        $info_file = array();
        $files = $_FILES['uploadedimages'];
        $this->load->library('upload');

        $config['upload_path'] = "upload/";
        // also, we make sure we allow only certain type of images
        $config['allowed_types'] = 'gif|jpg|png|tiff';
        $config['max_size'] = '2048';
        $config['encrypt_name'] = true;
        // now, taking into account that there can be more than one file, for each file we will have to do the upload
        for ($i = 0; $i < $number_of_files; $i++) {
            $_FILES['uploadedimage']['name'] = $files['name'][$i];
            $_FILES['uploadedimage']['type'] = $files['type'][$i];
            $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['uploadedimage']['error'] = $files['error'][$i];
            $_FILES['uploadedimage']['size'] = $files['size'][$i];

            //now we initialize the upload library
            $this->upload->initialize($config);

            if ($this->upload->do_upload('uploadedimage')) {
                $info_file[$i] = $this->upload->data();
            }
        }

        // Resize Image
        $this->load->library('image_lib');
        foreach ($info_file as $key => $value) {

            $config2['image_library'] = 'gd2';
            $config2['source_image'] = './upload/' . $value['file_name'];
            $config2['create_thumb'] = FALSE;
            $config2['maintain_ratio'] = TRUE;
            $config2['width'] = '800';
            $config2['height'] = '800';
            $config2['new_image'] = './upload/' . $value['file_name'];

            $this->image_lib->clear();
            $this->image_lib->initialize($config2);
            $this->image_lib->resize();
        }

        // Finish Upload Image
        // 
        // 
        // Start Add Data
        $data = $this->input->post();
        $date = $data['vis_date'];
        //$date = str_replace('/', '-', $date);
        $data['vis_date'] = date('Y-m-d', strtotime($date));

        if (isset($data['app_date']) && $data['app_date'] <> "") {
            $date = $data['app_date'];
            //$date = str_replace('/', '-', $date);
            $data['app_date'] = date('Y-m-d', strtotime($date));
            $data['tentative'] = '0';
        } else {

            $data['app_date'] = "";
            $data['tentative'] = '1';
        }

        //print_r($data);
        if (isset($data['currentImage'])) {
            $imageList = $data['currentImage'];
            unset($data['currentImage']);
        }
        // print_r($data);



        $this->load->model('Visit_m');
        $this->Visit_m->upVisit($data);




        // Strat Delete Image
        $this->load->model('Image_m');
        $vis_id = $data['vis_id'];
        $resultimg = $this->Image_m->getImageNotIn($imageList, $vis_id);

        foreach ($resultimg as $key => $value) {
            $condition['img_id'] = $value->img_id;
            $this->Image_m->delete($condition);
            $path = "./upload/" . $value->link_img;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        //print_r($info_file);
        foreach ($info_file as $key => $value) {
            $dataImg['vis_id'] = $vis_id;
            $dataImg['link_img'] = $value['file_name'];
            $dataImg['file_name'] = $value['orig_name'];
            $this->Image_m->addImage($dataImg);
        }

        redirect('index.php/CompanyManage/showVisitDetail/' . $vis_id);
    }

    
    
    public function searchDate($startDate, $endDate) {
        echo $startDate;
        echo $endDate;
        $startDate_S = date('Y-m-d', strtotime($startDate));

        $endDate_S = date('Y-m-d', strtotime($endDate));

        $this->load->model('Company_m');
        $result_company = $this->Company_m->findDateBetweenVis($startDate_S, $endDate_S);
        // echo $this->db->last_query();

        $this->load->model('Visit_m');
        foreach ($result_company as $key => $value) {
            $result_recom = $this->Visit_m->getVisitRec_Pro($value->company_id);

            $result_company[$key]->rec_pro = "";
            foreach ($result_recom as $key1 => $value1) {
                //echo  strip_tags($value1->rec_pro);
                $result_company[$key]->rec_pro .= "<p>" . strip_tags($value1->rec_pro) . "</p>";
            }
        }


        $result["allCompany"] = $result_company;
        $result['searchDate'] = array("startDate" => $startDate, "endDate" => $endDate);
        //print_r($result["allCompany"]);
        $this->load->view("newTemp/head");
        $this->load->view('Vistor.php', $result);
    }

}
