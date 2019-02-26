<?php

	


	// initializing variables
	$firstName = "";
	$lastName = "";
	$email    = "";
	// $years = "";
	// $salesTechnique = "";
	// $speciality = "";
	$nlanguages = "";
	$otherLanguages = "";
	$street = "";
	$state = "";
	$ncountry = "";
	$phoneN = "";
	$linkedin = "";
	// $skype = "";
	// $whatsapp = "";
	// $imo = "";
	// $line = "";
	$businessDescript = "";
	//$copyWork = "";
	$additionalInfo = "";
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
	  $nlanguages = mysqli_real_escape_string($db, $_POST['languages']);
	  $otherLanguages = mysqli_real_escape_string($db, $_POST['otherlanguages']);

	  //Not required fields
	  $linkedin = mysqli_real_escape_string($db, $_POST['linkedIn']);
	 

	  
	  $street = mysqli_real_escape_string($db, $_POST['street']);
	  $ncountry = mysqli_real_escape_string($db, $_POST['country']);
	  $phoneN = mysqli_real_escape_string($db, $_POST['phoneNumber']);
	  $businessDescript = mysqli_real_escape_string($db, $_POST['businessDescript']);

	  // form validation: ensure that the form is correctly filled ...
	  if (empty($firstName)) { array_push($errors, "• First Name is required!"); }
	  if (empty($lastName)) { array_push($errors, "• Last Name is required!"); }
	  if (empty($companyName)) { array_push($errors, "• Company Name is required!"); }
	  if (empty($nlanguages)) { array_push($errors, "• A language is required!"); }
	  if (empty($businessDescript)) { array_push($errors, "• Please provide a business Description! "); }
	  


	  //Code for country and state
	  if ($ncountry == -1) { 

	  	$useridd = $_SESSION['email_idF'];
		$get_userr = "select * from marketingFirms where email='$useridd'";
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
	  
	  
	  //Ensuring only numbers provided in phone number
	  if (!ctype_digit($phoneN)) {
	        array_push($errors, "• Please provided a proper Phone Number(Numbers Only)! ");
	  } 


	  //Updating fields that are not required

	  //Setting up Upload Path
	  $target_dir = "SalesMarketingFirmsFiles/";
	  
	  //Setting up Additional Info Upload
	  $target_additionalInfo = "";
	  $uploadInfoOk = 1;
	  $additionalFileType = "";
	  
	  //Additional Info 
	  if(!empty(basename($_FILES["additionalInfo"]["name"]))){

	    $target_additionalInfo = $target_dir . basename($_FILES["additionalInfo"]["name"]);
	    
	    $additionalFileType = strtolower(pathinfo($target_additionalInfo,PATHINFO_EXTENSION));

	    if (file_exists($target_additionalInfo)) {
	      array_push($errors, "• File name Already Exists! Please choose a Unique name for your file! We didn't Subscribe You!");
	      $uploadInfoOk = 0;
	    }
	    // Check file size
	    if ($_FILES["additionalInfo"]["size"] > 10000000) {
	        array_push($errors, "• Sorry, your file is too large. Please choose a file less than 10MB! We didn't Subscribe You!");
	        $uploadInfoOk = 0;
	    }
	    // Allow certain file formats
	    if($additionalFileType != "pdf" && $additionalFileType != "docx" && $additionalFileType != "xls") {
	        array_push($errors, "• Sorry, only PDF, DOCX & XLS files are allowed! We didn't Subscribe You!");
	        $uploadInfoOk = 0;
	    }

	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadInfoOk == 0) {
	        array_push($errors, "• Sorry, your file was not uploaded! We didn't Subscribe You!");
	    // if everything is ok, try to upload file
	    } else {

	    	 //Path to move to correct folder
		  	  $newpath = "../../SalesMarketingFirmsFiles/" . basename($_FILES["additionalInfo"]["name"]);

	        if (move_uploaded_file($_FILES["additionalInfo"]["tmp_name"], $newpath)) {
	           //Do nothing
	        } else {
	             array_push($errors, "• Sorry, there was an error uploading your file! We didn't Subscribe You!");
	        }
	    }

	    $queryadditionalWork = " UPDATE marketingFirms SET additionalInfo='$target_additionalInfo' WHERE id='$idN' ";
  	  	mysqli_query($db, $queryadditionalWork);



	  }

	  //Updating fields that are not required
	  //Copy of Work

	  $target_file = "";
	  $copyWorkFileType = "";
	  
	  if(!empty(basename($_FILES["copyWork"]["name"]))){


	  	$target_file = $target_dir . basename($_FILES["copyWork"]["name"]);
	  	$uploadOk = 1;
	  	$copyWorkFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	  	 // Check if file already exists
		  if (file_exists($target_file)) {
		      array_push($errors, "• File name Already Exists! Please choose a Unique name for your file! We didn't Subscribe You!");
		      $uploadOk = 0;
		  }
		  // Check file size
		  if ($_FILES["copyWork"]["size"] > 10000000) {
		      array_push($errors, "• Sorry, your file is too large. Please choose a file less than 10MB! We didn't Subscribe You!");
		      $uploadOk = 0;
		  }
		  // Allow certain file formats
		  if($copyWorkFileType != "pdf" && $copyWorkFileType != "docx" && $copyWorkFileType != "xls") {
		      array_push($errors, "• Sorry, only PDF, DOCX & XLS files are allowed! We didn't Subscribe You!");
		      $uploadOk = 0;
		  }
		  // Check if $uploadOk is set to 0 by an error
		  if ($uploadOk == 0) {
		      array_push($errors, "• Sorry, your file was not uploaded! We didn't Subscribe You!");
		  // if everything is ok, try to upload file
		  } else {
		  	  //Path to move to correct folder
		  	  $newpath = "../../SalesMarketingFirmsFiles/" . basename($_FILES["copyWork"]["name"]);
	  		
		      if (move_uploaded_file($_FILES["copyWork"]["tmp_name"], $newpath)) {
		      } else {
		          array_push($errors, "• Sorry, there was an error uploading your file! We didn't Subscribe You!");
		      }
		  }

		  if(count($errors) == 0){

		  	$queryCopyWork = " UPDATE marketingFirms SET copyWork='$target_file' WHERE id='$idN' ";
  	  	  	mysqli_query($db, $queryCopyWork);

		  }
  	  	  

  	  }



	  // Updating Required information if there are no errors in the form
  	  if (count($errors) == 0) {

  	  		$query = " UPDATE marketingFirms SET firstName='$firstName', lastName='$lastName', businessDescript='$businessDescript', languages='$nlanguages', otherLanguages='$otherLanguages', street='$street', state='$state', country='$ncountry', phone='$phoneN', linkedIn='$linkedin' WHERE id='$idN' ";
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
		if (strlen($newPassword) < 6) { array_push($errors, "• New Password must be greater than 6 characters!"); }
		if (!preg_match("#[0-9]+#", $newPassword) ) { array_push($password_errors, "• New Password must contain at least one number!"); }
		if (!preg_match("#[a-z]+#", $newPassword) ) { array_push($password_errors, "• New Password must contain at least one letter!"); }
		if (!preg_match("#[A-Z]+#", $newPassword) ) { array_push($password_errors, "• New Password must contain at least one uppercase letter!"); }



		
		$querying = "SELECT * FROM marketingFirms WHERE id='$idN'"; 
    	$result = mysqli_query($db, $querying);


		    if (mysqli_num_rows($result) > 0) {
		  
		      
		      while($row = mysqli_fetch_array($result)){


		        if(password_verify($oldPassword, $row["password"])){

		        	// Registering user if there are no errors in the form
			  		if (count($password_errors) == 0) {

			  			$password = password_hash($newPassword, PASSWORD_BCRYPT);//encrypt the password before saving in the database
			  			$query = "UPDATE marketingFirms SET password='$password' WHERE id='$idN' ";
			  			mysqli_query($db, $query);
			  			$_SESSION['success'] = "Your Password Was Changed!";
					    header('location: settings.php');

			  		}else{
			  			$_SESSION['success'] =  " ";
			  		}

		          
		        }
		        else{

		          array_push($password_errors, "• Wrong Password!");
		          $_SESSION['success'] =  " ";

		        }


		      }
		      
		      
		    }

		







	}


	if(isset($_POST['unsubscribe_user'])){

		require_once('../../stripe-php-6.28.0/init.php');

		\Stripe\Stripe::setApiKey("sk_test_PzzneDgZQJTq2PUcVSr0o6yW");

		$userid = $_SESSION['email_idF'];
		$get_user = "select * from marketingFirms where email='$userid'";
		$run_user = mysqli_query($db, $get_user);
		$row = mysqli_fetch_array($run_user);

		$cu_id = $row['customer_id'];

		//Changing Account Status
		$query = "UPDATE marketingFirms SET account_status='PAUSED' WHERE id='$idN' ";
		mysqli_query($db, $query);
		
        
		$cu = \Stripe\Customer::retrieve($cu_id);
		$cu->cancelSubscription();
		unset($_SESSION['email_idF']);
		header("location: ../../login.html");

	}



?>