<?php 
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Project 01</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>
<body>
  <header> <!--header Starts-->
	<nav id="header-nav">
		<div class="container">
			<a id="logo" href="index.php">Clubs</a>

			
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="clubs.php">Clubs</a></li>
				<li> <a href="#">About</a></li>

				<?php
				 if (isset($_SESSION["useruid"])) {
					 echo "<li><a href='profile.php'>Profile Page</a></li>";
					 echo "<li><a href='includes/logout_inc.php'>Log out</a></li>";
				 }

				else if (isset($_SESSION["email"])) {
					 echo "<li><a href='profile.php'>Google Page</a></li>";
					 echo "<li><a href='includes/logout_inc.php'>Log out</a></li>";
				 }


				 else{
					echo "<li><a href='signup.php'>Sign Up</a></li>";
					echo "<li><a href='login.php'>Log In</a></li>"; 
				 }
				
				?>	
			</ul>

			<div class="searchBar"><input type="text" name="search" placeholder="Search Clubs...."><button type="submit" name="submitSearch" class="fas fa-search"></button></div>
			
		</div>
	</nav>
</header><!--header Ends-->