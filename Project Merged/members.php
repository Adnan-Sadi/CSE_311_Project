<?php 
  include_once 'header.php';

  // function redirect(){
  //      header("location: index.php");
  //      exit();
  // }

  if(!isset($_GET['id'])){
    redirect();
  }

  require_once 'includes/db_inc.php';

  $postID = mysqli_real_escape_string($conn,$_GET['id']);
  $sql = "SELECT Name,NsuId,Dept_Id,Position FROM members WHERE ClubId = '$postID'";

  $result = mysqli_query($conn,$sql);

  $_SESSION["mem_rows"] = mysqli_num_rows($result);
  $_SESSION["club_number"] = $postID;
  $userEmail = $_SESSION["userEmail"];
  
  $sql_admin = "SELECT *
                FROM managesclub
                WHERE ClubId = $postID AND UserId = (SELECT UserId
                                                     FROM all_users
                                                     WHERE UserEmail = '$userEmail');";
  
  $result_admin = mysqli_query($conn,$sql_admin);
   
  $isAdmin = mysqli_num_rows($result_admin);


?>

     <div class="container">

        <br><h2 class="text-center">Our Members</h2>

        <section>
            <div id="exc_body" class="text-left">Executive Body</div>
            <?php
             
             if($isAdmin > 0){
             echo "<div align='right'>
                <button type='button' id='add_button2' data-toggle='modal' data-target='#execUserModal' class='btn btn-info btn-md'>Add</button>
              </div><br/>"; 
             }

             ?>
              <!-- Modal for Adding Executive member -->
              <div id="execUserModal" class="modal fade">
                <div class="modal-dialog">
                   <form method="post" id="exec_user_form" enctype="multipart/form-data">
                    <div class="modal-content">

                     <div class="modal-header">
                      <h4 class="modal-title" align="center">Add Executive Member</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>

                     <div class="modal-body">

                        <label>Name</label><br>
                        <input type="text" name="name2" id="name2" class="form-control"><br>
                        <label>Student Id</label><br>
                        <input type="text" name="id2" id="id2" class="form-control"><br>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" >Department</label>
                            </div>
                          <select class="custom-select" name="dept_id2" id="dept_id2">
                                                    
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
                        
                        <label>Email</label><br>
 		                    <input type="text" name="email2" id="email2" class="form-control"><br>
                        <label>Phone Number</label><br>
 		                    <input type="text" name="phone2" id="phone2" class="form-control"><br>
                        <label>Position</label><br>
 		                    <input type="text" name="position2" id="position2" class="form-control"><br>
                        <label>Date Joined</label><br>
                        <input type="text" name="date_joined2" id="date_joined2" class="form-control" placeholder="yyyy-mm-dd"><br>
                        <label>Select Member Image</label><br>
                        <input type="file" name="mem_image" id="mem_image">
                        <span id="mem_uploaded_image"></span>
                
                     </div>

                     <div class="modal-footer">
                        <input type="hidden" name="user_id2" id="user_id2" > <!--sets the user_id -->
                        <input type="hidden" name="operation2" id="operation2" value="Add_exc"> <!-- sets the action of the form to add/edit member -->
                        <input type="submit" name="action2" id="action2" class="btn btn-success" value="Add_exc" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>

                    </div>
                  
                   </form>
                </div>
              </div>


            <div class="row">

            <?php 
            $result2 = mysqli_query($conn, "SELECT name,NsuId,Position,Photo 
                                            FROM executive_members Natural JOIN members 
                                            WHERE clubId = '$postID'"); // Use of Natural join

            while ($memData2 = mysqli_fetch_assoc($result2) ) {

              echo "<div class='col-md-4'>";
              if($isAdmin > 0){
               echo "<div id='people_tile' onclick = 'location.href=\"Full_mem_info.php?NsuId=".$memData2["NsuId"]."\";'>";//makes the executive members tile clickable
              }
              else{
                 echo "<div id='people_tile'>";
              }
              echo "<img id='mem_img' src='images/Executive_Members/" . $memData2["Photo"] . "' alt=''>
              <span>".$memData2['name']."<br>".$memData2['Position']."</span>
              </div>";

              if($isAdmin > 0){
              echo "<div align=right>   
              <button type = 'button' name ='update2' id='".$memData2["NsuId"]."' class='btn btn-warning btn-xs update2'>Update</button>
              <button type = 'button' name ='delete2' id='".$memData2["NsuId"]."' class='btn btn-danger btn-xs delete'>Delete</button></div>";
              }//removes update and delete buttons if user is not logged in

             echo "</div>";
           
                       
            }
            
            ?>
                
            </div>
        </section>

        <section>
            <div id="all_mem" class="text-left">All Members</div><br/><br/> 
                 <?php 
                  if($isAdmin > 0){
                    echo "<div align='right'>
                       <button type='button' id='add_button' data-toggle='modal' data-target='#userModal' class='btn btn-info btn-md'>Add</button><br>
                    </div>";
                  }
                 ?>
              <div id="userModal" class="modal fade">
                <div class="modal-dialog">
                   <form method="post" id="user_form" enctype="multipart/form-data">
                    <div class="modal-content">

                     <div class="modal-header">
                      <h4 class="modal-title" align="center">Add Member</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>

                     <div class="modal-body">

                        <label>Name</label><br>
                        <input type="text" name="name" id="name" class="form-control"><br>
                        <label>Student Id</label><br>
                        <input type="text" name="id" id="id" class="form-control"><br>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" >Department</label>
                            </div>
                          <select class="custom-select" name="dept_id" id="dept_id">
                                                    
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
                        
                        <label>Email</label><br>
 		                    <input type="text" name="email" id="email" class="form-control"><br>
                        <label>Phone Number</label><br>
 		                    <input type="text" name="phone" id="phone" class="form-control"><br>
                        <label>Position</label><br>
 		                    <input type="text" name="position" id="position" class="form-control"><br>
                        <label>Date Joined</label><br>
                        <input type="text" name="date_joined" id="date_joined" class="form-control" placeholder="yyyy-mm-dd"><br>
                
                     </div>

                     <div class="modal-footer">
                        <input type="hidden" name="user_id" id="user_id" > <!--sets the user_id -->
                        <input type="hidden" name="operation" id="operation" value="Add"> <!-- sets the action of the form to add/edit member -->
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>

                    </div>
                  
                   </form>
                </div>
              </div>

                
                <div class="table-responsive">
                   <?php
                   if($isAdmin > 0){ 
                    echo "
                    <table id='member_table' class='table table-bordered table-striped'>
                       <thead>
                          <tr>
                           <th width='20%'>Name</th>
                           <th width='10%'>Id</th>
                           <th width='20%'>Department</th>
                           <th width='15%'>Position</th>
                           <th width='15%'>Joined On</th>
                           <th width='10%'>Edit</th>
                           <th width='10%'>Delete</th>
                          </tr>
                        </thead>
                   </table>
                   ";
                   }
                   else{
                    echo "
                    <table id='member_table_small' class='table table-bordered table-striped'>
                       <thead>
                          <tr>
                           <th width='20%'>Name</th>
                           <th width='10%'>Id</th>
                           <th width='30%'>Department</th>
                           <th width='25%'>Position</th>
                           <th width='15%'>Joined On</th>
                          </tr>
                        </thead>
                   </table>
                   "; 
                   }                                
                  ?>
                </div> 

                

            
        </section><br><br>

     </div>

<?php 
  include_once 'footer.php';
?>