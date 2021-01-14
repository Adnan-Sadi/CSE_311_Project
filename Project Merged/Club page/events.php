

    <!DOCTYPE html>
    <style>
        #eventsBottom :hover {
            background-color: white;
        }
        #AllEvents img {
            width: 200px;
            height: 200px;
        }
        #AllEvents > div {
            margin: 50px;
            padding: 50px;
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
                <button class="btn btn-info btn-block" style="margin: 5px 0px 20px 0px" data-toggle="modal" data-target="#CreateEvent">Create Event</button>
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
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title </label>
                                <input name='evTitle' value="Example123" type="text" class="form-control" placeholder="Example">
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
                                <label  for="example-date-input" class="col-2 col-form-label">Date</label>
                                <div class="col-10">
                                    <input  name="evDate" class="form-control" type="date" value="" id="example-date-input">
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



    <script>
        var clubID = 1;
        $.ajax({
            type: 'POST',
            url: './database/getAllEvents.php',
            data: ({'clubID': clubID}),
            dataType: 'json',
            cache: false,
            success: function(result) {
                var count = 0;
                designEvents(result[0], count);
                console.log(result);
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message)
            }
        });

        function designEvents(dataArray, count) {
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
            $("#AllEventTableRow" + row).append('<td> <div class="card"><div class="card-body"><img class="card-img-top" src=./Upload/image/'+ dataArray[count]['DP'] +'  alt="Event photo not found"> <h5 class="card-title">' + dataArray[count]['Name'] + '</h5> <p class="card-text">' + dataArray[count]["Date"] + '</p><p class="card-text">' + dataArray[count]["Description"].substring(0, 70) + '<button class="btn" style="color:red;text-decoration: underline;"><a href=./FullEvent.php?eID='+dataArray[count]['eID']+'&Id='+clubID+'>Read More..</a></button></p></div></td>');
            console.log("CLUBID",clubID)
        }
        $(function() {
            $("#eventsNav").load("nav.php");
        });
        $(function() {
            $("#eventsBottom").load("bottom.php");
        });
    </script>

    
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
        // echo $_POST['evDate'];
        // echo strtotime($_POST['evDate']);
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
        SQL_Query($sql);
    }
    

    ?>