<?php
    function indo($date){
      $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
     
      $tahun = substr($date, 6, 4);
      $bulan = substr($date, 0, 2);
      $tgl   = substr($date, 3, 2);
     
      $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
      return($result);
    }
    function indo_mysql($date){
      $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
     
      $tahun = substr($date, 0, 4);
      $bulan = substr($date, 5, 2);
      $tgl   = substr($date, 8, 2);
     
      $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
      return($result);
    }

    function indo_php($date){
      $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
     
      $tgl   = substr($date, 0, 2);
      $bulan = substr($date, 3, 2);
      $tahun = substr($date, 6, 4);
     
      $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
      return($result);
    }
  ?>