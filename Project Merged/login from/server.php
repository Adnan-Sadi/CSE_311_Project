<?php
session_start();
?>
<?php
$link = mysqli_connect('localhost', 'root', '', 'practice');
if(isset($_POST['sing_up'])){
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $sql = "SELECT name FROM dash WHERE name='$name'";
    $res = mysqli_query($link,$sql);
    $del = mysqli_num_rows($res);
    if($del>0){
        echo '<h4><p align=center>username already exist<br></p></h4>';
        echo '<p align=center>Try again?  <a href="register.php"><b> Register</b></p>';
    }else{
        $sql = "INSERT INTO dash VALUES ('$name','$pass')";
        if (mysqli_query($link,$sql)){
        header("Location: http://localhost:8080/Connection/logino.php");
        exit;
    } else {
        echo "error!".mysqli_error($link);
    }
    }
}
if(isset($_POST['login'])){
    $namel = $_POST["name"];
    $passl = $_POST["pass"];
    $sql2 = "SELECT * FROM dash WHERE name='$namel' && pass='$passl'";
    $res2 = mysqli_query($link,$sql2);
    $del2 = mysqli_num_rows($res2);
    if($del2 > 0){
        $_SESSION['user']=$namel;
        header ("Location: http://localhost:8080/Connection/home.php");
        exit;
    }
    else{
        echo "<script>
                window.location.href='logino.php';
                alert('username or password is incorrect');
              </script>";
        //echo '<script>alert("username or password is incorrect")</script>'; 
    }
}
mysqli_close($link);
?>
