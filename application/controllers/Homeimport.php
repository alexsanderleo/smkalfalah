<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Homeimport extends CI_Controller {

    /*
    |-------------------------------------------------------------------
    | Construct
    |-------------------------------------------------------------------
    | 
    */
    function __construct()
    {
        parent::__construct();
        $this->load->model('homeimport_model');
    }

    /*
    |-------------------------------------------------------------------
    | Index
    |-------------------------------------------------------------------
    |
    */
	function index()
	{
        $data['title'] = 'Codeigniter 3 - PHPSpreadsheet';
        $data['transaction_list'] = $this->homeimport_model->fetch_transactions();

        $this->load->view('importe/frontend/homepage/header', $data);
        $this->load->view('importe/frontend/homepage/content', $data);
        $this->load->view('importe/frontend/homepage/footer', $data);
    }
    
    /*
    |-------------------------------------------------------------------
    | Import Excel
    |-------------------------------------------------------------------
    |
    */
	function import_excel()
	{
        $this->load->helper('file');

        /* Allowed MIME(s) File */
        $file_mimes = array(
            'application/octet-stream', 
            'application/vnd.ms-excel', 
            'application/x-csv', 
            'text/x-csv', 
            'text/csv', 
            'application/csv', 
            'application/excel', 
            'application/vnd.msexcel', 
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if(isset($_FILES['uploadFile']['name']) && in_array($_FILES['uploadFile']['type'], $file_mimes)) {

            $array_file = explode('.', $_FILES['uploadFile']['name']);
            $extension  = end($array_file);

            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['uploadFile']['tmp_name']);
            $sheet_data  = $spreadsheet->getActiveSheet(0)->toArray();
            $array_data  = [];

            for($i = 1; $i < count($sheet_data); $i++) {
                $data = array(
                    'name'       => $sheet_data[$i]['0'],
                    'phone'      => $sheet_data[$i]['1'],
                    'address'        => $sheet_data[$i]['2'],
                    'description'        => $sheet_data[$i]['3'],
                    'created' => $sheet_data[$i]['4']
                );
                $array_data[] = $data;
            }
            
            if($array_data != '') {
                $this->homeimport_model->insert_transaction_batch($array_data);
            }
            $this->session->set_flashdata('success', 'Data berhasil diimport');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal');
        }
        redirect('supplier');
    }

    /*
    |-------------------------------------------------------------------
    | Export Excel
    |-------------------------------------------------------------------
    |
    */
	function export_excel()
	{
        /* Data */
        $data = $this->homeimport_model->fetch_transactions();

        /* Spreadsheet Init */
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        /* Excel Header */
        $sheet->setCellValue('A1', '#');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'HP');
        $sheet->setCellValue('D1', 'Alamat');
        $sheet->setCellValue('E1', 'Deskripsi');
        $sheet->setCellValue('F1', 'Tanggale');
        
        /* Excel Data */
        $row_number = 2;
        foreach($data as $key => $row)
        {
            $sheet->setCellValue('A'.$row_number, $key+1);
            $sheet->setCellValue('B'.$row_number, $row['name']);
            $sheet->setCellValue('C'.$row_number, $row['phone']);
            $sheet->setCellValue('D'.$row_number, $row['address']);
            $sheet->setCellValue('E'.$row_number, $row['description']);
            $sheet->setCellValue('F'.$row_number, $row['created']);
        
            $row_number++;
        }

        /* Excel File Format */
        $writer = new Xlsx($spreadsheet);
        $filename = 'template-supplier';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

}
