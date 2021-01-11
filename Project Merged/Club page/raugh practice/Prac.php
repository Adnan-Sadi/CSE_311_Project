<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <form action="" method="POST">
   <input name="OK" type="text">
   <button name="but" type="submit" >button</button>
   </form>
</body>
</html>

<?php
if(isset($_POST['but'])){
   echo "Go for it";
}
?>