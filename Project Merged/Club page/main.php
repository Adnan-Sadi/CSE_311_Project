<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

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
        border-color: #75d977;
    }

    .logo {
        width: 200px;
        height: 130px;
        margin: 20px
    }
    #main a{
        margin: 15px;
    }
    #main :hover{
        background-color: #75d977;
    }
    #main a:hover{
        color: black;
        
    }
</style>
<div style="border: 2px inset white; padding:2%;background: #9395db">
    <img class="logo" src="./images/acm.png" alt="Logo">
    <div class="contact-logo" id="club-links"></div>
</div>
<div style="padding:20px;padding-top:30px;">
    <h1 id="mainClubShortName" style="color: lightcoral;" ></h1>
    <p id="mainHeading" style="font-size: large;" ></p>
    <img id="mainHeadImg" src="./images/friends-week.jpg" alt="Club HOME" style="width: 90%; height:400px; margin:20px">
    <hr>
</div>
<script>
    
$(document).ready( function() {
            $.ajax({
                type: 'POST',
                url: './database/clubdescription.php',
                data: 'id=testdata',
                dataType: 'json',
                cache: false,
                success: function(result) {
                    // console.log("main",result);
                    designMain(result);
                },
                error: function(){
        window.alert("Wrong query 'queryDB.php': " + query);
                }
            });
        });

    
    function designMain(mainArray){
        var strID=0;
        $('#mainClubShortName').append(mainArray[0][0]['Club_Name']  );
        $('#mainHeading').append(mainArray[0][0]['Description']  );
        $('#mainHeadImg').attr('src','./images/'+ mainArray[0][0]['Club_Name']+'Head.jpg');
        // alert('./images/'+ mainArray[0][0]['Club_Name']+'Head.jpg');
        for(var i=0;i<mainArray[1].length;i++)
        {
            if(/facebook/ .test(mainArray[1][i]))
                $("#club-links").append('<a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>');
            else if(/twitter/ .test(mainArray[1][i]))
                $("#club-links").append('<a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>');
            else
                $("#club-links").append('<a href=""><i class="fa fa-link" aria-hidden="true"></i></a>');
        }
    }
</script>
