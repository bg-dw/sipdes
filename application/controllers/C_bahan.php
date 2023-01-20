<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bahan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_bahan');
		if($this->session->userdata('log_in') != TRUE){
			$url=base_url();
			redirect($url);
		} 
	}

	public function index()
	{
    	$data['content']= "page/belanja/V_bahan";
    	$data['bahan'] = $this->M_bahan->get_data_all();
		$this->load->view('page/Main',$data);
	}
	public function kel_bahan()
	{
    	$data['content']= "page/belanja/V_kel_bahan";
    	$data['kel_bahan'] = $this->M_bahan->get_data_kel();
		$this->load->view('page/Main',$data);
	}
	public function input_bahan()
	{
    	$data['content']= "page/belanja/V_tambah_bahan";
    	$data['kel_bahan'] = $this->M_bahan->get_data_kel();
		$this->load->view('page/Main',$data);
	}

	public function ac_input(){
		$x = count($_POST['data']);
		for($i=0;$i<$x;$i++){
			$data = array(
		      'nama_bahan'=>$_POST['data'][$i]['nm_bahan'],
		      'id_kel_bahan'=>$_POST['data'][$i]['kel_bahan'],
		      'satuan_bahan'=>$_POST['data'][$i]['satuan'],
		      'harga_bahan'=>$_POST['data'][$i]['harga']
		    ); 
	    	$this->M_bahan->input_data($data,'tbl_bahan');
		}
    	$this->session->set_flashdata('info','Ditambahkan!');
	    redirect('c_bahan');
	}
	public function input_kel_bahan()
	{
    	$data['title']= "Kelompok Bahan";
    	$data['content']= "page/belanja/V_tambah_kel_bahan";
		$this->load->view('page/Main',$data);
	}
	public function ac_input_kel(){
		$a = $this->input->post('kel_bahan');
		$data = array(
	      'kel_bahan'=>$a
	    ); 
    	$this->M_bahan->input_data($data,'tbl_kel_bahan');
    	$this->session->set_flashdata('info','Ditambahkan!');
	    redirect('c_bahan/kel_bahan');
	}

	public function ac_hapus(){
		$id = $this->input->post('id');
	    $a = $this->M_bahan->delete_data($id,'tbl_bahan');
	    if($a==true){
    		$this->session->set_flashdata('hapus',"Terhapus");	
	    }else{
    		$this->session->set_flashdata('warning',"Gagal! Data Telah Digunakan");
	    }
	    redirect('c_bahan');
	}
	public function ac_hapus_kel(){
		$id = $this->input->post('id');
	    $hapus = $this->M_bahan->delete_data_kel($id,'tbl_kel_bahan');
    	$this->session->set_flashdata('hapus','Dihapus!');
	    redirect('c_bahan/kel_bahan');
	}

	public function edit_bahan($id_bahan){
    	$data['title']= "Edit Bahan";
		$id = $id_bahan;
		$where = array('id_bahan'=>$id);
    	$data['content']= "page/belanja/V_edit_bahan";
		$data['bahan'] = $this->M_bahan->edit_data($where,'tbl_bahan')->result();
    	$data['kel_bahan'] = $this->M_bahan->get_data_kel();
    	$data['my_kel'] = $this->M_bahan->get_data_kel_by($id)->result();
		$this->load->view('page/Main',$data);
	}
	public function ac_edit(){
		$id = $this->input->post('id');
		$b = $this->input->post('nm_bahan');
		$c = $this->input->post('kel_bahan');
		$d = $this->input->post('satuan');
		$e = $this->input->post('harga');

		$where = array('id_bahan'=>$id);
		$data = array(
	      'nama_bahan'=>$b,
	      'id_kel_bahan'=>$c,
	      'satuan_bahan'=>$d,
	      'harga_bahan'=>$e
	    );
	    $this->M_bahan->update_data($where,$data,'tbl_bahan');
    	$this->session->set_flashdata('update','Diperbaharui!');
	    redirect('c_bahan/');
	}
	public function edit_kel_bahan($id_kel_bahan){
		$id = $id_kel_bahan;
		$where = array(
			'id_kel_bahan'=>$id
		);
    	$data['content']= "page/belanja/V_edit_kel_bahan";
		$data['kel_bahan'] = $this->M_bahan->edit_data($where,'tbl_kel_bahan')->result();
		$this->load->view('page/Main',$data);
	}
	public function ac_edit_kel(){
		$id = $this->input->post('id');
		$a = $this->input->post('kel_bahan');

		$where = array('id_kel_bahan'=>$id);
		$data = array(
	      'kel_bahan'=>$a	    
	  	);
	    $this->M_bahan->update_data($where,$data,'tbl_kel_bahan');
    	$this->session->set_flashdata('update','Diperbaharui!');
	    redirect('c_bahan/kel_bahan/');
	}
}
