<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>NSU Clubs Home</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 id="logo"><a style= "color: #fff;" href="index.php">NSU Clubs</a></h1>
                </div>
                <div id="un" class="col-md-5">
                    <ul id="menu" class="float-md-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about_us.php">About Us</a></li>
                        <li><a href="all_clubs.php">Clubs</a></li>

                             <?php

				             if (isset($_SESSION["useruid"])) {
				            	 echo "<li><a href='profile.php'>Profile Page</a></li>";
				            	 echo "<li><a href='includes/logout_inc.php'>Log out</a></li>";
				             }

				             else if (isset($_SESSION["email"])) {
				             	 echo "<li><a href='profile.php'>Google Page</a></li>";
				             	 echo "<li><a href='includes/logout_inc.php'>Log out</a></li>";
				              }


				             else{
				            	echo "<li><a href='signup.php'>Sign Up</a></li>";
				            	echo "<li><a href='login.php'>Log In</a></li>"; 
				             }
				            
				            ?>                  
                    </ul>
                </div>
                <div id="search" class="col-md-3">
                    <form class="form-inline my-2 my-lg-0">
                        <input id="search" class="form-control mr-sm-2" type="text" placeholder="Search club" aria-label="Search" />
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div id="div1" style="width:90px; height:60px; display:none; background-color:beige; "></div>
    <script>
        $(function() {
            $("input").on("keypress", function() {
                var insearch = $("item").val();
                $.ajax({
                        method: "post",
                        url: "index.php",
                        data: {
                            name: insearch
                        }
                    })
                    .done(function(data) {
                        $("#div1").html(data);
                    })
            });
        });
    </script>
</body>

</html>