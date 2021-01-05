<!DOCTYPE html>
<style>
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        height: 100px;
        width: 100px;
        background-color: #9ff7b3;
    }

    a {
        color: red;
    }

    img {
        height: 150px;
    }

    #left-element {
        text-align: center;
        float: left;
        width: 50%;
        border-right: .5px solid black;
    }

    #RecentEventsAdBoard {
        text-align: center;
        background-color: rgb(176, 243, 176);
    }

    #left-element button {
        margin: 15px;
        text-align: center;
        font-size: 50px;
        width: 100px;
    }

    .eventAdvertisement {
        width: 400px;
        height: 300px;
    }
</style>
<script>
    function eventAd() {
        $.ajax({
            type: 'POST',
            url: './database/ClubEvents.php',
            dataType: 'json',
            cache: false,
            success: function(result) {
                console.log("Left", result);
            },
            error: function() {
                window.alert("Wrong query 'queryDB.php': ");
            }
        });


    }

    function designEventAds(result) {

    }

    function designEventsAd() {
        var 
        $("#insertEventsAdHere").append('div class = "carousel-item" ><img  style=margin: 50px; src=./images/friends-week copy 2.jpg alt=Event Page Missing ><div class=carousel-caption d-none d-md-block></div><h5>Last slide label</h5><p>First slide label</br></p><p>.</p></div>');
    }

    designEventsAd();
    // $("#nextRecentEventAd").click();
    // $("#nextRecentEventAd").click();
</script>
<h1>Recent</h1>
    <div class="container">
        <!-- <div class="center" > -->
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" id="insertEventsAdHere">
                    <div class="carousel-item active">
                        <img style="margin: 50px;" src="./images/friends-week copy 2.jpg" alt="Event Page Missing">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                        <h5>First slide label</h5>

                        <p>First slide label</br></p>
                        <p>.</p>
                    </div>
                    <!-- <div class="carousel-item ">
                        <img style="margin: 50px;" src="./images/friends-week copy 2.jpg" alt="Event Page Missing">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                        <h5>First slide label</h5>

                        <p>First slide label</br></p>
                        <p>.</p>
                    </div> -->
                </div>
                <!-- <div class="carousel-item">
            <img style="margin: 100px;" src="./images/friends-week copy 2.jpg" alt="Event Page Missing">
            <div class="carousel-caption d-none d-md-block">
            </div>
            <h5>Second slide label</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        </div> -->
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
