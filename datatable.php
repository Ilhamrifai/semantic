<?php
include "function/Koleksi.php";
$biblio = new Koleksi();

$result = $biblio->getAllCollection();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>DataTables example - Multi-column ordering</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
	</script>
	<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );

	</script>
</head>
<body>
<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Author</th>
						<th>Topic</th>

					</tr>
				</thead>
				<tbody>

					<?php 
						$no=1;
						foreach ($result as $rs): ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $rs['title']; ?></td>
						<td><?php echo $rs['author']; ?></td>
						<td><?php echo $rs['topic']; ?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
</body>
</html>