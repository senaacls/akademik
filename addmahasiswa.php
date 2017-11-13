<?php require_once("config.php"); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Mahasiswa</title>
	
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet">
	<link href="plugins/bootstrap/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
	
	<script src="plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/bootstrap/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  </head>
  <body>
<div class="container">
<br /> <br />
      
	
<div class="row">
  <div class="col-md-8">
    <div class="panel panel-info">
      <div class="panel-heading">Form Mahasiswa</div>
      <div class="panel-body">
		<form class="form-horizontal" method="post" action="simpan.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-4 control-label" for="nim">Nim</label>
			<div class="col-sm-6">
				<input id="nim" type="text" class="form-control" name="nim" placeholder="nim">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-4 control-label" for="nama">Nama</label>
			<div class="col-sm-6">
				<input id="nama" type="text" class="form-control" name="nama" placeholder="nama">
			</div>
		</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="alamat">Alamat</label>
					<div class="col-sm-6">
						<textarea id="alamat" type="text" class="form-control" name="alamat" placeholder="alamat"></textarea>
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
				
		<div class="form-group">
			<label class="col-sm-4 control-label" for="fakultas">Fakultas</label>
			<div class="col-sm-6">
				<select name="fakultas" id="fakultas" class="form-control">
					 <option value="Teknik Informatika">Teknik Informatika</option>
					  <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-4 control-label" for="foto">Foto</label>
			<div class="col-sm-6">
				<input class="input-group" type="file" name="foto" />
			</div>
		</div>
			
		<div class="col-md-12 text-center"> 
			<input type="submit" id="simpan" name="simpan" class="btn btn-success" value="Simpan" />
			<input type="button" id="clear" name="clear" class="btn btn-primary" value="Cancel">
		</div>
		</form>
	  </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
 $(document).on("click","#clear",function(){ 
    $('[type="text"]').val('');
 });
</script>
</body>
</html>