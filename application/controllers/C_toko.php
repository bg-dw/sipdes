<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_toko extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_toko');
		if($this->session->userdata('log_in') != TRUE){
			$url=base_url();
			redirect($url);
		} 
	}

	public function index(){
    	$data['content']= "page/toko/V_toko";
    	$data['toko'] = $this->M_toko->get_data();
		$this->load->view('page/Main',$data);
	}
	public function ac_input(){
		$a = $this->input->post('nt');
		$b = $this->input->post('np');
		$c = $this->input->post('alamat');
		$data = array(
	      'nama_toko'=>$a,
	      'pemilik_toko'=>$b,
	      'alamat_toko'=>$c
	    );
	    $this->M_toko->input_data($data,'tbl_toko');
    	$this->session->set_flashdata('info','Ditambahkan!');
    	redirect('c_toko/');
    }
	public function ac_edit(){
		$id = $this->input->post('id');
		$a = $this->input->post('nt');
		$b = $this->input->post('np');
		$c = $this->input->post('alamat');
		$where = "id_toko='".$id."'";
		$data = array(
	      'nama_toko'=>$a,
	      'pemilik_toko'=>$b,
	      'alamat_toko'=>$c
	    );
	    $this->M_toko->update_data($where,$data,'tbl_toko');
    	$this->session->set_flashdata('info','Disimpan!');
    	redirect('c_toko/');
    }
	public function ac_hapus(){
		$id = $this->input->post('id');
	    $this->M_toko->hapus_data($id);
    	$this->session->set_flashdata('info','Terhapus!');
    	redirect('c_toko/');
    }
}