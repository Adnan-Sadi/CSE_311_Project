<?php 
require "./database/accessDatabase.php";
$ClubId = 1;
// goingToEvent(8,205);
echo isLeader(1,'Saeem03@gmail.com');
//  print_r (getUserID("Saeem03@gmail.com"));
// $EventID = 202;
// echo (isLeader(1,'Saee03@gmail.com'))
// $follower = getAllFollowers($ClubId);
//         $event = getEventForMail($ClubId, $EventID);
//         foreach($follower as $value)
//             print_r($value['Email']);
// ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="o" action="" method="post" onsubmit="cli()">
    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                            <div class="col-10">
                                <input name="evDate" min="<?php echo date("Y-m-d");?>" class="form-control" type="date" value="" id="example-date-input">
                            </div>
    </form>
</body>
<script>
    // if (window.history.replaceState) {
    //     window.history.replaceState(null, null, window.location.href);
    // }
    // console.log($("#1").val());
    // document.getElementById("2").innerHTML = $("#1").text();
    function cli(){
        var  x = document.getElementById("go");
        // x.innerText = "ok";
        console.log(x.textContent);
        console.log(x.value);
        alert(x.innerText);

        // console.log($("form").serializeArray());
        // alert('p');
    }
    // $("#1").html('<div class="form-group"><label for=""></label><textarea class="form-control" <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" columns="10">'+$("#1").text()+'</textarea></div>');
</script>
</html>
<?php 
// require './database/accessDatabase.php';
//   if(eventEdit(1,197,'',$description = "koli")){
//       echo "u r sweet";
//   };
// if(isset($_POST['submit'])){
//     echo $_POST['2'];
//     // echo ks;                                                        
// } 
// ?>