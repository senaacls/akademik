<?php 
include("config.php");
$nim = $_GET['nim'];
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grade</title>
	
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

	<h2>List Nilai</h2>
	<br />
	<a href='addmatakuliah.php?nim=<?php echo $nim ?>'>
	<button id="add" name="add" class="btn btn-success" onclick="locate()">Add New Matakuliah</button>
	</a>
	<br /><br />

  <table id="listnilai" class="table table-striped" width="100%" cellspacing="0">
        <thead>
            <tr>
            	<th>#</th>
                <th>Mata kuliah</th>
                <th>Sks</th>
                <th>Semester</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>
   </thead>
<tbody>
            <?php
			$no = 1;
            $q = nilai($_GET['nim']);
			while($r = $q->fetch(PDO::FETCH_NUM))
			{
				echo "<tr >
						<td> $no</td>
						<td> $r[1]</td>
						<td> $r[2]</td>
						<td> $r[3]</td>
						<td> $r[4]</td>
						<td>
						  <a href='changedata.php?matakuliah=".$r[1]."'>
						  <button id='edit' name='edit' class='btn btn-info btn-sm'>Edit </button>
						  </a>
						  
						  <a onclick=\"return confirm('hapus data ini ?');\"  href='hapusdata.php?matakuliah=".$r[1]."'>
						  <button id='delete' name='delete' class='btn btn-danger btn-sm'>Delete </button>
						  </a>
						  
						</td>
					 </tr>";	
				$no++;
            }
			?>
    </tbody>
    </table>
	
</div>
<script>
$(document).ready(function() {
    $('#listnilai').DataTable();
} );
</script>
</body>