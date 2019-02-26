<?php 


	$db = mysqli_connect('localhost', 'j6uj8460_devteam', 'Thebusinessstuds001', 'j6uj8460_businessstuds');
	$userid = $_SESSION['email_id'];
	$get_user = "select * from salesProfessionalAccounts where email='$userid'";
	$run_user = mysqli_query($db, $get_user);
	$row = mysqli_fetch_array($run_user);

	$user_fname = $row['firstName'];
	$user_lname = $row['lastName'];
	
	$databaseResume = $row['resume'];
	$databasePicture = $row['picture'];
	$databaseYears = $row['years'];
	$databaseTechniques = $row['technique'];
	$databaseSpeciality = $row['speciality'];

	$languages = $row['languages'];
	$ootherLanguages = $row['otherLanguages'];
	$streetAddress = $row['street'];
	$stateAddress = $row['state'];
	$country = $row['country']; 
	
	$phoneNumber = $row['phone'];
	$linkedIn = $row['linkedIn'];
	$skype = $row['skype'];
	$whatsapp = $row['whatsapp'];
	$imo = $row['imo'];
	$line = $row['lineInfo'];
	
	$message = "";
	$idN = $row['id'];

?>