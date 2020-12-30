<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<style>
    #main {
        margin: 5%;
        text-align: center;
    }

    #club-links {
        margin-top: 50px;
        margin-right: 150px;
        border-color: cyan;
    }

    .logo {
        width: 150px;
        height: 100px;
        margin: 20px
    }
    #main a{
        margin: 15px;
    }
    #main a:hover{
        color: black;
        
    }
</style>

<img class="logo" src="./images/acm.png" alt="Logo">
<div class="contact-logo" id="club-links">
</div>
<h1 id="mainClubShortName" style="color: lightcoral;" ></h1>
<p id="mainHeading" style="font-size: large;" ></p>
<img id="mainHeadImg" src="./images/friends-week.jpg" alt="Club HOME" style="width: 90%; height:400px; margin:20px">
<hr>
<script>
    
$(document).ready( function() {
            $.ajax({
                type: 'POST',
                url: './database/clubdescription.php',
                data: 'id=testdata',
                dataType: 'json',
                cache: false,
                success: function(result) {
                    console.log("main",result);
                    designMain(result);
                },
                error: function(){
        window.alert("Wrong query 'queryDB.php': " + query);
                }
            });
        });

    
    function designMain(mainArray){
        var strID=0;
        $('#mainClubShortName').append(mainArray[0]['ShortName']  );
        $('#mainHeading').append(mainArray[0]['Discription']  );
        $('#mainHeadImg').attr('src','./images/'+ mainArray[0]['ClubImg']);
        if(mainArray[1]['Facebook']){
            $("#club-links").append('<a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>');
        }
        if(mainArray[1]['Twitter']){
            $("#club-links").append('<a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>');
        }
        if(mainArray[1]['WebLink']){
            $("#club-links").append('<a href=""><i class="fa fa-link" aria-hidden="true"></i></a>');
        }
    }
</script>
