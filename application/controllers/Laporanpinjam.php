<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporanpinjam extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model(['item_m','supplier_m','unit_m', 'pinjam_m', 'Laporanpinjam_model']);

        
    }


  

    public function index(){


        $data['row'] = $this->pinjam_m->get_pinjam_in()->result(); 
      
        $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            $transaksi = $this->Laporanpinjam_model->view_all();  // Panggil fungsi view_all yang ada di Laporanpinjam_model
            $url_cetak = 'transaksi/cetak';
            $label = 'Semua Data Transaksi';
        }else{ // Jika terisi
            $transaksi = $this->Laporanpinjam_model->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di Laporanpinjam_model
            $url_cetak = 'transaksi/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
        $data['row'] = $transaksi; 
        $data['transaksi'] = $transaksi;
        $data['url_cetak'] = base_url('index.php/'.$url_cetak);
        $data['label'] = $label;

       
        $this->template->load('template', 'semualaporan/viewlaporanpinjam', $data);
       
    }

  public function cetak(){
    $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            $transaksi = $this->Laporanpinjam_model->view_all();  // Panggil fungsi view_all yang ada di Laporanpinjam_model
            $label = 'Semua Data Transaksi';
        }else{ // Jika terisi
            $transaksi = $this->Laporanpinjam_model->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di Laporanpinjam_model
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }

        $data['label'] = $label;
        $data['transaksi'] = $transaksi;

    ob_start();
    $this->load->view('print', $data);
    $html = ob_get_contents();
        ob_end_clean();

    require './assets/libraries/html2pdf/autoload.php'; // Load plugin html2pdfnya

    $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');  // Settingan PDFnya ('P','A4','en');//setingan default e L nek ape dowo
    //setingan kedua = ('P', 'A4', 'en', false, 'UTF-8', array(10, 10, 4, 10)); sesuaikan array iku ukuran margin catetanku.by.ALX
    $pdf->WriteHTML($html);
    
    $pdf->Output('Data Supplier.pdf', 'D');
  }
}