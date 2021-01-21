<?php
session_start();
if(isset($_SESSION["userEmail"])){
    $userEmail = $_SESSION["userEmail"];
    $userType =  'NOTguest';
    }
else{
    $userEmail = '';
    $userType =  'guest';
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    #navGallery{
        height: 200px;
    }
    #bottomGallery {
        width: 100%;
        top: 80%;
        /* position: fixed; */
    }
    #allVideos div,
    #allPhotos div  {
        margin: 20px 0px ;
    }
    #allVideos img,
    video,
    #allPhotos img,
    video {
        max-width: 350px;
        height: 300px;
        margin: 5px;
    }
</style>

<head>
    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="navGallery">

    </div>
    <div id="allVideos" class="container">
        <a href="FullEvent.php?Id=<?php echo $_GET['Id'] ;?>&eID=<?php echo $_GET['eID'] ;?>"><button style="margin:10px 20px;" class="btn btn-outline-danger" ><h2 style=" text-align: center;">Back to event</h2></button></a>
            <button disabled="disabled" class="btn btn-danger btn-block" ><h1 style="text-align: center;">All  Videos</h1></button>
        </div>
        <div id="allPhotos" class="container">
        <button disabled="disabled" class="btn btn-primary btn-block" ><h1>All  Photos</h1></button>
        </div>
    <footer>
        <div id="bottomGallery">

        </div>
    </footer>
</body>

</html>

<script>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    var clubID = <?php echo $_GET['Id']; ?>;
    var eventID = <?php echo $_GET['eID']; ?>;
    var userType = <?php echo '"'. $userType .'"'; ?>;
    var UserEmail = <?php echo '"' . $userEmail . '"'?>;
    // var isPresident = 1;
    var data = {
                'clubID': clubID,
                'functionName': '',
                'eventID': eventID,
            };
    $(document).ready(function() {
        if (userType == 'guest') {
            getMedia(data);
        }else if(<?php echo $_SESSION['isPresident']; ?>){
            getMedia(data,isPresident=<?php echo $_SESSION['isPresident']; ?>);
        }
    });
    function deleteVideo(e){
        console.log(e.value);
        data['functionName']='deleteVideo';
        data['VideoID'] = e.value;
        if(isPresident){
            WorkWithMedia(data);
        }
    }
    function deletePhoto(e){
        console.log(e.value);
        data['functionName']='deletePhoto';
        data['PhotoID'] = e.value;
        if(isPresident){
            WorkWithMedia(data);
            location.reload();
        }
    }
    function getMedia(data,isPresident=0){
        $.ajax({
                type: 'POST',
                url: './database/getAllMedia.php',
                data: data,
                dataType: 'json',
                cache: false,
                success: function(result) {
                    designVideo(result[0],isPresident);
                    designPhoto(result[1],isPresident);
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
    }
    function WorkWithMedia(data){
        $.ajax({
                type: 'POST',
                url: './database/getAllMedia.php',
                data: data,
                dataType: 'json',
                cache: false,
                success: function() {
                    console.log('Query Successfull  ');
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
    }
    function designVideo(dataArray,isPresident=0) {
        // console.log(dataArray);
        var row = $("#allVideos");
        if(dataArray.length==0){
            row.append('<h1 style=margin:100px > No video was uploaded </h1>');
            return;
        }
        for (var i = 0; i < dataArray.length; i++) {
            if (i % 3 == 0) {
                $("#allVideos").append('<div id=rowV' + i + ' class="row"></div>');
                row = $("#rowV" + i);
            }
            console.log(dataArray[0]);
            designVideoCol(row, dataArray[i], i,isPresident);
        }
    }
    function designVideoCol(row, dataArray, i,isPresident=0) {
        row.append('<div id=colV' + i + ' class="col"></div>');
        var col = $("#colV" + i);
        col.append('<video id=v' + i + '  controls></video>');
        video = $("#v" + i);
        video.append(' <source src="./Upload/video/' + dataArray['video'] + '" type="video/mp4" />');
        //    video.append(' <source src="./Upload/video/dmlkZW9wbGF5YmFja18yLm1wNA==.mp4" type="video/webm" />');
        col.append('<h5>' + dataArray['Title'] + '</h5>');
        col.append('<h5>Uploaded ON : </h5>' + dataArray['Uploaded_On']);
        if(isPresident){
            col.append('<br><button type="button"  class="btn btn-primary" onClick="deleteVideo(this)" value='+ dataArray['Vid'] +'>Delete</button>');
        }
    }
    function designPhoto(dataArray,isPresident=0) {
        console.log(dataArray);
        var row = $("#allPhotos");
        if(dataArray.length==0){
            row.append('<h1 style=margin:100px > No Photo was uploaded </h1>');
            return;
        }
        for (var i = 0; i < dataArray.length; i++) {
            if (i % 3 == 0) {
                $("#allPhotos").append('<div id=rowP' + i + ' class="row"></div>');
                row = $("#rowP" + i);
            }
            designPhotoCol(row, dataArray[i], i,isPresident);
            console.log(dataArray);
        }
    }


    function designPhotoCol(row, dataArray, i,isPresident=0) {
        row.append('<div id=colP' + i + ' class="col"></div>');
        var col = $("#colP" + i);
        col.append('<img src="./Upload/image/'+ dataArray['photo'] +'" alt="image was not load">');
        col.append('<h5>' + dataArray['Title'] + '</h5>');
        col.append('<h5>Uploaded ON : </h5>' + dataArray['Uploaded_On']);
        if(isPresident){
            col.append('<br><button type="button"  class="btn btn-primary" onClick="deletePhoto(this)" value='+ dataArray['Pid'] +'>Delete</button>');
        }
    }
    $(function() {
        $("#navGallery").load("nav.php");
    });
    $(function() {
        $("#bottomGallery").load("bottom.php");
    });
</script>