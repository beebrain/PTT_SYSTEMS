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
class Report extends CI_Controller {

//put your code here

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_data')) {
            $this->user_login = $this->session->userdata('user_data');
        } else {
            
        }
    }
    
    public function ShowVistor(){
        
        
    }

    public function Eexcel() {
        $id = $this->input->post();
        $this->load->model('Visit_m');
        
        
        
        
        
        $this->load->library('Excel');
        
        
        
        
        
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Countries');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'Country Excel Sheet');
        $this->excel->getActiveSheet()->setCellValue('A4', 'S.No.');
        $this->excel->getActiveSheet()->setCellValue('B4', 'Country Code');
        $this->excel->getActiveSheet()->setCellValue('C4', 'Country Name');
        //merge cell A1 until C1
        $this->excel->getActiveSheet()->mergeCells('A1:C1');
        //set aligment to center for that merged cell (A1 to C1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
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
        //retrive contries table data
        $rs = $this->db->get('company');
        $exceldata = "";
        foreach ($rs->result_array() as $row) {
            $exceldata[] = $row;
        }
        //Fill data 
        $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A4');

        $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $sheet = $this->excel->getActiveSheet();

        //Start adding next sheets
        $i = 0;
        while ($i < 10) {

            // Add new sheet
            $objWorkSheet = $this->excel->createSheet($i); //Setting index when creating
            //Write cells
            $objWorkSheet->setCellValue('A1', 'Hello' . $i)
                    ->setCellValue('B2', 'world!')
                    ->setCellValue('C1', 'Hello')
                    ->setCellValue('D2', 'world!');

            // Rename sheet
            $objWorkSheet->setTitle("$i");

            $i++;
        }

        $filename = 'PHPExcelDemo.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

}
