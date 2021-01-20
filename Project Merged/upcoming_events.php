<!DOCTYPE html>
<html lang="en">
<style>
    #HomeUpcommigEventsAd img {
        max-width: 335px;
        height: 200px;
    }
    #upcomingEvents {
        margin: 20px;
    }

    #HomeUpcommigEventsAd h6 {
        margin: 15px;
        text-align: center;
    }

    #carouselExampleFade {
        border: 10px solid red;
        width: 350px;
        height: 300px;
    }

</style>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>NSU Clubs Home</title>
    <link rel="stylesheet" href="./css/bootstrap.css.map" />
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container section">
        <h2  class="section-head">Upcoming Events</h2>
        <h6 id="NoEventBoard"  style="text-align: center;"> No Upcoming Events Found</h6>
        <div id="upcomingEvents" class="d-flex justify-content-center">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner" id="HomeUpcommigEventsAd">
                    <div class="carousel-item active">
                        <img id="FirstAdImg" src="" class="d-block w-100" alt="Image missing">
                        <div id="firstAd">
                            <h6 id="FirstAdTitle">Title</h6>
                            <h6 id="FirstAdDate">Date</h6>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $( document ).ready(function() {
        $.ajax({
            type: 'post',
            url: './Club page/database/getUpcomingEvents.php',
            dataType: 'json',
            cache: false,
            success: function(result) {
                if(result.length == 0 ){
                    $("#firstAd").hide();
                    $("#upcomingEvents a").hide();
                    $("#FirstAdImg").attr("src", './Club page/images/NoUpcomingEvent.png').height('280px');
                    // $("img").css("max-height", "400px");
                    return;
                }
                 
                else{
                    if(result.length == 1){
                    $("#upcomingEvents a").hide();
                }
                $("#NoEventBoard").hide();
                $("#FirstAdImg").attr("src", './Club page/Upload/image/' + result[0]["DP"]);
                $("#FirstAdTitle").text(result[0]["name"]);
                $("#FirstAdDate").text(result[0]["Date"]);
                designAd(result);
                }
            },
            error: function() {
                $("#upcomingEvents").children().hide();
                $("#NoEventBoard").show();
                console.log("Wrong query './Club page/database/getUpcomingEvents.php': " + "or query did not exicuted");
            }
        });
});
        

    function designAd(dataArray) {
        for (var i = 1; i < dataArray.length; i++) {
            if(dataArray[i].length==0){
                continue;
            }
            $("#HomeUpcommigEventsAd").append('<div class="carousel-item"><img src= "' + './Club page/Upload/image/' + dataArray[i]['DP'] + '" class="d-block w-100" alt="Image missing" ><h6>' + dataArray[i]['name'] + '</h6><h6>' + dataArray[i]['Date'] + '</h6></div>');
        }
    }

</script>