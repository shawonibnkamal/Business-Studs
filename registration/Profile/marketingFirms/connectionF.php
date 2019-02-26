<?php 


	$db = mysqli_connect('localhost', 'j6uj8460_devteam', 'Thebusinessstuds001', 'j6uj8460_businessstuds');
	$userid = $_SESSION['email_idF'];
	$get_user = "select * from marketingFirms where email='$userid'";
	$run_user = mysqli_query($db, $get_user);
	$row = mysqli_fetch_array($run_user);

	$user_fname = $row['firstName'];
	$user_lname = $row['lastName'];
	$company_name = $row['firmName'];
	$copyofWork = $row['copyWork'];
	$databaseAdditionalInfo = $row['additionalInfo'];
	$languages = $row['languages'];
	$ootherLanguages = $row['otherLanguages'];
	$streetAddress = $row['street'];
	$stateAddress = $row['state'];
	$country = $row['country']; 
	$business_description = $row['businessDescript'];

	$phoneNumber = $row['phone'];
	$linkedIn = $row['linkedIn'];
	$skype = $row['skype'];
	$whatsapp = $row['whatsapp'];
	$imo = $row['imo'];
	$line = $row['lineInfo'];
	
	$message = "";
	$idN = $row['id'];

?>