<?php




	// initializing variables
	$firstName = "";
	$lastName = "";
	
	$years = "";
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
	//$resume = "";
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
	  $nlanguages = mysqli_real_escape_string($db, $_POST['languages']);
	  $otherLanguages = mysqli_real_escape_string($db, $_POST['otherlanguages']);

	  $years = mysqli_real_escape_string($db, $_POST['years']);
	  $technique = mysqli_real_escape_string($db, $_POST['technique']);
	  $speciality = mysqli_real_escape_string($db, $_POST['speciality']);

	  //Not required fields
	  $linkedin = mysqli_real_escape_string($db, $_POST['linkedIn']);
	 

	  
	  $street = mysqli_real_escape_string($db, $_POST['street']);
	  $ncountry = mysqli_real_escape_string($db, $_POST['country']);
	  $phoneN = mysqli_real_escape_string($db, $_POST['phoneNumber']);
	  
	  // form validation: ensure that the form is correctly filled ...
	  if (empty($firstName)) { array_push($errors, "• First Name is required!"); }
	  if (empty($lastName)) { array_push($errors, "• Last Name is required!"); }
	  
	  if (empty($nlanguages)) { array_push($errors, "• A language is required!"); }
	  
	  if (empty($technique)) { array_push($errors, "• Please provide a Technique"); }


	  //Code for country and state
	  if ($ncountry == -1) { 

	  	$useridd = $_SESSION['email_id'];
		$get_userr = "select * from salesProfessionalAccounts where email='$useridd'";
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
	  $target_dir = "salesProfessionalFiles/";
	  
	  //Setting up Additional Info Upload
	  $target_pictureInfo = "";
	  $uploadInfoOk = 1;
	  $pictureFileType = "";
	  
	  //Profile Picture
	  if(!empty(basename($_FILES["profilepic"]["name"]))){

	    $target_pictureInfo = $target_dir . basename($_FILES["profilepic"]["name"]);
	    
	    $pictureFileType = strtolower(pathinfo($target_pictureInfo,PATHINFO_EXTENSION));

	    if (file_exists($target_pictureInfo)) {
	      array_push($errors, "• File name Already Exists! Please choose a Unique name for your file! We didn't Subscribe You!");
	      $uploadInfoOk = 0;
	    }
	    // Check file size
	    if ($_FILES["profilepic"]["size"] > 10000000) {
	        array_push($errors, "• Sorry, your file is too large. Please choose a file less than 10MB! We didn't Subscribe You!");
	        $uploadInfoOk = 0;
	    }
	     // Allow certain file formats
		  if($pictureFileType != "jpg" && $pictureFileType != "png" && $pictureFileType != "jpeg"
		  && $pictureFileType != "gif" ) {
		      array_push($errors, "• Sorry, only JPG, JPEG, PNG & GIF files are allowed! We didn't Subscribe You!");
		      $uploadInfoOk = 0;
		  }

	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadInfoOk == 0) {
	        array_push($errors, "• Sorry, your file was not uploaded! We didn't Subscribe You!");
	    // if everything is ok, try to upload file
	    } else {

	    	 //Path to move to correct folder
		  	  $newpath = "../../salesProfessionalFiles/" . basename($_FILES["profilepic"]["name"]);

	        if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $newpath)) {
	           //Do nothing
	        } else {
	             array_push($errors, "• Sorry, there was an error uploading your file! We didn't Subscribe You!");
	        }
	    }

	    $queryPicture = " UPDATE salesProfessionalAccounts SET picture='$target_pictureInfo' WHERE id='$idN' ";
  	  	mysqli_query($db, $queryPicture);



	  }

	  //Updating fields that are not required
	  //Resume

	  $target_file = "";
	  $resumeFileType = "";
	  
	  if(!empty(basename($_FILES["resume"]["name"]))){


	  	$target_file = $target_dir . basename($_FILES["resume"]["name"]);
	  	$uploadOk = 1;
	  	$resumeFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	  	 // Check if file already exists
		  if (file_exists($target_file)) {
		      array_push($errors, "• File name Already Exists! Please choose a Unique name for your file! We didn't Subscribe You!");
		      $uploadOk = 0;
		  }
		  // Check file size
		  if ($_FILES["resume"]["size"] > 10000000) {
		      array_push($errors, "• Sorry, your file is too large. Please choose a file less than 10MB! We didn't Subscribe You!");
		      $uploadOk = 0;
		  }
		  // Allow certain file formats
		  if($resumeFileType != "pdf" && $resumeFileType != "docx" && $resumeFileType != "xls") {
		      array_push($errors, "• Sorry, only PDF, DOCX & XLS files are allowed! We didn't Subscribe You!");
		      $uploadOk = 0;
		  }
		  // Check if $uploadOk is set to 0 by an error
		  if ($uploadOk == 0) {
		      array_push($errors, "• Sorry, your file was not uploaded! We didn't Subscribe You!");
		  // if everything is ok, try to upload file
		  } else {
		  	  //Path to move to correct folder
		  	  $newpath = "../../salesProfessionalFiles/" . basename($_FILES["resume"]["name"]);
	  		
		      if (move_uploaded_file($_FILES["resume"]["tmp_name"], $newpath)) {
		      } else {
		          array_push($errors, "• Sorry, there was an error uploading your file! We didn't Subscribe You!");
		      }
		  }

		  if(count($errors) == 0){

		  	$queryresume = " UPDATE salesProfessionalAccounts SET resume='$target_file' WHERE id='$idN' ";
  	  	  	mysqli_query($db, $queryresume);

		  }
  	  	  

  	  }



	  // Updating Required information if there are no errors in the form
  	  if (count($errors) == 0) {

  	  		$query = " UPDATE salesProfessionalAccounts SET firstName='$firstName', lastName='$lastName', years='$years', technique='$technique', speciality='$speciality', languages='$nlanguages', otherLanguages='$otherLanguages', street='$street', state='$state', country='$ncountry', phone='$phoneN', linkedIn='$linkedin' WHERE id='$idN' ";
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



		
		$querying = "SELECT * FROM salesProfessionalAccounts WHERE id='$idN'"; 
    	$result = mysqli_query($db, $querying);


		    if (mysqli_num_rows($result) > 0) {
		  
		      
		      while($row = mysqli_fetch_array($result)){


		        if(password_verify($oldPassword, $row["password"])){

		        	// Registering user if there are no errors in the form
			  		if (count($password_errors) == 0) {

			  			$password = password_hash($newPassword, PASSWORD_BCRYPT);//encrypt the password before saving in the database
			  			$query = "UPDATE salesProfessionalAccounts SET password='$password' WHERE id='$idN' ";
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




?>