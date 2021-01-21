<?php
require './database/accessDatabase.php';
session_start();
if(isset($_SESSION['userEmail'])){
    if(isLeader($_GET['Id'],$_SESSION['userEmail'])==1){
        $_SESSION['isPresident'] = 1;
    }
    else{
        $_SESSION['']
    }
}
else{
    $_SESSION['isPresident'] = 0;
    $_SESSION['userEmail'] = '';
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<style>
    .card img:hover {
        width: 350px;
        height: 450px;
        transition: 2s;
    }

    .card-body {
        background: rgb(218, 248, 248);
        margin-left: 10px;
        /* width: 90%; */
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 20px;
        /* height: 130px; */
    }

    .card-body img {
        width: 300px;
        /* height: 70%; */
    }
    #team-intro {
        margin: 40px;
        padding: 40px;
        text-align: center;
    }
    
    #team-intro button {
        width: 300px;
        height: 70px;
    }
    
    #team-intro h1:first-of-type:hover {
        color: rgb(124, 124, 233);
    }
</style>

<body>

    <div id="nav"></div>
    <div id="main"></div>
    <div id="EventsAds">

    </div>
    <div id="team-intro">
        <h1 style="text-align: center; margin-bottom: 60px;" class="hover-line">Our Teams</h1>
                <a href="../members.php?id=<?php echo $_GET['Id']; ?>" <button class="btn  btn-success  d-block w-100  ">Members</button></a>
        </ul>

    </div>
    <footer>
        <div id="bottom">
        </div>
    </footer>

    <script>
        var ClubID = "<?php echo $_GET['Id']; ?>";
        $(function() {
            $("#nav").load("nav.php");
        });
        $(function() {
            $("#main").load("main.php?Id="+ClubID);
        });
        $(function() {
            $("#EventsAds").load("EventsAd.php?Id="+ClubID);
        });
        $(function() {
            $("#bottom").load("bottom.php");
        });
    </script>

</body>

</html>