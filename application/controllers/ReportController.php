<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report
 *
 * @author Boobee
 */
class ReportController extends CI_Controller {

//put your code here

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        } else {
            
        }
    }

    public function reportToExcel($vis_id_list = null) {

        $this->load->model('Visit_m');
        $this->load->library('Excel');


        if ($vis_id_list == null) {
            return 0;
        }

        $vis_id_list = explode('-', $vis_id_list);


        // Head Sheet
//        $vis_id_list = array('00000000015', '00000000014');


        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->getStyle('A1:N8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

        // Set Boder

        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ),
            'font' => array(
                'color' => array('rgb' => '000000'),
                'size' => 14,
                'name' => 'Cordia New'
            ),
        );

        $styleBlackGround = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'F9F9F9')
            )
        );

        $styleBlackGroundHead = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '00bfff')
            )
        );

        $this->excel->getActiveSheet()->getStyle('A1:N8')->applyFromArray($styleArray);


        $this->excel->getActiveSheet()->setTitle('Summary');
        $this->excel->getActiveSheet()->setCellValue('A1', 'Company Detail');

        $this->excel->getActiveSheet()->mergeCells('A1:N1');
        $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($styleBlackGroundHead);

        $this->excel->getActiveSheet()->setCellValue('A2', 'Customer Code');
        $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A2')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('B2:G2');


        $this->excel->getActiveSheet()->setCellValue('A3', 'Company');
        $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('B3:G3');

        $this->excel->getActiveSheet()->setCellValue('A4', 'Address');
        $this->excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A4')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('B4:G4');

        $this->excel->getActiveSheet()->setCellValue('A5', 'Business');
        $this->excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A5')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('B5:G5');

        $this->excel->getActiveSheet()->setCellValue('A6', 'Process');
        $this->excel->getActiveSheet()->getStyle('A6')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A6')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('B6:G6');

        $this->excel->getActiveSheet()->setCellValue('A7', 'Background');
        $this->excel->getActiveSheet()->getStyle('A7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A7')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('B7:G7');


        $this->excel->getActiveSheet()->setCellValue('H2', 'Area Manager');
        $this->excel->getActiveSheet()->getStyle('H2')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('H2')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('I2:N2');

        $this->excel->getActiveSheet()->setCellValue('H3', 'Dealer');
        $this->excel->getActiveSheet()->getStyle('H3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('H3')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('I3:N3');

        $this->excel->getActiveSheet()->setCellValue('H4', 'Dealer Contact');
        $this->excel->getActiveSheet()->getStyle('H4')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('H4')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('I4:N4');

        $this->excel->getActiveSheet()->setCellValue('H5', 'Customer Contact');
        $this->excel->getActiveSheet()->getStyle('H5')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('H5')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('I5:N5');

        $this->excel->getActiveSheet()->setCellValue('H6', 'Machine');
        $this->excel->getActiveSheet()->getStyle('H6')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('H6')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('I6:N6');



        $this->excel->getActiveSheet()->setCellValue('H7', 'Current Product');
        $this->excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('H7')->applyFromArray($styleBlackGround);
        $this->excel->getActiveSheet()->mergeCells('I7:N7');

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(14);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(14);

        // Vistor Detail
        $this->excel->getActiveSheet()->mergeCells('A8:N8');
        $this->excel->getActiveSheet()->setCellValue('A8', 'Visiting Detail');
        $this->excel->getActiveSheet()->getStyle('A8')->applyFromArray($styleBlackGroundHead);
//      



        $indexrow = 9;
        $company_id = "";

        foreach ($vis_id_list as $key => $value) {

//       
            $condition['vis_id'] = $value;
            $result = $this->Visit_m->getVisitDetail($condition);

            $company_id = $result[0]->company_id;
            foreach ($result as $key_r => $value_r) {

                $this->excel->getActiveSheet()->setCellValue('A' . ($key + $indexrow), "Visit Date");
                $this->excel->getActiveSheet()->getStyle('A' . ($key + $indexrow))->applyFromArray($styleBlackGround);
                $this->excel->getActiveSheet()->setCellValue('H' . ($key + $indexrow), "Objectives");
                $this->excel->getActiveSheet()->getStyle('H' . ($key + $indexrow))->applyFromArray($styleBlackGround);
                $this->excel->getActiveSheet()->setCellValue('A' . ($key + $indexrow + 1), "Appointment Date");
                $this->excel->getActiveSheet()->getStyle('A' . ($key + $indexrow + 1))->applyFromArray($styleBlackGround);
                $this->excel->getActiveSheet()->setCellValue('H' . ($key + $indexrow + 1), "Technical Services");
                $this->excel->getActiveSheet()->getStyle('H' . ($key + $indexrow + 1))->applyFromArray($styleBlackGround);

                $this->excel->getActiveSheet()->setCellValue('A' . ($key + $indexrow + 2), "Detail");
                $this->excel->getActiveSheet()->getStyle('A' . ($key + $indexrow + 2))->applyFromArray($styleBlackGround);
                $this->excel->getActiveSheet()->setCellValue('A' . ($key + $indexrow + 3), "Service");
                $this->excel->getActiveSheet()->getStyle('A' . ($key + $indexrow + 3))->applyFromArray($styleBlackGround);
                $this->excel->getActiveSheet()->setCellValue('A' . ($key + $indexrow + 4), "Recommended Product");
                $this->excel->getActiveSheet()->getStyle('A' . ($key + $indexrow + 4))->applyFromArray($styleBlackGround);


                // Data Mearge
                $this->excel->getActiveSheet()->mergeCells('B' . ($key + $indexrow) . ':' . 'G' . ($key + $indexrow));
                $this->excel->getActiveSheet()->mergeCells('I' . ($key + $indexrow) . ':' . 'N' . ($key + $indexrow));
                $this->excel->getActiveSheet()->mergeCells('B' . ($key + $indexrow + 1) . ':' . 'G' . ($key + $indexrow + 1));
                $this->excel->getActiveSheet()->mergeCells('I' . ($key + $indexrow + 1) . ':' . 'N' . ($key + $indexrow + 1));

                $this->excel->getActiveSheet()->mergeCells('B' . ($key + $indexrow + 2) . ':' . 'N' . ($key + $indexrow + 2));
                $this->excel->getActiveSheet()->mergeCells('B' . ($key + $indexrow + 3) . ':' . 'N' . ($key + $indexrow + 3));
                $this->excel->getActiveSheet()->mergeCells('B' . ($key + $indexrow + 4) . ':' . 'N' . ($key + $indexrow + 4));
                $this->excel->getActiveSheet()->mergeCells('A' . ($key + $indexrow + 5) . ':' . 'N' . ($key + $indexrow + 5));

                $this->excel->getActiveSheet()->setCellValue('B' . ($key + $indexrow), $this->expandWord($value_r->vis_date));
                $this->excel->getActiveSheet()->setCellValue('I' . ($key + $indexrow), $this->expandWord($value_r->objective));



                $this->excel->getActiveSheet()->setCellValue('B' . ($key + $indexrow + 1), $this->expandWord($value_r->app_date));
                $this->excel->getActiveSheet()->setCellValue('I' . ($key + $indexrow + 1), $this->splitTeam($value_r->team));

                $this->excel->getActiveSheet()->setCellValue('B' . ($key + $indexrow + 2), $this->expandWord($value_r->detail));
                $this->excel->getActiveSheet()->setCellValue('B' . ($key + $indexrow + 3), $this->expandWord($value_r->service));
                $this->excel->getActiveSheet()->setCellValue('B' . ($key + $indexrow + 4), $this->expandWord($value_r->rec_pro));


                $height_line = substr_count($value_r->team, ",");
                $this->excel->getActiveSheet()->getRowDimension(($key + $indexrow + 1))->setRowHeight(($height_line + 1) * 21);

                $height_line = substr_count($value_r->objective, ",");
                $this->excel->getActiveSheet()->getRowDimension(($key + $indexrow))->setRowHeight(($height_line + 1) * 21);

                $height_line = substr_count($value_r->detail, "<br />");
                $this->excel->getActiveSheet()->getRowDimension(($key + $indexrow + 2))->setRowHeight(($height_line + 1) * 21);

                $height_line = substr_count($value_r->service, "<br />");
                $this->excel->getActiveSheet()->getRowDimension(($key + $indexrow + 3))->setRowHeight(($height_line + 1) * 21);

                $height_line = substr_count($value_r->rec_pro, "<br />");
                $this->excel->getActiveSheet()->getRowDimension(($key + $indexrow + 4))->setRowHeight(($height_line + 1) * 21);


                $this->excel->getActiveSheet()->getStyle('A' . ($key + $indexrow) . ':' . 'N' . ($key + $indexrow + 4))->applyFromArray($styleArray);
                $indexrow += 5;
//                // print_r($value_r);
            }
        }

        // Set Data Company

        if ($company_id <> "") {
            $this->load->model('Company_m');

            $condition2['company_id'] = "'" . $company_id . "'";
            $condition2['company.flag'] = '0';
            $result_com = $this->Company_m->getCompanyDetail($condition2);
            $result_com = $result_com[0];




            $this->excel->getActiveSheet()->setCellValue('B2', $result_com->company_code);
            $this->excel->getActiveSheet()->setCellValue('B3', $this->expandWord($result_com->name));
            $this->excel->getActiveSheet()->setCellValue('B4', $this->expandWord($result_com->address));
            $this->excel->getActiveSheet()->setCellValue('B5', $this->expandWord($result_com->business));
            $this->excel->getActiveSheet()->setCellValue('B6', $this->expandWord($result_com->process));
            $this->excel->getActiveSheet()->setCellValue('B7', $this->expandWord($result_com->background));
            $this->excel->getActiveSheet()->setCellValue('I2', $this->expandWord($result_com->Aname));
            $this->excel->getActiveSheet()->setCellValue('I3', $this->expandWord($result_com->Dname));
            $this->excel->getActiveSheet()->setCellValue('I4', $this->expandWord($result_com->d_contact));
            $this->excel->getActiveSheet()->setCellValue('I5', $this->expandWord($result_com->c_contact));
            $this->excel->getActiveSheet()->setCellValue('I6', $this->expandWord($result_com->machine));
            $this->excel->getActiveSheet()->setCellValue('I7', $this->expandWord($result_com->current_product));

            $max_line6 = $this->compareMax(substr_count($result_com->machine, "<br />"), substr_count($result_com->process, "<br />"));
            $this->excel->getActiveSheet()->getRowDimension('6')->setRowHeight(($max_line6 + 1) * 21);

            $max_line5 = $this->compareMax(substr_count($result_com->business, "<br />"), substr_count($result_com->c_contact, "<br />"));
            $this->excel->getActiveSheet()->getRowDimension('5')->setRowHeight(($max_line5 + 1) * 21);

            $max_line7 = $this->compareMax(substr_count($result_com->background, "<br />"), substr_count($result_com->current_product, "<br />"));
            $this->excel->getActiveSheet()->getRowDimension('7')->setRowHeight(($max_line7 + 1) * 21);
        }


        $this->excel->getActiveSheet()->getStyle('A1:N' . ($indexrow + 4))->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getStyle('A1:N' . ($indexrow + 4))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
        $this->excel->getActiveSheet()->getStyle('A1:N' . ($indexrow + 4))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        



        $filename = 'ReportPTT.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

    public function expandWord($word) {
        $str_replace = str_replace("<br />", " ", $word);
        $str_replace = str_replace("&nbsp;", " ", $str_replace);
        $str_replace = str_replace("<p>", "", $str_replace);
        $str_replace = str_replace("</p>", "", $str_replace);
        $str_replace = str_replace("</p>", "", $str_replace);
        $str_replace = str_replace("&gt;", ">", $str_replace);
        $str_replace = str_replace("&lt;", "<", $str_replace);
        $str_replace = strip_tags($str_replace);
        return $str_replace;
    }

    public function splitTeam($word) {
        $str_replace = str_replace(",", "\n", $word);
        return $str_replace;
    }

    public function compareMax($x, $y) {
        if ($x > $y)
            return $x;
        else
            return $y;
    }

    public function Eexcel() {




        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        //set cell A1 content with some text

        $this->excel->getActiveSheet()->setCellValue('A4', 'S.No.');
        $this->excel->getActiveSheet()->setCellValue('B4', 'Country Code');
        $this->excel->getActiveSheet()->setCellValue('C4', 'Country Name');
        //merge cell A1 until C1
        //set aligment to center for that merged cell (A1 to C1)
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
        for ($col = ord('A'); $col <= ord('C'); $col++) {
            //set column dimension
            $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
            //change the font size
            $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

            $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }



        $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $filename = 'ReportPTT.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

    public function testSendArray($vis_id_list = null) {


        print_r($vis_id_list);
    }

}
