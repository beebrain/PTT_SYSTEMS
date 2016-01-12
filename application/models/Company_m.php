<?php

class Company_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addCompany($data) {
        //echo print_r($data);
        $this->db->insert('company', $data);
        return $this->db->affected_rows();
    }

    public function getCompany() {
        $this->db->order_by("company_id", "desc");
        $query = $this->db->get('company');
        return $query->result();
    }

    public function getCompanyDetail($data = null) {
        $sqlcom = "SELECT company.* , areamanager.name as Aname,
            dealer.name as Dname from company INNER join areamanager 
            on company.area_manager = areamanager.id inner join dealer 
            on company.dealer = dealer.id ";
        if ($data <> null) {
            $sqlcom .=" WHERE ";
            foreach ($data as $key => $value) {
                $sqlcom .= $key . "=" . $value;
                $sqlcom .= " AND ";
            }
            $sqlcom .= " 1 = 1 ";
        }

        $sqlcom .= " ORDER BY `company_id` DESC ";
        //echo $sqlcom;
        $query = $this->db->query($sqlcom);
        return $query->result();
    }

    public function getCompanyDetailByDate($data = null) {
        $currentDate = $data["date"];
        $sqlcom = "select v.app_date as v_app ,areamanager.name as Aname,dealer.name as Dname,company.* from ( ";
        $sqlcom .= "   select * from visit";
        $sqlcom .= " where visit.app_date >= '$currentDate' and flag ='0' ";
        $sqlcom .= " GROUP by visit.company_id order by visit.app_date asc ";
        $sqlcom .= " ) as v ";
        $sqlcom .= " inner join company on company.company_id = v.company_id ";
        $sqlcom .= " inner join dealer on dealer.id = company.dealer ";
        $sqlcom .= " inner join areamanager on areamanager.id = company.area_manager";
        $sqlcom .= " order by v.app_date asc, v.`company_id` DESC; ";

        //echo $sqlcom;
        $query = $this->db->query($sqlcom);
        return $query->result();
    }

    public function getCompanyCurrentDate($date) {
        $sqlcom = " Select company.*,dealer.name as Dname,areamanager.name as Aname, a.app_date as v_app,a.tentative,a.objective from( ";
        $sqlcom .= " Select b.company_id,b.app_date,b.tentative,b.objective from ( ";
        $sqlcom .= " Select * from visit ";
        $sqlcom .= " where (visit.app_date >= '$date') and flag ='0' ";
        $sqlcom .= " order by visit.app_date ";
        $sqlcom .= " ) as b ";
        $sqlcom .= " group by b.company_id ";
        $sqlcom .= " ) as a ";
        $sqlcom .= " inner join company on company.company_id = a.company_id ";
        $sqlcom .= " inner join dealer on dealer.id = company.dealer ";
        $sqlcom .= " inner join areamanager on areamanager.id = company.area_manager ";

        $sqlcom .= " WHERE company.flag = '0' ";
        $sqlcom .= " ORDER BY a.`app_date` ASC, a.`company_id` DESC ";
        //echo $sqlcom;
        $query = $this->db->query($sqlcom);
        return $query->result();
    }

    public function getCompanyVisitNotin($date, $data) {
        if ($data <> null) {
            $notcompany = implode(",", $data);
        }
        $sqlcom = " Select company.*,dealer.name as Dname,areamanager.name as Aname, a.app_date as v_app, a.tentative,a.objective from( ";
        $sqlcom .= " Select b.company_id,b.app_date,b.tentative,b.objective from ( ";
        $sqlcom .= " Select * from visit ";
        $sqlcom .= " where (visit.app_date < '$date') and flag ='0'";
        if (isset($notcompany) && sizeof($notcompany) > 0) {
            $sqlcom .= " and company_id not in ($notcompany) ";
        }
        $sqlcom .= " order by visit.tentative desc, visit.vis_date desc ";
        $sqlcom .= " ) as b ";
        $sqlcom .= " group by b.company_id ";
        $sqlcom .= " ) as a ";
        $sqlcom .= " inner join company on company.company_id = a.company_id ";
        $sqlcom .= " inner join dealer on dealer.id = company.dealer ";
        $sqlcom .= " inner join areamanager on areamanager.id = company.area_manager ";

        $sqlcom .= " WHERE company.flag = '0' ";
        $sqlcom .= " ORDER BY tentative desc ,a.`app_date` desc , a.`company_id` DESC ";
        // echo $sqlcom;
        $query = $this->db->query($sqlcom);
        return $query->result();
    }

    public function getCompanyNotin($data) {
        $notcompany = implode(",", $data);

        $sqlcom = " Select company.*,areamanager.name as Aname,dealer.name as Dname from company";
        $sqlcom .= " inner join dealer on dealer.id = company.dealer ";
        $sqlcom .= " inner join areamanager on areamanager.id = company.area_manager ";
        $sqlcom .=" where company.flag = '0' ";
        if (sizeof($notcompany) > 0) {
            $sqlcom .= " and company_id not in ($notcompany) ";
        }
        $sqlcom .=" ORDER BY company.company_id DESC";
        //echo $sqlcom;
        $query = $this->db->query($sqlcom);
        return $query->result();
    }

    public function updateCompany($data) {
        $this->db->where('company_id', $data['company_id']);
        $this->db->update('company', $data);
        return $this->db->affected_rows();
    }

    public function findDateBetweenApp($start, $end) {

        $sqlcom = " Select company.*,dealer.name as Dname,areamanager.name as Aname, a.app_date as v_app from( ";
        $sqlcom .= " Select b.company_id,b.app_date from ( ";
        $sqlcom .= " Select * from visit ";
        $sqlcom .= " where (visit.app_date BETWEEN '$start' AND '$end') and flag ='0' ";
        $sqlcom .= " order by visit.app_date ";
        $sqlcom .= " ) as b ";
        $sqlcom .= " group by b.company_id ";
        $sqlcom .= " ) as a ";
        $sqlcom .= " inner join company on company.company_id = a.company_id ";
        $sqlcom .= " inner join dealer on dealer.id = company.dealer ";
        $sqlcom .= " inner join areamanager on areamanager.id = company.area_manager ";

        $sqlcom .= " WHERE company.flag = '0' ";
        $sqlcom .= " ORDER BY a.`app_date` ASC, a.`company_id` DESC ";
        echo $sqlcom;
        $query = $this->db->query($sqlcom);
        return $query->result();
    }

    public function findDateBetweenVis($start, $end) {

        $sqlcom = " Select company.*,dealer.name as Dname,areamanager.name as Aname, a.app_date as v_app,a.tentative,a.objective from( ";
        $sqlcom .= " Select b.company_id,b.vis_date,b.app_date,b.tentative,b.objective from ( ";
        $sqlcom .= " Select * from visit ";
        $sqlcom .= " where (visit.vis_date BETWEEN '$start' AND '$end') and flag ='0' ";
        $sqlcom .= " order by visit.vis_date Desc";
        $sqlcom .= " ) as b ";
        $sqlcom .= " group by b.company_id ";
        $sqlcom .= " ) as a ";
        $sqlcom .= " inner join company on company.company_id = a.company_id ";
        $sqlcom .= " inner join dealer on dealer.id = company.dealer ";
        $sqlcom .= " inner join areamanager on areamanager.id = company.area_manager ";

        $sqlcom .= " WHERE company.flag = '0' ";
        $sqlcom .= " ORDER BY a.`app_date` ASC, a.`company_id` DESC ";
        echo $sqlcom;
        $query = $this->db->query($sqlcom);
        return $query->result();
    }

}
