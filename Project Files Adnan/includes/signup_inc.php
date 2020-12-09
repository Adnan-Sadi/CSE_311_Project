<?php 

if(isset($_POST["submit"])){
      
     $name = $_POST["name"];
     $email = $_POST["email"];
     $username = $_POST["userid"];
     $pwd = $_POST["pwd"];
     $pwdRepeat = $_POST["pwdrepeat"];

     require_once 'db_inc.php';
     require_once 'functions_inc.php';

     if (emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat) !== false) {
         header("location: ../signup.php?error=emptyinput");
         exit();
     }

      if (invalidUid($username) !== false) {
         header("location: ../signup.php?error=invaliduid");
         exit();
     }
      if (invalidEmail($email) !== false) {
         header("location: ../signup.php?error=invalidemail");
         exit();
     }

     if (pwdMatch($pwd,$pwdRepeat) !== false) {
         header("location: ../signup.php?error=pwdsdontmatch");
         exit();
     }

     if (uidExists($conn,$username,$email) !== false) {
         header("location: ../signup.php?error=usernametaken");
         exit();
     }

     createUser($conn,$name,$email,$username,$pwd);

}
else {
    header("location: ../signup.php");
    exit();
}