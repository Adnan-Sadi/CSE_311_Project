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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
   

    .card img:hover{
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
</style>
<body>

    <div id="nav"></div>
    <div id="main"></div>
    <div id="EventsAds" >

    </div>
    <div id="ex"></div>
    <div id="teams"> </div>
    <footer>
        <div id="bottom">
        </div>
    </footer>
   
    <script>
//         function onSignIn(googleUser) {
//   var profile = googleUser.getBasicProfile();
//   console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
//   console.log('Name: ' + profile.getName());
//   console.log('Image URL: ' + profile.getImageUrl());
//   console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
// }
//   function signOut() {
//     var auth2 = gapi.auth2.getAuthInstance();
//     auth2.signOut().then(function () {
//       console.log('User signed out.');
//     });
//   }
        $(function() {
            $("#nav").load("nav.php");
        });
        $(function() {
            $("#main").load("main.php");
        });
        $(function() {
            $("#EventsAds").load("EventsAd.php");
        });
        $(function() {
            $("#bottom").load("bottom.php");
        });
        $(function() {
            $("#ex").load("executive-body.php");
        });
    
        $(function() {
            $("#teams").load("teams.php");
        });
        
    </script>

</body>

</html>