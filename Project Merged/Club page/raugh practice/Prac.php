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
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.bundle.js"></script>
    <scrip src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap.css">
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Title </label>
                            <input name='evTitle' type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" value="Example">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea name="evDescription" class="form-control" id="exampleFormControlTextarea1" rows="3" value="example"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Photo Heading</label>
                            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group row">
                            <label  for="example-date-input" class="col-2 col-form-label">Date</label>
                            <div class="col-10">
                                <input name="evDate" class="form-control" type="date" value="" id="example-date-input">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type = "submit" name = "evSubmit" class="btn btn-primary" value = "Submit"> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
 require "../database/accessDatabase.php";
 $file = 'image';
 $folderPath = "../Upload/image/";
 function uploadImage($file,$folderPath){
    $errors= array();
    $file_name = $_FILES[$file]['name'];
    $file_size =$_FILES[$file]['size'];
    $file_tmp =$_FILES[$file]['tmp_name'];
    $file_type=$_FILES[$file]['type'];
    $arrayVar = explode('.',$_FILES[$file]['name']);
    $extension = end($arrayVar);
    $file_ext=strtolower($extension);
    $file_name = base64_encode($_FILES[$file]['name']).".jpg";
    $extensions= array("jpeg","jpg","png");
    //file upload path
    $fileDestination = $folderPath.$file_name;
    if(in_array($file_ext,$extensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,$fileDestination);
        echo '<s>console.log("Pic uploaded")</script>';
 }
 else{
    print_r($errors);
}
return $file_name;
}
 if (isset($_POST['evSubmit'])) {
    $file = 'image';
    $folderPath = "../Upload/image/";
    $fileName = uploadImage($file,$folderPath);
             echo '<scrip>console.log("WORKS");</scrip>';
     $conn = new mysqli($servername = 'localhost', $username = "root", $password = '', $dbname = "nsu_clubs");
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     } else {
         echo '<scrip>console.log("WORKS")</scrip>';
         // echo "Success";
     }
     echo '<scrip>console.log("Your stuff here")</scrip>';
     
    //      //upload event

         $ClubId = 1;
         $EventName= get_input($_POST['evTitle']);  //************************* I NEED U */
         $EventDescription = get_input( $_POST['evDescription']);
         $Dated=date('Y-m-d', strtotime($_POST['evDate']));
         $EventDP = "";
         insertEvents($ClubId,$EventName,$EventDescription,$Dated,$EventDP);
         echo "<s>console.log('$Dated');</s>";
         
         echo '<scrip>console.log("Event created")</scrip>';
         $sql = "SELECT EventID from Events order by eventId DESC limit 1";
         $Myarray = inQuery($sql);
        
         $EventID = $Myarray[0]['EventID'];
         $Path=$fileName;         ;
         $Title = get_input($_POST['evTitle']);
         insertPhotos($EventID, $Path,$Title);
        
         echo '<scrip>console.log("Photo data created")</scrip>';

         $sql = "SELECT PhotoId FROM eventPhotos where eventID =". $EventID ." ORDER BY PhotoId  DESC LIMIT 1";
         $Myarray = inQuery($sql);
        //  $EventID = $Myarray[0]['EventID'];
         $EventDP = $Myarray[0]['PhotoId'];
         $sql = "UPDATE events
               SET eventDP = ". "$EventDP" ." 
               WHERE EventID = (SELECT EventID
                              FROM eventphotos
                              ORDER BY Uploaded_On DESC
                              LIMIT 1 )";
         SQL_Query($sql);
         echo "<scrip>console.log('Update dp');</scrip>";
         $conn->close();
         // $EventID = $Myarray[0]['EventID'];
         //  echo $file_name;
     }
     
     
       echo "<scrip>console.log('pkkkkk');</scrip>";

    function get_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;}


?> 


<!-- 
<scrip>
    // $('#evSubmit').click(function() {
    //     console.log(($("#evInput").val()));
    // });



    $.ajax({
        type: 'POST',
        url: '../database/getAllEvents.php',
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
   
</scrip> -->