<?php
function hitungData($table)
{
   $db = \config\Database::connect();
   return $db->table($table)->countAllResults();
}
// Fungsi untuk mengubah format tanggal mejadi format tanggal Indonesia
function tgl_indonesia($tgl){ 
   $tanggal = substr($tgl,8,2);
   $nama_bulan = array("Januari", "Februari", "Maret", "April", "Mei", 
           "Juni", "Juli", "Agustus", "September", 
           "Oktober", "November", "Desember");
   $bulan = $nama_bulan[substr($tgl,5,2) - 1];
   $tahun = substr($tgl,0,4);
   return $tanggal.' '.$bulan.' '.$tahun;       
}