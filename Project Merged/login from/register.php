<html>

<head>
    <meta charset="UTF-8">
    <title>register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
   <h4 class="center">Registration Form</h4>
    <form action="server.php" method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="name" placeholder="unique" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="pass" placeholder="******" required>
        </div>
        <!--Name: <input type="text" name="name" required><br>
Password: <input type="password" name="pass" required><br>
<!--<input type="submit">-->
        <button type="submit" class="btn" name="sing_up">register</button>
    </form>
    <h6 align="center">Already have an account? <a href="logino.php"><b>Login</b></a></h6>
</body>

</html>
