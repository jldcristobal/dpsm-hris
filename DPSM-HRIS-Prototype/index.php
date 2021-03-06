<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
		<title>DPSM-HRIS</title>

		<!-- Bootstrap core CSS -->  
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->  
		<link href="css/simple-sidebar.css" rel="stylesheet">
		<link href="css/header.css" rel="stylesheet">

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<?php
			if($_SERVER['HTTP_REFERER'] == 'http://ajiporter.buzz.aero/sp/faculty/addFaculty.php') {
				echo '<script>
						alert($_SERVER["HTTP_REFERER"]);
						$(document).ready(function(){
							$("#content").load("faculty/facultyList.php");
						});
					</script>';
			}
		?>

		<script> 
			$(function(){
			  $("#header").load("components/header.html"); 
			  $("#main-sidebar").load("components/mainSidebar.html"); 
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
  
				<div class="container-fluid" id="content">
        				<br><br><br><br><br>
					<h3 align = "center"> Welcome to DPSM-HRIS! </h3>
					<br>
					<p align = "center"> To get started, select an option in the menu on the left side of the page </p>
				</div>
     
			</div> 
			<!-- /#page-content-wrapper -->
		</div>
  
		<!-- /#wrapper -->

  
		
		<!-- Menu Toggle Script -->
  
		<!-- <script>
    
			$("#menu-toggle").click(function(e) {
      
				e.preventDefault();
      
				
				$("#wrapper").toggleClass("toggled");   
			});
  
		</script> -->



		
		
	</body>


</html>
