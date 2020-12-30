<!DOCTYPE html>
<style>
     #left-element {
        text-align: center;
        float: left;
        width: 50%;
        border-right: .5px solid black;
    }
    #RecentEventsAdBoard{
        text-align: center;
        background-color: rgb(176, 243, 176);
    }
   
    #left-element button{
        margin:15px;
        text-align:center;
        font-size:50px;
        width:100px;
    }
    .eventAdvertisement{width: 400px;height: 500px;
    }

</style>
<script>
$("#nextRecentEventAd").click();
    var adchangecount=0;
    var sendDataReq = "<";
    var recentEventArray=[];
    var upcomingEventArray=[];
    function adChange(EventsTiming,val){
        console.log(val);
        console.log('val',val);
        if(val == "next"){
            adchangecount++;
        }
        else if(val == "previous"){
            adchangecount--;
        }

        $(document).ready( function() {
        if(EventsTiming=='UpcomingEvents')
        {
            sendDataReq = '>=';
        }
        else{
            sendDataReq = '<';
        }
        var  eventAdID = 0;
        eventAd();

        function eventAd(){
            $.ajax({
                type: 'POST',
                url: './database/clubEvents.php',
                data: {timing:sendDataReq},
                dataType: 'json',
                cache: false,
                success: function(result) {
                    if(result.length <= adchangecount)
                    {
                        adchangecount=0;
                    }
                    else if(adchangecount<0){
                        adchangecount=result.length-1;
                    }
                    if(EventsTiming=='RecentEvents')
                    {
                        recentEventArray = result;
                    designEventsAd(recentEventArray,adchangecount,EventsTiming);
                    }
                    else{
                        upcomingEventArray = result;
                    designEventsAd(upcomingEventArray,adchangecount,EventsTiming);
                    }
                },
                error: function(){
        window.alert("Wrong query 'queryDB.php': " + query);
                }
            });


        }
        function designEventsAd(eventArray,eventAdID,EventsTiming){
        $("#"+EventsTiming+"AdBoard").html(' <div id= '+EventsTiming+'-ad'+ eventAdID +' class="card"></div>');
        $("#"+EventsTiming+"-ad"+eventAdID).append(' <div class= card-body id='+EventsTiming+'c'+ eventAdID +' > </div>');
        $("#"+EventsTiming+"c"+eventAdID).append('<img class= eventAdvertisement src="./images/unnamed.jpg" alt="Event Page Missing">');
        $("#"+EventsTiming+"c"+eventAdID).append(' <h5 class=card-title>'+eventArray[eventAdID]['name']+'</h5>');
        $("#"+EventsTiming+"c"+eventAdID).append(' <h5 class=card-title>'+eventArray[eventAdID]['Dated']+'</h5>');
        $("#"+EventsTiming+"c"+eventAdID).append(' <p class=card-text>'+eventArray[eventAdID]['Description']+'</p>');
        eventAdID++;
        console.log(EventsTiming);
        }


        });
}

</script>
<div class="container">
    <div class="center" >
            <button id="getAllAventAd" class="btn btn-outline-danger"  style="width:50%;height:70px;margin:0px"><h1><a href="../seperation/Views/events.php">All Events</a></h1></button>
    </div>
</div>
<h1>Recent</h1>
<div id="RecentEventsAdBoard"></div>
<div>
    <button class="btn btn-danger"  value="next" onClick="adChange('RecentEvents',this.value)"><i class="fas fa-arrow-left"></i></button>
    <button class="btn btn-success"  id="nextRecentEventAd" value="previous" onclick="adChange('RecentEvents',this.value)"><i class="fas fa-arrow-right"></i></button>

</div>
