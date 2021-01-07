<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
<!-- <link rel="stylesheet" type="text/css" href="../css/styles.css"> -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script> -->
</head>
<body>
<div id="fullEventNav"></div>
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
             <div style="margin:50px 0px 400px 0px;">
                 <div style="float:left">

                     <video width="320" height="240" controls>
                         <source src="movie.mp4" type="video/mp4">
                         <source src="movie.ogg" type="video/ogg">
                         Your browser does not support the video tag.
                     </video>
                 </div>
                 <div style="float:right">
                     <img src="./images/eventLogo.png" alt="not found">
                     <!-- <img src="/Project Main Saeem/seperation/images/eventLogo.png" alt="not found">
                <img src="/Project Main Saeem/seperation/images/eventLogo.png" alt="not found"> -->
                 </div>
             </div>
         </div>
         <div id="fullEventBottom"></div>
</body>
</html>

<script>
     $.ajax({
         type: 'POST',
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
         $("#fullEventNav").load("nav.php");
     });
     $(function() {
         $("#fullEventBottom").load("bottom.php");
     });
 </script>