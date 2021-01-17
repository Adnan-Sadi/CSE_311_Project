
<!DOCTYPE html>
<style>
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        padding: 20px;
        /* margin-left: 20px; */
    }
    
    img{
        max-width: 100%;
        height: 300px;
    }
</style>
<div class="container">
    <h1><a href="./events.php?Id=<?php echo $_GET['Id']; ?>"><button class="btn btn-link btn-secondary d-block w-100 " style="width: 100%;margin:20px 0px;">All Events </button></a></h1>
</div>
<div id="LeftRightEventAds" class="container">
    <div class="row justify-content-around">
        <div class="col-5">
            <h1> Recent Events </h1>
            <div  class="w-100 p-3">
                <div id="carouselExampleCaptions0" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="EventAdInsertHere0">
                        <div class="carousel-item active">
                            <img id="FirstAdLeftImg" src="./images/" class="rounded w-100" alt="Image ">
                            <div id="EventAdLeft">
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
            <div id="NoPastEvents">
                <h1>No Past Events</h1>
            </div>
        </div>
        <div class="col-5">
            <div id="searchAD">
                <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" style="margin-bottom: 20px">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search Events by Title" aria-label="Search">
                </form>
            </div>
            <h1>Upcoming Events...</h1>
            <div class="w-100 p-3">
                <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="EventAdInsertHere1">
                        <div class="carousel-item active">
                            <img id="FirstAdRightImg" src="./images/" class="rounded w-100" alt="Image Missing">
                            <!-- <div class="carousel-caption "><div> -->
                            <div  id="EventAdRight">
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
            <div id="NoUpcomingEvents">
                <h1>No Past Events</h1>
            </div>
        </div>
    </div>
</div>


<script>
    $( document ).ready(function() {

    $("#searchAD").hide();
    // $(".adInnerBox").children().hide();
    var clubID = "<?php echo $_GET['Id'] ?>";
    $.ajax({
        type: 'POST',
        url: './database/ClubEvents.php',
        data: ({
            'clubID': clubID
        }),
        dataType: 'json',
        cache: false,
        success: function(result) {
            // console.log("Result", result);
            // console.log("Result", result[0][0]);
            // console.log(result[0][0]["name"]);
            // console.log(result[1][0]["name"]);
            if (result[0].length == 0) {
                $("#EventAdLeft").hide();
                $("#FirstAdLeftImg").attr("src", './images/NoPastEvent.png');
            } else {
                $("#NoPastEvents").hide();
                $("#FirstAdLeftImg").attr("src", './Upload/image/' + result[1][0]["DP"]);
                $("#EventAdTitleFirstLeft").text(result[1][0]["name"]);
                $("#EventAdDateFirstLeft").text(result[1][0]["Date"]);
               
            }
            if (result[1].length == 0) {
                    $("#EventAdRight").hide();
                    $("#FirstAdRightImg").attr("src", './images/NoUpcomingEvent.png');
            } else {
                $("#NoUpcomingEvents").hide();
                $("#FirstAdRightImg").attr("src", './Upload/image/' + result[0][0]["DP"]);
                $("#EventAdTitleFirstRight").text('' + result[0][0]["name"]);
                $("#EventAdDateFirstRight").text(result[0][0]["Date"]);
            }
            designEventAds(result);

        },
        error: function() {
            window.alert("Wrong query 'queryDB.php': ");
        }
    });
});

    function designEventAds(result) {
        console.log("recent", result[0]);
        // console.log("recent", result[1].length);
        if(result[0].length<1){
                $("#LeftRightEventAds a").hide();
        }

        for (var i = 1; i < result[0].length; i++) {
            $("#EventAdInsertHere1").append('<div class = carousel-item ><img  class=rounded w-100 src= ./Upload/image/' + result[0][i]["DP"] + ' alt=Event Page Missing > <div><h5>' + result[0][i]["name"] + '</h5><p>' + result[0][i]["Date"] + '</p><p>.</p></div></div>');
        }
        // console.log("upcomming", result[0].length);
        for (var i = 1; i < result[1].length; i++) {
            $("#EventAdInsertHere0").append('<div class = carousel-item  ><img  class=rounded w-100 src= ./Upload/image/' + result[1][i]["DP"] + ' alt=Event Page Missing ><div><h5>' + result[1][i]["name"] + '</h5><p>' + result[1][i]["Date"] + '</p><p>.</p></div></div>');
            // alert("Ok")
        }
    }
</script>