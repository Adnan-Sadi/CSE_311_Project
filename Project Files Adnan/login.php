<?php 
  include_once 'header.php';
?>

 <div class="container">
 	<section id="signup-panel">
 		<h2>Log In</h2>
 		<form action="includes/login_inc.php" method= "post">
 		 <input type="text" name="name" placeholder="Username/Email...."><br>
 		 
 		 <input type="password" name="pwd" placeholder="Password...."><br>
 		 
 		 <button type="submit" name="submit">Log In</button><br>
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
