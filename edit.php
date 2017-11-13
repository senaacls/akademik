<?php
include("config.php");
$nim = $_GET['nim'];
$result = getdata($nim);

if(isset($_POST['simpan']))
{
	$nim 			= htmlentities($_POST['nim']);
	$nama 			= htmlentities($_POST['nama']);
	$alamat 		= htmlentities($_POST['alamat']);
	$gender			= htmlentities($_POST['gender']);
	$fakultas 		= htmlentities($_POST['fakultas']);
	
	$result = changedata($nim,$nama,$alamat,$gender,$fakultas);
	header("location: mahasiswa.php");
}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Mahasiswa</title>
	
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet">
	<link href="plugins/bootstrap/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
	
	<script src="plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/bootstrap/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  </head>
  <body>
 <body>
<div class="container">
<br /> <br />

<div class="row">
  <div class="col-md-8">
    <div class="panel panel-info">
      <div class="panel-heading">Update Form</div>
      <div class="panel-body">
		<form class="form-horizontal" name="form-berobat" method="post" action="">
		<div class="form-group">
			<label class="col-sm-4 control-label" for="nim">Nim</label>
			<div class="col-sm-6">
				<input id="nim" type="text" class="form-control" name="nim" placeholder="nim" value="<?php echo $nim; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label" for="nama">Nama</label>
			<div class="col-sm-6">
				<input id="nama" type="text" class="form-control" name="nama" placeholder="nama" value="<?php echo $result['nama']; ?>">
			</div>
		</div>
		<div class="form-group">
					<label class="col-sm-4 control-label" for="alamat">Alamat</label>
					<div class="col-sm-6">
						<textarea id="alamat" type="text" class="form-control" name="alamat" placeholder="alamat"><?php echo $result['alamat']; ?></textarea>
					</div>
				</div>
		<div class="form-group">
			<label class="col-sm-4 control-label" for="fakultas">Fakultas</label>
			<div class="col-sm-6">
				<select name="fakultas" id="fakultas" class="form-control">
					<?php
						$stmt = listmahasiswa();
						foreach ($stmt as $row) 
						{
							$selected = ($row['nim'] == $nim ) ? ' selected' : '';
							echo "<option value='" . $row['fakultas'] . "'" . $selected . ">" . $row['fakultas'] . "</option>";
						}
					?>
      
				</select>
			</div>
		</div>
		
		<div class="form-group">
      <label class="col-sm-4 control-label" for="gender" >Gender</label>
	  <div class="col-sm-6">
	  <div class="radio">
  <label><input type="radio" name="gender" id="gender" value="L">Male</label>
  <label><input type="radio" name="gender" id="gender" value="P">Female</label>
</div>
    </div>
	</div>
				
		<div class="col-md-12 text-center"> 
			<button id="simpan" name="simpan" class="btn btn-success">Save</button> 
			<input type="button" id="clear" name="clear" class="btn btn-primary" value="Cancel">
		</div>
		</form>
		</div>
	</div>
</div>
<div>
</div>
<script type="text/javascript">

$(document).on("click","#clear",function(){ 
    $('[type="text"]').val('');
 });
</script>
  </body>
</html>