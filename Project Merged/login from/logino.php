
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <h4 class="center">Dash</h4>
    <form action="server.php" method="post">
        <div>
            <label for="username">username</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" name="pass" required>
        </div>
        <button type="submit" class="btn" name="login">Login</button>
    </form>
    <h6 align="center">Don't have an account? <a href="register.php"><b>Register</b></a></h6>

</body>

