<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "torrents";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = $_GET['query'];
$type = $_GET['type'];

	if($type == 'All') {

	$search = "SELECT * FROM torrentlist WHERE title like '%".$query."%'";}

	else {

    $search = "SELECT * FROM torrentlist WHERE title like '%".$query."%' AND type like '%".$type."%'";}

    $q=mysqli_query($conn, $search);

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Search</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Title</th>
								<th class="column2">Type</th>
								<th class="column3">By</th>	
							</tr>
						</thead>
						<tbody>

							<?php
    while($res=mysqli_fetch_array($q)){
    	?>
								<tr>
									<td class="column1"><?= $res['title']?></td>
									<td class="column2"><?= $res['type']?></td>
									<td class="column3"><?= $res['description']?></td>
								</tr>
								<?php }?>
						</tbody>

					</table>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
