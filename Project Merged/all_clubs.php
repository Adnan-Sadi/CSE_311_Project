<?php
 require "header.php";
 require_once 'includes/db_inc.php';

 $sql = "SELECT * FROM clubs";
 
 $result = mysqli_query($conn,$sql);

?>


    <div class="container">
        <br><h2 class="section-head">All Clubs</h2><br>

        <form action="filtered_clubs.php" method="POST" name="Club_Filter">
          <div class="form-row">

            <div class="form-group col-md-4">
              <select class="custom-select" name="sort" id="sort">
                 <option value="0">Sort By....</option>
                 <option value="ASC">Name Ascending</option>
                 <option value="DESC">Name Descending</option>
                 <option value="m_DESC">Most Members</option>
                 <option value="m_ASC">Least Members</option>
              </select>
            </div> 

            <div class="form-group col-md-2">
             <button type="submit" name="filter1" class="btn btn-primary">Filter</button>
            </div> 
           
            <div class="form-group col-md-4">
              <select class="custom-select" name="sort_dept" id="sort_dept">
                 <option value="0">Popular Among Students of....</option>
                  
                    <?php
                    $sql2 = "SELECT * FROM departments";
                    $result2 = mysqli_query($conn,$sql2);
                    //fetching all departments
                    While($row = mysqli_fetch_assoc($result2)){
                       echo "<option value='".$row["Dept_Id"]."'>".$row["Dept_Name"]."</option>";
                    }
                    ?>

              </select>
            </div>  

            <div class="form-group col-md-2">
             <button type="submit" name="filter2" class="btn btn-primary">Filter</button>
            </div>

           </div>  
        </form><br>


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


