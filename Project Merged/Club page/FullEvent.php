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
    }

    Video {

        width: 100%;
        height: 250px;
    }

    /* #VideosList {
        text-align: center;
        float: left;
        width: 45%;
        height: 50px;
        margin: 5px;
        /* padding-right:70px; */
    /* border-right: .5px solid black; */
    }

    */
    /* .ok{
        width: 600px;
        height: 600px;

    } */
</style>

<body style="background:red">
    <div id="fullEventNav"></div>
    <div id="fullEvent" class="container">
        <!-- <Button onclick="eShowMore()" class="btn btn-block btn-danger"><b> Back</b></Button> -->
        <div class="container-center">
            <img id="EventImage" src="" alt="not found">
            <p id="describe">
                For the first time in its 25 year-long legacy, NSU YES! will be hosting its strategic business case-solving competition online. The arena is set for Masters of Ideation, the battle for supremacy.

                One of the most prestigious case solving competitions is back for opportunities of cognitive and analytical thinking. Masters of Ideation is all set to kick-start a brand new expedition with an aim to create a stimulating experience for the business competition. Undergraduate students all across the nation will join their intellect to come out victorious in the ultimate business battle.

                North South University Young Entrepreneurs Society, NSU YES! is initiating its seventh edition of Masters of Ideation in 2020 by adapting to the new normal.

                This time, we are proud and delighted to have Perfetti Van Melle as our Title Sponsor for this event.
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="VideosList">
                    <div class="adInnerBox">
                        <div id="carouselExampleCaptions0" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" id="EventInsertHere0">
                                <div class="carousel-item active ">
                                    <video id="v1" controls>
                                        <source src="" type="video/mp4">
                                        <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                    <h6 id="firstVideoTitle"></h6>
                                    <h7 id="firstVideoUploadTime">Uploaded On:</h7>
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
                    <div class="adInnerBox">
                        <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" id="EventInsertHere1">
                                <div class="carousel-item active ">
                                    <img src="./Upload/image/DMC.jpg" alt="">
                                    <h6 id="firstPhotoTitle"></h6>
                                    <h7 id="firstPhotoUploadTime">Uploaded On:</h7>
                                </div>
                                <!-- <div class="carousel-item ">
                                    <img src="./Upload/image/DMC.jpg" alt="">
                                    <h4 ></h4>
                                    <h5 >Uploaded On:</h5>
                                </div> -->
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

</html>

<script>
    //  echo $_SESSION["visitingClubName"] 
    $.ajax({
        type: 'POST',
        url: './database/fullEventData.php',
        dataType: 'json',
        cache: false,
        success: function(result) {

            console.log(result);
            designEvent(result);
            console.log(result);
        },
        error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            //  alert(err.Message)
        }
    });

    function designEvent(dataArray) {
        console.log(dataArray[0][0]["EventDescription"]);
        console.log(dataArray[0][0]["EventDescription"]);
        console.log(dataArray[0][0]["EventDescription"]);
        $("#describe").text(dataArray[0][0]["EventDescription"]);
        $("#EventImage").attr("src", "./Upload/image/" + dataArray[0][0]["DP"]);
        // $("#EventVideo").attr("src", "./Upload/image/" + dataArray[0]["DP"]);
        insertingVideoList(dataArray);
    }

    function insertingVideoList(dataArray) {
        console.log("inserting videolist");
        $("#v1").html('<source src=' + dataArray[2][0]["video"] + ' type="video/mp4"></source>');
        $("#firstVideoTitle").append(dataArray[2][0]["Title"]);
        $("#firstVideoUploadTime").append(dataArray[2][0]["Uploaded_On"]);
        for (var video = 1; video < dataArray[2].length; video++) {
            $("#EventInsertHere0").append('<div class="carousel-item" ><video controls><source src= ./Upload/video/' + dataArray[2][video]["video"] + '  type="video/mp4"><source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.</video><h6>' + dataArray[2][video]["Title"] + '</h6><h7>Uploaded on:' + dataArray[2][video]["Uploaded_On"] + '</h7></div>')
        }
        // console.log(dataArray[0]['videos']);
        insertingPhotoList(dataArray);

    }
    function insertingPhotoList(dataArray){
        console.log("inserting Videolists");
        $("#p1").attr("src","./Upload/image/"+dataArray[1][0]["photo"]);
        $("#firstPhotoTitle").append(dataArray[1][0]["Title"]);
        $("#firstPhotoUploadTime").append(dataArray[1][0]["Uploaded_On"]);
        for (var photo = 1; photo < dataArray[1].length; photo++) {
            $("#EventInsertHere1").append('<div class="carousel-item" ><img src= ./Upload/image/' + dataArray[2][photo]["photo"] + '  alt=image not found><h6>' + dataArray[2][video]["Title"] + '</h6><h7>Uploaded on:' + dataArray[2][video]["Uploaded_On"] + '</h7></div>')
        }
        // console.log(dataArray[0]['videos']);
    }
    $(function() {
        $("#fullEventNav").load("nav.php");
    });
    $(function() {
        $("#fullEvent").load(".php");
    });
</script>