<?php
    require 'header.php';
    require_once 'includes/db_inc.php';
    require_once 'includes/functions_inc.php';
    
    $userEmail = $_SESSION["userEmail"];
    $sql = "SELECT *
            FROM all_users a
            INNER JOIN users u
            ON a.UserEmail = u.Email
            WHERE a.UserEmail = '$userEmail';";

    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($result);

?>


    <div class="container">
       <br><br> <div class="row">

            <div class="col-md-5">
                  <?php 
                  if($data["Image"] != ''){
                  echo "<img id='user_image' src='images/Profile_Pictures/".$data["Image"]."' width='250' height='250'><br>";
                  }
                  else{
                  echo "<img id='user_image' src='images/blank_image_1.png' width='300' height='300'>";
                  }
                  ?>
                  <form method="post" enctype="multipart/form-data">
                  <label>Change Profile Picture</label><br>
                  <input type="file" name="change_image" id="change_image">
                  </form>
            </div>

            <div class="col-md-7" >
                <ul class="list-group" id="user_info">

                  <li class="list-group-item " ><label>First Name:</label> <span> <?php echo $data["First_Name"]; ?> </span></li>
                  <li class="list-group-item " ><label>Last Name:</label> <span> <?php echo $data["Last_Name"]; ?> </span> </li> 
                  <li class="list-group-item " ><label>Username:</label> <span><?php echo $data["UserName"]; ?> </span> </li> 
                  <li class="list-group-item " ><label>Email: </label> <span> <?php echo $data["Email"]; ?> </span></li>
                  <li class="list-group-item " ><label>Alternate Email:</label> <span> <?php echo $data["Alt_Email"]; ?> </span></li> 
                  <li class="list-group-item " ><button type="button" id="<?php echo $data["uid"]?>" class="btn btn-info btn-md edit_button">Edit</button></li> 
                </ul>
                
            </div>
        </div>
    
    
      <br><br>
    
        <div class="row">
            <div class="col-md-6">
                <h4><u>Clubs following</u></h4><br>
                <ul class="list-unstyled">

                <?php
                 $sql2 = "SELECT Club_fname,Club_Name,Club_logo
                          FROM followclubs NATURAL JOIN clubs
                          WHERE UserId = (SELECT UserId
                                          FROM all_users
                                          WHERE UserEmail = '$userEmail');";
                 
                 $result2 = mysqli_query($conn,$sql2);

                 while($row = mysqli_fetch_assoc($result2)){
                    
                             echo "        
                             <li class='media'>
                             <img class='mr-3' src='images/".$row["Club_logo"]."' alt='Generic placeholder image' width='64' height='64'>
                             <div class='media-body'>
                             <h5 class='mt-0 mb-1 mr-2 float-left' id='club_name' onclick='location.href=\"Club page/Club_main.php?shortname=".$row["Club_Name"]."\";'>".$row["Club_fname"]."</h5>
                             </div>
                             </li><br>      
                                ";                      
                 }


                ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h4><u>Events following</u></h4>
            </div>
        </div>
    </div>

    <div id="Edit_User_Modal" class="modal fade">
                <div class="modal-dialog">
                  <form method="post" id="edit_user_form" enctype="multipart/form-data">
                    <div class="modal-content">

                     <div class="modal-header">
                      <h4 class="modal-title" align="center">Edit User</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>

                     <div class="modal-body">

                        <label>First Name</label><br>
                        <input type="text" name="fname" id="fname" class="form-control"><br>
                        <label>Last Name</label><br>
                        <input type="text" name="lname" id="lname" class="form-control"><br>
                        <label>Alternate Email</label><br>
 		                <input type="text" name="alt_email" id="alt_email" class="form-control"><br>
                
                     </div>

                     <div class="modal-footer">
                        <input type="hidden" name="operation" id="operation" value="Edit_user">
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Confirm"/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>

                    </div>
                  
                   </form>
                </div>
              </div>



<?php
    require 'footer.php';
?>

