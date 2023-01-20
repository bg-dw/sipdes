<?php
    class M_pembayaran extends CI_Model {
    	public function __construct(){
            parent::__construct();
            $this->load->database();
        }
        //result(); jika mengambil data dari database
        public function input_data($data,$table){
            $this->db->insert($table,$data);
        }
        public function edit_data($where,$table){
            return $this->db->get_where($table,$where)->result();
        }
        function update_data($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
        }
        function get_daftar_pembayaran($th){
            $hasil=$this->db->query("SELECT a.id_rab,b.id_kg,b.nama_kg,c.lokasi_kg,c.status_kg,d.id_pn from tbl_rab a join tbl_kegiatan b join tbl_detail_kegiatan_rab c join tbl_permintaan_penawaran d on a.id_rab=c.id_rab and b.id_kg=c.id_kg and c.id_detail_kg=d.id_detail_kg WHERE a.periode_rab='$th'");
            return $hasil->result();
        }
        function count_pembayaran($id_rab){
            $hasil=$this->db->query("SELECT COUNT(DISTINCT a.nomor_spp) as nomor_spp FROM tbl_perjanjian a join tbl_detail_kegiatan_rab b WHERE b.id_rab='$id_rab' and a.nomor_spp!=''")->result();
            return $hasil;
        }
        function count_kwt($id_rab){
            $hasil=$this->db->query("SELECT COUNT(DISTINCT a.nomor_kwt) as nomor_kwt FROM tbl_detail_rab a join tbl_detail_kegiatan_rab b join tbl_rab c ON a.id_detail_kg=b.id_detail_kg and b.id_rab=c.id_rab WHERE b.id_rab='$id_rab' and a.nomor_kwt!=''")->result();
            return $hasil;
        }
        function get_p_pembayaran($id_rab,$id_kg,$lokasi){
            $hasil=$this->db->query("SELECT a.id_pj,c.id_bahan,c.nama_bahan,c.satuan_bahan,d.id_pn,e.nama_kg,f.jumlah_bahan_kg,f.harga_bahan_kg,f.harga_bahan_perjanjian,g.id_detail_kg,g.lokasi_kg from tbl_perjanjian a join tbl_rab b join tbl_bahan c join tbl_permintaan_penawaran d join tbl_kegiatan e join tbl_detail_rab f join tbl_detail_kegiatan_rab g ON a.id_detail_kg=g.id_detail_kg and b.id_rab=g.id_rab and c.id_bahan=f.id_bahan and d.id_detail_kg=g.id_detail_kg and e.id_kg=g.id_kg and f.id_detail_kg=g.id_detail_kg where g.id_rab='$id_rab' and g.id_kg='$id_kg' and g.lokasi_kg='$lokasi'")->result();
            return $hasil;
        }

        function get_edit_pembayaran($id_rab,$id_kg,$lokasi){
            $hasil=$this->db->query("SELECT a.id_pj,a.nomor_spp,a.tgl_spp,c.id_bahan,c.nama_bahan,c.satuan_bahan,d.id_pn,e.nama_kg,f.jumlah_bahan_kg,f.harga_bahan_kg,f.harga_bahan_perjanjian,f.nomor_kwt,g.id_detail_kg,g.lokasi_kg from tbl_perjanjian a join tbl_rab b join tbl_bahan c join tbl_permintaan_penawaran d join tbl_kegiatan e join tbl_detail_rab f join tbl_detail_kegiatan_rab g ON a.id_detail_kg=g.id_detail_kg and b.id_rab=g.id_rab and c.id_bahan=f.id_bahan and d.id_detail_kg=g.id_detail_kg and e.id_kg=g.id_kg and f.id_detail_kg=g.id_detail_kg where g.id_rab='$id_rab' and g.id_kg='$id_kg' and g.lokasi_kg='$lokasi'")->result();
            return $hasil;
        }
        public function get_ttd($th){
            $hasil=$this->db->query("SELECT nama_us,level_us FROM tbl_user where level_us='kd' or level_us='sd' or level_us='bd' or level_us='pk' and th_aktif='$th'");
            return $hasil->result();
        }
        function get_isi_pembayaran($id_rab,$id_kg,$lokasi){
            $hasil=$this->db->query("SELECT a.id_pj,a.nomor_spp,a.tgl_spp,b.id_rab,b.periode_rab,c.nama_bahan,c.satuan_bahan,d.id_pn,e.nama_kg,e.bidang_kg,e.kd_kg,f.jumlah_bahan_kg,f.harga_bahan_kg,f.harga_bahan_perjanjian,f.nomor_kwt,f.harga_kwt,g.id_kg,g.id_detail_kg,g.lokasi_kg,g.keluaran_kg,g.waktu_pelaksanaan,g.status_kg,i.id_kel_bahan,i.kel_bahan from tbl_perjanjian a join tbl_rab b join tbl_bahan c join tbl_permintaan_penawaran d join tbl_kegiatan e join tbl_detail_rab f join tbl_detail_kegiatan_rab g join tbl_kel_bahan i ON a.id_detail_kg=g.id_detail_kg and b.id_rab=g.id_rab and c.id_bahan=f.id_bahan and d.id_detail_kg=g.id_detail_kg and e.id_kg=g.id_kg and f.id_detail_kg=g.id_detail_kg and i.id_kel_bahan=c.id_kel_bahan where g.id_rab='$id_rab' and g.id_kg='$id_kg' and g.lokasi_kg='$lokasi'")->result();
            return $hasil;
        }

    //pernyataan

        function get_daftar_pernyataan($th){
            $hasil=$this->db->query("SELECT a.id_rab,b.id_kg,b.nama_kg,c.lokasi_kg,c.status_kg,d.id_pn from tbl_rab a join tbl_kegiatan b join tbl_detail_kegiatan_rab c join tbl_permintaan_penawaran d on a.id_rab=c.id_rab and b.id_kg=c.id_kg and c.id_detail_kg=d.id_detail_kg WHERE a.periode_rab='$th'");
            return $hasil->result();
        }
        public function get_pk($th){
            $hasil=$this->db->query("SELECT id_user,nama_us,level_us FROM tbl_user where level_us='pk' and th_aktif='$th'");
            return $hasil->result();
        }
        function get_sptb($id_rab,$id_kg,$lokasi){
            $hasil=$this->db->query("SELECT a.id_pj,a.nomor_spp,a.tgl_spp,c.nama_bahan,c.satuan_bahan,d.id_pn,e.nama_kg,f.jumlah_bahan_kg,f.harga_bahan_perjanjian,g.id_kg,g.id_detail_kg,g.lokasi_kg from tbl_perjanjian a join tbl_rab b join tbl_bahan c join tbl_permintaan_penawaran d join tbl_kegiatan e join tbl_detail_rab f join tbl_detail_kegiatan_rab g ON a.id_detail_kg=g.id_detail_kg and b.id_rab=g.id_rab and c.id_bahan=f.id_bahan and d.id_detail_kg=g.id_detail_kg and e.id_kg=g.id_kg and f.id_detail_kg=g.id_detail_kg where g.id_rab='$id_rab' and g.id_kg='$id_kg' and g.lokasi_kg='$lokasi'");
            return $hasil->result();
        }
        function get_rincian_sptb($id_rab,$id_kg,$lokasi){
            $hasil=$this->db->query("SELECT a.bidang_kg,a.nama_kg,b.nama_us,c.kel_bahan,d.jumlah_bahan_kg,d.harga_bahan_perjanjian,g.periode_rab from tbl_kegiatan a join tbl_user b join tbl_kel_bahan c join tbl_detail_rab d join tbl_bahan e join tbl_detail_kegiatan_rab f join tbl_rab g on a.id_kg=f.id_kg and b.id_user=f.id_user and c.id_kel_bahan=e.id_kel_bahan and d.id_detail_kg=f.id_detail_kg and e.id_bahan=d.id_bahan and g.id_rab=f.id_rab where f.id_rab='$id_rab' and f.id_kg='$id_kg' and f.lokasi_kg='$lokasi'");
            return $hasil->result();
        }
        function get_kel_belanja($id_rab,$id_kg,$lokasi){
            $hasil=$this->db->query("SELECT c.kel_bahan from tbl_kegiatan a join tbl_user b join tbl_kel_bahan c join tbl_detail_rab d join tbl_bahan e join tbl_detail_kegiatan_rab f join tbl_rab g on a.id_kg=f.id_kg and b.id_user=f.id_user and c.id_kel_bahan=e.id_kel_bahan and d.id_detail_kg=f.id_detail_kg and e.id_bahan=d.id_bahan and g.id_rab=f.id_rab where f.id_rab='$id_rab' and f.id_kg='$id_kg' and f.lokasi_kg='$lokasi' GROUP BY c.kel_bahan DESC");
            return $hasil->result();
        }

    //bukti pembayaran SPP

        function get_daftar_bukti($th){
            $hasil=$this->db->query("SELECT a.id_rab,b.id_kg,b.nama_kg,c.lokasi_kg,c.status_kg,d.id_pn from tbl_rab a join tbl_kegiatan b join tbl_detail_kegiatan_rab c join tbl_permintaan_penawaran d on a.id_rab=c.id_rab and b.id_kg=c.id_kg and c.id_detail_kg=d.id_detail_kg WHERE a.periode_rab='$th'");
            return $hasil->result();
        }
        function count_bp_spp($id_rab){
            $hasil=$this->db->query("SELECT COUNT(DISTINCT a.nomor_bp) as nomor FROM tbl_bp_spp a join tbl_perjanjian b join tbl_detail_kegiatan_rab c join tbl_rab d ON a.id_pj=b.id_pj and b.id_detail_kg=c.id_detail_kg and c.id_rab=d.id_rab WHERE c.id_rab='$id_rab' and a.nomor_bp!=''")->result();
            return $hasil;
        }
        function get_pembayaran($id_rab,$id_kg,$lokasi){
            $hasil=$this->db->query("SELECT a.bidang_kg,a.nama_kg,b.nama_us,c.kel_bahan,d.jumlah_bahan_kg,d.harga_bahan_perjanjian,f.id_detail_kg,f.keluaran_kg,g.periode_rab,h.id_pj,h.nomor_spp,h.tgl_spp from tbl_kegiatan a join tbl_user b join tbl_kel_bahan c join tbl_detail_rab d join tbl_bahan e join tbl_detail_kegiatan_rab f join tbl_rab g join tbl_perjanjian h on a.id_kg=f.id_kg and b.id_user=f.id_user and c.id_kel_bahan=e.id_kel_bahan and d.id_detail_kg=f.id_detail_kg and e.id_bahan=d.id_bahan and g.id_rab=f.id_rab and h.id_detail_kg=f.id_detail_kg where f.id_rab='$id_rab' and f.id_kg='$id_kg' and f.lokasi_kg='$lokasi'");
            return $hasil->result();
        }
        function get_edit_bukti($id_rab,$id_kg,$lokasi){
            $hasil=$this->db->query("SELECT a.bidang_kg,a.nama_kg,b.nama_us,c.kel_bahan,d.jumlah_bahan_kg,d.harga_bahan_perjanjian,f.id_detail_kg,f.keluaran_kg,g.periode_rab,h.id_pj,h.nomor_spp,h.tgl_spp,i.id_bp,i.nomor_bp,i.tipe_pembayaran from tbl_kegiatan a join tbl_user b join tbl_kel_bahan c join tbl_detail_rab d join tbl_bahan e join tbl_detail_kegiatan_rab f join tbl_rab g join tbl_perjanjian h join tbl_bp_spp i on a.id_kg=f.id_kg and b.id_user=f.id_user and c.id_kel_bahan=e.id_kel_bahan and d.id_detail_kg=f.id_detail_kg and e.id_bahan=d.id_bahan and g.id_rab=f.id_rab and h.id_detail_kg=f.id_detail_kg and i.id_pj=h.id_pj where f.id_rab='$id_rab' and f.id_kg='$id_kg' and f.lokasi_kg='$lokasi'");
            return $hasil->result();
        }
        function get_rincian_bukti($id_rab,$id_kg,$lokasi){
            $hasil=$this->db->query("SELECT a.bidang_kg,a.kd_kg,a.nama_kg,b.nama_us,c.id_kel_bahan,c.kel_bahan,d.jumlah_bahan_kg,d.harga_bahan_perjanjian,f.id_detail_kg,f.keluaran_kg,g.periode_rab,h.id_pj,h.nomor_spp,h.tgl_spp,i.id_bp,i.nomor_bp,i.tipe_pembayaran from tbl_kegiatan a join tbl_user b join tbl_kel_bahan c join tbl_detail_rab d join tbl_bahan e join tbl_detail_kegiatan_rab f join tbl_rab g join tbl_perjanjian h join tbl_bp_spp i on a.id_kg=f.id_kg and b.id_user=f.id_user and c.id_kel_bahan=e.id_kel_bahan and d.id_detail_kg=f.id_detail_kg and e.id_bahan=d.id_bahan and g.id_rab=f.id_rab and h.id_detail_kg=f.id_detail_kg and i.id_pj=h.id_pj where f.id_rab='$id_rab' and f.id_kg='$id_kg' and f.lokasi_kg='$lokasi'");
            return $hasil->result();
        }
        public function get_ttd_bukti($th){
            $hasil=$this->db->query("SELECT nama_us,level_us FROM tbl_user where level_us='bd' and th_aktif='$th'");
            return $hasil->result();
        }
        // public function show_rab($th){
        //     $hasil=$this->db->query("SELECT a.id_rab,a.kd_rab,a.status,a.lokasi_rab,b.id_kg,b.nama_kg,b.keluaran_kg FROM tbl_rab a join tbl_kegiatan b ON a.id_kg=b.id_kg WHERE tahun_anggaran='$th' GROUP BY kd_rab");
        //     return $hasil->result();
        // }
        // public function show_rab_count($th){
        //     $hasil=$this->db->query("SELECT a.id_rab,a.kd_rab,a.status,a.lokasi_rab,b.id_kg,b.nama_kg,b.keluaran_kg FROM tbl_rab a join tbl_kegiatan b ON a.id_kg=b.id_kg WHERE tahun_anggaran='$th' and a.status='7' GROUP BY kd_rab");
        //     return $hasil->result();
        // }
        // public function show_rab_pembayaran($th){
        //     $hasil=$this->db->query("SELECT a.id_rab,a.kd_rab,a.status,b.id_kg,b.nama_kg,b.keluaran_kg,c.status_pembayaran FROM tbl_rab a join tbl_kegiatan b join tbl_permintaan_pembayaran c ON c.id_kg=a.id_kg and c.id_kg=b.id_kg WHERE tahun_anggaran='$th' GROUP BY c.id_kg");
        //     return $hasil->result();
        // }
        // function get_edit_sptb($id_kg){
        //     $hasil=$this->db->query("SELECT a.id_kg,a.nama_kg,b.id_bahan,b.nama_bahan,b.harga_bahan,b.satuan_bahan,c.kel_bahan,d.jumlah_bahan_rab,e.harga_total_kwt,f.id_tj,f.tgl_dibuat from tbl_kegiatan a join tbl_bahan b join tbl_kel_bahan c join tbl_rab d join tbl_kwitansi e join tbl_tanggung_jawab f ON d.id_kg=a.id_kg and d.id_bahan=b.id_bahan and b.id_kel_bahan=c.id_kel_bahan and e.id_bahan=d.id_bahan and e.id_kg=d.id_kg and f.id_kg=d.id_kg WHERE d.id_kg='$id_kg'");
        //     return $hasil->result();
        // }
        // function get_rincian_sptb($id_kg){
        //     $hasil=$this->db->query("SELECT a.id_kg,a.nama_kg,a.bidang_kg,b.id_bahan,b.nama_bahan,b.harga_bahan,b.satuan_bahan,c.kel_bahan,d.jumlah_bahan_rab,d.tahun_anggaran,e.harga_total_kwt,f.id_tj,f.tgl_dibuat from tbl_kegiatan a join tbl_bahan b join tbl_kel_bahan c join tbl_rab d join tbl_kwitansi e join tbl_tanggung_jawab f ON d.id_kg=a.id_kg and d.id_bahan=b.id_bahan and b.id_kel_bahan=c.id_kel_bahan and e.id_bahan=d.id_bahan and e.id_kg=d.id_kg and f.id_kg=d.id_kg WHERE d.id_kg='$id_kg'");
        //     return $hasil->result();
        // }
        
    }
?>