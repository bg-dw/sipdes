<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pembayaran extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_penawaran');
		$this->load->model('M_pembayaran');
		if($this->session->userdata('log_in') != TRUE){
			$url=base_url();
			redirect($url);
		} 
	}
//spp
	public function index()	{
		$th = $this->session->userdata('periode_aktif');
	    $data['daftar'] = $this->M_pembayaran->get_daftar_pembayaran($th);
    	$data['content']= "page/spem/V_daftar_pembayaran";
		$this->load->view('page/Main',$data);
	}
	public function tambah_spp($id_rab,$id_kg,$lokasi_kg){
		$lokasi = urldecode($lokasi_kg);
	    $data['total_pembayaran'] = $this->M_pembayaran->count_pembayaran($id_rab);
	    $data['total_kwt'] = $this->M_pembayaran->count_kwt($id_rab);
	    $data['penawaran'] = $this->M_pembayaran->get_p_pembayaran($id_rab,$id_kg,$lokasi);
    	$data['content']= "page/spem/V_tambah_pembayaran";
		$this->load->view('page/Main',$data);
	}
	public function ac_input_pembayaran(){
		$status=7;
		$id = $this->input->post('id_detail_kg');
		$nomor = $this->input->post('nomor');
		$date = date('Y-m-d',strtotime($_POST['date']));
		$id_bahan_kwt = $this->input->post('id_bahan');
		$nomor_kwt = $this->input->post('nomor_kwt');
		$harga_kwt = $this->input->post('harga_kwt');
		$x= count($nomor_kwt);
		$data_update = array(
			'status_kg' =>$status
		);
		$where = "id_detail_kg ='".$id."'";
		$this->M_penawaran->update_data($where,$data_update,'tbl_detail_kegiatan_rab');
	    $data = array(
	      'nomor_spp'=>$nomor,
	      'tgl_spp'=>$date
	    );
	    $this->M_penawaran->update_data($where,$data,'tbl_perjanjian');
	    for($i=0;$i<$x;$i++){
		    $data = array(
		      'nomor_kwt'=>$nomor_kwt[$i],
		      'harga_kwt'=>$harga_kwt[$i]
		    );
			$where = "id_detail_kg ='".$id."' and id_bahan='".$id_bahan_kwt[$i]."'";
		    $this->M_penawaran->update_data($where,$data,'tbl_detail_rab');
	    };
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_pembayaran/');
	}
	public function edit_pembayaran($id_rab,$id_kg,$lokasi_kg){
		$lokasi = urldecode($lokasi_kg);
	    $data['pembayaran'] = $this->M_pembayaran->get_edit_pembayaran($id_rab,$id_kg,$lokasi);
    	$data['content']= "page/spem/V_edit_pembayaran";
		$this->load->view('page/Main',$data);
	}
	public function ac_edit_pembayaran(){
		$status=7;
		$id = $this->input->post('id_detail_kg');
		$id_pj = $this->input->post('id_pj');
		$id_bahan_kwt = $this->input->post('id_bahan');
		$date = date('Y-m-d',strtotime($_POST['date']));
		$nomor_kwt = $this->input->post('nomor_kwt');
		$x= count($nomor_kwt);
		$data_update = array(
			'status_kg' =>$status
		);
		$where = "id_detail_kg ='".$id."'";
		$this->M_penawaran->update_data($where,$data_update,'tbl_detail_kegiatan_rab');
	    $data = array(
	      'tgl_spp'=>$date
	    );
		$where = "id_pj ='".$id_pj."'";
	    $this->M_penawaran->update_data($where,$data,'tbl_perjanjian');
	    for($i=0;$i<$x;$i++){
		    $data = array(
		      'nomor_kwt'=>$nomor_kwt[$i]
		    );
			$where = "id_detail_kg ='".$id."' and id_bahan='".$id_bahan_kwt[$i]."'";
		    $this->M_penawaran->update_data($where,$data,'tbl_detail_rab');
	    };
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_pembayaran/');
	}
	public function ubah_status_pembayaran($id_detail,$status){
		$where = "id_detail_kg='".$id_detail."'";
	    $data = array(
	      'status_kg'=>$status
	    );
	    $this->M_penawaran->update_data($where,$data,'tbl_detail_kegiatan_rab');
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_pembayaran/');
	}
	public function rincian_pembayaran($id_rab,$id_kg,$lokasi_kg){
		$th = $this->session->userdata('periode_aktif');
		$lokasi = urldecode($lokasi_kg);
	    $data['ttd'] = $this->M_pembayaran->get_ttd($th);
	    $data['pembayaran'] = $this->M_pembayaran->get_isi_pembayaran($id_rab,$id_kg,$lokasi);
    	$data['content']= "page/spem/V_isi_pembayaran";
		$this->load->view('page/Main',$data);
	}
//pernyataan
	public function daftar_pernyataan(){
		$th = $this->session->userdata('periode_aktif');
	    $data['rab'] = $this->M_pembayaran->get_daftar_pernyataan($th);
    	$data['content']= "page/spem/V_daftar_pernyataan";
		$this->load->view('page/Main',$data);
	}
	function tambah_pernyataan($id,$id_kg,$lokasi_kg){
		$th = $this->session->userdata('periode_aktif');
		$lokasi = urldecode($lokasi_kg);
		$data['pk'] = $this->M_pembayaran->get_pk($th);
	    $data['isi'] = $this->M_pembayaran->get_sptb($id,$id_kg,$lokasi);
    	$data['content']= "page/spem/V_tambah_pernyataan";
		$this->load->view('page/Main',$data);
	}
	public function set_pernyataan(){
		$status_kg=12;
		$id = $this->input->post('id_detail_kg');
		$id_us = $this->input->post('id_us');
		$data = array(
			'status_kg' =>$status_kg,
			'id_user' =>$id_us
		);
		$where = "id_detail_kg ='".$id."'";
	    $this->M_penawaran->update_data($where,$data,'tbl_detail_kegiatan_rab');
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_pembayaran/daftar_pernyataan');
	}
	public function rincian_pernyataan($id_rab,$id_kg,$lokasi_kg){
		$lokasi = urldecode($lokasi_kg);
	    $data['isi'] = $this->M_pembayaran->get_rincian_sptb($id_rab,$id_kg,$lokasi);
	    $data['isi_kel_bahan'] = $this->M_pembayaran->get_kel_belanja($id_rab,$id_kg,$lokasi);
    	$data['content']= "page/spem/V_isi_pernyataan";
		$this->load->view('page/Main',$data);
	}
//bukti pencairan
	public function daftar_bukti_spp(){
		$th = $this->session->userdata('periode_aktif');
	    $data['rab'] = $this->M_pembayaran->get_daftar_bukti($th);
    	$data['content']= "page/spem/V_daftar_bukti_spp";
		$this->load->view('page/Main',$data);
	}
	function tambah_bukti($id_rab,$id_kg,$lokasi_kg){
		$lokasi = urldecode($lokasi_kg);
	    $data['total_bp'] = $this->M_pembayaran->count_bp_spp($id_rab);
	    $data['isi'] = $this->M_pembayaran->get_pembayaran($id_rab,$id_kg,$lokasi);
	    $data['isi_kel_bahan'] = $this->M_pembayaran->get_kel_belanja($id_rab,$id_kg,$lokasi);
    	$data['content']= "page/spem/V_tambah_bukti";
		$this->load->view('page/Main',$data);
	}
	public function ac_input_bukti(){
		$status=13;
		$id_detail_kg = $this->input->post('id_detail_kg');
		$id_pj = $this->input->post('id_pj');
		$nomor = $this->input->post('nomor');
		$tipe = $this->input->post('pembayaran');
		$data_update = array(
			'status_kg' =>$status
		);
		$where = "id_detail_kg ='".$id_detail_kg."'";
		$this->M_penawaran->update_data($where,$data_update,'tbl_detail_kegiatan_rab');
	    $data = array(
	      'id_pj'=>$id_pj,
	      'nomor_bp'=>$nomor,
	      'tipe_pembayaran'=>$tipe
	    );
	    $this->M_penawaran->input_data($data,'tbl_bp_spp');
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_pembayaran/daftar_bukti_spp');
	}
	function edit_bukti($id_rab,$id_kg,$lokasi_kg){
		$lokasi = urldecode($lokasi_kg);
	    $data['isi_kel_bahan'] = $this->M_pembayaran->get_kel_belanja($id_rab,$id_kg,$lokasi);
	    $data['isi'] = $this->M_pembayaran->get_edit_bukti($id_rab,$id_kg,$lokasi);
    	$data['content']= "page/spem/V_edit_bukti";
		$this->load->view('page/Main',$data);
	}
	public function ac_edit_bukti(){
		$id_bp = $this->input->post('id_bp');
		$nomor = $this->input->post('nomor');
		$tipe = $this->input->post('pembayaran');
	    $data = array(
	      'nomor_bp'=>$nomor,
	      'tipe_pembayaran'=>$tipe
	    );
		$where = "id_bp ='".$id_bp."'";
		$this->M_penawaran->update_data($where,$data,'tbl_bp_spp');
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_pembayaran/daftar_bukti_spp');
	}
	public function rincian_bukti($id_rab,$id_kg,$lokasi_kg){
		$th = $this->session->userdata('periode_aktif');
		$lokasi = urldecode($lokasi_kg);
		$data['ttd'] = $this->M_pembayaran->get_ttd_bukti($th);
	    $data['isi_kel_bahan'] = $this->M_pembayaran->get_kel_belanja($id_rab,$id_kg,$lokasi);
	    $data['isi'] = $this->M_pembayaran->get_rincian_bukti($id_rab,$id_kg,$lokasi);
    	$data['content']= "page/spem/V_rincian_bukti";
		$this->load->view('page/Main',$data);
	}
	// public function isi_pernyataan($id_kg,$kd_rab){
	// 	$tgl= date('Y');
	// 	$where = "th_aktif='$tgl' and (level_us='pk' or level_us='sd' or level_us='kd') and th_aktif='".$tgl."'";
	// 	$data['ttd'] = $this->M_rab->get_ttd($where,'tbl_user')->result();
 //    	$data['rab'] = $this->M_rab->show_rab_rincian($id_kg,$kd_rab)->result();
 //    	$data['content']= "page/spem/V_isi_pernyataan";
	// 	$this->load->view('page/Main',$data);
	// }
}
