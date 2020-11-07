<!DOCTYPE html>
	<html>
		<body>
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

		      	$personal_array = array(
					"lastName" => $_POST["LastName"],
					"firstName" => $_POST["FirstName"],
					"middleName" => $_POST["MiddleName"],
					"dateOfBirth" => $_POST["DateOfBirth"],
					"placeOfBirth" => $_POST["PlaceOfBirth"],
					"gender" => $_POST["gender"],
					"permanentAddress" => $_POST["PermanentAddress"],
					"presentAddress" => $_POST["PresentAddress"],
					"contactNumber" => $_POST["ContactNumber"],
					"email" => $_POST["EmailAddress"],
					"civilStatus" => $_POST["CivilStatus"],
					"religion" => $_POST["Religion"],
					"emergencyContactPerson" => $_POST["EmergencyContact"],
					"emergencyContactNumber" => $_POST["EmergencyContactNumber"]
				);

		      	$url_add_personal = 'https://sp-api-test.alun.app/api/faculty/add/personal';
		      	$curl = curl_init();
		      	curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($personal_array));
				curl_setopt($curl, CURLOPT_URL, $url_add_personal);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		        	'Content-Type: application/json',
		        	'Authorization: Bearer ' . $token
		      	));
		      	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		      	$result = curl_exec($curl);
		      	curl_close($curl);
		      	$data = json_decode($result);
		      	$res = $data->result;

		      	echo '<script>alert("' . $data->message . '");</script>';

		      	if ($data->success) {
		      		$unit_array = array(
						"facultyId" => $res,
						"unitId" => $_POST["Unit"]
					);
					$url_add_unit = 'https://sp-api-test.alun.app/api/faculty/add/unit';
			      	$curl = curl_init();
			      	curl_setopt($curl, CURLOPT_POST, 1);
					curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($unit_array));
					curl_setopt($curl, CURLOPT_URL, $url_add_unit);
					curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			        	'Content-Type: application/json',
			        	'Authorization: Bearer ' . $token
			      	));
			      	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			      	$result = curl_exec($curl);
			      	curl_close($curl);
			      	$data = json_decode($result);
			      	
			      	echo '<script>alert("' . $data->message . '");</script>';

			      	$employment_array = array(
						"facultyId" => $res,
						"position" => $_POST["Position"],
						"startDate" => $_POST["StartDate"]
					);
					$url_add_employment = 'https://sp-api-test.alun.app/api/faculty/add/employment';
			      	$curl = curl_init();
			      	curl_setopt($curl, CURLOPT_POST, 1);
					curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($employment_array));
					curl_setopt($curl, CURLOPT_URL, $url_add_employment);
					curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			        	'Content-Type: application/json',
			        	'Authorization: Bearer ' . $token
			      	));
			      	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			      	$result = curl_exec($curl);
			      	curl_close($curl);
			      	$data = json_decode($result);

			      	echo '<script>alert("' . $data->message . '");</script>';
		      	}

		      	echo '<script>
		      		alert("' . $data->message . '");
		      		window.location.href = "/sp";
		      		</script>';
			?>
		</body>
	</html>