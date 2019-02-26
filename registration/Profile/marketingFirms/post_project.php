<?php 
  session_start(); 
  

  include('/home3/j6uj8460/servers/connectionF.php');


  if (!isset($_SESSION['email_idF'])) {
  	header('location: ../../login.html');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email_idF']);
  	header("location: ../../login.html");
  }

  unset($_SESSION['success']);  //to stop displaying password was changed on setting page when u go back

?>
<!DOCTYPE html>
<html lang="en">
<head>



<style>
</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/tail.select@0.5.4/css/tail.select-bootstrap4.css" rel="stylesheet">
	<link href="../../style2.css" rel="stylesheet">
	<link href="../style_dashboard.css" rel="stylesheet">
	<title>Post a project</title>
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
    <a class="nav-link" href="profile_home_firm.php"><i class="fas fa-user-alt"></i> Profile</a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="opportunity_firm.php"><i class="fas fa-briefcase"></i> Opportunities</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="settings.php"><i class="fas fa-wrench"></i> Settings</a>
  </li>
  <li class="nav-item">
  	<?php  if (isset($_SESSION['email_idF'])) : ?>
    <a class="nav-link" href="post_project.php?logout='1'"><i class="fas fa-sign-out-alt"></i> Log out</a>
    <?php endif ?>
    
  </li>

</ul>
</div>
<div class="body-part">
<div class="container" >

	<div class="block" style="max-width: 800px;">
		<h1>Post a project</h1>
		
		<form>
			<div class="form-group">
				<label for="exampleInputEmail1" class="form_label">Project Title</label>
				<input type="title" class="form-control" id="" aria-describedby="" placeholder="Enter title" required>
			</div>
			
			<div class="form-group">
				<label for="exampleFormControlTextarea1" class="form_label">Project description</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
			 </div>
			 
			<div class="form-group">
				<label for="exampleFormControlFile1" class="form_label">Upload files</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1">
			 </div>
			 
			<div class="form-group">
				<label for="exampleInputEmail1" class="form_label">Skills required</label>
				
				<select class="select" multiple>
					<option>Consultative selling</option>
					<option>Sales enablement</option>
					<option>Solution selling</option>
					<option>Conceptual selling</option>
					<option>Strategic selling</option>
					<option>Transactional selling</option>
					<option>Sales negotiation</option>
					<option>Inbound sales</option>
					<option>Reverse selling</option>
					<option>Upselling</option>
					<option>Cross-selling</option>
					<option>Paint-the-picture</option>
					<option>Take-out or take away</option>
					<option>Sales habits</option>
					<option>Relationship selling</option>
					<option>Sales outsourcing</option>
					<option>Cold calling</option>
					<option>Guaranteed sale</option>
					<option>Needs-based selling</option>
					<option>Professional selling skills</option>
					<option>Persuasive selling</option>
					<option>Hard selling</option>
					<option>Price based selling</option>
					<option>Target account selling</option>
					<option>Sandler selling system</option>
					<option>Challenger sales</option>
					<option>Action selling</option>
					<option>Auctions</option>
					<option>Social selling</option>
					<option>Personal selling</option>
				</select>
				
			</div>
			
			<div class="form-group">
				<label for="exampleFormControlFile1" class="form_label">Payment type</label>
				<div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="payType" id="payRadio1" value="option1" required>
				  <label class="form-check-label" for="inlineRadio1">Commission/ Salary</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="payType" id="payRadio2" value="option2" required>
				  <label class="form-check-label" for="inlineRadio2">Pay plus commission</label>
				</div>
				</div>
				<div class="block2 paymentBlock1">
					<p>You chose fixed salary.</p>
				</div>
				<div class="block2 paymentBlock2">
					<p>You chose pay plus commission</p>
				</div>
			</div>
			
			<div class="form-group">
				<label for="exampleFormControlFile1" class="form_label">Budget</label>
				<div>
				<div class="form-check form-check-inline">
				    <input class="form-control" id="currency-input" list="currency" placeholder="$" required>
					<datalist id="currency">
						<option value="CAD">
						<option value="USD">
						<option value="GBP">
					</datalist>
				</div>
				<div class="form-check form-check-inline">
					<input type="" class="form-control" id="" aria-describedby="" placeholder="Enter amount" required>
				</div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="exampleFormControlFile1" class="form_label">Type of deal</label>
				<div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="dealType" id="dealRadio1" value="option1" checked="checked" required>
				  <label class="form-check-label" for="standardDeal">Standard Deal</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="dealType" id="dealRadio2" value="option2" required>
				  <label class="form-check-label" for="customizedDeal">Customized Deal</label>
				</div>
				</div>
				<div class="block2 dealBlock1">
					<p>Project is free to post</p>
					<p><b>Free</b></p>
				</div>
				<div class="block2 dealBlock2">
					<p>Customized deal costs $10</p>
					<p><b>$10</b></p>
				</div>
			</div>
			
			<p class="text-right"><button type="submit" class="btn btn-primary">Post the project</button></p>
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
	<script src="https://cdn.jsdelivr.net/npm/tail.select@0.5.4/js/tail.select.min.js"></script>
	<script>
		// Vertical menu when on mobile. Slides open and closes it.
		$(".menubar").on("click", function() {
			$(".vertical-menu").toggle('slide','left',400);
			$(".close-vertical").toggle()
		});
		
		$(".comment-appear").on("click", function() {
			$(".comment-form").slideToggle()
		})
		
		//Skills select option
		tail.select(".select");
		
		//Div appearing when radio checked for payment type
		function optionChecked3() {
			$(".paymentBlock1").fadeIn();
			$(".paymentBlock2").hide();
		}
		
		function optionChecked4() {
			$(".paymentBlock2").fadeIn();
			$(".paymentBlock1").hide();
		}
		
		$("input[id=payRadio1]").on("click", optionChecked3);
		$("input[id=payRadio2]").on("click", optionChecked4);
		
		//Div appearing when radio checked for type of deal
		function optionChecked1() {
			$(".dealBlock1").fadeIn();
			$(".dealBlock2").hide();
		}
		
		function optionChecked2() {
			$(".dealBlock2").fadeIn();
			$(".dealBlock1").hide();
		}
		
		$("input[id=dealRadio1]").on("click", optionChecked1);
		$("input[id=dealRadio2]").on("click", optionChecked2);
	</script>
</html>