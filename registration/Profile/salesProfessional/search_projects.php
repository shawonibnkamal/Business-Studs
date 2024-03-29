<?php 
  session_start(); 
  
  include('/home3/j6uj8460/servers/connectionS.php');
  
  if (!isset($_SESSION['email_id'])) {
  	header('location: ../../login.html');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email_id']);
  	header("location: ../../login.html");
  }

  unset($_SESSION['success']);

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
	<title> Search For Projects</title>
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
  <li class="nav-item active">
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
  <li class="nav-item">
    <a class="nav-link" href="settings.php"><i class="fas fa-wrench"></i> Settings</a>
  </li>
  <li class="nav-item">
    
    <?php  if (isset($_SESSION['email_id'])) : ?>
    <a class="nav-link" href="search_projects.php?logout='1'"><i class="fas fa-sign-out-alt"></i> Log out</a>
    <?php endif ?>

  </li>

</ul>
</div>
<div class="body-part">
<div class="container">

	<div class="row">
		<div class="col-lg-3">
			<div class="block search-filters">
			
			<b>Industry</b>
			<select id="industry" class="select" name="business_industry" multiple>
			  <optgroup label="Industry">
				<option value="industry_1">Industry</option>
				<option value="industry_1">Agriculture</option>
				<option value="industry_2">Apparel</option>
				<option value="industry_3">Banking</option>
				<option value="industry_4">Biotechnology</option>
				<option value="industry_5">Chemicals</option>
				<option value="industry_6">Communications</option>
				<option value="industry_7">Construction</option>
				<option value="industry_8">Consulting</option>
				<option value="industry_9">Education</option>
				<option value="industry_10">Electronics</option>

				<option value="industry_11">Energy</option>
				<option value="industry_12">Engineering</option>
				<option value="industry_13">Entertainment</option>
				<option value="industry_14">Environmental</option>
				<option value="industry_15">Finance</option>
				<option value="industry_16">Food & Beverage</option>
				<option value="industry_17">Government</option>
				<option value="industry_18">Healthcare</option>
				<option value="industry_19">Hospitality</option>
				<option value="industry_20">Insurance</option>

				<option value="industry_21">Machinery</option>
				<option value="industry_22">Manufacturing</option>
				<option value="industry_23">Media</option>
				<option value="industry_24">Not For Profit</option>
				<option value="industry_25">Recreation</option>
				<option value="industry_26">Retail</option>
				<option value="industry_27">Shipping</option>
				<option value="industry_28">Technology</option>
				<option value="industry_29">Telecommunications</option>
				<option value="industry_30">Transportation</option>
				<option value="industry_31">Utilities</option>
				<option value="industry_31">Other</option>
				
			  </optgroup>       
			</select>
			
			<hr>
			<b>Skills</b>
				<select class="select" multiple>
					<optgroup label="Skills">
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
					</optgroup> 
				</select>
				
				<hr>
				<b>Project Type</b>
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				  <label class="form-check-label" for="defaultCheck1">
					Commission/ Salary
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				  <label class="form-check-label" for="defaultCheck1">
					Pay Plus Commission
				  </label>
				</div>
				<hr>
				<b>Location</b>
				<input type="text" class="form-control">
			</div>
		</div>
		
		<div class="col-lg-9">
			<div class="block">
			
				<form class="search-form">
				  <div class="form-group">
				  <div class="row">
					<div class="col-10">
						<input type="text" class="form-control" id="inputPassword2" placeholder="Search">
					</div>
					<div class="col-2">
						<button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i></button>
					</div>
				  </div>
				  </div>
				</form>
				
				<a href="#" class="search-blocks-link">
					<div class="block search-blocks">
						<i class="fas fa-briefcase search-pic"></i>					
						<b style="float: left"> Development Team Project</b>
						<span class="project-budget">CAD $0.00</span>
						<div style="clear: both"></div>
						<p> Thank you for choosing Business Studs. Projects will be displayed here!</p>
						<span class="badge badge-secondary">Price based selling</span> 
						<span class="badge badge-secondary">Target account selling</span>
						<span class="badge badge-secondary">Sandler selling system</span> 
					</div>
				</a>
				
				
			</div>
			
			<div class="page-number">
				<span><a href="#">Previous</a> | <a href="#">1</a> | <a href="#">2</a> | <a href="#">3</a> | <a href="#">Next</a></span>
			</div>
			
		</div>
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
		$(".menubar").on("click", function() {
			$(".vertical-menu").toggle('slide','left',400);
			$(".close-vertical").toggle()
		});
		
		$(".comment-appear").on("click", function() {
			$(".comment-form").slideToggle()
		})
		
		//Skills select option
		tail.select(".select");
	</script>
</html>