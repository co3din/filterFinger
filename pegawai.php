<?php 
	include "koneksi.php";
	
	$term = trim(strip_tags($_GET['term']));
	$query = "SELECT distinct(idpeg),namaPeg FROM pegawai where namaPeg like '%".$term."%'";
	$sql = mysql_query($query);
	
	$json = array();
	while($data =  mysql_fetch_array($sql)){
		$json[] = array(
			'value' => $data['namaPeg'],
			'label' => $data['namaPeg'],
			'idpegawai' => $data['idpeg']
		); 
	}
	
	echo json_encode($json);
?>