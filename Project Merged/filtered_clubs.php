<?php
 require "header.php";
 require_once 'includes/db_inc.php';

?>


    <div class="container">
        <br><h2 class="section-head">Filtered Results</h2><br>

        <ul class="list-unstyled">
        <?php 
        
        //1.Order clubs in Ascending or descending order of name 
        //2.Order clubs in Ascending or descending number of member count
        if(isset($_POST["filter1"])){
         
            $sort = $_POST["sort"];
            $sql = '';
            if($sort=="ASC" || $sort=="DESC"){
                  
                $sql = "SELECT * FROM clubs
                        ORDER BY Club_fname $sort;";
                        
            }

            elseif($sort == "m_DESC"){
                  $sql = " SELECT c.ClubId,c.Club_Name,c.Club_logo,c.Description,c.Club_fname,COUNT(m.m_id) AS mem_num
                           FROM clubs c LEFT OUTER JOIN members m
                           ON c.ClubId = m.ClubId
                           GROUP BY c.ClubId
                           ORDER BY mem_num DESC;";//left join is used to include all clubs in case a club has no members inserted yet
            }
            elseif($sort == "m_ASC"){
                  $sql = " SELECT c.ClubId,c.Club_Name,c.Club_logo,c.Description,c.Club_fname,COUNT(m.m_id) AS mem_num 
                           FROM clubs c LEFT OUTER JOIN members m
                           ON c.ClubId = m.ClubId
                           GROUP BY c.ClubId
                           ORDER BY mem_num ASC;";//left join is used to include all clubs in case a club has no members inserted yet
            }
            else{
                header("location: all_clubs.php");
                exit();
            }

         $result = mysqli_query($conn,$sql);
         
        if(isset($_SESSION["userEmail"])){
         
             $userEmail = $_SESSION["userEmail"];

             while($row = mysqli_fetch_assoc($result)){

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

             }
        }
        else{
         
         while($row = mysqli_fetch_assoc($result)){
         echo "
         
         <li class='media'>
         <img class='mr-3' src='images/".$row["Club_logo"]."' alt='Generic placeholder image' width='64' height='64'>
         <div class='media-body'>
         <h5 class='mt-0 mb-1 mr-2' id='club_name' onclick='location.href=\"Club page/Club_main.php?Id=".$row["ClubId"]."\";'>".$row["Club_fname"]."</h5>
         
         ".$row["Description"]."
         </div>
         </li><br><br>            
            ";
        }
      } 

    }
        
        //filter clubs which are popular among a certain department
        if(isset($_POST["filter2"])){
         
            $dept_id = $_POST["sort_dept"];

            if($dept_id == 0){
                header("location: all_clubs.php");
                exit();
            }

            $sql = "SELECT ClubId,Club_Name,Description,Club_logo,Club_fname,COUNT(m_id) AS mem_num
                    FROM members m NATURAL JOIN clubs
                    WHERE Dept_Id = $dept_id
                    GROUP BY ClubId
                    ORDER BY mem_num DESC
                    LIMIT 2;";

         $result = mysqli_query($conn,$sql);
         
        if(isset($_SESSION["userEmail"])){
         
             $userEmail = $_SESSION["userEmail"];

             while($row = mysqli_fetch_assoc($result)){

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

             }
        }
        else{
         
         while($row = mysqli_fetch_assoc($result)){
         echo "
         
         <li class='media'>
         <img class='mr-3' src='images/".$row["Club_logo"]."' alt='Generic placeholder image' width='64' height='64'>
         <div class='media-body'>
         <h5 class='mt-0 mb-1 mr-2' id='club_name' onclick='location.href=\"Club page/Club_main.php?Id=".$row["ClubId"]."\";'>".$row["Club_fname"]."</h5>
         
         ".$row["Description"]."
         </div>
         </li><br><br>            
            ";
        }
      } 

        }
        
        //when a club is serached by name
        if(isset($_POST["submit_search"])){
         
            $search = $_POST["search"];

            if($search == ''){
                header("location: index.php?error");
                exit();
            }

            $sql = "SELECT * 
                    FROM clubs
                    WHERE Club_Name LIKE '%$search%' OR
                    Club_fname LIKE '%$search%';";

         $result = mysqli_query($conn,$sql);
         
        if(isset($_SESSION["userEmail"])){
         
             $userEmail = $_SESSION["userEmail"];

             while($row = mysqli_fetch_assoc($result)){

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

             }
        }
        else{
         
         while($row = mysqli_fetch_assoc($result)){
         echo "
         
         <li class='media'>
         <img class='mr-3' src='images/".$row["Club_logo"]."' alt='Generic placeholder image' width='64' height='64'>
         <div class='media-body'>
         <h5 class='mt-0 mb-1 mr-2' id='club_name' onclick='location.href=\"Club page/Club_main.php?Id=".$row["ClubId"]."\";'>".$row["Club_fname"]."</h5>
         
         ".$row["Description"]."
         </div>
         </li><br><br>            
            ";
        }
      } 

    }
 

        ?>
        </ul>  
        
    </div>

<?php
require "footer.php";
?>