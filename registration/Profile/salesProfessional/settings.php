<?php 
  session_start(); 

  include('/home3/j6uj8460/servers/connectionS.php');
  include('/home3/j6uj8460/servers/settingsServerS.php');

  

  if(isset($_SESSION['success'])){
  	$message = $_SESSION['success'];

  }

  if (!isset($_SESSION['email_id'])) {
  	header('location: ../../login.html');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email_id']);
  	header("location: ../../login.html");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>

<style>

	[type=text] {
	  display: block;
	  margin: 0 auto;
	  width: 50%;
	  border: 0;
	  border-bottom: 1px solid rgb(255, 255, 255);
	  height: 45px;
	  line-height: 45px;  
	  margin-bottom: 20px;
	  font-size: 1em;
	  background-color: #18d36e;
	}

	[type=password] {
	  display: block;
	  margin: 0 auto;
	  width: 50%;
	  border: 0;
	  border-bottom: 1px solid rgb(255, 255, 255);
	  height: 45px;
	  line-height: 45px;  
	  margin-bottom: 20px;
	  font-size: 1em;
	  background-color: #18d36e;
	}

	[type='password']:focus {
	  outline: none;
	  color: white;
	}

	[type='text']:focus {
	  outline: none;
	  color: white;
	}

	::placeholder { 
	  color: white;
	  opacity: 1; 
	}

	:-ms-input-placeholder {
	  color: white;
	}

	[type=submit] {
	  margin-top: 25px;
	  margin-left: 36px;
  	  width: 80%;
	  border: 0;
	  background-color: #2C79E8;
	  border-radius: 5px;
	  height: 50px;
	  color: white;
	  font-weight: 400;
	  font-size: 1em;
	}

	select {
	  display: block;
	  margin: 0 auto;
	  width: 50%;
	  border: 0;
	  border-bottom: 1px solid rgba(0,0,0,.2);
	  height: 45px;
	  line-height: 15px;  
	  margin-bottom: 10px;
	  font-size: 1em;
	  color: rgba(0,0,0,.4);

	}




</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../style2.css" rel="stylesheet">
	<link href="../style_dashboard.css" rel="stylesheet">
	<title> Settings </title>
</head>


<header>

</header>

<body>
<div class="close-vertical menubar navbar-brand" ><a href="#"><i class="fas fa-times"></i></a></div>

<div class="collapsed-menu">
	<a href="#" class="menubar navbar-brand"><i class="fas fa-bars"></i></a>  <a class="navbar-brand" href="#">Business Studs</a>
</div>



<div class="vertical-menu">	

  <ul class="nav flex-column">
  <li class="nav-item nav-item-brand">
    <a class="navbar-brand" href="#">Business Studs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="main_interaction.php"><i class="fas fa-tachometer-alt"></i> Main</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="profile_home_sales.php"><i class="fas fa-user-alt"></i> Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="opportunity_sales.php"><i class="fas fa-briefcase"></i> Opportunities</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="leads.php"><i class="fas fa-bullseye"></i> Leads</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="territory_worked.php"><i class="fas fa-briefcase"></i> Territory worked</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="workons.php"><i class="fas fa-calendar-alt"></i> Work ons</a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="#"><i class="fas fa-wrench"></i> Settings</a>
  </li>
  <li class="nav-item">
    <?php  if (isset($_SESSION['email_id'])) : ?>
    <a class="nav-link" href="settings.php?logout='1'"><i class="fas fa-sign-out-alt"></i> Log out</a>
    <?php endif ?>
  </li>

</ul>
</div>
<div class="body-part">
<div class="container">


	<div style="width: 900px; border-radius: 25px; background: #60F5A0; padding: 20px; margin-bottom: 5px;">

		<p style="text-align: center">

					<img src="../../<?php echo $databasePicture?>" style="text-align: center" class="rounded-circle responsive pro-pic"/> <br>
					<span class="name"><?php echo $user_fname." ".$user_lname ?></span><br>
					<span class="badge badge-success">Sales Professional</span><br>
                	

                	<i class="fas fa-home"></i> Based in <?php echo $streetAddress.", ".$stateAddress.", ".$country ?> <br>

                	<i class="fas fa-building"></i> Years of experience: <?php echo $databaseYears ?> <br>

					<!-- Code for Techniques -->
					<i class="fas fa-brain"></i> Sales techniques: <br>
					
					<?php 

						
						$eachTechnique = explode(",", $databaseTechniques);
						$arrlength = count($eachTechnique);
						

						for ($x = 0; $x < $arrlength; $x++) {
						    echo "<span class='badge badge-info' style='margin-left: 25px;'> $eachTechnique[$x] </span> ";
						} 


					 ?>
					<br>
					<i class="fas fa-user-tie"></i> Speciality: <?php echo $databaseSpeciality ?> <br>
					
					<i class="fas fa-globe-asia"></i> Languages spoken: <br>
					
					<!-- Code for Languages -->
					<?php 

						
						$eachLanguage = explode(",", $languages);
						$arrlength = count($eachLanguage);
						

						for ($x = 0; $x < $arrlength; $x++) {
						    echo "<span class='badge badge-info' style='margin-left: 25px;'> $eachLanguage[$x] </span> ";
						} 


					 ?>
 					
 					 <br><br>
					 <!-- Resume -->
					 <i class="fas fa-user-tie"></i> Resume:
					 <a href="../../<?php echo $databaseResume?>" download="<?php echo $user_fname." ".$user_lname." Resume" ?>">
					 	<span class="badge badge-info" style="margin-left: 25px;"> View Resume</span>
					 </a><br>


					 
					
					<br><br>
					<b>Contact information</b> <br>
					
					<i class="fas fa-phone-square"></i> Phone number: <?php echo $phoneNumber ?> <br>
					<i class="fab fa-linkedin"></i> Linkedin: <?php echo $linkedIn ?> <br>
					<!-- check if other social handles are not empty -->
					<?php
					
						

						if(!empty($whatsapp)){
							echo" <i class='fab fa-whatsapp'></i> Whatsapp: $whatsapp <br> ";

						}

						if(!empty($skype)){
							echo" <i class='fab fa-skype'></i> Skype: $skype <br> ";

						}

						if(!empty($imo)){
							echo" <i class='fas fa-globe-asia'></i> Imo: $imo <br> ";

						}

						if(!empty($line)){
							echo" <i class='fab fa-line'></i> Line: $line <br> ";

						}

					?>




		</p>

	</div>

   
	<!--Update Password! -->
	<div style="width: 900px; border-radius: 25px; background: #18d36e; padding: 20px; margin-bottom: 5px; text-align:center;">

		<span style="color: blue;"> <?php echo $message ?>  </span> 
		<form method="post" action="settings.php">

			<?php  if (count($password_errors) > 0) : ?>
			  
			  	<?php foreach ($password_errors as $perror) : ?>
			  	  <p style="color: white;"><?php echo $perror ?></p>
			  	<?php endforeach ?>
			 
			<?php  endif ?>

			<input type="password" name="oldPassword" style="color: white;" placeholder='Old Password:*' required/>
			<input type="password" name="newPassword" style="color: white;" placeholder='New Password:*' required/>
			<button type="submit" class="btn" name="passwordChange" style="width: 300px;"> Change Password </button>


		</form>
	</div>

	<!--Update Info -->
	<div style="width: 900px; border-radius: 25px; background: #18d36e; padding: 20px; margin-bottom: 5px; position: absolute; text-align: center;">

		<form method="post" action="settings.php" enctype="multipart/form-data">

			<?php include('../../errors.php'); ?> 

			<div style="float: left; width: 50%;">

			<input type="text" name="firstName" style="color: white;" value="<?php echo $user_fname ?>" placeholder='firstName:*' required/>
			<input type="text" name="lastName" style="color: white;" value="<?php echo $user_lname ?>" placeholder='lastName:*' required/>
			
			<input type="text" name="years" style="color: white;" value="<?php echo $databaseYears ?>" placeholder=':*' required/>

			<input type="text" name="street" style="color: white;" value="<?php echo $streetAddress ?>" placeholder='Street:' required/>
			<p style="margin-top: 10px; color: white; font-size: 1em;"> Current Country: <?php echo $country ?>  </p>
			<p style="margin-top: 10px; color: white; font-size: 1em;"> Current State: <?php echo $stateAddress ?>  </p>
			<p style="color: white;" > To Change please select below: </p>
			
			<!-- Getting script from file to load countries code -->
		       <script type= "text/javascript" src = "../../countries.js"></script>

		       <select id="country" style="margin-left: 105px;" name="country" required>
		         <optgroup>
		          <option value='' disabled selected>Country</option>
		         </optgroup>
		       </select> 
		       
		       <select name="state" style="margin-left: 105px;" id="state" required>
		         <optgroup>
		          <option value='' disabled selected>State</option>
		         </optgroup>
		       </select> 
		       <!-- Script for loading countries from file into select fields. Should be left here -->
		       <script language="javascript">
		          populateCountries("country", "state"); 
		      </script>


			
			
			</div>

			<div style="float: right; width: 50%;">

				<input type="text" name="languages" style="color: white;" value="<?php echo $languages ?>" placeholder='Languages:*' required/>
				<input type="text" name="otherlanguages" style="color: white;" value="<?php echo $ootherLanguages ?>" placeholder='Other Languages:' />
				<input type="text" name="technique" style="color: white;" value="<?php echo $databaseTechniques ?>" placeholder='Techniques:' />

				<!-- Code for professional speciality -->
		       	<select id="speciality" name="speciality" style="margin-top: 20px; margin-left: 105px; margin-bottom: 20px;" required>
		          <optgroup label="Sales Speciality" name="speciality">
		            
		            <option selected hidden value="<?php echo $databaseSpeciality ?>"> <?php echo $databaseSpeciality ?></option>
		            <option value="B2B">B2B</option>
		            <option value="B2C">B2C</option>
		            <option value="Both B2B and B2C">Both B2B and B2C</option>      
		            
		          </optgroup>       
		        </select>



				<input type="text" name="linkedIn" style="color: white;" value="<?php echo $linkedIn ?>" placeholder='LinkedIn:' required/>
				<input type="text" name="phoneNumber" style="color: white;" maxlength="15" value="<?php echo $phoneNumber ?>" placeholder='Phone Number:*' required/>


		    <!-- Code for uploading copy of Work documents -->
	       <h3 style="margin-top: 10px; color: white; font-size: 1em;"> Change Resume(PDF)*: <input style="margin-left: 105px;" name="resume" id="resume" type="file" accept=".pdf,.doc" > </h3><br><br>
	      
	 
	       <!-- Code for uploading additional Info -->
	       <h3 style="margin-top: -35px; margin-left:55px; color: white; font-size: 1em;"> Change Profile Picture: <input style="margin-left: 50px;" name="profilepic" id="profilepic" type="file" accept=".jpg,.png,.jpeg,.gif" > </h3><br>
				
			
			</div>

			<button type="submit" class="btn" name="update_info"> Update Information </button>



		</form>

	</div>



	
	
</div>
</div>


</body>


	  
	  
	<!--Javascript files-->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script>
		$(".menubar").on("click", function() {
			$(".vertical-menu").toggle('slide','left',400);
			$(".close-vertical").toggle()
		});
		
		$(".comment-appear").on("click", function() {
			$(".comment-form").slideToggle()
		})
	</script>
</html>