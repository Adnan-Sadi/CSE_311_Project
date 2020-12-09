<?php 
  include_once 'header.php';
?>

  	    
 <div id="main-content" class="container">
 	    <?php
				 if (isset($_SESSION["useruid"])) {
					 echo "<p>Welcome " . $_SESSION["useruid"] . "</p>";	 
				 }
		
		?>
 </div>

<?php 
  include_once 'footer.php';
?>

