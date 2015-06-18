<?php 
	include "koneksi.php";
	//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	//bersihkan atau truncate table  tbllog_buffer_pegawai_masuk dan pulang
	
	
	$nama = $_POST['nama'];
	$umur = $_POST['umur'];
	$jnskel = $_POST['jnskel'];
	$query_insert = "insert into case_base_tmp(caseNama,caseUmur,caseSex)
				values('$nama','$umur','$jnskel')";
	$exesql_masuk = mysql_query($query_insert);
     

	$explode = explode(',',$jnskel);
			print_r($jnskel);
for ($i=0; $i<count($explode);$i++) {
$query="INSERT INTO case_base_tumor_tmp (caseBaseGejala) VALUES ('".$explode[$i]."')";
mysql_query($query) or die ('Error updating database');
//echo "Record is inserted.";
}
	/**
	$exesql_pulang = mysql_query($query_pulang);
	while($datax = mysql_fetch_array($exesql_pulang)){
			$query_insert_pulang = "insert 
				into tbllog_buffer_pegawai_pulang(tbllogbuffer_mhsNiu,tbllogbuffer_tgl,tbllogbuffer_jam)
				values
				(".$datax['tbllogbuffer_mhsNiu'].",'".$datax['tbllogbuffer_tgl']."','".$datax['tbllogbuffer_jam']."')";
			mysql_query($query_insert_pulang);	
	
	}
	
	//fungsi bulan indo
	function bulan($bln){
        switch ($bln){
            case 1: return "Januari"; break;
            case 2: return "Februari"; break;
            case 3: return "Maret"; break;
            case 4: return "April"; break;
            case 5: return "Mei"; break;
            case 6: return "Juni"; break;
            case 7: return "Juli"; break;
            case 8: return "Agustus"; break;
            case 9: return "September"; break;
            case 10: return "Oktober"; break;
            case 11: return "November"; break;
            case 12: return "Desember"; break;
                    
        }
    }
	function tgl_indo($tgl){
        $ubah = gmdate($tgl,time()+60*60*8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun;
    }
	**/
	//query rekap sidik jari
	/*$sql_rekap_finger = "SELECT
case_base.caseId,
case_base.casKode,
case_base.caseNama,
case_base.caseUmur,
case_base.caseSex,
case_base.casLamaKeluhan,
case_base.caseOrgan,
case_base.caseTumorId,
case_base.caseSolution,
case_base.caseDes,
case_base.dateVisit,
case_base.caseStatus
FROM
case_base";
		
		$exe_sql_rekap = mysql_query($sql_rekap_finger);
		
		$json_rekap = array();
		while($data_rekap = mysql_fetch_array($exe_sql_rekap)){
			$json_rekap[] = array(
				'nip_pegawai'=>$data_rekap['caseId'],
				'tanggal'=>($data_rekap['casKode']),
				'jam_masuk'=>$data_rekap['caseNama'],
				'jam_pulang'=>$data_rekap['caseUmur'],
				'nama_pegawai'=>$data_rekap['caseSolution'],
				'menit_datang'=>$data_rekap['caseSolution'],
				'menit_pulang'=>$data_rekap['caseSolution'],
				'keterangan_masuk'=>$data_rekap['caseUmur'],
				'keterangan_pulang'=>$data_rekap['caseUmur'],
			);
		}
		
		echo json_encode($json_rekap);*/
	
	
?>