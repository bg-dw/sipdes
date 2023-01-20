<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kas extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_kas');
		if($this->session->userdata('log_in') != TRUE){
			$url=base_url();
			redirect($url);
		} 
	}

	public function index()
	{
        $data['title']= "Kas Umum";
        $data['content']= "page/kas/V_buku_kas";
	    $data['kas'] = $this->M_kas->get_data_kas();
        $this->load->view('page/Main',$data);
	}
	public function input_kas()
	{
	    $data['transaksi'] = $this->M_kas->get_transaksi_terakhir();
        $data['content']= "page/kas/V_buat_kas";
        $this->load->view('page/Main',$data);
	}
	public function ac_input_kas(){
		$date = date('Y-m-d',strtotime($_POST['date']));
		$kd_rek = $this->input->post('kd_rek');
		$no_bukti = $this->input->post('no_bukti');
		$tipe = $this->input->post('tipe');
		$uraian = $this->input->post('uraian');
		$jumlah = $this->input->post('jumlah');
		$kumulatif = $this->input->post('kumulatif');
		$saldo = $this->input->post('saldo');
		if($tipe=="Pengeluaran"){
			$penerimaan=0;
			$pengeluaran=$jumlah;
			$saldo_akhir=$saldo-$jumlah;
			$kumulatif_akhir=$kumulatif+$jumlah;
		}else{
			$penerimaan=$jumlah;
			$pengeluaran=0;
			$saldo_akhir=$saldo+$jumlah;
			$kumulatif_akhir=$kumulatif;
		}
		$data = array(
	      'tgl_kas'=>$date,
	      'kode_rek_kas'=>$kd_rek,
	      'uraian_kas'=>$uraian,
	      'penerimaan_kas'=>$penerimaan,
	      'pengeluaran_kas'=>$pengeluaran,
	      'no_bukti_kas'=>$no_bukti,
	      'pengeluaran_kumulatif'=>$kumulatif_akhir,
	      'saldo_kas'=>$saldo_akhir
	    ); 
	    $this->M_kas->input_data($data,'tbl_kas_umum');
    	$this->session->set_flashdata('info','Ditambahkan!');
	    redirect('c_kas/');
	}
	public function edit_kas($id){
        $data['title']= "Edit Kas Umum";
	    $data['transaksi'] = $this->M_kas->get_edit_kas($id);
        $data['content']= "page/kas/V_edit_kas";
        $this->load->view('page/Main',$data);
	}
	public function ac_edit_kas(){
		$id = $this->input->post('id_kas');
		$date = date('Y-m-d',strtotime($_POST['date']));
		$kd_rek = $this->input->post('kd_rek');
		$no_bukti = $this->input->post('no_bukti');
		$tipe = $this->input->post('tipe');
		$uraian = $this->input->post('uraian');
		$jumlah = $this->input->post('jumlah');
		$kumulatif = $this->input->post('kumulatif');
		$saldo = $this->input->post('saldo');
		if($tipe=="Pengeluaran"){
			$penerimaan=0;
			$pengeluaran=$jumlah;
		}else{
			$penerimaan=$jumlah;
			$pengeluaran=0;
		}
		$data = array(
	      'tgl_kas'=>$date,
	      'kode_rek_kas'=>$kd_rek,
	      'uraian_kas'=>$uraian,
	      'penerimaan_kas'=>$penerimaan,
	      'pengeluaran_kas'=>$pengeluaran,
	      'no_bukti_kas'=>$no_bukti,
	      'pengeluaran_kumulatif'=>$kumulatif,
	      'saldo_kas'=>$saldo
	    ); 
		$where = "id_kas='".$id."'";
	    $this->M_kas->update_data($where,$data,'tbl_kas_umum');
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_kas/');
	}
	public function rincian_kas()
	{
		$th = $this->session->userdata('periode_aktif');
	    $data['ttd'] = $this->M_kas->get_ttd($th);
		$date1 = date('Y-m-d',strtotime($_POST['date1']));
		$date2 = date('Y-m-d',strtotime($_POST['date2']));
	    $data['kas'] = $this->M_kas->get_kas_by($date1,$date2);
        $data['content']= "page/kas/V_rincian_kas";
        $this->load->view('page/Main',$data);
	}

}
