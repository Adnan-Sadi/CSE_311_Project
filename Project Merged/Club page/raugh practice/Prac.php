<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // $("form").submit(function(e){
  //   // console.log($(name['FirstName']).val());
  //   e.preventDefault();
  // });
});
function ghost(e){
  console.log(e.value);
}
</script>
</head>
<body>

<form id="1" action="">
  First name: <input type="text" name="FirstName" id="OP" value=""><br>
  Last name: <input  type="text" name="LastName" value=""><br>
  
  <input id="OK" type="submit" value="Submit">
</form> 
<!-- <button id="ghost" name="subject" type="submit" onclick="ghost(this.)" value="fav_CSS">CSS</button> -->

</body>
</html>
<script>
  $("#OK").click(function(){console.log("OOO"); });
  //  $.ajax({
  //           type: 'POST',
  //           url: 'demi_seassion2.php',
  //           data: ({
  //           'eventEdit':{'name': 123}}),
  //           dataType: 'json',
  //           cache: false,
  //           success: function(result) {
               
  //               console.log(result);

  //           },
  //           error: function(xhr, status, error) {
  //               var err = eval("(" + xhr.responseText + ")");
  //               alert(err.Message)
  //           }
  //       });
</script>
<?php
require "../database/accessDatabase.php";
    // eventDelete(2,142);
    // eventEdit(2,141,$Title="Works");
    $sql = "WLL >C :C Z";
?>