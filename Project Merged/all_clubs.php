<?php
 require "header.php";
 require_once 'includes/db_inc.php';

 $sql = "SELECT * FROM clubs";
 
 $result = mysqli_query($conn,$sql);

?>


    <div class="container">
        <br><h2 class="section-head">All Clubs</h2><br>
        <ul class="list-unstyled">
        <?php 
         
         while($row = mysqli_fetch_assoc($result)){

            echo "
         
         <li class='media'>
         <img class='mr-3' src='images/".$row["Club_logo"]."' alt='Generic placeholder image' width='64' height='64'>
         <div class='media-body'>
         <h5 class='mt-0 mb-1' id='club_name' onclick='location.href=\"Club page/Club_main.php?shortname=".$row["Club_Name"]."\";'>".$row["Club_fname"]."</h5>
         ".$row["Description"]."
         </div>
         </li><br><br>
            
            ";
         }
        ?>
        </ul>  
        
    </div>

<?php
require "footer.php";
?>


