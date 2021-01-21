<?php 
  include_once 'header.php';
  require_once 'config.php';

  $loginUrl = $gClient->createAuthUrl();

?>

 <div class="container">
 	<section id="signup-panel">
 		<br><h2>Log In</h2>
 		<form action="includes/login_inc.php" method= "post">
 		 <input type="text" name="name" placeholder="Username/Email...."><br>
 		 
 		 <input type="password" name="pwd" placeholder="Password...."><br>
 		 
		  <button type="submit" id="login_button" name="submit" class="btn btn-primary btn-lg">Log In</button><br>
		  <input type="button" id="login_button" value= "Log In With Google" class="btn btn-danger btn-lg" onclick= "window.location = '<?php echo $loginUrl; ?>';">
 		 </form>

		<?php
        if(isset($_GET["error"])){
		if($_GET["error"] == "emptyinput"){
			echo "<p> Fill in all fields!</p>";
		}

		else if($_GET["error"] == "wronglogin"){
			echo "<p> Incorrect login information!</p>";
		}

	    }

        ?>

 	</section>
 </div>

<?php 
  include_once 'footer.php';
?>
