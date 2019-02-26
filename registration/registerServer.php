<?php
session_start();



// initializing variables
$firstName = "";
$lastName = "";
$email    = "";
$years = "";
$salesTechnique = "";
$speciality = "";
$languages = "";
$otherLanguages = "";
$street = "";
$state = "";
$country = "";
$phoneNumber = "";
$linkedIn = "";
$skype = "";
$whatsapp = "";
$imo = "";
$line = "";
$businessDescript = "";
$copyWork = "";
$additionalInfo = "";
$plan = "";
$type = "";
$errors = array(); 

//Extra for businesses
$companyName = "";
$industry = "";
$otherIndustry = "";
$webAddress = "";

// Connect to the Database
$db = mysqli_connect('localhost', 'j6uj8460_devteam', 'Thebusinessstuds001', 'j6uj8460_businessstuds');


//Register Sales Professional  
if (isset($_POST['reg_salesprof_user'])) {

  // receive all input values from the form
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  //Setting up Image Upload
  $target_dir = "salesProfessionalFiles/";
  $target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  //Setting up Resume Upload
  $target_resume = $target_dir . basename($_FILES["resume"]["name"]);
  $uploadResumeOk = 1;
  $resumeFileType = strtolower(pathinfo($target_resume,PATHINFO_EXTENSION));
  

  
  $years = mysqli_real_escape_string($db, $_POST['experience']);

  $salesT = implode(',', $_POST['technique']);

  $termsCondition = implode(',', $_POST['terms']);

  $speciality = mysqli_real_escape_string($db, $_POST['speciality']);

  $languageT = implode(',', $_POST['language']);

  $otherLanguages = mysqli_real_escape_string($db, $_POST['otherLanguage']);
  $street = mysqli_real_escape_string($db, $_POST['street']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $country = mysqli_real_escape_string($db, $_POST['country']);

  $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);

  $linkedIn = mysqli_real_escape_string($db, $_POST['linkedIn']);
  $skype = mysqli_real_escape_string($db, $_POST['skype']);
  $whatsapp = mysqli_real_escape_string($db, $_POST['whatsapp']);
  $imo = mysqli_real_escape_string($db, $_POST['imo']);
  $line = mysqli_real_escape_string($db, $_POST['line']);



  // Form validation: ensure that the form is correctly filled ...
  if (empty($firstName)) { array_push($errors, "• First Name is required! "); }
  if (empty($lastName)) { array_push($errors, "• Last Name is required! "); }
  if (empty($email)) { array_push($errors, "• Email is required! "); }
  if (empty($target_file)) { array_push($errors, "• A Profile Picture is required! "); }
  if (empty($target_resume)) { array_push($errors, "• A Resume is required! "); }
  if (empty($salesT)) { array_push($errors, "• Please select atleast one(1) Sales Technique! "); }
  if (empty($years)) { array_push($errors, "• Please select a year! "); }
  if (empty($speciality)) { array_push($errors, "• Please select a Speciality! "); }
  if (empty($languageT)) { array_push($errors, "• Please select atleast one(1) language! "); }
  if (empty($state)) { array_push($errors, "• Please select a state! "); }
  if (empty($country)) { array_push($errors, "• Please select a country! "); }
  if (empty($phoneNumber)) { array_push($errors, "• Please add a phone number! "); }
  if (empty($termsCondition)) { array_push($errors, "• You need to accept our Terms and Conditions to sign up! "); }

  //Ensuring only numbers provided in phone number
  if (!ctype_digit($phoneNumber)) {
        array_push($errors, "• Please provided a proper Phone Number(Numbers Only)!");
  } 

  if (empty($email)) { array_push($errors, "• Email is required! "); }
  if (empty($password_1)) { array_push($errors, "• Password is required! "); }
  if ($password_1 != $password_2) {
	array_push($errors, "• Passwords do not match! ");
  }

  //Ensuring user provides a strong password
  if (strlen($password_1) < 6) { array_push($errors, "• Password must be greater than 6 characters! "); }
  if (!preg_match("#[0-9]+#", $password_1) ) { array_push($errors, "• Password must contain at least one number! "); }
  if (!preg_match("#[a-z]+#", $password_1) ) { array_push($errors, "• Password must contain at least one letter! "); }
  if (!preg_match("#[A-Z]+#", $password_1) ) { array_push($errors, "• Password must contain at least one uppercase letter! "); }


  //checking the database to make sure user does not already exist with the same email or Company Name
  $user_check_query = "SELECT * FROM salesProfessionalAccounts WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "• Email already exists!");
    }
  }

  //Checking image validity
  $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
  if($check !== false) {
      $uploadOk = 1;
  } else {
      array_push($errors, "• File is not an image! ");
      $uploadOk = 0;
  }

  //Profile Image Upload
  // Check if file already exists
  if (file_exists($target_file)) {
      array_push($errors, "• File name Already Exists! Please choose a Unique name for your file! ");
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["profilepic"]["size"] > 10000000) {
      array_push($errors, "• Sorry, your picture file is too large. Please choose a file less than 10MB!");
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      array_push($errors, "• Sorry, only JPG, JPEG, PNG & GIF files are allowed!");
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      array_push($errors, "• Sorry, your picture file was not uploaded! ");
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file)) {
      } else {
          array_push($errors, "• Sorry, there was an error uploading your picture file!");
      }
  }

  //Resume File Upload
  // Check if file already exists
  if (file_exists($target_resume)) {
      array_push($errors, "• Resume file name Already Exists! Please choose a Unique name for your file! ");
      $uploadResumeOk = 0;
  }
  // Check file size
  if ($_FILES["resume"]["size"] > 10000000) {
      array_push($errors, "• Sorry, your resume file is too large. Please choose a file less than 10MB! ");
      $uploadResumeOk = 0;
  }
  // Allow certain file formats
  if($resumeFileType != "pdf" && $resumeFileType != "docx" && $resumeFileType != "xls") {
      array_push($errors, "• Sorry, only PDF, DOCX & XLS files are allowed! ");
      $uploadResumeOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadResumeOk == 0) {
      array_push($errors, "• Sorry, your resume file was not uploaded!");
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_resume)) {
      } else {
          array_push($errors, "• Sorry, there was an error uploading your resume file!");
      }
  }




  // Registering user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password_1, PASSWORD_BCRYPT);//encrypt the password before saving in the database

  	$query = "INSERT INTO salesProfessionalAccounts (firstName, lastName, email, password, resume, picture, years, technique, speciality, languages, otherLanguages, street, state, country, phone, linkedIn, skype, whatsapp, imo, lineInfo) 
  			  VALUES('$firstName', '$lastName', '$email', '$password', '$target_resume', '$target_file', '$years', '$salesT', '$speciality', '$languageT', '$otherLanguages', '$street', '$state', '$country', '$phoneNumber', '$linkedIn', '$skype', '$whatsapp', '$imo', '$line')";
  	mysqli_query($db, $query);
  	$_SESSION['email_id'] = $email;
  	header('location: Profile/salesProfessional/profile_home_sales.php');
  }

} 


// Signing Up Businesses User 
if (isset($_GET['reg_business_user'])) {

  // receive all input values from the form
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $companyName = mysqli_real_escape_string($db, $_POST['companyName']);
  $industry = mysqli_real_escape_string($db, $_POST['industry']);
  $otherIndustry = mysqli_real_escape_string($db, $_POST['otherIndustry']);
  $webAddress = mysqli_real_escape_string($db, $_POST['webAddress']);
  $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
  $plan = mysqli_real_escape_string($db, $_POST['plan']);
  $type = mysqli_real_escape_string($db, $_POST['type']);
  $businessDescript = mysqli_real_escape_string($db, $_POST['businessDescript']);
  $street = mysqli_real_escape_string($db, $_POST['street']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $termsCondition = implode(',', $_POST['terms']);


  // form validation: ensure that the form is correctly filled ...
  if (empty($firstName)) { array_push($errors, "• First Name is required! We didn't Subscribe You!"); }
  if (empty($lastName)) { array_push($errors, "• Last Name is required! We didn't Subscribe You!"); }
  if (empty($companyName)) { array_push($errors, "• Company Name is required! We didn't Subscribe You!"); }
  if (empty($industry)) { array_push($errors, "• Industry is required! We didn't Subscribe You!"); }
  if (empty($otherIndustry) && $industry == 'Other') { array_push($errors, "• Please specify other Industry! We didn't Subscribe You!"); }
  if (empty($businessDescript)) { array_push($errors, "• Please provide a business Description! We didn't Subscribe You!"); }
  if (empty($webAddress)) { array_push($errors, "• Please provide a website! We didn't Subscribe You!"); }
  if (empty($email)) { array_push($errors, "• Email is required! We didn't Subscribe You!"); }
  if (empty($password_1)) { array_push($errors, "• Password is required! We didn't Subscribe You!"); }
  if (empty($plan)) { array_push($errors, "• Please select a plan! We didn't Subscribe You!"); }
  if (empty($state)) { array_push($errors, "• Please select a state! We didn't Subscribe You!"); }
  if (empty($country)) { array_push($errors, "• Please select a country! We didn't Subscribe You!"); }
  if (empty($termsCondition)) { array_push($errors, "• You need to accept our Terms and Conditions to sign up! "); }

  if ($password_1 != $password_2) {
  array_push($errors, "• Passwords do not match! We didn't Subscribe You!");
  }

  //Ensuring only numbers provided in phone number
  if (!ctype_digit($phoneNumber)) {
        array_push($errors, "• Please provided a proper Phone Number(Numbers Only)! We didn't Subscribe You!");
  } 

  //Ensuring user provides a strong password
  if (strlen($password_1) < 6) { array_push($errors, "• Password must be greater than 6 characters! We didn't Subscribe You!"); }
  if (!preg_match("#[0-9]+#", $password_1) ) { array_push($errors, "• Password must contain at least one number! We didn't Subscribe You!"); }
  if (!preg_match("#[a-z]+#", $password_1) ) { array_push($errors, "• Password must contain at least one letter! We didn't Subscribe You!"); }
  if (!preg_match("#[A-Z]+#", $password_1) ) { array_push($errors, "• Password must contain at least one uppercase letter! We didn't Subscribe You!"); }


  //checking the database to make sure user does not already exist with the same email or Company Name
  $user_check_query = "SELECT * FROM businessAccounts WHERE companyName='$companyName' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['companyName'] === $companyName) {
      array_push($errors, "• Company already registered! We didn't Subscribe You!");
    }

    if ($user['email'] === $email) {
      array_push($errors, "• Email already exists! We didn't Subscribe You!");
    }
  }

  // Registering user if there are no errors in the form
  if (count($errors) == 0) {

    //Setup Pay
    if(!isset($_POST['stripeToken']) || !isset($_POST['stripeEmail']) ){
      header('location: sme_signups.php');
      exit();
    }

    require_once('stripe-php-6.28.0/init.php');

    $stripe = [
      "secret_key"      => "sk_test_PzzneDgZQJTq2PUcVSr0o6yW",
      "publishable_key" => "pk_test_CglILUEaaTq21KcB24Jl1xJk",
    ];

    \Stripe\Stripe::setApiKey($stripe['secret_key']);


    $token  = $_POST['stripeToken'];
    $emailpay  = $_POST['stripeEmail'];

      //Creating customer
      $customer = \Stripe\Customer::create([
          'email' => $emailpay,
          'source'  => $token,
      ]); 

      //Creating a Subscription
      \Stripe\Subscription::create([
      "customer" => $customer->id,
      "items" => [
        [
          "plan" => "plan_EINkPcsCwyL42G"
        ]
      ],
      "trial_period_days" => 14,
    ]);

    $cuId = $customer->id;           

    $password = password_hash($password_1, PASSWORD_BCRYPT);//encrypt the password before saving in the database

    $query = "INSERT INTO businessAccounts (firstName, lastName, email, password, companyName, industry, otherIndustry, businessDescript, street, state, country, webAddress, phoneNumber, type, plan, customer_id, account_status) 
          VALUES('$firstName', '$lastName', '$email', '$password', '$companyName', '$industry', '$otherIndustry', '$businessDescript', '$street', '$state', '$country', '$webAddress', '$phoneNumber', '$type', '$plan', '$cuId', 'ACTIVE')";
    mysqli_query($db, $query);
    $_SESSION['email_idB'] = $email;
    header('location: Profile/business/profile_home_business.php');
  }
}

//Register Sales and Marketing Firm

if (isset($_GET['reg_salesMarketing_user'])) {

  // receive all input values from the form
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $firmName = mysqli_real_escape_string($db, $_POST['firmName']); 
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $businessDescript = mysqli_real_escape_string($db, $_POST['businessDescript']);

  //Setting up Copy of Work Upload
  $target_dir = "SalesMarketingFirmsFiles/";
  $target_file = $target_dir . basename($_FILES["copyWork"]["name"]);
  $uploadOk = 1;
  $copyWorkFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  //Setting up Additional Info Upload
  $target_additionalInfo = "";
  $uploadInfoOk = 1;
  $additionalFileType = "";
  if(!empty(basename($_FILES["additionalInfo"]["name"]))){

    $target_additionalInfo = $target_dir . basename($_FILES["additionalInfo"]["name"]);
    
    $additionalFileType = strtolower(pathinfo($target_additionalInfo,PATHINFO_EXTENSION));

  }

  
  

  $languageT = implode(',', $_POST['language']);

  $otherLanguages = mysqli_real_escape_string($db, $_POST['otherLanguage']);
  $street = mysqli_real_escape_string($db, $_POST['street']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
  $linkedIn = mysqli_real_escape_string($db, $_POST['linkedIn']);
  $skype = mysqli_real_escape_string($db, $_POST['skype']);
  $whatsapp = mysqli_real_escape_string($db, $_POST['whatsapp']);
  $imo = mysqli_real_escape_string($db, $_POST['imo']);
  $line = mysqli_real_escape_string($db, $_POST['line']);
  $plan = mysqli_real_escape_string($db, $_POST['plan']);
  $termsCondition = implode(',', $_POST['terms']);

  //Ensuring only numbers provided in phone number
  if (!ctype_digit($phoneNumber)) {
        array_push($errors, "• Please provided a proper Phone Number(Numbers Only)! We didn't Subscribe You!");
  } 



  // form validation: ensure that the form is correctly filled ...
  if (empty($firstName)) { array_push($errors, "• First Name is required! We didn't Subscribe You!"); }
  if (empty($lastName)) { array_push($errors, "• Last Name is required! We didn't Subscribe You!"); }
  if (empty($firmName)) { array_push($errors, "• Firm Name is required! We didn't Subscribe You!"); }
  if (empty($email)) { array_push($errors, "• Email is required! We didn't Subscribe You!"); }
  if (empty($businessDescript)) { array_push($errors, "• A Business Description is required! We didn't Subscribe You!"); }
  if (empty(basename($_FILES["copyWork"]["name"]))) { array_push($errors, "• A Copy of your previous work is required! We didn't Subscribe You!"); }
  if (empty($languageT)) { array_push($errors, "• Please select atleast one language! We didn't Subscribe You!"); }
  if (empty($country)) { array_push($errors, "• Please select a Country! We didn't Subscribe You!"); }
  if (empty($state)) { array_push($errors, "• Please select a State! We didn't Subscribe You!"); }
  if (empty($phoneNumber)) { array_push($errors, "• Please add a phone Number! We didn't Subscribe You!"); }
  if (empty($plan)) { array_push($errors, "• Please select a plan! We didn't Subscribe You!"); }
  if (empty($password_1)) { array_push($errors, "• Password is required! We didn't Subscribe You!"); }
  if (empty($termsCondition)) { array_push($errors, "• You need to accept our Terms and Conditions to sign up! "); }

  if ($password_1 != $password_2) {
  array_push($errors, "• Passwords do not match! We didn't Subscribe You!");
  }

  //Ensuring user provides a strong password
  if (strlen($password_1) < 6) { array_push($errors, "• Password must be greater than 6 characters! We didn't Subscribe You!"); }
  if (!preg_match("#[0-9]+#", $password_1) ) { array_push($errors, "• Password must contain at least one number! We didn't Subscribe You!"); }
  if (!preg_match("#[a-z]+#", $password_1) ) { array_push($errors, "• Password must contain at least one letter! We didn't Subscribe You!"); }
  if (!preg_match("#[A-Z]+#", $password_1) ) { array_push($errors, "• Password must contain at least one uppercase letter! We didn't Subscribe You!"); }


  //checking the database to make sure user does not already exist with the same email or Company Name
  $user_check_query = "SELECT * FROM marketingFirms WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists

    if ($user['email'] === $email) {
      array_push($errors, "• Email already exists! We didn't Subscribe You!");
    }

  }
  


  //Copy of Work File Upload Validation
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
      if (move_uploaded_file($_FILES["copyWork"]["tmp_name"], $target_file)) {
      } else {
          array_push($errors, "• Sorry, there was an error uploading your file! We didn't Subscribe You!");
      }
  }

  //Additional Info File Upload Validation
  // Check if file already exists
  if(!empty(basename($_FILES["additionalInfo"]["name"]))){

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
        if (move_uploaded_file($_FILES["additionalInfo"]["tmp_name"], $target_additionalInfo)) {
           //Do nothing
        } else {
             array_push($errors, "• Sorry, there was an error uploading your file! We didn't Subscribe You!");
        }
    }


  }
  


  // Registering user if there are no errors in the form
  if (count($errors) == 0) {

    //Setup Pay
    if(!isset($_POST['stripeToken']) || !isset($_POST['stripeEmail']) ){
      header('location: sales_marketing_signups.php');
      exit();
    }

    require_once('stripe-php-6.28.0/init.php');

    $stripe = [
      "secret_key"      => "sk_test_PzzneDgZQJTq2PUcVSr0o6yW",
      "publishable_key" => "pk_test_CglILUEaaTq21KcB24Jl1xJk",
    ];

    \Stripe\Stripe::setApiKey($stripe['secret_key']);


    $token  = $_POST['stripeToken'];
    $emailpay  = $_POST['stripeEmail'];

      //Creating customer
      $customer = \Stripe\Customer::create([
          'email' => $emailpay,
          'source'  => $token,
      ]); 

      //Creating a Subscription
      \Stripe\Subscription::create([
      "customer" => $customer->id,
      "items" => [
        [
          "plan" => "plan_EINkPcsCwyL42G"
        ]
      ],
      "trial_period_days" => 14,
    ]);   

    $cusId = $customer->id;        

    $password = password_hash($password_1, PASSWORD_BCRYPT);//encrypt the password before saving in the database

    $query = "INSERT INTO marketingFirms (firstName, lastName, firmName, email, password, businessDescript, copyWork, additionalInfo, languages, otherLanguages, street, state, country, phone, linkedIn, skype, whatsapp, imo, lineInfo, plan, customer_id, account_status) 
          VALUES('$firstName', '$lastName', '$firmName', '$email', '$password', '$businessDescript', '$target_file', '$target_additionalInfo', '$languageT', '$otherLanguages', '$street', '$state', '$country', '$phoneNumber', '$linkedIn', '$skype', '$whatsapp', '$imo', '$line', '$plan', '$cusId', 'ACTIVE')";
    mysqli_query($db, $query);
    $_SESSION['email_idF'] = $email;
    header('location: Profile/marketingFirms/profile_home_firm.php');
  }

} 



?>