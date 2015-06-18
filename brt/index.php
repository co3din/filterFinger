<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>BTSelf Diagnosis System</title>

    <!-- Bootstrap core CSS -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/datepicker.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../asset/css/jumbotron.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">

  </head>
  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation" ><a href="#">Tentang Program</a></li>
            <li role="presentation" ><a href="#">Brain Tumors</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Brain Tumours  Self Diagnosis System</h3>
      </div>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3 class="panel-title">Deskripsi Pasien</h3>
		  </div>
		  <div class="panel-body">
			<form class="form-horizontal" id="form_filter">
			  <div class="form-group">
				<label for="nama" class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="nama" placeholder="Nama Anda" required="true">
				</div>
			  </div>
			  <div class="form-group">
				<label for="umur" class="col-sm-2 control-label">Umur</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="umur" placeholder="Umur Anda" required="true">
				</div>
			  </div>
			  <div class="form-group">
				<label for="jnkel" class="col-sm-2 control-label">Jenis Kelamin</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="jnskel" placeholder="" required="true">
				</div>
			  </div>
			  <div class="form-group">
				<label for="keluhan" class="col-sm-2 control-label">Lama Keluhan (Bulan)</label>
				<div class="col-sm-10">
					<input type="hidden" name="keluhan" id="keluhan">
				  <input type="text" class="form-control" id="keluhan" placeholder="Lama Sakit" required="true">
				</div>
			  </div>
			  <div class="form-group">
				<label for="sejarah" class="col-sm-2 control-label">Sejarah Masa Lalu</label>
				<div class="col-sm-10">
					<input type="hidden" name="sejarah" id="sejarah">
				  <input type="text" class="form-control" id="sejarah" placeholder="Kejadian Fisik yang pernah terjadi" required="true">
				</div>
			  </div> 
			  <hr>
			  <div class="panel panel-info">
		  <div class="panel-heading">
			<h3 class="panel-title">Keluhan yang dirasakan</h3>
		  </div>
		  </div>
<?php
    $servername='localhost';
    $username='root';
    $password='';
    $database='test';
    $koneksi=mysql_connect ($servername, $username, $password);
  if ($koneksi) {
    mysql_select_db ($database) or die ("Database Tidak Ditemukan");
     echo "";
$query_gejala="SELECT
case_gejala.tmrGejalaId,
case_gejala.tmrGejalaKode,
case_gejala.tmrGejalaNama,
case_gejala.tmrGejalaDeskripsi
FROM
case_gejala";
$result = mysql_query($query_gejala);
   } else {
     echo "<b> Koneksi Gagal </b>";
   }
   ?>
        <?php
		$a = 0;
        while($row = mysql_fetch_array($result))
            {
            if($a++ %5 == 0) echo "<tr>";
            ?>
            <td align="center"><input type="checkbox" name="myCheckboxes[]" id="myCheckboxes" value="<?php echo $row['tmrGejalaId']; ?>" /></td>
            <td style="text-align:left"><?php echo $row["tmrGejalaNama"]; ?></td>
        <?php
        if($a %5 == 0) echo "</tr>";
            }
        ?>	
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-primary" id="btn_submit">proses</button>
				</div>
			  </div>
			</form>
		  </div>
		</div>
		<div class="row marketing" id="content">
		</div>
      

      <footer class="footer">
        <p>&copy; IT Fisipol 2015</p>
      </footer>

    </div> <!-- /container -->

	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
	<script src="../asset/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tgl_mulai').datepicker({
			format: "yyyy-mm-dd",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            change: true,
            numberOfMonths: 3, showCurrentAtPos: 1
			});
			
			$('#tgl_selesai').datepicker({
			format: "yyyy-mm-dd",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            change: true,
            numberOfMonths: 1, showCurrentAtPos: 1
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#pegawai').autocomplete({
				source:'pegawai.php',
				minLength:2,
				select: function(event, ui) {
                $('#idpegawai').val(ui.item.idpegawai);
            }
			});	
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#form_filter').submit(function(){
                             /*var myCheckboxes = new Array();
                             $("input:checked").each(function() {
                              myCheckboxes.push($(this).val());
                          });*/
						  
						  var checkFasilitas = [];
							$('input[type="checkbox"]:checked').each(function(index,elem){
							checkFasilitas.push($(elem).val())
							});
							
							console.log(checkFasilitas);
			
				var nama = $('#nama').val();
				var umur = $('#umur').val();
				var jnskel = $('#gejala').val();
				
				var datanya = 'nama='+nama+'&umur='+umur+'&jnskel='+checkFasilitas;
				$.ajax({
					type:'POST',
					url:'server.php',
					data:datanya,
					chace:false,
					success:function(msg){
						msg = $.parseJSON(msg);
						var html = "<table class='table table-hover'>";
						html += "<tr>";
						html += "<th>No</th>";
						html += "<th>Pegawai</th>";
						html += "<th>Tanggal</th>";
						html += "<th>Log Masuk</th>";
						html += "<th>Menit Datang</th>";
						html += "<th>Log Pulang</th>";
						html += "<th>Menit Pulang</th>";
						html += "</tr>";
						$.each(msg,function(i,v){
							var index = i+1;
							if(v.keterangan_pulang == 'Tidak Finger'){
								$('b#ket_pulang').addClass('red');
								console.log(v.keterangan_pulang);
							}
							html += "<tr>";
							html += "<td>"+index+"</td>";
							html += "<td>"+v.nama_pegawai+"</td>";
							html += "<td>"+v.tanggal+"</td>";
							html += "<td>"+v.jam_masuk+"</td>";
							html += "<td>"+v.menit_datang+" (<b id='ket_masuk'>"+v.keterangan_masuk+"</b>)</td>";
							html += "<td>"+v.jam_pulang+"</td>";
							html += "<td>"+v.menit_pulang+" (<b id='ket_pulang'>"+v.keterangan_pulang+"</b>)</td>";
							html += "</tr>"
						});
						html += "</table>";
						$('#content').html(html);
					}
				});
				return false;
			});
		});
	</script>
	<style>
		.red{
			color:red;
		}
	</style>
  </body>
</html>