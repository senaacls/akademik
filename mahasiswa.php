<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Mahasiswa</title>
	
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

	<h2>List Mahasiswa</h2>
	<br />
	<button id="add" name="add" class="btn btn-success" onclick="locate()">Add New</button>
	<br /><br />

  <table id="listmahasiswa" class="table table-striped" width="100%" cellspacing="0">
        <thead>
            <tr>
        		<th>#</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Gender</th>
                <th>Fakultas</th>
                <th>Grade</th>
                <th>Foto</th>
				<th>Action</th>
            </tr>
   </thead>
   <tbody>
            <?php
			include("config.php");
			$no = 1;
			$q = listmahasiswa();	
			foreach ($q as $r)
			{
				echo "<tr>
						<td> $no </td>
						<td> $r[0]</td>
						<td> $r[1]</td>
						<td> $r[2]</td>
						<td> $r[3]</td>
						<td> $r[4]</td>
						<td><a href='grade.php?nim=".$r[0]."'>
						  <b id='grade' name='grade'>Grade </b>
						  </a>
						  </td>
						 <td> <img src='".$r[5]."' width='100' height='100' />
						<td>
						  <a href='edit.php?nim=".$r[0]."'>
						  <button id='edit' name='edit' class='btn btn-info btn-sm'>Edit </button>
						  </a>
						  
						  <a onclick=\"return confirm('hapus data ini ?');\"  href='delete.php?nim=".$r[0]."'>
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
function locate()
{
     location.href = "addmahasiswa.php";
}
$(document).ready(function() {
    $('#listmahasiswa').DataTable();
} );
</script>
   </body>
</html>