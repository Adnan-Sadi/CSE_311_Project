<?php
 require "header.php";
 require_once 'includes/db_inc.php';

?>


    <div class="container">
        <br><h2 class="section-head">Filtered Results</h2><br>

        <ul class="list-unstyled">
        <?php 

        if(isset($_POST["filter1"])){
         
            $sort = $_POST["sort"];
            $sql = '';
            if($sort=="ASC" || $sort=="DESC"){
                  
                $sql = "SELECT * FROM clubs
                        ORDER BY Club_fname $sort;";
                        
            }

            elseif($sort == "m_DESC"){
                  $sql = " SELECT c.Club_Name,c.Club_logo,c.Description,c.Club_fname,COUNT(m.m_id) AS mem_num
                           FROM clubs c LEFT OUTER JOIN members m
                           ON c.ClubId = m.ClubId
                           GROUP BY c.ClubId
                           ORDER BY mem_num DESC;";//left join is used to include all clubs in case a club has no members inserted yet
            }
            elseif($sort == "m_ASC"){
                  $sql = " SELECT c.Club_Name,c.Club_logo,c.Description,c.Club_fname,COUNT(m.m_id) AS mem_num 
                           FROM clubs c LEFT OUTER JOIN members m
                           ON c.ClubId = m.ClubId
                           GROUP BY c.ClubId
                           ORDER BY mem_num ASC;";//left join is used to include all clubs in case a club has no members inserted yet
            }
            else{
                $sql = '';
            }

         $result = mysqli_query($conn,$sql);
         
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

        }

        if(isset($_POST["filter2"])){
         
            $dept_id = $_POST["sort_dept"];
            $sql = "SELECT Club_Name,Description,Club_logo,Club_fname,COUNT(m_id) AS mem_num
                    FROM members m NATURAL JOIN clubs
                    WHERE Dept_Id = $dept_id
                    GROUP BY ClubId
                    ORDER BY mem_num DESC
                    LIMIT 2;";

         $result = mysqli_query($conn,$sql);
         
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

        }
 

        ?>
        </ul>  
        
    </div>

<?php
require "footer.php";
?>