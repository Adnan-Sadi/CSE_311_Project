<!DOCTYPE html>
<style>
    #teams li {
        list-style: none;
    }
    
    #teams li:hover {
        background: lightgreen;
    }
    
    #opl-intro,
    #pub-intro,
    #cor-intro,
    #promo-intro {
        display: none;
        margin: 30px;
    }
    
    #opl-intro img,
    #pub-intro img,
    #cor-intro img,
    #promo-intro img {
        width: 80px;
        height: 50px;
        margin-left: 50px;
        display: inline-block;
    }
    
    #opl-intro h1:hover,
    #pub-intro h1:hover,
    #cor-intro h1:hover,
    #promo-intro h1:hover {
        color: rgb(110, 185, 160);
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
<script>
    $(document).ready(function() {

        $("#opl-intro").slideDown();
        $("#OPL").click(function(e) {
            $("#opl-intro").slideToggle();

        });
        $("#PROMO").click(function() {
            $("#promo-intro").slideToggle();
        });
        $("#PUB").click(function() {
            $("#pub-intro").slideToggle();
            // $('.btn').click();
        });
        $("#COR").click(function() {
            $("#cor-intro").slideToggle();
        });
    });
</script>
<div id="team-intro">
    <h1 style="text-align: center; margin-bottom: 60px;" class="hover-line">Our Teams</h1>
    <ul>
        <li>
          <a href="../members.php?id=1"  <button id="OPL" class="btn  btn-success  ">All Members</button></a>
        </li>
    </ul>

</div>