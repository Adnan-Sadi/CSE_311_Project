<?php 
  include_once 'header.php';
?>

 <div class="container">
 	<section id="signup-panel">
 		<h2>Sign Up</h2>
 		<form action="includes/signup_inc.php" method="post">
 		 <input type="text" name="name" placeholder="Full name...."><br>
 		 <input type="text" name="email" placeholder="Email...."><br>
 		 <input type="text" name="userid" placeholder="Username...."><br>
 		 <input type="password" name="pwd" placeholder="Password...."><br>
 		 <input type="password" name="pwdrepeat" placeholder="Repeat Password...."><br>
 		 <button type="submit" name="submit" class="btn btn-primary">Sign up</button><br>
 		 </form>

		<?php
        if(isset($_GET["error"])){
		if($_GET["error"] == "emptyinput"){
			echo "<p> Fill in all fields!</p>";
		}

		else if($_GET["error"] == "invaliduid"){
			echo "<p> Choose a proprer username!</p>";
		}

		else if($_GET["error"] == "invalidemail"){
			echo "<p> Choose a proprer email!</p>";
		}

		else if($_GET["error"] == "pwdsdontmatch"){
			echo "<p> Passwords doesn't match!</p>";
		}

		else if($_GET["error"] == "usernametaken"){
			echo "<p> Username/Email already taken!</p>";
		}
		else if($_GET["error"] == "stmtfailed"){
			echo "<p> Something went wrong please try again!</p>";
		}
		else if($_GET["error"] == "none"){
			echo "<p> You have signed up!</p>";
		}
	}

        ?>
 	</section>
 </div>



<?php 
  include_once 'footer.php';
?>
