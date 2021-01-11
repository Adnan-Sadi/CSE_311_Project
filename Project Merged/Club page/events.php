<?php
// session_start();
// echo $_SESSION["clubName"];
?>

<!DOCTYPE html>
<style>
    #eventsBottom :hover {
        background-color: white;
    }
</style>
<html lang="en">

<head>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Events</title>
</head>

<body>
    <div id="eventsNav"></div>
    <div>
        <div id="AllEvents" class="container" style="margin-bottom:50px;">
            <h1 style="text-align:center">All Events</h1>
            <button class="btn btn-info btn-block" style="margin: 5px 0px 20px 0px" data-toggle="modal" data-target="#CreateEvent">Create Event</button>
            <div class="table-responsive">
                <table class="table-borderless">
                    <tbody id="AllEventTableBody">
                    </tbody>
                </table>
            </div>
        </div>

        <div style="clear:both;margin-top:20px">
            <div id="eventsBottom">
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="CreateEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Title </label>
                            <input name='evTitle' type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea name="evDescription" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Photo Heading</label>
                            <input name="evPhotoUp" type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group row">
                            <label id="evDate" for="example-date-input" class="col-2 col-form-label">Date</label>
                            <div class="col-10">
                                <input class="form-control" type="date" value="" id="example-date-input">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button name="evSubmit" type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['evSubmit'])) {
    // require "./Club%20page/database/accessDatabase.php";
    $conn = new mysqli($servername = 'localhost', $username = "root", $password = '', $dbname = "NSU_CLUBs");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo '<script>console.log("WORKS")</script>';
        // echo "Success";
    }
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $arrayVar = explode('.',$_FILES['image']['name']);
      $extension = end($arrayVar);
      $file_ext=strtolower($extension);
      $file_name = base64_encode($_FILES['image']['name']).".jpg";
      $extensions= array("jpeg","jpg","png");
      $fileDestination = "./Upload/image/".$file_name;
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$fileDestination);
         $stmt = $conn->prepare("INSERT INTO eventphotos (PhotoId, EventId, Path , Uploaded_On , Title) VALUES (?, ?, ?, ? , ?)");
         $stmt->bind_param(NuLL, 1 , $Path, 'NULL', $Title);
     
         // set parameters and execute
         $EventId= 1;  //************************* I NEED U */
         $Path=$fileDestination;
         $Title = get_input($_POST['evTitle']);
         $stmt->execute();
         echo '<script>console.log(' . $result . ')</script>';
         echo '<script>console.log("Your stuff here")</script>';
         $conn->close();
        //  echo "Success";
        //  echo $file_name;
      }else{
         print_r($errors);
      }
      function get_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    //   $Myarray = array();
    //   $result = $conn->query($sql);
    //   if ($result->num_rows > 0) {
    //     // output data of each row
    //     while($row = $result->fetch_assoc()) {
    //       $Myarray[ ]= $row;
    //     }
    //   } else {
    //     echo "0 results";
    //   }
    $conn->close();
}
?>

<script>
    $('#evSubmit').click(function() {
        console.log(($("#evInput").val()));
    });
    $.ajax({
        type: 'POST',
        data: {
            visitingClubName: '<?php echo "ACM" ?>'
        },
        url: './database/getAllEvents.php',
        dataType: 'json',
        cache: false,
        success: function(result) {
            var count = 0;
            designEventsAd(result[0], count);
            console.log(result);
        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message)
        }
    });
    //  $('#fullEvent').hide();

    //  function eShowMore() {
    //      $('#AllEvents , #fullEvent').toggle();
    //  };

    function designEventsAd(dataArray, count) {
        var j = -1;
        var makeRow = 3;
        for (var i = 0; i < dataArray.length; i++) {
            if (i % makeRow == 0) {
                j++;
                $("#AllEventTableBody").append('<tr id=AllEventTableRow' + j + '>');
                $("#AllEventTableBody").append('</tr>');
            }
            createAdInAllEvent(dataArray, i, j); //creates a event ad column

        }
    }

    function createAdInAllEvent(dataArray, count, row) {
        $("#AllEventTableRow" + row).append('<td> <div class="card"><div class="card-body"><img class="card-img-top" src=./images/Hossain.jpeg  alt="Event photo not found"> <h5 class="card-title">' + dataArray[count]['Name'] + '</h5> <p class="card-text">' + dataArray[count]["Date"] + '</p><p class="card-text">' + dataArray[count]["Description"].substring(0, 150) + '<button class="btn" style="color:red;text-decoration: underline;"><a href="./FullEvent.php">Read More..</a></button></p></div></td>');
    }
    $(function() {
        $("#eventsNav").load("nav.php");
    });
    $(function() {
        $("#eventsBottom").load("bottom.php");
    });
</script>