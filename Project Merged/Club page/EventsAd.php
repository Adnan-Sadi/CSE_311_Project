<!DOCTYPE html>
<style>
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        padding: 20px;
        /* margin-left: 20px; */
    }

    #EventsAds {
        margin: 5px;
        padding: 5%;
        border: 5px solid black;
        background-color: #d7d7d7;
    }

    /* #EventsAds  div {
        width: 100;
    } */
    #EventsAds img {
        height: 100%;
        width: 100%;
        padding: 50px;
    }

    #EventsAds h3 {
        color: lightcoral;
        text-decoration: underline;
    }

    #EventAdLeft {
        text-align: center;
        width: 95%;
        margin: 5px;
        /* margin-right: 100px ; */
        /* padding-right:70px; */
        /* border-right: .5px solid black; */
        padding: 2%;
    }

    #EventAdRight {
        text-align: center;
        width: 95%;
        margin: 5px;
        /* border-right: .5px solid black; */
        padding: 2%;
    }

    .adInnerBox {
        background-color: white;
        border: 10px inset blue;
        width: 80%;
    }

    .adInnerBox>div>div>div>div {
        border-top: 2px inset blue;
        margin-top: 20px;
        padding: 20px 0px 0px 0px;
    }

    /* #UpcomingEventsAdBoard {
        text-align: center;
        background-color: rgb(176, 243, 176);
    } */
</style>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="EventAdLeft">
                <button class="btn btn-link btn-danger d-block w-100 "><a href="./events.php"> All Events </a></button>
                <h1> Recent Events </h1>
                <div class="adInnerBox">
                    <div id="carouselExampleCaptions0" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id="EventAdInsertHere0">
                            <div class="carousel-item active">
                                <img id="FirstAdLeftImg" src="./images" class="d-block w-100" alt="Image Missing">

                                <div>
                                    <h5 id="EventAdTitleFirstLeft">Title</h5>
                                    <p id="EventAdDateFirstLeft">Date</p>
                                    <p>.</p>
                                </div>
                            </div>

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
        <div class="col">
            <div id="EventAdRight">
                <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" style="margin-bottom: 20px">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search Events by Title" aria-label="Search">
                </form>
                <h2>Upcoming Events...</h2>
                <div class="adInnerBox">
                    <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id="EventAdInsertHere1">
                            <div class="carousel-item active">
                                <img id="FirstAdRightImg" src="./images/acm.png" class="d-block w-100" alt="Image Missing">
                                <!-- <div class="carousel-caption ">
                    </div> -->
                                <div>
                                    <h5 id="EventAdTitleFirstRight">Title</h5>
                                    <p id="EventAdDateFirstRight">Date</p>
                                    <p>.</p>
                                </div>
                            </div>

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


<script>
    var clubID = "<?php echo $_GET['Id'] ?>"
    $.ajax({
        type: 'POST',
        url: './database/ClubEvents.php',
        data: ({
            'clubID': clubID
        }),
        dataType: 'json',
        cache: false,
        success: function(result) {
            $("#FirstAdLeftImg").attr("src", './images/' + result[1][0]["DP"]);
            $("#EventAdTitleFirstLeft").text(result[1][0]["name"])
            $("#EventAdDateFirstLeft").text(result[1][0]["Date"])
            $("#FirstAdRightImg").attr("src", './images/' + result[0][0]["DP"]);
            $("#EventAdTitleFirstRight").text(result[0][0]["name"])
            $("#EventAdDateFirstRight").text(result[0][0]["Date"])
            designEventAds(result);
        },
        error: function() {
            window.alert("Wrong query 'queryDB.php': ");
        }
    });


    function designEventAds(result) {
        console.log("recent", result[0]);
        console.log("recent", result[1].length);
        for (var i = 1; i < result[0].length; i++) {
            $("#EventAdInsertHere1").append('<div class = carousel-item ><img  class="d-block w-100" src= ./Upload/image/' + result[0][i]["DP"] + ' alt=Event Page Missing > <div><h5>' + result[0][i]["name"] + '</h5><p>' + result[0][i]["Date"] + '</p><p>.</p></div></div>');
        }
        console.log("upcomming", result[0].length);
        for (var i = 1; i < result[1].length; i++) {
            $("#EventAdInsertHere0").append('<div class = carousel-item  ><img  class="d-block w-100" src= ./Upload/image/' + result[1][i]["DP"] + ' alt=Event Page Missing ><div><h5>' + result[1][i]["name"] + '</h5><p>' + result[1][i]["Date"] + '</p><p>.</p></div></div>');
            // alert("Ok")
        }
    }
</script>