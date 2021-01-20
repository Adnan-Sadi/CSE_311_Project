<?php 
require "./database/accessDatabase.php";
$ClubId = 1;
$EventID = 202;

$follower = getAllFollowers($ClubId);
        $event = getEventForMail($ClubId, $EventID);
        foreach($follower as $value)
            print_r($value['Email']);
?>



<!-- 
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
        <p id="1">dasdsa d</p>  
        <textarea name=""  cols="30" rows="10"></textarea>
        <input type="text" name="2"  id = "2" value="ok">
        <input type="submit" value="ok" name="submit">
    </form>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    // console.log($("#1").val());
    // document.getElementById("2").innerHTML = $("#1").text();
    function cli(){
        var  x = document.getElementsByName("2").value;
        console.log(x);

        // console.log($("form").serializeArray());
        alert('p');
    }
    // $("#1").html('<div class="form-group"><label for=""></label><textarea class="form-control" <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" columns="10">'+$("#1").text()+'</textarea></div>');
</script>
</html> -->
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