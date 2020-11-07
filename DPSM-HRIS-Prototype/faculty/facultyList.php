<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
		<title>DPSM-HRIS</title>

		<!-- Bootstrap core CSS -->  
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->  
		<link href="../css/simple-sidebar.css" rel="stylesheet">

		<!-- Bootstrap core JavaScript -->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- <script> 
			$(function(){
			  $("#header").load("../components/header.html"); 
			  $("#main-sidebar").load("../components/mainSidebar.html"); 
			});
		</script> -->
	</head>
    <body>

        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
		<!--
			<div id="main-sidebar"></div> -->
			<!-- /#sidebar-wrapper -->

			<!-- Page Content -->
			<!-- <div id="page-content-wrapper">
				<div id="header"></div> -->
   		
                <div class = "container">
                    <div>
                        <br> 
                        <h4 align = "center"> Faculty </h4>
			             <div class="btn-group float-right" role="group">
                        	<a class="btn btn-primary" href="#" id = "addfaculty">Add Faculty</a>
                        	<a class="btn btn-primary" href="#" id = "searchfaculty">Search Faculty</a>
			             </div>
                        <br>
                        
                    </div>
                    <div>

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

                            $url_get = 'https://sp-api-test.alun.app/api/faculty';
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
                                echo '<h5>' . $unit->unit . '</h5><ul>';
                                $facUnit = $unit->faculty_units;
                                foreach($facUnit as $faculty) {
                                    $facInfo = $faculty->faculty_personal_info;
                                    echo '<li><a href = "#">' . $facInfo->lastName . ', ' . $facInfo->firstName . ' ' . $facInfo->middleName . '</a></li>';
                                }
                                echo '</ul>';
                            }
                        ?>

                        <!--h5><?php echo $data_array[0]->unit; ?></h5>
                        <ul>
                            <li><a href = '#' id = "facultyprofile">Billones, Junie B.</a></li>
                            <li><a href = '#'>Carrillo, Maria Constancia O.</a></li>
                            <li><a href = '#'>Cleofas, Mark Jeremiah B.</a></li>
                        </ul> 
                        <h5>Mathematical and Computing Sciences Unit</h5>
                        <ul>
                            <li>Baes, Gregorio B.</li>
                            <li>Basco-Uy, Therese Anne G.</li>
                            <li>Billones, Liza T.</li>
                        </ul> 
                        <h5>Physics and Geology Unit</h5>
                        <ul>
                            <li>Bagunu, Ramon Jose C.</li>
                            <li>Bustillo, John Paul O.</li>
                            <li>Catalig, Miguel Antonio P.</li>
                        </ul--> 
                    </div>
                    
                </div>
         <!--   </div> -->
    </div>
	
<script>
    $(document).ready(function(){
        $("#addfaculty").click(function(e){
            e.preventDefault();
            $("#content").load("faculty/addFaculty.html");
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#searchfaculty").click(function(e){
            e.preventDefault();
            $("#content").load("faculty/search.php");
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#facultyprofile").click(function(e){
            e.preventDefault();
            $("#content").load("faculty/facultyProfile.html");
        });
    });
</script>
    </body>
    </html>

