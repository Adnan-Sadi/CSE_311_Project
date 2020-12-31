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
  $sql = "SELECT Name,Id,Dept_name,Position FROM club_members WHERE Club_id = '$postID'";

  $result = mysqli_query($conn,$sql);

  $_SESSION["mem_rows"] = mysqli_num_rows($result);
  $_SESSION["club_number"] = $postID;

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
            <div id="all_mem" class="text-left">All Members</div><br/><br/> 
              
              <div align="right">
                <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-md">Add</button>
              </div><br/>

              <div id="userModal" class="modal fade">
                <div class="modal-dialog">
                   <form method="post" id="user_form" enctype="multipart/form-data">
                    <div class="modal-content">

                     <div class="modal-header">
                      <h4 class="modal-title" align="center">Add User</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>

                     <div class="modal-body">

                        <label>Name</label><br>
                        <input type="text" name="name" id="name" class="form-control"><br>
                        <label>Student Id</label><br>
                        <input type="text" name="id" id="id" class="form-control"><br>
                        <label>Department</label><br>
                        <input type="text" name="dept_name" id="dept_name" class="form-control"><br>
                        <label>Email</label><br>
 		                    <input type="text" name="email" id="email" class="form-control"><br>
                        <label>Phone Number</label><br>
 		                    <input type="text" name="phone" id="phone" class="form-control"><br>
                        <label>Position</label><br>
 		                    <input type="text" name="position" id="position" class="form-control"><br>
                        <label>Semester Joined</label><br>
                        <input type="text" name="sem_joined" id="sem_joined" class="form-control"><br>
                
                     </div>

                     <div class="modal-footer">
                        <input type="hidden" name="user_id" id="user_id" >
                        <input type="hidden" name="operation" id="operation" value="Add">
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>

                    </div>
                  
                   </form>
                </div>
              </div>

                
                <div class="table-responsive"> 
                   <table id="member_table" class="table table-bordered table-striped ">
                       <thead>
                          <tr>
                           <th width="20%">Name</th>
                           <th width="20%">Id</th>
                           <th width="20%">Department</th>
                           <th width="20%">Position</th>
                           <th width="10%">Edit</th>
                           <th width="10%">Delete</th>
                          </tr>
                        </thead>
                   </table>                                
                
                </div> 

                

            
        </section><br><br>

     </div>

<?php 
  include_once 'footer.php';
?>