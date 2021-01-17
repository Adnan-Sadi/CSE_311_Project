<?php
$ClubID = $_GET['Id'];
// echo '<script>console.log("'."$ClubID".'") </script>';
?>

<!DOCTYPE html>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->

<style>
    #main {
        margin: 0.1%;
        padding: 40px;
        text-align: center;
        border: 2px solid black;
    }

    #club-links {
        margin-top: 5px;
        margin-right: 50px;
        border-color: red;
    }

    .logo {
        width: 200px;
        height: 130px;
        margin: 20px
    }

    #main a {
        margin: 15px;
    }

    #main a:hover {
        color: black;

    }
</style>
<div class="container">
    <div class="row" style="background-color: #e8e8e8;">
        <div class="col">
            <div  style="border: 4px inset white;">
                <img id="clubLogo" class="logo" src="./images/" alt="Logo">
                <div class="contact-logo" id="club-links">
                </div>
            </div>
            <h1 id="mainClubShortName" style="color: lightcoral;"></h1>
        </div>
    </div>
</div>
<div style="padding:20px;padding-top:30px;">
    <h1 id="mainClubLongName" style="color: lightcoral;"></h1>
    <p id="mainHeading" style="font-size: large;"></p>
    <img id="mainHeadImg" src="./images/" alt="Club HOME column missing comment" style="width: 90%; height:400px; margin:20px">
    <hr>
</div>
<script>
    $(document).ready(function() {
        var id = "<?php echo $ClubID; ?>";
        console.log(id);
        $.ajax({
            type: 'post',
            url: './database/clubdescription.php',
            data: ({'Id': id}),
            dataType: 'json',
            cache: false,
            success: function(result) {
                console.log("main return data", result);
                designMain(result);
            },
            error: function(e) {
                console.log("Something wrong with ./database/clubdescription.php': ");
                console.log(e);
            },

        });
    });


    function designMain(mainArray) {
        var strID = 0;
        $('#mainClubShortName').append(mainArray[0][0]['Club_Name']);
        $('#mainClubLongName').append(mainArray[0][0]['Club_Fname']);
        $('#mainHeading').append(mainArray[0][0]['Description']);
        $('#clubLogo').attr('src', '../images/' + mainArray[0][0]['Club_Logo']);
        $('#mainHeadImg').attr('src', '../images/' + mainArray[0][0]['Club_DP']);
        // alert('./images/'+ mainArray[0][0]['Club_Name']+'Head.jpg');
        if (mainArray[1].length == 0) {
            $("#club-links").hide();
        }
        for (var i = 0; i < mainArray[1].length; i++) {
            if (/facebook/.test(mainArray[1][i]["link"].toLowerCase()))
                $("#club-links").append('<a href=https://www.' + mainArray[1][i]["link"] + '><i class="fa fa-facebook" aria-hidden="true"></i></a>');
            else if (/twitter/.test(mainArray[1][i]["link"].toLowerCase()))
                $("#club-links").append('<a href=https://www.' + mainArray[1][i]["link"] + '><i class="fa fa-twitter" aria-hidden="true"></i></a>');
            else
                $("#club-links").append('<a href=https://www.' + mainArray[1][i]["link"] + '><i class="fa fa-link" aria-hidden="true"></i></a>');
        }

    }
</script>