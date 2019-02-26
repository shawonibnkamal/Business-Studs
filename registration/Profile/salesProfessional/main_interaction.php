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

  unset($_SESSION['success']);  //to stop displaying password was changed on setting page when u go back

?>
<html lang="en">
<head>



<style>
</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../style2.css" rel="stylesheet">
	<link href="../style_dashboard.css" rel="stylesheet">
  <title> Main Feed </title>
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
  <li class="nav-item active">
    <a class="nav-link" href="#"><i class="fas fa-tachometer-alt"></i> Main</a>
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
  <li class="nav-item">
    <a class="nav-link" href="settings.php"><i class="fas fa-wrench"></i> Settings</a>
  </li>
  <li class="nav-item">

    <?php  if (isset($_SESSION['email_id'])) : ?>
    <a class="nav-link" href="main_interaction.php?logout='1'"><i class="fas fa-sign-out-alt"></i> Log out</a>
    <?php endif ?>
    
  </li>

</ul>
</div>
<div class="body-part">
<div class="container">

  <div class="feed">
    
        
        <div class="feed-boxes" style="width: 800px;">
          <span class="feed-pic pro-pic"><i class="fas fa-briefcase"></i></span>
          <a href="#"><b>Development Team</b> </a><br>
          <span class="feed-date">Date</span>
          <p>Thank you for joining Business Studs! Main Feed coming soon! Only Businesses and Firms Can Post!</p>
          
          <div>
            <p style="float: left;">
              <span style="color: green">0</span> <a href="#/"><i class="fas fa-thumbs-up"></i></a>  &nbsp; 
              <span style="color: red">0</a> <a href="#/"><i class="fas fa-thumbs-down"></i></a>
              </p><p style="float: right;">
              <span class="comment-appear" style="text-align: right"><a href="#/">Comment (1)</a></span>
            </p>
            <div style="clear: both;"></div>
          </div>
          <div class="comment-form form-group">
            
            <textarea class="form-control"  rows="3"></textarea>
            <p style="text-align: right; margin-top: 10px;"><button type="submit" class="btn btn-primary mb-2">Comment</button></p>
            <hr>
            <div class="comment-boxes">
              <span class="feed-pic pro-pic"><i class="fas fa-briefcase"></i></span>
              <a href="#"><b>Development Team</b> </a> <br>
              <p>Hello! How is it going?</p>
              <div>
                <p style="float: left;">
                  <span style="color: green">0</span> <a href="#/"><i class="fas fa-thumbs-up"></i></a>  &nbsp; 
                  <span style="color: red">0</a> <a href="#/"><i class="fas fa-thumbs-down"></i></a></span>
                  <span style="margin-left: 20px;">Date</span>
                  </p>
                <div style="clear: both;"></div>
              </div>
            </div>
          </div>
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