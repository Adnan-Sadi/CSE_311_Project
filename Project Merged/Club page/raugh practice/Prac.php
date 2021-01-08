<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<script src="../../js/jquery-3.5.1.min.js"></script>
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
$_SESSION["clubName"] = "ACM";
echo "Session variables are set.";
?>
<button id="ok"><a href="FullEvent"></a></button>

</body>
</html>
<script>
$("#ok").click(function(){
   <?php 
      $_SESSION["clubName"]=
      ?>
}
);
</script>