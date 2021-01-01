<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>profile</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
    </head>
</head>

<body>
    <?php
    require 'header.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-5" style=" border: 10px solid white;background: #f39c12;">
                <h4><u>user name and photo</u></h4></br>
                <h5>Istiak Ahmed Sheam</h5></br>
                <h6>ECE Department, </br> CSE Mejor</h6>
            </div>
            <div class="col-md-7" style=" border: 10px solid white; background: #f39c12;">
                <h4><u>user details</u></h4>
                <h6>email :example@gmail.com <button style="align:floot right" type="submit">edit</button></h6>
                <h6>Address:</h6>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style=" border: 10px solid white; background: #f39c12;">
                <h4><u>Clubs following</u></h4>
            </div>
            <div class="col-md-6" style=" border: 10px solid white; background: #f39c12;">
                <h4><u>Events following</u></h4>
            </div>
        </div>
    </div>
    <?php
    require 'footer.php';
    ?>


</body>

</html>