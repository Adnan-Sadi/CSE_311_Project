<?php
session_start();
?>
<!DOCTYPE html>
<style>
   
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

    });
</script>
<div id="team-intro">
    <h1 style="text-align: center; margin-bottom: 60px;" class="hover-line">Our Teams</h1>
    <ul>
        <li>
          <a href="../members.php?id=<?php echo $_SESSION['']; ?>"  <button id="OPL" class="btn  btn-success  ">Members</button></a>
        </li>
    </ul>

</div>