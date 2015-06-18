<?php 
	include "koneksi.php";
	
	//bersihkan atau truncate table  tbllog_buffer_pegawai_masuk dan pulang
	mysql_query("truncate tbllog_buffer_pegawai_masuk");
	mysql_query("truncate tbllog_buffer_pegawai_pulang");
	
	
	$mulai = $_POST['mulai'];
	$selesai = $_POST['selesai'];
	$pegawai = $_POST['pegawai'];
	
	$query_masuk = "SELECT  a.tbllogbuffer_id,a.tbllogbuffer_mhsNiu,b.namaPeg,a.tbllogbuffer_tgl,a.tbllogbuffer_jam 
				FROM tbllog_buffer_pegawai a JOIN pegawai b
				ON a.tbllogbuffer_mhsNiu = b.idpeg WHERE a.tbllogbuffer_tgl BETWEEN '".$mulai."' AND '".$selesai."' AND
				b.idpeg = ".$pegawai." AND a.tbllogbuffer_jam < 120000 GROUP BY a.tbllogbuffer_tgl";
				
	$query_pulang = "SELECT  a.tbllogbuffer_id,a.tbllogbuffer_mhsNiu,b.namaPeg,a.tbllogbuffer_tgl,a.tbllogbuffer_jam 
				FROM tbllog_buffer_pegawai a JOIN pegawai b
				ON a.tbllogbuffer_mhsNiu = b.idpeg WHERE a.tbllogbuffer_tgl BETWEEN '".$mulai."' AND '".$selesai."' AND
				b.idpeg = ".$pegawai." AND a.tbllogbuffer_jam > 120000 GROUP BY a.tbllogbuffer_tgl";			
				
			
	$exesql_masuk = mysql_query($query_masuk);
	while ($data = mysql_fetch_array($exesql_masuk)){
			$query_insert = "insert 
				into tbllog_buffer_pegawai_masuk(tbllogbuffer_mhsNiu,tbllogbuffer_tgl,tbllogbuffer_jam)
				values
				(".$data['tbllogbuffer_mhsNiu'].",'".$data['tbllogbuffer_tgl']."','".$data['tbllogbuffer_jam']."')";
				
			mysql_query($query_insert);	
	}
	
	
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
	
	//query rekap sidik jari
	$sql_rekap_finger = "SELECT a.tbllogbuffer_mhsNiu AS nip_pegawai,
	a.tbllogbuffer_tgl AS tanggal,
	 a.tbllogbuffer_jam AS jam_masuk ,
	  b.namaPeg AS nama_pegawai,
	  (SELECT tbllog_buffer_pegawai_pulang.tbllogbuffer_jam FROM tbllog_buffer_pegawai_pulang WHERE tbllog_buffer_pegawai_pulang.tbllogbuffer_tgl = a.tbllogbuffer_tgl ) AS jam_pulang,
	  TIMEDIFF(c.toleransiMasuk,a.tbllogbuffer_jam) AS menit_datang,
	  TIMEDIFF((SELECT tbllog_buffer_pegawai_pulang.tbllogbuffer_jam FROM tbllog_buffer_pegawai_pulang WHERE tbllog_buffer_pegawai_pulang.tbllogbuffer_tgl = a.tbllogbuffer_tgl ),c.jamPulang) AS menit_pulang,
	  CASE 
	  WHEN TIMEDIFF(c.toleransiMasuk,a.tbllogbuffer_jam)<0 THEN 'Tidak Tertib'
	   WHEN ISNULL(TIMEDIFF(c.toleransiMasuk,a.tbllogbuffer_jam)) THEN 'Tidak Finger' 
	   ELSE 'Tertib' END AS keterangan_masuk,
	   CASE 
	  WHEN TIMEDIFF((SELECT tbllog_buffer_pegawai_pulang.tbllogbuffer_jam FROM tbllog_buffer_pegawai_pulang WHERE tbllog_buffer_pegawai_pulang.tbllogbuffer_tgl = a.tbllogbuffer_tgl ),c.jamPulang)<0 THEN 'Tidak Tertib'
	   WHEN ISNULL(TIMEDIFF((SELECT tbllog_buffer_pegawai_pulang.tbllogbuffer_jam FROM tbllog_buffer_pegawai_pulang WHERE tbllog_buffer_pegawai_pulang.tbllogbuffer_tgl = a.tbllogbuffer_tgl ),c.jamPulang)) THEN 'Tidak Finger' 
	   ELSE 'Tertib' END AS keterangan_pulang
	   FROM tbllog_buffer_pegawai_masuk a JOIN pegawai b
ON a.tbllogbuffer_mhsNiu = b.idPeg JOIN jam_shift_pegawai c
ON b.shift = c.shiftPegId
GROUP BY a.tbllogbuffer_tgl";
		
		$exe_sql_rekap = mysql_query($sql_rekap_finger);
		
		$json_rekap = array();
		while($data_rekap = mysql_fetch_array($exe_sql_rekap)){
			$json_rekap[] = array(
				'nip_pegawai'=>$data_rekap['nip_pegawai'],
				'tanggal'=>tgl_indo($data_rekap['tanggal']),
				'jam_masuk'=>$data_rekap['jam_masuk'],
				'jam_pulang'=>$data_rekap['jam_pulang'],
				'nama_pegawai'=>$data_rekap['nama_pegawai'],
				'menit_datang'=>$data_rekap['menit_datang'],
				'menit_pulang'=>$data_rekap['menit_pulang'],
				'keterangan_masuk'=>$data_rekap['keterangan_masuk'],
				'keterangan_pulang'=>$data_rekap['keterangan_pulang'],
			);
		}
		
		echo json_encode($json_rekap);
	
	
?>