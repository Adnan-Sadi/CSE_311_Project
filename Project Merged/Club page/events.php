<?php
// session_start();
// echo $_SESSION["clubName"];
?> 
 
 <!DOCTYPE html>
 <style>
     #eventsBottom :hover{
         background-color: white;
     }
 </style>
 <html lang="en">

 <head>
     <script src="../js/jquery-3.5.1.min.js"></script>
     <script src="../js/bootstrap.bundle.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="../css/bootstrap.css">
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>All Events</title>
 </head>

 <body>
     <div id="eventsNav"></div>
     <div>
         <div id="AllEvents" class="container" style="margin-bottom:50px;">
             <h1 style="text-align:center">All Events</h1>
             <div class="table-responsive">
                 <table class="table-borderless">
                     <tbody id="AllEventTableBody">
                     </tbody>
                 </table>
             </div>
         </div>
         
         <div style="clear:both;margin-top:20px">
             <div id="eventsBottom" >
             </div>
         </div>
     </div>

 </body>

 </html>

 <script>
     $.ajax({
         type: 'POST',
         data: { visitingClubName : '<?php echo "ACM" ?>' },
         url: './database/getAllEvents.php',
         dataType: 'json',
         cache: false,
         success: function(result) {
             var count = 0;
             designEventsAd(result, count);
             console.log(result);
         },
         error: function(xhr, status, error) {
             var err = eval("(" + xhr.responseText + ")");
             alert(err.Message)
         }
     });
    //  $('#fullEvent').hide();

    //  function eShowMore() {
    //      $('#AllEvents , #fullEvent').toggle();
    //  };

     function designEventsAd(dataArray, count) {
         var j = -1;
         var makeRow = 3;
         for (var i = 0; i < dataArray.length; i++) {
             if (i % makeRow == 0) {
                 j++;
                 $("#AllEventTableBody").append('<tr id=AllEventTableRow' + j + '>');
                 $("#AllEventTableBody").append('</tr>');
             }
             createAdInAllEvent(dataArray, i, j); //creates a event ad column

         }
     }

     function createAdInAllEvent(dataArray, count, row) {
         $("#AllEventTableRow" + row).append('<td> <div class="card"><div class="card-body"><img class="card-img-top" src=./images/Hossain.jpeg  alt="Event photo not found"> <h5 class="card-title">' + dataArray[count]['name'] + '</h5> <p class="card-text">' + dataArray[count]["Dated"] + '</p><p class="card-text">' + dataArray[count]["Description"].substring(0, 150) + '<button class="btn" style="color:red;text-decoration: underline;"><a href="./FullEvent.php">Read More..</a></button></p></div></td>');
     }
     $(function() {
         $("#eventsNav").load("nav.php");
     });
     $(function() {
         $("#eventsBottom").load("bottom.php");
     });
 </script>