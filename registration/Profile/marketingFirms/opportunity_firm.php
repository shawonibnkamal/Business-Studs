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
	<link href="../../style2.css" rel="stylesheet">
	<link href="../style_dashboard.css" rel="stylesheet">
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
    <a class="nav-link" href="#"><i class="fas fa-briefcase"></i> Opportunities</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="settings.php"><i class="fas fa-wrench"></i> Settings</a>
  </li>
  <li class="nav-item">

  	<?php  if (isset($_SESSION['email_idF'])) : ?>
    <a class="nav-link" href="opportunity_firm.php?logout='1'"><i class="fas fa-sign-out-alt"></i> Log out</a>
    <?php endif ?>

  </li>

</ul>
</div>
<div class="body-part">
<div class="container">
	<div class="block">
		<h1 style="float: left;">My Opportunities</h1>
		<a href="post_project.php"><button style="float: right;" class="btn btn-primary">Post Project</button></a>
		<table class="table table-hover">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Opportunity</th>
			  <th scope="col">Completeness</th>
			  <th scope="col">Commission</th>
			  <th scope="col">Agents</th>
			</tr>
		  </thead>
		  <tbody>
				
				<!-- <tr>
				  <th scope="row">1</th>
				  <td><a href="projects_page.html">Opportunitiy Name 1</a></td>
				  <td>Bid open</td>
				  <td> </td>
				  <td> </td>
				</tr>
				
				<tr>
				  <th scope="row">2</th>
				  <td><a href="project_messaging.html">Opportunitiy Name 2</a></td>
				  <td>18%</td>
				  <td> </td>
				  <td> </td>
				</tr> -->
			
		  </tbody>
		</table>
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