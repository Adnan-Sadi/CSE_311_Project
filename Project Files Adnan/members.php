<?php 
  include_once 'header.php';

  function redirect(){
       header("location: index.php");
       exit();
  }

  if(!isset($_GET['id'])){
    redirect();
  }

  require_once 'includes/db_inc.php';

  $postID = mysqli_real_escape_string($conn,$_GET['id']);
  $sql = "SELECT Name,Id,Dept_name,CGPA FROM club_members WHERE Club_id = '$postID'";

  $result = mysqli_query($conn,$sql);

  if(mysqli_num_rows($result)>0){
    
  }
  else{
    redirect();
  }


?>

     <div class="container">

        <h2 class="text-center">Our Members</h2>

        <section>
            <div id="exc_body" class="text-left">Executive Body</div>

            <div class="row">

            <?php 
            $result2 = mysqli_query($conn, "SELECT name,title,image FROM executive_members WHERE club_id = '$postID'");

            while ($memData2 = mysqli_fetch_assoc($result2) ) {

              echo "<div class=\"col-md-4\">".
              "<div id=\"people_tile\"><img src=\"" . $memData2["image"] . "\" alt=\"\"><span>".$memData2['name']."<br>".$memData2['title']."</span></div> 
              </div>";  
            }
            
            ?>
                
            </div>
        </section>

        <section>
            <div id="all_mem" class="text-left">All Members</div>

            <ul id="member-nav">

                <li id="flip1">Executive Members</li>
                <div id="panel1"> 
                   <table class="table table-striped table-dark">
                       <thead>
                          <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Id</th>
                           <th scope="col">Department</th>
                           <th scope="col">CGPA</th>
                          </tr>
                        </thead>
                             
                        <tbody>
                                                             
                                <?php
                                $i= 0;
                                while ($memData = mysqli_fetch_assoc($result)) {
                                      echo "<tr>";
                                      echo "<th scope=\"row\">" . ($i + 1) . "</th>";
                                      echo "<td>" . $memData["Name"] . "</td>" ;
                                      echo "<td>" . $memData["Id"] . "</td>";
                                      echo "<td>" . $memData["Dept_name"] . "</td>";
                                      echo "<td>" . $memData["CGPA"] . "</td>";
                                      $i++;
                                      echo "</tr>";
                                } 
                                ?>
                              
                        </tbody>
                   </table>                 
                </div> 
                <li id="flip2">Sub Committee and Officers</li>
                <div id="panel2">
                   <table class="table table-striped table-dark">
                       <thead>
                          <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Id</th>
                           <th scope="col">Department</th>
                           <th scope="col">CGPA</th>
                          </tr>
                        </thead>
                             
                        <tbody>
                                                             
                                <?php
                                $i= 0;
                                mysqli_data_seek($result, 0);
                                while ($memData = mysqli_fetch_assoc($result)) {
                                      echo "<tr>";
                                      echo "<th scope=\"row\">" . ($i + 1) . "</th>";
                                      echo "<td>" . $memData["Name"] . "</td>" ;
                                      echo "<td>" . $memData["Id"] . "</td>";
                                      echo "<td>" . $memData["Dept_name"] . "</td>";
                                      echo "<td>" . $memData["CGPA"] . "</td>";
                                      $i++;
                                      echo "</tr>";
                                } 
                                ?>
                              
                        </tbody>
                   </table>
                 </div>
                <li id="flip3">Recruits</li>
                <div id="panel3"> 

                        <table class="table table-striped table-dark">
                       <thead>
                          <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Id</th>
                           <th scope="col">Department</th>
                           <th scope="col">CGPA</th>
                          </tr>
                        </thead>
                             
                        <tbody>
                                                             
                                <?php
                                $i= 0;
                                mysqli_data_seek($result, 0);
                                while ($memData = mysqli_fetch_assoc($result)) {
                                      echo "<tr>";
                                      echo "<th scope=\"row\">" . ($i + 1) . "</th>";
                                      echo "<td>" . $memData["Name"] . "</td>" ;
                                      echo "<td>" . $memData["Id"] . "</td>";
                                      echo "<td>" . $memData["Dept_name"] . "</td>";
                                      echo "<td>" . $memData["CGPA"] . "</td>";
                                      $i++;
                                      echo "</tr>";
                                } 
                                ?>
                              
                        </tbody>
                   </table>
                
                </div>
            </ul>
        </section>

     </div>

<?php 
  include_once 'footer.php';
?>