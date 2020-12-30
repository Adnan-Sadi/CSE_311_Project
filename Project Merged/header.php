<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>NSU Clubs Home</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 id="logo">NSU Clubs</h1>
                </div>
                <div id="un" class="col-md-5">
                    <ul id="menu" class="float-md-right">
                        <li><a href="coordinator.php">Home</a></li>
                        <li><a href="about_us.php">About Us</a></li>
                        <li><a href="all_clubs.php">Clubs</a></li>
                        <li><a href="login.php">Log In</a></li>
                        <li><a href="signup.php">Sign Up</a></li>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div>
                <div id="search" class="col-md-3">
                    <form class="form-inline my-2 my-lg-0">
                        <input id="item" class="form-control mr-sm-2" type="text" placeholder="Search club" aria-label="Search" />
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
                        url: "coordinator.php",
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