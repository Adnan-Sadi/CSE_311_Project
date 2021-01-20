<?php

             $clubId = $row["ClubId"];
         
             $sql2 = "SELECT * 
                      FROM followclubs
                      WHERE ClubId = $clubId AND UserId = (SELECT UserId
                                                           FROM all_users
                                                           WHERE UserEmail = '$userEmail')";
             $result2 = mysqli_query($conn,$sql2);
         
             if(mysqli_num_rows($result2)>0){
         
             echo "        
             <li class='media'>
             <img class='mr-3' src='images/".$row["Club_logo"]."' alt='Generic placeholder image' width='64' height='64'>
             <div class='media-body'>
             <h5 class='mt-0 mb-1 mr-2 float-left' id='club_name' onclick='location.href=\"Club page/Club_main.php?Id=".$row["ClubId"]."\";'>".$row["Club_fname"]."</h5>
         
             <button type='button' class='btn btn-outline-danger btn-sm unfollow_club' id='".$row["ClubId"]."'>Unfollow</button><br>
             ".$row["Description"]."
             </div>
             </li><br><br>       
                "; 
             }
         
             else{
             echo "
         
             <li class='media'>
             <img class='mr-3' src='images/".$row["Club_logo"]."' alt='Generic placeholder image' width='64' height='64'>
             <div class='media-body'>
             <h5 class='mt-0 mb-1 mr-2 float-left' id='club_name' onclick='location.href=\"Club page/Club_main.php?Id=".$row["ClubId"]."\";'>".$row["Club_fname"]."</h5>
         
             <button type='button' class='btn btn-outline-success btn-sm follow_club' id='".$row["ClubId"]."'>Follow</button><br>
             ".$row["Description"]."
             </div>
             </li><br><br>            
            ";
             }


?>