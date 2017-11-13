<?php require_once("config.php");
if(isset($_GET['nim']))
{
	$nim = $_GET['nim'];
	$data = getdata($nim);
	var_dump($data);
	
	if($data)
	{
		$nim = $data['nim'];
		$nama = $data['nama'];
		
	}
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Matakuliah</title>
	
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
      <div class="panel-heading">Form Matakuliah</div>
      <div class="panel-body">
		<form class="form-horizontal" name="form-nilai" method="post" action="simpanniilai.php">
		<div class="form-group">
			<label class="col-sm-4 control-label" for="nim">Nim</label>
			<div class="col-sm-6">
				<input id="nim" type="text" class="form-control" name="nim" placeholder="nim" value="<?php echo $nim; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-4 control-label" for="nama">Nama</label>
			<div class="col-sm-6">
				<input id="nama" type="text" class="form-control" name="nama" placeholder="nama" value="<?php echo $nama; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-4 control-label" for="matakuliah">Mata kuliah</label>
			<div class="col-sm-6">
				<input id="matakuliah" type="text" class="form-control" name="matakuliah" placeholder="matakuliah">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-4 control-label" for="sks">sks</label>
			<div class="col-sm-6">
				<input id="sks" type="text" class="form-control" name="sks" placeholder="sks">
			</div>
		</div>
		
		<div class="form-group">
					<label class="col-sm-4 control-label" for="semester">Semester</label>
					<div class="col-sm-6">
						<select name="semester" id="semester" class="form-control">
							 <option value="I">I</option>
							  <option value="II">II</option>
							<option value="III">III</option>
							<option value="IV">IV</option>
							<option value="V">V</option>
							<option value="VI">VI</option>
						</select>
					</div>
		</div>
			
		<label class="col-sm-4 control-label" for="grade" >Grade</label>
	  <div class="col-sm-6">
	  <div class="radio">
  <label><input type="radio" name="grade" id="grade" value="A">A</label>
  <label><input type="radio" name="grade" id="grade" value="B">B</label>
  <label><input type="radio" name="grade" id="grade" value="C">C</label>
  <label><input type="radio" name="grade" id="grade" value="D">D</label>
</div>
<br /><br />
			
		<div class="col-md-10 text-center"> 
			<button id="simpan" name="simpan" class="btn btn-success">Save</button> 
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
$("#nim").prop("readonly",true);
$("#nama").prop("readonly",true);
</script>
</body>
</html>