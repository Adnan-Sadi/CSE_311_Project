<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<style>
    img {
        width: 470px;
        height: 300px;
    }

    .carousel-item {
        padding: 5%;
        margin-bottom: 20px;
        /* padding-top: 100px ;
        padding-left: 120px ;
        padding-right: 120px ; */
        border: 5px solid green;
        width: 100%;
        height: 90%;
        background-color: #8080ff;
    }
    img,video{
        background-color: #ff8080 ;
        max-width: 550px;
        height: 200px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top:50px;
    }

</style>

<body>
    <div id="fullEventNav"></div>
    <div id="fullEvent" class="container">
        <div class="container-center">
            <img class="center" id="EventImage" src="" alt="Image missing">
            <a href="./Club_main.php?Id=<?php echo $_GET['Id']; ?>"><h1 style="margin-top:10px;Text-align:center;color:blueviolet;border: 3px solid red;" id="clubName"></h1></a>
            <h1 style="margin-top:10px;" id="eventName"></h1>
            <p id="describe">
                Admin missed to write description
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div style="color:black" class="col">
                <div id="VideosList">
                    <?php
                    if($_SESSION['isPresident']){
                        echo '<button id="uploadVideoButton" class=" btn btn-block btn-secondary" type="button" data-toggle="modal" data-target="#uploadVideo"><h1>Upload Video</h1></button>';
                    }
                    ?>
                    <!-- Modal starts -->
                    <div class="modal fade" id="uploadVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Video</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Title </label>
                                            <input name='videoTitle' value="" type="text" class="form-control" placeholder="Example">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Upload Video</label>
                                            <input type="file" name="video123" class="form-control-file">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input name="videoSubmit" type="submit" value="Save changes">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ends -->

                    <h1 id="noVideoH" class="section-head" style="background-color: orange;text-align:center;margin-top:20px;border-bottom:5px solid green">Uploaded Videos</h1>
                    <div class="adInnerBox">
                        <div id="carouselExampleCaptions0" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" id="EventInsertHere0">
                                <div id="videoDiv" class="carousel-item active ">
                                    <video id="v1" controls>
                                        <source src="" type="video/mp4">
                                        <!-- <source src="" type="video/ogg"> -->
                                        Your browser does not support the video tag.
                                    </video>
                                    <h6 id="firstVideoTitle"></h6>
                                    <h7 id="firstVideoUploadTime"></h7>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions0" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions0" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div id="PhotoList">
                <?php
                    if($_SESSION['isPresident']){
                        echo '<button id="uploadPhotoButton" class=" btn btn-block btn-secondary" type="button" data-toggle="modal" data-target="#uploadPhoto"><h1>Upload Photo</h1></button>';
                    }
                ?>
                    
                    <!-- Modal starts -->
                    <div class="modal fade" id="uploadPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Photo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Title </label>
                                            <input name='photoTitle' value="" type="text" class="form-control" placeholder="Example">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Upload Photo </label>
                                            <input type="file" name="image" class="form-control-file">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input name="photoSubmit" type="submit" value="Save changes">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ends -->

                    <h1 id="noPhotoH" class="section-head" style="background-color: orange;text-align:center;margin-top:20px;border-bottom:5px solid green">Uploaded Videos</h1>
                    <div class="adInnerBox">
                        <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" id="EventInsertHere1">
                                <div class="carousel-item active ">
                                    <img id="p1" src="" alt="">
                                    <h6 id="firstPhotoTitle"></h6>
                                    <h7 id="firstPhotoUploadTime"></h7>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <div id="FullEventBottom" ></div>
</footer>
</html>

<script>
      if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
    //  echo $_SESSION["visitingClubName"] 
    var clubID = <?php echo $_GET['Id']; ?>;
    var eventID = <?php echo $_GET['eID']; ?>;
    // console.log(clubID,eventID);
    $.ajax({
        type: 'post',
        url: './database/fullEventData.php',
        data: ({
            'clubID': clubID,
            'eventID': eventID,
        }),
        dataType: 'json',
        cache: false,
        success: function(result) {

            designEvent(result);
            console.log(result);
        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            //  alert(err.Message)
        }
    });

    function designEvent(dataArray) {
        // console.log("DP",dataArray[0][0]["DP"]);
        $("#clubName").text(dataArray[0][0]["ClubName"]);
        $("#eventName").text(dataArray[0][0]["EventName"]);
        $("#describe").text(dataArray[0][0]["EventDescription"]);
        // if(dataArray[0][0].length==0){
            // console.log("display :",dataArray[0][0]["DP"]);
            $("#EventImage").attr("src", "./Upload/image/" + dataArray[0][0]["DP"]);
        // }
        // $("#EventVideo").attr("src", "./Upload/image/" + dataArray[0]["DP"]);
        insertingVideoList(dataArray);
    }

    function insertingVideoList(dataArray) {
        // console.log(dataArray[2][0]['video'], "Video name");
        console.log("inserting videolist");
        if (dataArray[2].length > 0) {
            var video = $("#v1");
            video.find("source").attr("src",'./Upload/video/'+dataArray[2][0]['video']);
            video.get(0).load();
            video.get(0).play();
            // $("#v1").html('<source src= ./Upload/video/'+dataArray[2][0]['video']+' type="video/mp4"></source>');
            $("#firstVideoTitle").append('Title : '+dataArray[2][0]["Title"]);
            $("#firstVideoUploadTime").append('Uploaded On:' + dataArray[2][0]["Uploaded_On"]);
            for (var video = 1; video < dataArray[2].length; video++) {
                $("#EventInsertHere0").append('<div class="carousel-item" ><video controls><source src= ./Upload/video/' + dataArray[2][video]["video"] + '  type="video/mp4"><source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.</video><h6>' + dataArray[2][video]["Title"] + '</h6><h7>Uploaded on:' + dataArray[2][video]["Uploaded_On"] + '</h7></div>')
            }
        }
        else{
            $("#v1").hide();
            $("#videoDiv").append('<img src="./images/No videos yet.png" </img>')
        }
        // console.log(dataArray[0]['videos']);
        insertingPhotoList(dataArray);

    }

    function insertingPhotoList(dataArray) {
        console.log("inserting Videolists");
        if (dataArray[1].length > 0) {
            $("#p1").attr("src", "./Upload/image/" + dataArray[1][0]["photo"]);
            $("#firstPhotoTitle").append(dataArray[1][0]["Title"]);
            $("#firstPhotoUploadTime").append('Uploaded On:' + dataArray[1][0]["Uploaded_On"]);
            for (var photo = 1; photo < dataArray[1].length; photo++) {
                $("#EventInsertHere1").append('<div class="carousel-item" ><img src= ./Upload/image/' + dataArray[1][photo]["photo"] + '  alt=image not found><h6>' + dataArray[1][photo]["Title"] + '</h6><h7>Uploaded on:' + dataArray[1][photo]["Uploaded_On"] + '</h7></div>')
            }
        }
        else{
            $("#p1").append('<img src="./images/No videos yet.png" </img>')
        }
        // console.log(dataArray[0]['videos']);
    }
    $(function() {
        $("#fullEventNav").load("nav.php");
    });
    $(function() {
        $("#FullEventBottom").load("bottom.php");
    });
</script>

<?php
require "./database/accessDatabase.php";
if (isset($_POST['videoSubmit'])) {
    // echo "<script>console.log('Video submitted')</script>";
    $file = 'video123';
    $fileDestination = "./Upload/video/";
    $Path = uploadVideo($file, $fileDestination);
    $Title = get_input($_POST['videoTitle']);
    $EventID = $_GET['eID'];
    if (insertUploadedVideoData($EventID, $Path,$Title)) {
        echo "<script>console.log('Video recorded')</script>";
    } else {
        echo "<script>console.log('Video was not recorded')</script>";
    }
}
if (isset($_POST['photoSubmit'])) {
    $file = 'image';
    $fileDestination = "./Upload/image/";
    $Path = uploadImage($file, $fileDestination);
    $Title = get_input($_POST['photoTitle']);
    $EventID = $_GET['eID'];
    if (insertPhotos($EventID, $Path, $Title)) {
        echo "<script>console.log('Image recorded')</script>";
    } else {
        echo "<script>console.log('Image was not recorded')</script>";
    }
}
unset($_POST);
// redirec
?>
