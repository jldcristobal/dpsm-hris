<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
  
		<!-- Bootstrap core CSS -->
  
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  
		<!-- Bootstrap core JavaScript -->
  
		<script src="../vendor/jquery/jquery.min.js"></script>
  
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		
		<!-- Custom styles for this template -->  
		<link href="../css/simple-sidebar.css" rel="stylesheet">

		<!-- DataTables CSS and JavaScript -->
		<link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
		<link href="css/searchBuilder.dataTables.min.css" rel="stylesheet">
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap4.min.js"></script>
		<script src="js/dataTables.searchBuilder.min.js"></script>

		<script> 
			$(function(){
			  $("#header").load("../components/header.html"); 
			  $("#main-sidebar").load("../components/mainSidebar.html"); 
			});
		</script>
		
	</head>
	<body>
		<div class="d-flex" id="wrapper">
            <!-- Sidebar -->
			<div id="main-sidebar"></div>
			<!-- /#sidebar-wrapper -->

			<!-- Page Content -->
			<div id="page-content-wrapper">
				<div id="header"></div>
    
                <div class = "container">
					<br> <h4> Search Faculty </h4> <br>
		<table class = "table table-hover" id = "SearchResults">
			<thead>
				<tr>
					<th scope = "col"> Faculty ID </th>
					<th scope = "col"> Last Name </th>
					<th scope = "col"> First Name </th>
					<th scope = "col"> Middle Name </th>
					<th scope = "col"> Gender </th>
					<th scope = "col"> Present Address </th>
					<th scope = "col"> Permanent Address </th>
					<th scope = "col"> Date of Birth </th>
					<th scope = "col"> Place of Birth </th>
					<th scope = "col"> Civil Status </th>
					<th scope = "col"> Religion </th>
					<th scope = "col"> Contact Number </th>
					<th scope = "col"> Email Address </th>
					<th scope = "col"> Emergency Contact </th>
					<th scope = "col"> Emergency Contact Number </th>
					<th scope = "col"> Unit ID </th>
					<th scope = "col"> Unit Name </th>
					<th scope = "col"> Position </th>
				</tr>
			</thead>
			<tbody>
				<!-- Row template -->
				<!--tr>
					<th scope = "row"> </th-->
				<?php
					$access = array(
		                "username" => "username",
		                "password" => "password",                 
		            );
		            $url_access = 'https://sp-api-test.alun.app/api/token';
		            $curl = curl_init();
		            curl_setopt($curl, CURLOPT_POST, 1);
		            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($access));
		            curl_setopt($curl, CURLOPT_URL, $url_access);
		            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		                'Content-Type: application/json',
		            ));
		            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		            $result = curl_exec($curl);
		            curl_close($curl);
		            $data = json_decode($result);
		            $token = $data->result;

		            $url_get = 'https://sp-api-test.alun.app/api/faculty/all';
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $url_get);
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . $token
                    ));
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    $result = curl_exec($curl);
                    curl_close($curl);
                    $data = json_decode($result);
                    $data_array = $data->result;

                    foreach ($data_array as $unit) {
                    	echo '<tr>';
                    	echo '<td>' . $unit->facultyId . '</td>';
                    	echo '<td>' . $unit->lastName . '</td>';
                    	echo '<td>' . $unit->firstName . '</td>';
                    	echo '<td>' . $unit->middleName . '</td>';
                    	echo '<td>' . $unit->gender . '</td>';
                    	echo '<td>' . $unit->presentAddress . '</td>';
                    	echo '<td>' . $unit->permanentAddress . '</td>';
                    	echo '<td>' . $unit->dateOfBirth . '</td>';
                    	echo '<td>' . $unit->placeOfBirth . '</td>';
                    	echo '<td>' . $unit->civilStatus . '</td>';
                    	echo '<td>' . $unit->religion . '</td>';
                    	echo '<td>' . $unit->contactNumber . '</td>';
                    	echo '<td>' . $unit->email . '</td>';
                    	echo '<td>' . $unit->emergencyContactPerson . '</td>';
                    	echo '</tr>';
                    }
				?>
					<!--td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
				</tr-->
			</tbody>
		</table>
				</div>
			</div>
		</div>

		<!-- Converts table into DataTable, adding functionalities such as search and pagination -->
		<script>
			$(document).ready( function () {
    				$('#SearchResults').DataTable({
					dom: 'Qlfrtip',  //initializes SearchBuilder function
					scrollX: true //adds horizontal scrolling
				});
			} );
		</script>
			
	</body>
</html>

