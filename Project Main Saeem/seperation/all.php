<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="/seperation/fontawesome-free-5.15.1-web/css/all.css" >
    <link href="/seperation/fontawesome-free-5.15.1-web/css/fontawesome.css" rel="stylesheet">
    <link href="/seperation/fontawesome-free-5.15.1-web/css/brands.css" rel="stylesheet">
    <link href="/seperation/fontawesome-free-5.15.1-web/css/solid.css" rel="stylesheet">
    <script defer src="/seperation/fontawesome-free-5.15.1-web/js/all.js"></script> 
    <!-- <script defer src="/seperation/fontawesome-free-5.15.1-web/js/brands.js"></script>
  <script defer src="/seperation/fontawesome-free-5.15.1-web/js/solid.js"></script>
  <script defer src="/seperation/fontawesome-free-5.15.1-web/js/fontawesome.js"></script> --> 
  <!-- <link rel="stylesheet" href="	https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->

</head>
<style>
    body {
        margin: 0%;
    }
    
    #nav {
        /* position: fixed; */
        top: 0%;
        width: 100%;
    }
   #left-element,#right-element{
    padding: 100px;
    border-bottom:.7px solid black;
    margin-bottom:100px;
   }
    .card img:hover{
        width: 450px;
        height: 450px;
        transition: 5s;
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
        height: 70%;
    }
    #members-List {
        text-align: center;
        margin: 150px;
    }
    
</style>

<body>
    <div id="nav"></div>

    <div id="main"></div>
    <hr>
    <div id="left-element"></div>
    <div id="right-element"></div>
    <div id="ex"></div>
    <div id="teams"> </div>
    <div id="members-List"> </div>
    <!-- <?php include "/seperation/main.html" ?> -->
    <footer>
        <div id="bottom">
        </div>
    </footer>
    <script src="../jquery-3.5.1.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.bundle.js"></script>
    <script src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $("#nav").load("nav.php");
        });
        $(function() {
            $("#main").load("main.php");
        });
        $(function() {
            $("#left-element").load("left.php");
        });
        $(function() {
            $("#right-element").load("right.php");
        });
        $(function() {
            $("#bottom").load("bottom.php");
        });
        $(function() {
            $("#ex").load("executive-body.php");
        });
        $(function() {
            $("#members-List").load("members-List.php");
        });
        $(function() {
            $("#teams").load("teams.php");
        });
    </script>

</body>

</html>