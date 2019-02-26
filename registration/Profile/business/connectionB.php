<?php 


	
	$db = mysqli_connect('localhost', 'j6uj8460_devteam', 'Thebusinessstuds001', 'j6uj8460_businessstuds');
	$userid = $_SESSION['email_idB'];
	$get_user = "select * from businessAccounts where email='$userid'";
	$run_user = mysqli_query($db, $get_user);
	$row = mysqli_fetch_array($run_user);

	$user_fname = $row['firstName'];
	$user_lname = $row['lastName'];
	$company_name = $row['companyName'];
	$industry = $row['industry'];
	$otherIndustry = $row['otherIndustry'];
	$country = $row['country'];
	$stateAddress = $row['state'];
	$streetAddress = $row['street'];
	$website = $row['webAddress'];
	$phoneNumber = $row['phoneNumber'];
	$business_type = $row['type'];
	$business_description = $row['businessDescript'];
	$message = "";
	$idN = $row['id'];

?>