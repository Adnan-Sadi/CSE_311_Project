<?php 
  include_once 'header.php';
    require_once 'includes/db_inc.php';

  $clubId = $_SESSION["club_number"];
  
  $id = mysqli_escape_string($conn,$_GET["NsuId"]) ;
  
  $sql = "SELECT Name,NsuId,Dept_Name,Email,PhoneNum,Position,Date_Joined
          FROM members m
          INNER JOIN departments d
          ON m.Dept_id = d.Dept_id
          WHERE ClubId = '$clubId' AND NsuId = '$id'
          LIMIT 1";

  $result = mysqli_query($conn,$sql);
  
  $data = mysqli_fetch_assoc($result);
  
  $sql = "SELECT Photo
          FROM executive_members NATURAL JOIN members
          WHERE ClubId = '$clubId' AND NsuId = '$id'";

  $result = mysqli_query($conn,$sql);

  if(mysqli_num_rows($result)>0){
  $data2 = mysqli_fetch_assoc($result);
  $image = $data2["Photo"];
  }
  else{
      $image = '';
  }
?>

<div class="container">
   
  <br><br><h2 align="center">Full Infromation</h2><br><br>

  <?php 
     if($image != ''){
         echo "<img id='member_image' src='images/Executive_Members/".$image."' width='300' height='400'>";
     }
     else{
         
     }
  ?>

   <ul class="list-group" id="mem_info">

     <li class="list-group-item " ><label>Name:</label> <span> <?php echo $data["Name"]; ?> </span></li>
     <li class="list-group-item " ><label>Id:</label> <span> <?php echo $data["NsuId"]; ?> </span> </li> 
     <li class="list-group-item " ><label>Department:</label> <span><?php echo $data["Dept_Name"]; ?> </span> </li> 
     <li class="list-group-item " ><label>Email: </label> <span> <?php echo $data["Email"]; ?> </span></li>
     <li class="list-group-item " ><label>Phone Number:</label> <span> <?php echo $data["PhoneNum"]; ?> </span> </li> 
     <li class="list-group-item " ><label>Position:</label> <span> <?php echo $data["Position"]; ?> </span> </li>     
     <li class="list-group-item " ><label>Joined On:</label> <span> <?php echo $data["Date_Joined"]; ?> </span> </li> 
   
   </ul><br><br>

</div>


<?php 
  include_once 'footer.php';
?>