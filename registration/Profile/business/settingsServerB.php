<?php

	// initializing variables
	$firstName = "";
	$lastName = "";
	$email    = "";
	// $years = "";
	// $salesTechnique = "";
	// $speciality = "";
	// $languages = "";
	// $otherLanguages = "";
	$street = "";
	$state = "";
	$ncountry = "";
	$phoneN = "";
	// $linkedIn = "";
	// $skype = "";
	// $whatsapp = "";
	// $imo = "";
	// $line = "";
	$businessDescript = "";
	// $copyWork = "";
	// $additionalInfo = "";
	// $plan = "";
	// $type = "";
	$errors = array();
	$password_errors = array(); 
	$oldPassword = "";
	$newPassword = "";

	// //Extra for businesses
	$companyName = "";
	$industryN = "";
	// $otherIndustry = "";
	$webAddress = "";

	

	// Connect to the Database
	$db = mysqli_connect('localhost', 'j6uj8460_devteam', 'Thebusinessstuds001', 'j6uj8460_businessstuds');

	if (isset($_POST['update_info'])) {

	  // receive all input values from the form
	  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
	  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
	 
	  $companyName = mysqli_real_escape_string($db, $_POST['companyName']);
	  $industryN = mysqli_real_escape_string($db, $_POST['industry']);
	  //$otherIndustry = mysqli_real_escape_string($db, $_POST['otherIndustry']);

	  $street = mysqli_real_escape_string($db, $_POST['street']);
	  $ncountry = mysqli_real_escape_string($db, $_POST['country']);

	  $webAddress = mysqli_real_escape_string($db, $_POST['webAddress']);
	  $phoneN = mysqli_real_escape_string($db, $_POST['phoneNumber']);
	  $businessDescript = mysqli_real_escape_string($db, $_POST['businessDescript']);

	  // form validation: ensure that the form is correctly filled ...
	  if (empty($firstName)) { array_push($errors, "• First Name is required!"); }
	  if (empty($lastName)) { array_push($errors, "• Last Name is required!"); }
	  if (empty($companyName)) { array_push($errors, "• Company Name is required!"); }
	  if (empty($industryN)) { array_push($errors, "• Industry is required!"); }
	  if (empty($businessDescript)) { array_push($errors, "• Please provide a business Description! "); }
	  if (empty($webAddress)) { array_push($errors, "• Please provide a website!"); }
	  
	  
	  
	  //Ensuring only numbers provided in phone number
	  if (!ctype_digit($phoneN)) {
	        array_push($errors, "• Please provided a proper Phone Number(Numbers Only)! ");
	  } 


	  //Code for country and state
	  if ($ncountry == -1) { 

	  	$useridd = $_SESSION['email_idB'];
		$get_userr = "select * from businessAccounts where email='$useridd'";
		$run_userr = mysqli_query($db, $get_userr);
		$rowr = mysqli_fetch_array($run_userr);

	  	$ncountry = $rowr['country'];
	  	$state = $rowr['state'];
	  	

	  }else{

	  	if (isset($_POST['state'])) 
		{ 
		  	$state = mysqli_real_escape_string($db, $_POST['state']);
		} 
	  	
	  	if(empty($state)) { array_push($errors, "• Please select a state!"); }
	  }


	  // //checking the database to make sure user does not already exist with the same email or Company Name
	  // $user_check_query = "SELECT * FROM businessAccounts WHERE companyName='$companyName' OR email='$email' LIMIT 2";
	  // $result = mysqli_query($db, $user_check_query);
	  // $user = mysqli_fetch_assoc($result);
	  
	  // if ($user) { // if user exists
	  //   if ($user['companyName'] === $companyName) {
	  //     array_push($errors, "• Company already registered! ");
	  //   }

	  //   if ($user['email'] === $email) {
	  //     array_push($errors, "• Email already exists! ");
	  //   }
	  // }

	  // Updating Infor if there are no errors in the form
  	  if (count($errors) == 0) {

  	  		$query = " UPDATE businessAccounts SET firstName='$firstName', lastName='$lastName', companyName='$companyName', industry='$industryN', businessDescript='$businessDescript', street='$street', state='$state', country='$ncountry', webAddress='$webAddress', phoneNumber='$phoneN' WHERE id='$idN' ";
  	  		mysqli_query($db, $query);
		    header('location: settings.php');

  	  }



	}

	if(isset($_POST['passwordChange'])){

		// receive all input values from the form
	  	$oldPassword = mysqli_real_escape_string($db, $_POST['oldPassword']);
	  	$newPassword = mysqli_real_escape_string($db, $_POST['newPassword']);

	  	// form validation: ensure that the form is correctly filled ...
	  	if (empty($oldPassword)) { array_push($password_errors, "• Old Password is Required!"); }
	  	if (empty($newPassword)) { array_push($password_errors, "• New Password is Required!"); }


		//Ensuring user provides a strong password
		if (strlen($newPassword) < 6) { array_push($errors, "• Password must be greater than 6 characters!"); }
		if (!preg_match("#[0-9]+#", $newPassword) ) { array_push($password_errors, "• Password must contain at least one number!"); }
		if (!preg_match("#[a-z]+#", $newPassword) ) { array_push($password_errors, "• Password must contain at least one letter!"); }
		if (!preg_match("#[A-Z]+#", $newPassword) ) { array_push($password_errors, "• Password must contain at least one uppercase letter!"); }



		
		$querying = "SELECT * FROM businessAccounts WHERE id='$idN'"; 
    	$result = mysqli_query($db, $querying);


		    if (mysqli_num_rows($result) > 0) {
		  
		      
		      while($row = mysqli_fetch_array($result)){


		        if(password_verify($oldPassword, $row["password"])){

		        	// Registering user if there are no errors in the form
			  		if (count($password_errors) == 0) {

			  			$password = password_hash($newPassword, PASSWORD_BCRYPT);//encrypt the password before saving in the database
			  			$query = "UPDATE businessAccounts SET password='$password' WHERE id='$idN' ";
			  			mysqli_query($db, $query);
			  			$_SESSION['success'] = "Your Password Was Changed!";
					    header('location: settings.php');

			  		}

		          
		        }
		        else{

		          array_push($password_errors, "• Wrong Password!");

		        }


		      }
		      
		      
		    }

		







	}


	if(isset($_POST['unsubscribe_user'])){

		require_once('../../stripe-php-6.28.0/init.php');

		\Stripe\Stripe::setApiKey("sk_test_PzzneDgZQJTq2PUcVSr0o6yW");

		$userid = $_SESSION['email_idB'];
		$get_user = "select * from businessAccounts where email='$userid'";
		$run_user = mysqli_query($db, $get_user);
		$row = mysqli_fetch_array($run_user);

		$cu_id = $row['customer_id'];

		//Changing Account Status
		$query = "UPDATE businessAccounts SET account_status='PAUSED' WHERE id='$idN' ";
		mysqli_query($db, $query);
		
        
		$cu = \Stripe\Customer::retrieve($cu_id);
		$cu->cancelSubscription();
		unset($_SESSION['email_idB']);
		header("location: ../../login.html");

	}



?>