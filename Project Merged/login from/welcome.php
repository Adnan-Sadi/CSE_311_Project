<html>

<body>
    <?php
    echo "Today is " . date("Y/m/d") . "<br>";
    $name =  $_POST["name"];
    $pass = $_POST["pass"];
?>

    Welcome <?php echo $name; ?><br>
    Your password is: <?php echo $pass; ?>
    <?php
    $link = mysqli_connect('localhost', 'root', '', 'practice');
    if (!$link){
        die("error :".mysqli_error($link));
    } else{
        echo "<br>connected to database<br>";
    }
    $sql = "INSERT INTO dash VALUES ('$name','$pass')";
    if (mysqli_query($link,$sql)){
        echo "new recorded added";
    } else {
        echo "error!".mysqli_error($link);
    }
?>

</body>

</html>
