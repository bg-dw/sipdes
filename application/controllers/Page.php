<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_rab');
		$this->load->model('M_page');
		if($this->session->userdata('log_in') != TRUE){
			$url=base_url();
			redirect($url);
		} 
	}

	public function index()
	{
		$th = $this->session->userdata('periode_aktif');
        $data['content']= "page/Beranda";
		$data['rab'] = $this->M_rab->daftar_kegiatan_th($th); 
    	$data['total_anggaran'] = $this->M_page->nilai_rab($th);
    	$data['rab_kegiatan'] = $this->M_page->nilai_kegiatan($th);
    	$tamp; $tamp[0]=0; $i=0;$j=0;$a=0; 
    	foreach($data['rab_kegiatan'] as $l){
            $a+=$l->jumlah_bahan_kg * $l->harga_bahan;
            $tamp[$i]=$a;
        } 
        $data['isi']=$tamp;
		$this->load->view('page/Main',$data);
	}
}
