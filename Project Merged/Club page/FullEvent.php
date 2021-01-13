<!-- <?php
        //  $session_start();

        ?> -->

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
    Video{
        margin:50px 100px 150px -20px;
         width:485px;
        height:240px;
    }
    #VideosList {
        text-align: center;
        float: left;
        width: 45%;
        height: 50px;
        margin: 5px;
        /* padding-right:70px; */
        /* border-right: .5px solid black; */
        padding: 2%;
    }
    .ok{
        width: 600px;
        height: 600px;

    }
</style>

<body style="background:red">
    <div id="fullEventNav"></div>
    <div id="fullEvent" class="container">
        <!-- <Button onclick="eShowMore()" class="btn btn-block btn-danger"><b> Back</b></Button> -->
        <div class="container-center">
            <img id="EventImage" src="/Project Main Saeem/seperation/images/eventLogo.png" alt="not found">
            <p id="describe">
                For the first time in its 25 year-long legacy, NSU YES! will be hosting its strategic business case-solving competition online. The arena is set for Masters of Ideation, the battle for supremacy.

                One of the most prestigious case solving competitions is back for opportunities of cognitive and analytical thinking. Masters of Ideation is all set to kick-start a brand new expedition with an aim to create a stimulating experience for the business competition. Undergraduate students all across the nation will join their intellect to come out victorious in the ultimate business battle.

                North South University Young Entrepreneurs Society, NSU YES! is initiating its seventh edition of Masters of Ideation in 2020 by adapting to the new normal.

                This time, we are proud and delighted to have Perfetti Van Melle as our Title Sponsor for this event.
            </p>
        </div>
        <div id="VideosList">
            <div class="adInnerBox">
                <div id="carouselExampleCaptions0" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="EventInsertHere0">
                        <div class="carousel-item active " >
                                    <video controls>
                                        <source src="movie.mp4" type="video/mp4">
                                        <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                        </div>
                        <div class="carousel-item ">
                                    <video controls>
                                        <source src="movie.mp4" type="video/mp4">
                                        <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                            </div>
                        </div>
                        <div class="carousel-item ">

                                    <video controls>
                                        <source src="movie.mp4" type="video/mp4">
                                        <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
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
</body>

</html>

<script>
    // console.log();
    //  echo $_SESSION["visitingClubName"] 
    // alert("OK"); 
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
    //  $('#fullEvent').hide();

    //  function eShowMore() {
    //      $('#AllEvents , #fullEvent').toggle();
    //  };

    function designEvent(dataArray) {
        $("#describe").text(dataArray[0]["EventDescription"]);
        $("#EventImage").attr("src", "./Upload/image/" + dataArray[0]["DP"]);
        // $("#EventVideo").attr("src", "./Upload/image/" + dataArray[0]["DP"]);
       
    }
    function insertingVideoList(dataArray){
        console.log("inserting videolist");
        $("#EventInsertHere0").append('<div class="carousel-item" ><video controls><source src="movie.mp4" type="video/mp4"><source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.</video></div>')


    }

    $(function() {
        $("#fullEventNav").load("nav.php");
    });
    $(function() {
        $("#fullEvent").load(".php");
    });
</script>