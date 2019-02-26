<?php 
  session_start(); 

  include('/home3/j6uj8460/servers/connectionB.php');
  include('/home3/j6uj8460/servers/settingsServerB.php');
  
  if(isset($_SESSION['success'])){
  	$message = $_SESSION['success'];

  }

  if (!isset($_SESSION['email_idB'])) {
  	header('location: ../../login.html');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email_idB']);
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
	<title> Account Settings </title>
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
    <a class="nav-link" href="profile_home_business.php"><i class="fas fa-user-alt"></i> Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="opportunity_business.php"><i class="fas fa-briefcase"></i> Opportunities</a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="#"><i class="fas fa-wrench"></i> Settings</a>
  </li>
  <li class="nav-item">
    <?php  if (isset($_SESSION['email_idB'])) : ?>
    <a class="nav-link" href="settings.php?logout='1'"><i class="fas fa-sign-out-alt"></i> Log out</a>
    <?php endif ?>
  </li>

</ul>
</div>
<div class="body-part">
<div class="container">


	<div style="width: 900px; border-radius: 25px; background: #60F5A0; padding: 20px; margin-bottom: 5px;">

		<p style="text-align: center">
					<span class="pro-pic"><i class="fas fa-briefcase"></i></span> <br>
					<span class="name"> <?php echo $company_name ?></span><br>
					<?php  if (isset($_SESSION['email_idB'])) : ?>
					<span class="name"> <?php echo $user_fname." ".$user_lname ?> </span><br>
                	<?php endif ?>
                	<span class="badge badge-success">Business</span><br>
					<i class="fas fa-home"></i> Based in <?php echo $streetAddress.", ".$stateAddress.", ".$country  ?> <br>
					<i class="fas fa-briefcase"></i> Business Type: <?php echo $business_type ?> <br>
					<i class="fas fa-industry"></i> Industry: <?php echo $industry ?> <br>
					<span class="badge badge-info" style="margin-left: 25px;">English</span><br><br>

					<b>Contact information</b> <br>
					<i class="fas fa-globe-asia"></i> Website: <?php echo $website ?> <br>
					<i class="fas fa-envelope"></i> Email: <?php echo $userid ?> <br>
					<i class="fas fa-phone-square"></i> Phone number: <?php echo $phoneNumber ?> <br>
		</p>

	</div>

	<div style="width: 900px; border-radius: 25px; background: #18d36e; padding: 20px; margin-bottom: 5px; text-align:center;">

		<form method="post" action="settings.php">
		<button type="submit" class="btn" name="unsubscribe_user" style="width: 300px;"> UnSubscribe From Monthly Plan :( </button>
		</form>

	</div>

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

	<div style="width: 900px; border-radius: 25px; background: #18d36e; padding: 20px; margin-bottom: 5px; position: absolute; text-align: center;">

		<form method="post" action="settings.php">

			<?php include('../../errors.php'); ?> 

			<div style="float: left; width: 50%;">

			<input type="text" name="firstName" style="color: white;" value="<?php echo $user_fname ?>" placeholder='firstName:*' required/>
			<input type="text" name="lastName" style="color: white;" value="<?php echo $user_lname ?>" placeholder='lastName:*' required/>
		
			<input type="text" name="companyName" style="color: white;" value="<?php echo $company_name ?>" placeholder='Company Name:*' required/>

			<!-- Address -->
			<input type="text" name="street" style="color: white;" value="<?php echo $streetAddress ?>" placeholder='Street:' required/>
			<p style="margin-top: 10px; color: white; font-size: 1em;"> Current Country: <?php echo $country ?>  </p>
			<p style="margin-top: 10px; color: white; font-size: 1em;"> Current State: <?php echo $stateAddress ?>  </p>
			

			
			
			</div>

			<div style="float: right; width: 50%;">

				<textarea name="businessDescript" style="height: 110px; font-size: 0.8em; width: 50%; background-color:#18d36e; color: white; border: 1px solid rgb(255, 255, 255);" placeholder="Business Description:* " required> <?php echo $business_description ?> </textarea>

			<!-- Code for business industry -->
	        <select name="industry"  style="margin-left: 105px;" required>
	          <optgroup label="Industry" name="industry">
	            <option selected hidden value="<?php echo $industry ?>"> <?php echo $industry ?></option>
	            <option value="Agriculture">Agriculture</option>
	            <option value="Apparel">Apparel</option>
	            <option value="Banking">Banking</option>
	            <option value="Biotechnology">Biotechnology</option>
	            <option value="Chemicals">Chemicals</option>
	            <option value="Communications">Communications</option>
	            <option value="Construction">Construction</option>
	            <option value="Consulting">Consulting</option>
	            <option value="Education">Education</option>
	            <option value="Electronics">Electronics</option>

	            <option value="Energy">Energy</option>
	            <option value="Engineering">Engineering</option>
	            <option value="Entertainment">Entertainment</option>
	            <option value="Environmental">Environmental</option>
	            <option value="Finance">Finance</option>
	            <option value="Food & Beverage">Food & Beverage</option>
	            <option value="Government">Government</option>
	            <option value="Healthcare">Healthcare</option>
	            <option value="Hospitality">Hospitality</option>
	            <option value="Insurance">Insurance</option>

	            <option value="Machinery">Machinery</option>
	            <option value="Manufacturing">Manufacturing</option>
	            <option value="Media">Media</option>
	            <option value="Not For Profit">Not For Profit</option>
	            <option value="Recreation">Recreation</option>
	            <option value="Retail">Retail</option>
	            <option value="Shipping">Shipping</option>
	            <option value="Technology">Technology</option>
	            <option value="Telecommunications">Telecommunications</option>
	            <option value="Transportation">Transportation</option>
	            <option value="Utilities">Utilities</option>
	            <option value="Other">Other</option>
	            
	          </optgroup>       
	        </select>

			<input type="text" name="webAddress" style="color: white;" value="<?php echo $website ?>" placeholder='Website:*' required/>
			<input type="text" name="phoneNumber" style="color: white;" maxlength="15" value="<?php echo $phoneNumber ?>" placeholder='Phone Number:*' required/>
			
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