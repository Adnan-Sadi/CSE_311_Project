<?php 
session_start();
?>
<!DOCTYPE html>
<style>
    #AllEvents img {
        max-width: 250px;
        height: 200px;

    }

    /* #AllEvents {
            margin : 5px;
        } */
    #AllEventTableBody td {
        margin: 0px 70px 0px 70px;
        /* padding: 50px; */
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
            <!-- <div class="container"> -->
            <div  style=" margin-top:10px">
                <a href="./Club_main.php?Id=<?php echo $_GET['Id']; ?>"><button class="btn btn-danger"><h4>Back</h4></button></a>
            </div>
            <h1 style="text-align:center">All Events</h1>
            <!-- </div>     -->
            <?php
            if ($_SESSION['isPresident']){
                echo '<button class="btn btn-info btn-block" style="margin: 5px 0px 20px 0px" data-toggle="modal" data-target="#CreateEvent">Create Event</button>';
            }
            ?>
            <div class="table-responsive">
                <table class="table-borderless">
                    <tbody id="AllEventTableBody">
                    </tbody>
                </table>
            </div>
        </div>

        <div style="clear:both;margin-top:20px">
            <div id="eventsBottom" class="footer">
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="CreateEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventCreateForm" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title </label>
                            <input name='evTitle' value="" type="text" class="form-control" placeholder="Example">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea name="evDescription" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Photo Heading</label>
                            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Date</label>
                            <div class="col-10">
                                <input name="evDate" min="<?php echo date("Y-m-d");?>" class="form-control" type="date" value="" id="example-date-input">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input name="evSubmit" type="submit" value="Save changes">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



<?php
require "./database/accessDatabase.php";
$file = 'image';
$folderPath = "./Upload/image/";

if (isset($_POST['evSubmit'])) {
    $file = "image";
    $folderPath = "./Upload/image/";
    $fileName = uploadImage($file, $folderPath);

    $ClubId = $_GET['Id'];
    $EventDescription = "";
    $EventName = get_input($_POST['evTitle']);  //************************* I NEED U */
    $EventDP = "";
    $EventDescription = get_input($_POST['evDescription']);
    $Dated = date('Y-m-d', strtotime($_POST['evDate']));
    // echo $Dated;
    insertEvents($ClubId, $EventName, $EventDescription, $Dated, $EventDP);

    $sql = "SELECT EventID from Events order by eventId DESC limit 1";
    $Myarray = inQuery($sql);

    $EventID = $Myarray[0]['EventID'];
    $Path = $fileName;;
    $Title = get_input($_POST['evTitle']);
    insertPhotos($EventID, $Path, $Title);

    $sql = "SELECT PhotoId FROM eventPhotos where eventID =" . $EventID . " ORDER BY PhotoId  DESC LIMIT 1";
    $Myarray = inQuery($sql);
    $EventDP = $Myarray[0]['PhotoId'];
    $sql = "UPDATE events
                SET eventDP = " . "$EventDP" . " 
                WHERE EventID = (SELECT EventID
                                FROM eventphotos
                                ORDER BY Uploaded_On DESC
                                LIMIT 1 )";
    if (SQL_Query($sql)) {
        $Followers = getAllFollowers($ClubId, $EventID);
        $follower = getAllFollowers($ClubId);
        $event = getEventForMail($ClubId, $EventID);
        sendMailAboutEventCreation($follower[0]['Email'], $event[0]['ClubName'], $event[0]['EventName'],$event[0]['Fullname'], $follower[0]['Name'], $event[0]['Date'], $event[0]['EventDescription']);
    }
}
?>


<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    var clubID = <?php echo $_GET['Id']; ?>;
    var so = <?php echo $_GET['Id']; ?>;
    var ed = <?php echo $_SESSION['isPresident']; ?>;
    
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: './database/getAllEvents.php',
            data: ({
                'clubID': clubID,
                'functionName': '',
                'eventID': null,
            }),
            dataType: 'json',
            cache: false,
            success: function(result) {
                var count = 0;
                designEvents(result[0], count);
                // console.log(result);
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message)
            }
        });
    });

    function eventDelete(e) {
        if (confirm("Are you sure about deleting the event?")) {
            $(document).ready(function() {
                $.ajax({
                    type: 'POST',
                    url: './database/getAllEvents.php',
                    data: ({
                        'clubID': clubID,
                        'eventID': e.value,
                        'functionName': 'eventDelete',
                    }),
                    dataType: 'json',
                    cache: false,
                    success: function(result) {
                        alert('Event Deleted');
                        location.reload();
                        // }
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }
                });
            });
        }

    }

    function designEvents(dataArray, count) {
        var j = -1;
        var makeColumn = 4;
        for (var i = 0; i < dataArray.length; i++) {
            if (i % makeColumn == 0) {
                j++;
                $("#AllEventTableBody").append('<tr id=AllEventTableRow' + j + '>');
                $("#AllEventTableBody").append('</tr>');
            }
            createAdInAllEvent(dataArray, i, j); //creates a event ad column

        }
    }

    function createAdInAllEvent(dataArray, count, row) {
        var td = $("#AllEventTableRow" + row).append('<td></td>');
        var card = td.append('<div class="card"></div>');
        var cardBody = card.append('<div class="card-body"></div>');
        cardBody.append('<img class="card-img-top" src=./Upload/image/' + dataArray[count]['DP'] + '  alt="Event photo not found">');
        cardBody.append('<h5 class="card-title">' + dataArray[count]['Name'] + '</h5>');
        cardBody.append('<p class="card-text">' + dataArray[count]["Date"] + '</p>');
        cardBody.append('<p class="card-text">' + dataArray[count]["Description"].substring(0, 70) + '<a href=./FullEvent.php?eID=' + dataArray[count]['eID'] + '&Id=' + clubID + '><button class="btn" style="color:red;text-decoration: underline;">Read More..</button></a></p>');
        var cardDown = td.append('<di ></di>')
        // var ed = <?php echo $_SESSION["isPresident"]; ?>;
        if( <?php echo $_SESSION["isPresident"]; ?>){
            cardDown.append('<button class="btn btn-info btn-sm " style="margin: 5px " >Edit</button>');
            cardDown.append('<button class="btn btn-info btn-sm" onClick=eventDelete(this) value = ' + dataArray[count]['eID'] + ' style="margin: 5px " >Delete</button>');
        }
        // $("#AllEventTableRow" + row).append('<td> <div class="card"><div class="card-body"><img class="card-img-top" src=./Upload/image/'+ dataArray[count]['DP'] +'  alt="Event photo not found"> <h5 class="card-title">' + dataArray[count]['Name'] + '</h5> <p class="card-text">' + dataArray[count]["Date"] + '</p><p class="card-text">' + dataArray[count]["Description"].substring(0, 70) + '<button class="btn" style="color:red;text-decoration: underline;"><a href=./FullEvent.php?eID='+dataArray[count]['eID']+'&Id='+clubID+'>Read More..</a></button></p></div><button class="btn btn-info btn-block" style="margin: 5px 0px 20px 0px" >Delete</button></td>');
        // eventCard.append('<h1>OK HI</h1><button class="btn" style="color:red;text-decoration: underline;"><a href=./FullEvent.php?eID='+dataArray[count]['eID']+'&Id='+clubID+'>Read More..</a></button></p></div><button class="btn btn-info btn-block" style="margin: 5px 0px 20px 0px" >Delete</button>');
        console.log("CLUBID", clubID)
    }
    $(function() {
        $("#eventsNav").load("nav.php");
    });
    $(function() {
        $("#eventsBottom").load("bottom.php");
    });
</script>