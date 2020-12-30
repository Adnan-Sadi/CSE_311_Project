 <style>
     
 </style>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 <script src="../../jquery-3.5.1.js"></script>
    <script src="../bootstrap-4.5.0-dist/js/bootstrap.bundle.js"></script>
    <script src="../bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../bootstrap-4.5.0-dist/css/bootstrap.css">
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>All Events</title>
 </head>
 <body>
    <div id="AllEvents" class="container">
        <h1 style="text-align:center">All Events</h1>
        <div class="table-responsive">
            <table class="table-borderless">
                <tbody id="AllEventTableBody">
                </tbody>
            </table>
        </div>
    </div>
 <div id="fullEvent" class="container">
     <Button onclick="eShowMore()" class="btn btn-block btn-danger"><b> Back</b></Button>
     <div class="container-center">
         <img src="/Project Main Saeem/seperation/images/eventLogo.png" alt="not found">
         <p>
         For the first time in its 25 year-long legacy, NSU YES! will be hosting its strategic business case-solving competition online. The arena is set for Masters of Ideation, the battle for supremacy.

            One of the most prestigious case solving competitions is back for opportunities of cognitive and analytical thinking. Masters of Ideation is all set to kick-start a brand new expedition with an aim to create a stimulating experience for the business competition. Undergraduate students all across the nation will join their intellect to come out victorious in the ultimate business battle.

            North South University Young Entrepreneurs Society, NSU YES! is initiating its seventh edition of Masters of Ideation in 2020 by adapting to the new normal.

            This time, we are proud and delighted to have Perfetti Van Melle as our Title Sponsor for this event.
         </p>

     </div>
     <div style="float:left">

        <video width="320" height="240" controls>
            <source src="movie.mp4" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video>
    </div>
    <div style="float:right">

        
        <img src="/Project Main Saeem/seperation/images/eventLogo.png" alt="not found">
        <!-- <img src="/Project Main Saeem/seperation/images/eventLogo.png" alt="not found">
        <img src="/Project Main Saeem/seperation/images/eventLogo.png" alt="not found"> -->
    </div>
    
 </div>
 </body>
 </html>
 
<script>
            $.ajax({
                type: 'POST',
                url: '../database/getAllEvents.php',
                dataType: 'json',
                cache: false,
                success: function(result) {
                    var count=0;
                    designEventsAd(result,count);
                    console.log(result);
                },
                error:function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message)
            }});
            $('#fullEvent').hide();
            function eShowMore(){
                $('#AllEvents , #fullEvent').toggle();
                console.log("OOOK");
            };
        function designEventsAd(dataArray,count){
            var j=-1;
            var makeRow=3;
            for(var i=0;i<dataArray.length;i++){
                if(i%makeRow==0){
                    j++;
                    $("#AllEventTableBody").append('<tr id=AllEventTableRow'+ j +'>');
                    $("#AllEventTableBody").append('</tr>');
                }
                    createAdInAllEvent(dataArray,i,j);    //creates a event ad column

            }
        }
        function createAdInAllEvent(dataArray,count,row){
            $("#AllEventTableRow"+row).append('<td> <div class="card"><div class="card-body"><img class="card-img-top" src=../seperation/images/Hossain.jpeg  alt="Event photo not found"> <h5 class="card-title">'+ dataArray[count]['name'] +'</h5> <p class="card-text">'+ dataArray[count]["Dated"]+'</p><p class="card-text">'+ dataArray[count]["Description"]+'</p><button onClick="eShowMore()" class="btn" style="color:red;text-decoration: underline;">Read More..</button></div></td>');
        }
</script>